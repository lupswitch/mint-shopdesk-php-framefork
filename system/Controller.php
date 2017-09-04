<?php

class Controller {
	public function json($data) {
		header('Content-Type: application/json');
		if(!is_array($data))
			echo json_encode(array($data));
		else
		echo json_encode($data);
	}
	public function view($viewname, $data = array()) {
		$file = sd_require_file('views',$viewname);
		if(!$file) {
			die('no view found');
		}
		extract($data);
		require $file['path'];
	}
	public function model($modelname) {
		$file = sd_require_file('models',$modelname);
		if(!$file) {
			die('no view found');
		}
		require $file['path'];
		return new $file['file'];
	}
	public function input_post($key) {
		isset($_POST[$key]) ? $r = addslashes($_POST[$key]): $r = null;
		return $r;
	}
	public function input_get($key) {
		isset($_GET[$key]) ? $r = addslashes($_GET[$key]): $r = null;
		return $r;
	}
}