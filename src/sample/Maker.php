<?php

namespace Minneola\Todoist\Sample;

use Minneola\Todoist\TodoProject;
use Minneola\Todoist\TodoProjects;
use Minneola\Todoist\TodoUser;

/**
 * Class Maker
 * @package Minneola\Todoist\Sample
 * @author Tobias Maxham <git2015@maxham.de>
 */
class Maker
{

	public static function User($file = NULL)
	{
		if(is_null($file)) $file = __DIR__ . '/../../test/user';
		return new TodoUser(file_get_contents($file));
	}

	public static function ProjectList($file = NULL)
	{
		if(is_null($file)) $file = __DIR__ . '/../../test/projects';
		return new TodoProjects(file_get_contents($file));
	}

	public static function Project($file = NULL)
	{
		if(is_null($file)) $file = __DIR__ . '/../../test/project';
		return new TodoProject(file_get_contents($file));
	}

} 