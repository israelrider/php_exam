<?php

class Router {

	private $defaultRout = 'showUsers';

	private $routes = [
		'users/show' => 'showUsers',
		'users/details' => 'getDetails',
		'users/add' => 'addUser',
		'users/save' => 'saveUser',
		'users/delete' => 'deleteUser',
		'file-issue/resume-file' => 'resumeFile',
		'mailer/send-email' => 'sendEmail',
	];

	public function run() {
		$uri = $_SERVER['REQUEST_URI'];
		return $this->getRoute($uri);
	}

	private function getRoute($uri) {
		$uriString = explode('?', $uri)[0];
		$uriString = trim($uriString, '/');
		$uriString = strtolower($uriString);

		if ($this->routes[$uriString]) {
			return $this->routes[$uriString];
		}

		return $this->defaultRout;
	}
}
