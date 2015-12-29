Curli
=
[![DUB](https://img.shields.io/dub/l/vibe-d.svg)](http://opensource.org/licenses/MIT)
[![Version](https://img.shields.io/badge/version-0.9.0-orange.svg)](https://packagist.org/packages/kajna/curli)

Object-Oriented interface for PHP cUrl extension

### Installing

This package is available via Composer:

```json
{
  "require": {
    "kajna/curli": "dev-master"
  }
}
```

Usage examples
=
### Fetching HTML page using GET

```php
try {
	$curli = (new \Curli\Curli())
			->get('http://example.com')
			->close();

	$response = $curli->response();

	echo $response->asText();
} catch(\Exception $e) {
	echo $e->getMessage();
}
```
### Sending and receiving JSON data using PUT with connection timeout

```php
try {
	$data = array('foo' => 'bar');
	$json = json_encode($data);

	$curli = (new \Curli\Curli())
			->setTimeout(5)
			->setConnectionTimeout(3)
			->setHeader('Content-Type', 'application/json')
			->setHeader('Content-Length', strlen($json))
			->setParams($json)
			->put('http://example.com')
			->close();

	$response = $curli->response();

	print_r($response->asObject());
} catch(\Exception $e) {
	echo $e->getMessage();
}
```
### Sending and receiving XML data using POST with basic authentication

```php
try {
	$data = '<root><foo>bar</foo></root>';

	$curli = (new \Curli\Curli())
			->setUserAgent('curl 7.16.1 (i386-portbld-freebsd6.2) libcurl/7.16.1 OpenSSL/0.9.7m zlib/1.2.3')
			->setBasicAuthentication('username', 'password')
			->setHeader('Content-Type', 'text/xml')
			->setHeader('Content-Length', strlen($data))
			->setParams($data)
			->post('http://example.com')
			->close();

	$response = $curli->response();

	print_r($response->asArray());
} catch(\Exception $e) {
	echo $e->getMessage();
}
```

Author
=
Author of library is Milos Kajnaco 
milos@caenazzo.com

Licence
=
Curli is released under the [MIT](http://opensource.org/licenses/MIT) public license.
