<?php
namespace OCA\DiscourseSSO\Controller;

use OCP\IRequest;
use OCP\IConfig;
use OCP\AppFramework\Http\TemplateResponse;
use OCP\AppFramework\Http\DataResponse;
use OCP\AppFramework\Controller;
use OCP\IUserManager;
use OCP\ILogger;
use Cviebrock\DiscoursePHP\SSOHelper;

class DiscourseController extends Controller {
	private $userId;
	private $config;
	private $logger;
	private $userManager;

	public function __construct($AppName, IRequest $request, IConfig $config, IUserManager $userManager, ILogger $logger, $UserId){
		parent::__construct($AppName, $request);
		$this->userId = $UserId;
		$this->config = $config;
		$this->logger = $logger;
		$this->userManager = $userManager;
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
	public function sso($sso, $sig) {
		$ssoHelper = new SSOHelper();

		// this should be the same in your code and in your Discourse settings:
		$secret = $this->config->getAppValue($this->appName, 'clientsecret', '');
		$this->logger->error('secret: '.$secret, array('app' => 'discoursesso'));
		$ssoHelper->setSecret( $secret );

		// load the payload passed in by Discourse
		$payload = $sso;
		$signature = $sig;

		// validate the payload
		if (!($ssoHelper->validatePayload($payload,$signature))) {
		    // invaild, deny
		    header("HTTP/1.1 403 Forbidden");
		    echo("Bad SSO request, appName: " .$this->appName." payload: ".$sso.", signature:".$sig." secret: ".$secret);
		    die();
		}

		$nonce = $ssoHelper->getNonce($payload);

		$user = $this->userManager->get($this->userId);

		$userId = $this->userId;
		$userEmail = $user->getEMailAddress();

		// Optional - if you don't set these, Discourse will generate suggestions
		// based on the email address

		// $extraParameters = array(
		//     'username' => $userUsername,
		//     'name'     => $userFullName
		// );

		// build query string and redirect back to the Discourse site
		$query = $ssoHelper->getSignInString($nonce, $userId, $userEmail);
		$url = $this->config->getAppValue($this->appName, 'clienturl', '');
		$this->logger->error('url: '.$url, array('app' => 'discoursesso'));

		return new RedirectResponse($url . '?' . $query);
	}

}
