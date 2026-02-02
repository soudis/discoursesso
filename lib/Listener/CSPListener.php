<?php

declare(strict_types=1);

namespace OCA\DiscourseSSO\Listener;

use OCP\AppFramework\Http\EmptyContentSecurityPolicy;
use OCP\EventDispatcher\Event;
use OCP\EventDispatcher\IEventListener;
use OCP\IConfig;
use OCP\Security\CSP\AddContentSecurityPolicyEvent;

/**
 * @template-implements IEventListener<AddContentSecurityPolicyEvent>
 */
class CSPListener implements IEventListener
{
    private IConfig $config;

    public function __construct(IConfig $config)
    {
        $this->config = $config;
    }

    public function handle(Event $event): void
    {
        if (!($event instanceof AddContentSecurityPolicyEvent)) {
            return;
        }

        $ssoUrl = $this->config->getAppValue('discoursesso', 'clienturl');

        $policy = new EmptyContentSecurityPolicy();
        $policy->addAllowedFormActionDomain($ssoUrl);
        $event->addPolicy($policy);
    }
}
