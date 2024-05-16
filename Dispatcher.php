<?php

class Dispatcher {

	public function dispatch() {
		$route = $this->getRoute();
		$connection = Initializer::init();
		$userDao = new UserDao($connection);
		$userModel = new UserModel($userDao);
		$validator = new Validator();
		$layout = new Layout();

		switch ($route) {
			case 'showUsers':
				$controller = new UsersController($layout, $userModel, $validator);
				$model = 'showUsers';
				break;
			case 'getDetails':
				$controller = new UsersController($layout, $userModel, $validator);
				$model = 'getDetails';
				break;
			case 'addUser':
				$controller = new UsersController($layout, $userModel, $validator);
				$model = 'addUser';
				break;
			case 'saveUser':
				$controller = new UsersController($layout, $userModel, $validator);
				$model = 'saveUser';
				break;
			case 'deleteUser':
				$controller = new UsersController($layout, $userModel, $validator);
				$model = 'deleteUser';
				break;
			default:
				$controller = new UsersController($layout, $userModel, $validator);
				$model = 'showUsers';
		}

		$content = $controller->$model();

		switch ($model) {
			case 'getDetails':
				echo $content;
				return;
			case 'saveUser':
			case 'deleteUser':
				echo json_encode($content);
				return;
			default:
				$layout->render($content, $route);
		}
	}

	private function getRoute() {
		$router = new Router();
		return $router->run();
	}
}
