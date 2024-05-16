<?php

class UserDao {

	private \PDO $pdo;

	public function __construct($pdo) {
		$this->pdo = $pdo;
	}

	/**
	 * Run (prepare and execute) an SQL query
	 *
	 * @param string $query sql query to prep and execute
	 * @param array $params params
	 * @return PDOStatement|bool       Returns the prepared statement. FALSE if preparing or execution of statement failed.
	 */
	public function run(string $query, array $params = array()): \PDOStatement|bool {
		if ($stmt = $this->pdo->prepare($query)) {
			if ($stmt->execute($params)) {
				return $stmt;
			}
		}

		return false;
	}
}
