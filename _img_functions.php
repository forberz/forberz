<?php

function verify_local_resourse($src='', $image_path='') {
	if (preg_match('/^(https?:)?\/\//', $src)) {
		$options = array( 
	        CURLOPT_RETURNTRANSFER => true,     // return web page 
	        CURLOPT_HEADER         => false,    // do not return headers 
	        CURLOPT_FOLLOWLOCATION => true,     // follow redirects 
	        CURLOPT_USERAGENT      => "spider", // who am i 
	        CURLOPT_AUTOREFERER    => true,     // set referer on redirect 
	        CURLOPT_CONNECTTIMEOUT => 120,      // timeout on connect 
	        CURLOPT_TIMEOUT        => 120,      // timeout on response 
	        CURLOPT_MAXREDIRS      => 10,       // stop after 10 redirects 
	        CURLOPT_SSL_VERIFYPEER => false
	    );

	    $ch      = curl_init( $src ); 
	    curl_setopt_array( $ch, $options ); 
	    $data = curl_exec( $ch ); 
	    $err     = curl_errno( $ch ); 
	    $errmsg  = curl_error( $ch ); 
	    $header  = curl_getinfo( $ch );
    	curl_close( $ch );
		if (!$data) {
			exit();
		}
		file_put_contents($image_path, $data);
		$src = $image_path;
	}

	return $src;
}