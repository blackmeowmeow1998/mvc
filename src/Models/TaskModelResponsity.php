<?php
namespace Black\Models;
use Black\Core\Model;
use Black\Models\TaskModel;

/**
 * @ORM\Entity
 * @ORM\Table(name="tasks")
 */
Class TaskModelResponsity extends Model
{
	private $modelClassName = "Black\Models\TaskModel";

	public function getOneTask($id)
	{
		return $this->getOne($this->modelClassName,$id);
	}

	public function listTask()
	{
		return $this->list($this->modelClassName);
	}
}