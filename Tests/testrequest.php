<?php
require_once __DIR__ . '/../vendor/autoload.php';

// Fetching HTML page using GET requeste
try {
	$curli = (new \Curli\Curli())
			->get('http://localhost/Curli/Tests/testresponse.php')
			->close();

	$response = $curli->response();

	echo $response->asText();
} catch(\Exception $e) {
	echo $e->getMessage();
}

// Sending and receiving JSON data using PUT
try {
	$data = array('foo' => 'bar');
	$json = json_encode($data);

	$curli = (new \Curli\Curli())
			->setTimeout(5)
			->setConnectionTimeout(3)
			->setHeader('Content-Type', 'application/json')
			->setHeader('Content-Length', strlen($json))
			->setParams($json)
			->put('http://localhost/Curli/Tests/testresponsejson.php')
			->close();

	$response = $curli->response();

	print_r($response->asObject());
} catch(\Exception $e) {
	echo $e->getMessage();
}

// Sending and receiving XML data using POST
try {
	$data = '<root><foo>bar</foo></root>';

	$curli = (new \Curli\Curli())
			->setUserAgent('curl 7.16.1 (i386-portbld-freebsd6.2) libcurl/7.16.1 OpenSSL/0.9.7m zlib/1.2.3')
			->setBasicAuthentication('username', 'password')
			->setHeader('Content-Type', 'text/xml')
			->setHeader('Content-Length', strlen($data))
			->setParams($data)
			->post('http://localhost/Curli/Tests/testresponsexml.php')
			->close();

	$response = $curli->response();

	print_r($response->asArray());
} catch(\Exception $e) {
	echo $e->getMessage();
}