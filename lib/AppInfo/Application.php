<?php

declare(strict_types=1);

namespace OCA\DiscourseSSO\AppInfo;

use OCP\AppFramework\App;
use OCP\AppFramework\Bootstrap\IBootContext;
use OCP\AppFramework\Bootstrap\IBootstrap;
use OCP\AppFramework\Bootstrap\IRegistrationContext;
use OCP\Notification\IManager;
use OCP\User\Events;

class Application extends App implements IBootstrap
{

    public function __construct()
    {
        parent::__construct('discoursesso');
    }

    public function register(IRegistrationContext $context): void
    {
        // ... registration logic goes here ...

        // Register the composer autoloader for packages shipped by this app, if applicable
        include_once __DIR__ . '/../../vendor/autoload.php';
    }

    public function boot(IBootContext $context): void
    {
        $manager = \OC::$server->getContentSecurityPolicyManager();
        $policy = new \OCP\AppFramework\Http\EmptyContentSecurityPolicy();
        $ssoUrl = \OC::$server->getConfig()->getAppValue('discoursesso', 'clienturl');


        $policy->addAllowedFormActionDomain($ssoUrl);
        $manager->addDefaultPolicy($policy);
    }

}
