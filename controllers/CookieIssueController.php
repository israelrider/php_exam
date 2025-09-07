<?php

class CookieIssueController {

	private $layout;

	public function __construct($layout) {
		$this->layout = $layout;
	}

	public function cookieIssue() {
		$template = 'cookieIssue.php';

		return $this->layout->getContent($template);
	}
}