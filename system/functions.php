<?php

function sd_require_file($dir, $file) {
	$controllers = scandir(APPPATH.'/'.$dir.'/');
	if(in_array(ucfirst($file).'.php', $controllers) || in_array($file.'.php', $controllers)) {
		return array(
			'path' => APPPATH.'/'.$dir.'/'.$file.'.php', 
			'file' => $file
		);
	}
	else
		return false;
}
function sd_base_url($str = '') {
	return $GLOBALS['config']['base_url'].$str;
}
function sd_base_path($str = '') {
	return $GLOBALS['config']['base_path'].$str;
}
function sd_request_url() {
	return $GLOBALS['config']['request_url'];
}
function sd_hash($str  = '') {
	return sha1($GLOBALS['config']['encryption_key'].$str);
}
function sd_redirect($link=null) {
	if($link!==null)
		die('<script>document.location= "'.$link.'"; </script>');
}