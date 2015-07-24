<?php

namespace Minneola\Todoist;

/**
 * Class TodoUser
 * @package Minneola\Todoist
 * @author Tobias Maxham <git2015@maxham.de>
 */
class TodoUser extends Todos
{

	/**
	 * @return array <TodoProject> $projects
	 */
	public function projects()
	{
		//
	}

	/**
	 * @param int $id
	 * @return TodoProject $project
	 */
	public function project($id)
	{
		//
	}

	public function extractClassInfo()
	{
		$this->data = array_merge($this->data, $this->getRequestData($this->classField()));
	}

} 