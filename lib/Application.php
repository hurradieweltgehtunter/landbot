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

		parent::__construct('landbot', $urlParams);
		$container = $this->getContainer();

		// Start the snow loader
		$loader = new LandbotLoader(
			$container->getServer()->getConfig(),
			$container->getServer()->getRequest(),
			$container->getServer()->getUserSession()
		);

		// $policy = new OCP\AppFramework\Http\EmptyContentSecurityPolicy();
		// $policy->addAllowedScriptDomain('landbot.io');
		// \OC::$server->getContentSecurityPolicyManager()->addDefaultPolicy($policy);

	}

}
