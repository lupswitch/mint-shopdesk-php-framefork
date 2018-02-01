<?php

function sd_require_file($dir, $file) {
	$controllers = scandir(APPPATH.'/'.$dir.'/');
	if(in_array(ucfirst($file).'.php', $controllers) || in_array($file.'.php', $controllers)) {
		return array(
			'path' => APPPATH.$dir.'/'.$file.'.php', 
			'file' => $file
		);
	}
	else
		return false;
}
function sd_base_url($str = '') {
	return $GLOBALS['config']['base_url'].$str;
}
function sd_asset_url($str = '') {
	return $GLOBALS['config']['asset_url'].$str;
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
function require_auth() {
	$AUTH_USER = 'shopdesk';
	$AUTH_PASS = 'shopdesk';
	header('Cache-Control: no-cache, must-revalidate, max-age=0');
	$has_supplied_credentials = !(empty($_SERVER['PHP_AUTH_USER']) && empty($_SERVER['PHP_AUTH_PW']));
	$is_not_authenticated = (
		!$has_supplied_credentials ||
		$_SERVER['PHP_AUTH_USER'] != $AUTH_USER ||
		$_SERVER['PHP_AUTH_PW']   != $AUTH_PASS
	);
	if ($is_not_authenticated) {
		header('HTTP/1.1 401 Authorization Required');
        header('WWW-Authenticate: Basic realm="Access denied"');
        header('Content-Type: application/json');
        echo json_encode([
            'status' => false,
            'message' => 'Invalid API key or access token',
        ]);
		exit;
	}
}
function addslashes_rec( $data ){
    if ( is_array( $data ) ) {
        return array_map( 'addslashes', $data );
    }
    else {
        return addslashes( $data );
    }
}  
function sd_headers() {
    $headers = array();
    // foreach($_SERVER as $key => $value) {
    //     if (substr($key, 0, 5) <> 'HTTP_') {
    //         continue;
    //     }
    //     $header = str_replace(' ', '-', ucwords(str_replace('_', ' ', strtolower(substr($key, 5)))));
    //     $headers[$header] = $value;
	// }
	$headers = apache_request_headers();
	return $headers;
}
