<?php

namespace OCA\Landbot;

use OCP\AppFramework\App;
use OCP\AppFramework\Http\ContentSecurityPolicy;
use OCP\ILogger;
use OCP\IRequest;
use OCP\IUserSession;
use OCP\Security\IContentSecurityPolicyManager;

class Application extends App {

	public function __construct(array $urlParams = []) {

		$container = $this->getContainer();

		$policy = new OCP\AppFramework\Http\EmptyContentSecurityPolicy();
		$policy->addAllowedScriptDomain('landbot.io');
		\OC::$server->getContentSecurityPolicyManager()->addDefaultPolicy($policy);

	}

}