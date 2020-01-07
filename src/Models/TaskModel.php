<?php
namespace Black\Models;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="tasks")
 */
Class TaskModel 
{

    /** 
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
	protected $id;
	/** 
     * @ORM\Column(type="string") 
     */
	protected $title;
	/** 
     * @ORM\Column(type="string") 
     */
	protected $description;
	/** 
     * @ORM\Column(type="string") 
     */
	protected $created_at;
	/** 
     * @ORM\Column(type="string") 
     */
	protected $updated_at;

	//Getter
	public function getID() {
		return $this->id;
	}

	public function getTitle() {
		return $this->title;
	}

	public function getDescription() {
		return $this->description;
	}

	public function getCreated_at() {
		return $this->created_at;
	}

	public function getUpdated_at() {
		return $this->updated_at;
	}

	//Setter
	public function setTitle($title) {
		return $this->title = $title;
	}

	public function setDescription($description) {
		return $this->description = $description;
	}

	public function setCreated_at($created_at) {
		return $this->created_at = $created_at;
	}

	public function setUpdated_at($updated_at) {
		return $this->updated_at = $updated_at;
	}
}