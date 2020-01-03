<?php
namespace Black\Models;
use Doctrine\ORM\Mapping as ORM;

Class TaskModel 
{
	protected $id;
	protected $title;
	protected $description;
	protected $created_at;
	protected $updated_at;

	//Getter
	public function getID() {
		return $this->id;
	}

	public function getTitle() {
		return $this->id;
	}

	public function getDescription() {
		return $this->id;
	}

	public function getCreated_at() {
		return $this->id;
	}

	public function setUpdated_at() {
		return $this->id;
	}

	//Setter
	public function setTitle($title) {
		return $this->id;
	}

	public function setDescription($description) {
		return $this->id;
	}

	public function setCreated_at($created_at) {
		return $this->id;
	}

	public function setUpdated_at($updated_at) {
		return $this->id;
	}
}