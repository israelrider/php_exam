<?php

class Validator {

	public function validate($data) {
		$validationResult = [];

		if (!$this->validateUsername($data['name'])) {
			array_push($validationResult, 'Invalid username');
		}

		if (!$this->validateEmail($data['email'])) {
			array_push($validationResult, 'Invalid email');
		}

		if (!$this->validatePassword($data['password'])) {
			array_push($validationResult, 'Invalid password');
		}

		if (!$this->validateUrl($data['url'])) {
			array_push($validationResult, 'Invalid url');
		}

		if (!$this->validateBirthdate($data['birthdate'])) {
			array_push($validationResult, 'Invalid birthdate');
		}

		if (!$this->validatePhoneNumber($data['phone'])) {
			array_push($validationResult, 'Invalid phone number');
		}

		return $validationResult;
	}

	private function validateUsername($username) {
		return preg_match('/^[a-zA-Z]{3,20}$/', $username);
	}

	private function validatePassword($password) {
		return preg_match('/(?=^.{8,16}$)(?=.{0,}[A-Z])(?=.{0,}[a-z])(?=.{0,}\W)/', $password);
	}

	private function validateEmail($email) {
		return filter_var($email, FILTER_VALIDATE_EMAIL);
	}

	private function validatePhoneNumber($phoneNumber) {
		return preg_match('/^[0-9]{10}$/', $phoneNumber);
	}

	private function validateUrl($url) {
		return filter_var($url, FILTER_VALIDATE_URL);
	}

	private function validateBirthdate($birthdate) {
		return preg_match('/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/', $birthdate);
	}
}
