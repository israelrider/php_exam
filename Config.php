<?php

class Config {

	private static $dbConfig = [
		'host' => 'localhost',
		'user' => 'user',
		'pass' => '1',
		'db' => 'exam',
	];

	public static function __callStatic($name, $arguments) {
		return self::$$name;
	}
}
