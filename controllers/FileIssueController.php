<?php

class FileIssueController {

	private $layout;

	public function __construct($layout) {
		$this->layout = $layout;
	}

	public function returnForm() {
		$template = 'inputFileForm.html';
		return $this->layout->getContent($template);
	}

	public function getFile() {
		$target_dir = __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR;
		move_uploaded_file($_FILES['sentFile']['tmp_name'], $target_dir . $_FILES['sentFile']['name']);

		return [
			$_FILES['sentFile']['name'],
			$_FILES['sentFile']['size'],
		];
	}
}
