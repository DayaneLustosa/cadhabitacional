<?php
class Library_Error {
	protected $content;

	function __construct($error) {
		$this->content = '<pre>' . print_r($error, true) . '</pre>';
		require_once(BASE_PATH . "/views/layouts/error.phtml");
	}
}
?>