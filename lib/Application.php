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

		/** @var \OCP\AppFramework\IAppContainer $container */
		$container = $this->getContainer();

		/** @var IContentSecurityPolicyManager $cspManager */
		$cspManager = $container->query(IContentSecurityPolicyManager::class);
		$policy = new ContentSecurityPolicy();
		$policy->addAllowedConnectDomain('static.landbot.io');
		$cspManager->addDefaultPolicy($policy);

		// Start the loader
		$loader = new LandbotLoader(
			$container->getServer()->getConfig(),
			$container->getServer()->getRequest(),
			$container->getServer()->getUserSession()
		);

	}

}
