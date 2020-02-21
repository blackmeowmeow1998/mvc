<?php
namespace Black\Core;
use Doctrine\ORM\Mapping as ORM;
use Black\Core\Core;

/**
 * @ORM\Entity
 * @ORM\Table(name="tasks")
 */
Class Model 
{
	public function getOne($className, $id) {
		return Core::EntityManager()->find($className, $id);
	}

	public function list($className) {
		$respon = Core::EntityManager()->getRepository($className);
		$list = $respon->findAll();
		return $list;
	}
	public function create($model) {
		Core::EntityManager()->persist($model);
        Core::EntityManager()->flush();
	}

	public function edit() {		
		Core::EntityManager()->flush();
	}

	public function delete($model) {
		Core::EntityManager()->remove($model);
        Core::EntityManager()->flush();
	}
}