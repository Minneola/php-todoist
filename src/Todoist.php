<?php

namespace Minneola\Todoist;
use Minneola\Todoist\Request\Curl;

/**
 * Class Todoist
 * @package Minneola\Todoist
 * @author Tobias Maxham <git2015@maxham.de>
 */
class Todoist
{

	private static $API_URL = 'https://todoist.com/API/';

	private $user_mail;
	private $user_pass;
	private $user_token;

	private $user;

	public function __construct($mail, $pass)
	{
		$this->user_mail = $mail;
		$this->user_pass = $pass;
		$this->userLogon();
	}

	public function userLogon()
	{
		$params = [
			'email' => $this->user_mail,
			'password' => $this->user_pass,
		];
		$this->user = $this->makeCall('login', $params);

		if($this->user('error')) return FALSE;
		$this->user_token = $this->user('api_token');
		return TRUE;
	}

	public function projects()
	{

		$params = [
			'token' => $this->user_token,
			'seq_no' => 0,
			'seq_no_global' => 0,
			'resource_types' => '["projects"]',
		];
		$ret = $this->makeCall('v6/sync', $params);

		var_dump($ret);

		//if($this->user('error')) return FALSE;
		//$this->user_token = $this->user('api_token');
		return TRUE;
	}

	public static function registerUser($options)
	{

		if(!in_array('email', $options)) return FALSE;
		if(!in_array('full_name', $options)) return FALSE;
		if(!in_array('password', $options)) return FALSE;

		$defaults = [
			'lang'      => 'de',
			'timezone'  => 'Europe/Berlin'
		];
		$options = array_merge($defaults, $options);


		try {
			$data = self::makeCall('register', $options);
		} catch (\Exception $e) {
			throw new \Exception('Error: ' . $e->getMessage());
		}

		var_dump($data);

		return;


	}

	/**
	 * @param $val
	 * @return Request\Data|mixed
	 */
	public function user($val)
	{
		if($val) return $this->user->{$val};
		return $this->user;
	}

	private static function getUrl($tag)
	{
		return self::$API_URL . $tag;
	}

	public static function makeCall($url, $params)
	{
		return Curl::post(self::getUrl($url), $params);
	}

} 