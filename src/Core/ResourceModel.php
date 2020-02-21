<?php
namespace Black\Core;
use Doctrine\ORM\Mapping as ORM;
use Black\Core\Core;

/**
 * @ORM\Entity
 * @ORM\Table(name="tasks")
 */
Class ResourceModel 
{
	public function getOne($model, $id) {
		$className = str_replace("Resource", "", get_class($model));
		return Core::EntityManager()->find($className, $id);
	}

	public function list($model) {
		$className = str_replace("Resource", "", get_class($model));
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