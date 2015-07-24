<?php

namespace Minneola\Todoist\Traits;

/**
 * Trait TodoTrait
 * @package Minneola\Todoist\Traits
 * @author Tobias Maxham <git2015@maxham.de>
 */
trait TodoTrait
{

	/**
	 * @var array $requestData
	 */
	private $requestData;

	public function setRequestData($data)
	{
		$this->requestData = json_decode($data, TRUE);
	}

	public function getRequestData($var = NULL)
	{
		if($var && isset($this->requestData[$var])) return $this->requestData[$var];
		elseif($var) return NULL;
		return $this->requestData;
	}

} 