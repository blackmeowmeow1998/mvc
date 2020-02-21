<?php
namespace Black\Controllers;
use Black\Core\Controller;
use Black\Core\Core;
use Black\Models\TaskModel;

class TasksController extends Controller
{   
    protected $taskModel;

    function __construct() {
        $this->taskModel = new TaskModel;
    }

    function index()
    {   
        $taskRepository = Core::EntityManager()->getRepository(get_class($this->taskModel));

        $this->taskModel->listTask = $taskRepository->findAll();
        $this->render("index");
    }

    function create()
    {
        if (isset($_POST["title"]))
        {
            $this->taskModel->setTitle($_POST['title']);
            echo $this->taskModel->getTitle();
            $this->taskModel->setDescription($_POST['description']);
            $now = getdate();
            $create = $now['year'].'-'.$now['mon'].'-'.$now['mday'].'-'.$now['hours'].'-'.$now['minutes'].'-'.$now['seconds'];
            $this->taskModel->setCreated_at($create);
            $this->taskModel->setUpdated_at("#");
            Core::EntityManager()->persist($this->taskModel);
            Core::EntityManager()->flush();
        
            header("Location: " . WEBROOT . "tasks/index");
            
        }

        $this->render("create");
    }

    function edit($id)
    {
 
        $this->taskModel = Core::EntityManager()->find(get_class($this->taskModel), $id);
        if (isset($_POST["title"]))
        {
            $this->taskModel->setTitle($_POST['title']);
            $this->taskModel->setDescription($_POST['description']);
            $now = getdate();
            $update = $now['year'].'-'.$now['mon'].'-'.$now['mday'].'-'.$now['hours'].'-'.$now['minutes'].'-'.$now['seconds'];
            $this->taskModel->setUpdated_at($update);
            Core::EntityManager()->flush();
            header("Location: " . WEBROOT . "tasks/index");           
        }
        $this->render("edit");
    }

    function delete($id)
    {   
        $this->taskModel = Core::EntityManager()->find(get_class($this->taskModel), $id);
        Core::EntityManager()->remove($this->taskModel);
        Core::EntityManager()->flush();
        header("Location: " . WEBROOT . "tasks/index");
    }
}
?>