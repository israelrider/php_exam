<?php

define('ROOT_DIRECTORY', __DIR__);

class Bootstrap {

	private $paths = [
		ROOT_DIRECTORY . DIRECTORY_SEPARATOR,
		ROOT_DIRECTORY . DIRECTORY_SEPARATOR . 'controllers' . DIRECTORY_SEPARATOR,
		ROOT_DIRECTORY . DIRECTORY_SEPARATOR . 'database' . DIRECTORY_SEPARATOR,
		ROOT_DIRECTORY . DIRECTORY_SEPARATOR . 'migration' . DIRECTORY_SEPARATOR,
		ROOT_DIRECTORY . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR,
		ROOT_DIRECTORY . DIRECTORY_SEPARATOR . 'templates' . DIRECTORY_SEPARATOR,
	];

	private $isMainFlow;

	public function __construct($isMainFlow) {
		$this->isMainFlow = $isMainFlow;
	}

	public function init() {
		$this->prepareAutoload();
		$this->connecctToDb();
	}

	private function prepareAutoload() {
		spl_autoload_register(function ($class_name) {
			foreach ($this->paths as $path) {
				if (file_exists($path . $class_name . '.php')) {
					include $path . $class_name . '.php';

					return;
				}
			}

			throw new Exception('Class ' . $class_name . ' not found');
		});

	}

	private function connecctToDb() {
		$dbConfig = Config::dbConfig();

		Initializer::setHost($dbConfig['host']);
		Initializer::setUser($dbConfig['user']);
		Initializer::setPassword($dbConfig['pass']);

		if ($this->isMainFlow) {
			Initializer::setDbName($dbConfig['db']);
		}
	}
}
