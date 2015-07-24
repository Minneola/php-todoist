<?php

namespace Minneola\Todoist;

/**
 * Class TodoProject
 * @package Minneola\Todoist
 * @author Tobias Maxham <git2015@maxham.de>
 */
class TodoProject extends Todos
{



	public function extractClassInfo()
	{
		$this->data = array_merge($this->data, $this->getRequestData($this->classField()));
	}

} 