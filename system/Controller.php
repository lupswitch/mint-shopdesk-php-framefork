<?php

class Controller {
	function __construct() {
		
	}
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
			header('Content-Type: application/json');
			die(json_encode([
				'status' => false,
				'message'=>"View not found" 
			]));
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
		isset($_POST[$key]) ? $r = addslashes_res($_POST[$key]): $r = null;
		return $r;
	}
	public function input_get($key) {
		isset($_GET[$key]) ? $r = addslashes_rec($_GET[$key]): $r = null;
		return $r;
	}
	public function db_query($q, $arr=[]) {
		$res = $GLOBALS['db_connection']->query($q);
		$new_array;
		$tmp = mysqli_fetch_array($res,MYSQLI_ASSOC);
		if(is_array($tmp)) {
			foreach($res as $r) {
				$new_array[] = $r;
			}
		}
		else {
			$new_array = $res;
		}

		return $new_array;
	}
}