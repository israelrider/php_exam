<?php

class UserModel {

	private $userDao;

	public function __construct($userDao) {
		$this->userDao = $userDao;
	}

	public function getUsers() {
		$query = 'select id, username, email from users;';
		$stmt = $this->userDao->run($query);

		return $stmt->fetchAll();
	}

	public function saveUser($data) {
		$query = <<<EOD
INSERT INTO users 
(username, password, email, phone_number, url, birthdate) VALUES 
(:username, :password, :email, :phone_number, :url, :birthdate);
EOD;
		$params = [
			':username' => $data['name'],
			':password' => $data['password'],
			':email' => $data['email'],
			':phone_number' => $data['phone'],
			':url' => $data['url'],
			':birthdate' => $data['birthdate'],
		];

		return $this->userDao->run($query, $params);
	}

	public function deleteUser($data) {
		$query = 'DELETE FROM users WHERE id=:id;';
		$params = [
			':id' => $data['id'],
		];

		return $this->userDao->run($query, $params);
	}

	public function getDetails($data) {
		$query = 'select * from users WHERE id=:id;';
		$params = [
			':id' => $data['id'],
		];
		$stmt = $this->userDao->run($query, $params);

		return $stmt->fetch();
	}
}
