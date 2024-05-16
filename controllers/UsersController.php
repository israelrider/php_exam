<?php

class UsersController {

	const ERROR = 'Error happened, try again later.';

	private $layout;

	private $userModel;

	private $validator;

	public function __construct($layout, $userModel, $validator) {
		$this->layout = $layout;
		$this->userModel = $userModel;
		$this->validator = $validator;
	}

	public function showUsers() {
		$template = 'showUsers.php';

		$users = $this->userModel->getUsers();

		return $this->layout->getContent($template, $users);
	}

	public function deleteUser() {
		$data = $_POST;
		$content = $this->userModel->deleteUser($data);

		return [];
	}

	public function addUser() {
		$template = 'addUser.html';

		return $this->layout->getContent($template, []);
	}

	public function saveUser() {
		$data = $_POST;

		$validation = $this->validator->validate($data);
		if (!empty($validation)) {
			return $validation;
		}

		try {
			$this->userModel->saveUser($data);
			return [];
		} catch (Exception $e) {
			return [self::ERROR];
		}
	}

	public function getDetails() {
		$template = 'userDetails.php';

		$data = $_POST;
		$userDetails = $this->userModel->getDetails($data);
		unset($userDetails['id']);

		return $this->layout->getContent($template, $userDetails);
	}
}
