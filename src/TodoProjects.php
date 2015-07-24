<?php

namespace Minneola\Todoist;

/**
 * Class TodoProjects
 * @package Minneola\Todoist
 * @author Tobias Maxham <git2015@maxham.de>
 */
class TodoProjects extends Todos
{

	/**
	 * @return array <TodoTask> $tasks
	 */
	public function tasks()
	{
		//
	}

	/**
	 * @param int $id
	 * @return TodoTask $task
	 */
	public function task($id)
	{
		//
	}

	public function extractClassInfo()
	{
		$this->data['Projects'] = [];

		foreach($this->getRequestData('Projects') as $project)
		{
			$this->data['Projects'][$project['id']] = $project;
		}
	}

} 