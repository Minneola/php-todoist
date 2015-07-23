<?php

namespace Minneola\Todoist\Request;

/**
 * Class Data
 * @package Minneola\Todoist\Request
 * @author Tobias Maxham <git2015@maxham.de>
 */
class Data
{
	/**
	 * @param string $json
	 */
	public function __construct($json)
	{
		if(is_string(json_decode($json)))
			$json = json_encode(['message' => $json, 'error' => true]);
		foreach(json_decode($json) as $key => $value)
			$this->{$key} = $value;
	}

	/**
	 * @param string $val
	 * @return mixed
	 */
	public function __get($val)
	{
		if(isset($this->{$val})) return $this->{$val};
		return NULL;
	}

} 