<?php

declare(strict_types=1);

namespace OCA\DiscourseSSO\AppInfo;

use OCA\DiscourseSSO\Listener\CSPListener;
use OCP\AppFramework\App;
use OCP\AppFramework\Bootstrap\IBootContext;
use OCP\AppFramework\Bootstrap\IBootstrap;
use OCP\AppFramework\Bootstrap\IRegistrationContext;
use OCP\Security\CSP\AddContentSecurityPolicyEvent;

class Application extends App implements IBootstrap
{

    public function __construct()
    {
        parent::__construct('discoursesso');
    }

    public function register(IRegistrationContext $context): void
    {
        // Register CSP event listener to allow form submissions to the Discourse SSO URL
        $context->registerEventListener(AddContentSecurityPolicyEvent::class, CSPListener::class);

        // Register the composer autoloader for packages shipped by this app, if applicable
        include_once __DIR__ . '/../../vendor/autoload.php';
    }

    public function boot(IBootContext $context): void
    {
        // CSP is now handled via the AddContentSecurityPolicyEvent listener
    }

}
