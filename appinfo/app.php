<?php
/**
 * @author Florian Humer <florian.humer@gmail.com>
 *
 */
if(class_exists('\\OCP\\AppFramework\\Http\\EmptyContentSecurityPolicy')) {
 	$manager = \OC::$server->getContentSecurityPolicyManager();
 	$policy = new \OCP\AppFramework\Http\EmptyContentSecurityPolicy();
 	$ssoUrl = \OC::$server->getConfig()->getAppValue('discoursesso', 'clienturl');


 	$policy->addAllowedFormActionDomain($ssoUrl);
 	$manager->addDefaultPolicy($policy);
}

if ((@include_once __DIR__ . '/../vendor/autoload.php')===false) {
	throw new Exception('Cannot include autoload. Did you run install dependencies using composer?');
}

