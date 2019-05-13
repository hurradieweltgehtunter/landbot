<?php

namespace OCA\Landbot;

use OCP\IConfig;
use OCP\IRequest;
use OCP\IUserSession;
use OCP\Util;



class LandbotLoader {

	/**
	 * @var IConfig
	 */
	protected $config;
	/**
	 * @var IRequest
	 */
	protected $request;
	/**
	 * @var IUserSession
	 */
	protected $userSession;

	public function __construct(
		IConfig $config,
		IRequest $request,
		IUserSession $userSession) {

		Util::addScript('xmas', 'landbot');

	}

	/**
	 * Detect if we are on the login page
	 * @return bool
	 */
	private function isLogin() {
		return $this->userSession->isLoggedIn() !== true
			&& strpos($this->request->getRequestUri(), '/login') !== false;
	}

	/**
	 * Detect if we are on the login page
	 * @return bool
	 */
	private function isPublicShare() {
		return strpos($this->request->getRequestUri(), '/s/') !== false;
	}

	/**
	 * Detect if we are on the login page
	 * @return bool
	 */
	private function isFilesApp() {
		return $this->userSession->isLoggedIn()
			&& strpos($this->request->getRequestUri(), '/apps/files') !== false;
	}

}