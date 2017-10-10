<?php
namespace OCA\DiscourseSSO\Controller;

use OCP\IRequest;
use OCP\IConfig;
use OCP\AppFramework\Http\TemplateResponse;
use OCP\AppFramework\Http\DataResponse;
use OCP\AppFramework\Controller;
use OCP\IUserManager;

class DiscourseController extends Controller {
	private $userId;
	private $config;

	public function __construct($AppName, IConfig $config, IRequest $request, $UserId){
		parent::__construct($AppName, $request);
		$this->userId = $UserId;
		$this->config = $config;
	}

	/**
	 * CAUTION: the @Stuff turns off security checks; for this page no admin is
	 *          required and no CSRF check. If you don't know what CSRF is, read
	 *          it up in the docs or you might create a security hole. This is
	 *          basically the only required method to add this exemption, don't
	 *          add it to any other method if you don't exactly know what it does
	 *
	 * @NoAdminRequired
	 * @NoCSRFRequired
	 */
	public function sso() {
		$sso = new Cviebrock\DiscoursePHP\SSOHelper();

		// this should be the same in your code and in your Discourse settings:
		$secret = $this->config->getAppValue($this->appName, 'discoursesso_clientsecret', '');
		$sso->setSecret( $secret );

		// load the payload passed in by Discourse
		$payload = $_GET['sso'];
		$signature = $_GET['sig'];

		// validate the payload
		if (!($sso->validatePayload($payload,$signature))) {
		    // invaild, deny
		    header("HTTP/1.1 403 Forbidden");
		    echo("Bad SSO request");
		    die();
		}

		$nonce = $sso->getNonce($payload);

		$userManager = $app->getContainer()->query('OCP\IUserManager');
		$user = $userManager->get($this->userId);

		$userId = $this->userId;
		$userEmail = $user->getEMailAddress();

		// Optional - if you don't set these, Discourse will generate suggestions
		// based on the email address

		// $extraParameters = array(
		//     'username' => $userUsername,
		//     'name'     => $userFullName
		// );

		// build query string and redirect back to the Discourse site
		$query = $sso->getSignInString($nonce, $userId, $userEmail, NULL);
		$url = $this->config->getAppValue($this->appName, 'discoursesso_clienturl', '');

		return new RedirectResponse($url . '?' . $query);
	}

}
