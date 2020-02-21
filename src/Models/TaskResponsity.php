<?php
namespace Black\Models;
use Black\Models\TaskResourceModel;

/**
 * @ORM\Entity
 * @ORM\Table(name="tasks")
 */
Class TaskResponsity
{	
	private $taskResourceModel;

	function __construct()
	{
        $this->taskResourceModel = new TaskResourceModel();
    }

	public function getOne($id)
	{
		return $this->taskResourceModel->getOne($this->taskResourceModel,$id);
	}

	public function list()
	{
		return $this->taskResourceModel->list($this->taskResourceModel);
	}

	public function create($model)
	{
		$this->taskResourceModel->create($model);
	}
	public function delete($model) {
		$this->taskResourceModel->delete($model);
	}
	public function edit() {
		$this->taskResourceModel->edit();
	}
}