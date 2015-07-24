<?php

namespace Minneola\Todoist;

use Minneola\Todoist\Traits\TodoTrait;

/**
 * Class Todos
 * @package Minneola\Todoist
 * @author Tobias Maxham <git2015@maxham.de>
 */
class Todos
{
	use TodoTrait;

	public $primary;

	/**
	 * @var int $seq_no_global
	 */
	private $seq_no_global;

	/**
	 * @var int $seq_no
	 */
	private $seq_no;

	/**
	 * @var int $UserId
	 */
	private $UserId;

	/**
	 * @var array $data
	 */
	public $data = [];

	private $primaryFields = ['seq_no_global', 'seq_no', 'UserId'];

	/**
	 * @param array $bwData
	 */
	public function __construct($bwData)
	{
		$this->setRequestData($bwData);
		$this->extractPrimaryInfo();
		$this->extractClassInfo();
	}

	private function extractPrimaryInfo()
	{
		$fields = $this->primaryFields;
		foreach ($fields as $var) {
			if (($this->getRequestData($var)))
				$this->data[$var] = $this->getRequestData($var);
		}
	}

	protected function classField()
	{
		if (strpos(get_class($this), 'User') !== FALSE) return 'User';
		if (strpos(get_class($this), 'Projects') !== FALSE) return 'Projects';
		if (strpos(get_class($this), 'Project') !== FALSE) return 'Project';
	}

	public function __get($key)
	{
		if (method_exists($this, 'get' . ucfirst($key) . 'Attribute'))
			return $this->{'get' . $key . 'Attribute'}();
		if (isset($this->data[$key])) return $this->data[$key];
		return NULL;
	}

	public function id()
	{
		return $this->data[$this->primary];
	}

	public function delete()
	{
		//
	}

	public function save()
	{
		//
	}

	private function doUpdate()
	{
		//
	}

	private function doCreate()
	{
		//
	}

} 