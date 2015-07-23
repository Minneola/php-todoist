<?php

namespace Minneola\Todoist\Request;

use Minneola\Todoist\Exception\CurlErrorException;
use Minneola\Todoist\Exception\CurlExtentionNotFoundException;

/**
 * Class Curl
 * @package Minneola\Todoist
 * @author Tobias Maxham <git2015@maxham.de>
 */
class Curl
{
	/**
	 * @var string $url
	 */
	private $url;

	/**
	 * @var resource $curl_ressource
	 */
	private $curl_ressource;

	public function __construct($anURL)
	{
		if (!extension_loaded('curl')) {
			throw new CurlExtentionNotFoundException('The cURL PHP-library was not loaded.');
		}

		$this->url = $anURL;
		$this->curl_ressource = curl_init();
	}

	/**
	 * @param int $anOption
	 * @param mixed $aValue
	 * @return bool
	 */
	public function setOpt($anOption, $aValue)
	{
		return curl_setopt($this->curl_ressource, $anOption, $aValue);
	}

	/**
	 * @param $url
	 * @param array $data
	 * @return bool|null
	 */
	public static function post($url, $data = [])
	{
		try{
			$curl = self::getInstanceFor($url);

			$curl->setOpt(CURLOPT_URL, $url);
			$curl->setOpt(CURLOPT_CUSTOMREQUEST, 'POST');
			$curl->setOpt(CURLOPT_POST, true);
			$curl->setOpt(CURLOPT_POSTFIELDS, http_build_query($data));
			$curl->setOpt(CURLOPT_RETURNTRANSFER, 1);
			$curl->setOpt(CURLOPT_CONNECTTIMEOUT, 10);

			return $curl->exec();
		}
		catch(\Exception $e){
			var_dump($e);
			return NULL;
		}
	}

	/**
	 * @return Data
	 * @throws CurlErrorException
	 */
	public function exec()
	{
		$response = curl_exec($this->curl_ressource);
		$error = curl_error($this->curl_ressource);
		if($error != '') throw new CurlErrorException($error);
		return new Data($response);
	}

	/**
	 * @param string $anUrl
	 * @return Curl $curl
	 */
	public static function getInstanceFor($anUrl)
	{
		return new self($anUrl);
	}



} 