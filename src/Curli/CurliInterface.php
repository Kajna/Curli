<?php
namespace Curli;

/**
 * Class RequestorInterface
 *
 * @package Curli
 * @author <milos@caenazzo.com>
 */
interface CurliInterface
{
	/**
	 * @param $uri
	 * @return self
	 */
	public function get($uri);

	/**
	 * @param $uri
	 * @return self
	 */
	public function post($uri);

	/**
	 * @param $uri
	 * @return self
	 */
	public function put($uri);

	/**
	 * @param $uri
	 * @return self
	 */
	public function delete($uri);

	/**
	 * @param $uri
	 * @param $method
	 * @return self
	 */
	public function request($uri, $method);
}