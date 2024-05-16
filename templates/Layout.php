<?php

class Layout {

	const ACTIVE = 'active';

	public function render($content, $route) {
		ob_start();
		include 'main.html';
		$layout = ob_get_contents();
		ob_end_clean();

		$layout = str_replace('{{content}}', $content, $layout);
		$layout = str_replace($route, self::ACTIVE, $layout);

		echo $layout;
	}

	public function getContent($view, $data) {
		ob_start();
		include $view;
		$content = ob_get_contents();
		ob_end_clean();

		return $content;
	}
}
