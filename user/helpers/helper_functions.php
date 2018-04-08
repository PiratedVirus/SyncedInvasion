<?php

	function get_base_url() {

	    $protocol = filter_input(INPUT_SERVER, 'HTTPS');
	    if (empty($protocol)) {
	        $protocol = "http";
	    }

	    $host = filter_input(INPUT_SERVER, 'HTTP_HOST');

	    $request_uri_full = filter_input(INPUT_SERVER, 'REQUEST_URI');
	    $last_slash_pos = strrpos($request_uri_full, "/");
	    if ($last_slash_pos === FALSE) {
	        $request_uri_sub = $request_uri_full;
	    }
	    else {
	        $request_uri_sub = substr($request_uri_full, 0, $last_slash_pos + 1);
	    }

	    return $protocol . "://" . $host . $request_uri_sub;

	}

    function encryptIt( $q ) {
        $cryptKey  = 'qJB0rGtIn5UB1xG03efyCp';
        $qEncoded      = base64_encode( mcrypt_encrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), $q, MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ) );
        return( $qEncoded );
    }

    function decryptIt( $q ) {
        $cryptKey  = 'qJB0rGtIn5UB1xG03efyCp';
        $qDecoded      = rtrim( mcrypt_decrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), base64_decode( $q ), MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ), "\0");
        return( $qDecoded );
    }

?>