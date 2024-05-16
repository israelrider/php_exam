<?php

class MainMigration {

	private $userDao;

	public function __construct($userDao) {
		$this->userDao = $userDao;
	}

	public function run() {
		$queries = require ROOT_DIRECTORY . DIRECTORY_SEPARATOR . 'migration' . DIRECTORY_SEPARATOR . 'queries.php';

		foreach ($queries as $query) {
			$this->userDao->run($query);
		}
	}
}
