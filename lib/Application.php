<?php

namespace OCA\Landbot;

use OCP\AppFramework\App;
use OCP\AppFramework\Http\ContentSecurityPolicy;
use OCP\Security\IContentSecurityPolicyManager;

class Application extends App {

	public function __construct(array $urlParams = []) {
		parent::__construct('landbot', $urlParams);

		/** @var \OCP\AppFramework\IAppContainer $container */
		$container = $this->getContainer();

		/** @var IContentSecurityPolicyManager $cspManager */
		$cspManager = $container->query(IContentSecurityPolicyManager::class);
		$policy = new ContentSecurityPolicy();
		$policy->addAllowedScriptDomain('https://*.landbot.io');
		$policy->addAllowedConnectDomain('https://landbot.io');
		$policy->addAllowedFrameDomain('https://landbot.io https://owncloud.online');
		$policy->addAllowedStyleDomain('https://fonts.googleapis.com blob:');
		$policy->addAllowedImageDomain('https://static.landbot.io https://storage.googleapis.com');
		$policy->addAllowedFontDomain('https://fonts.gstatic.com/stats/Raleway/normal/700');
		$cspManager->addDefaultPolicy($policy);

		// Start the loader
		$loader = new LandbotLoader(
			$container->getServer()->getUserSession()
		);
	}
}
