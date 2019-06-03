<?php

namespace OCA\Landbot;

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
		IUserSession $userSession) {

	}
}
