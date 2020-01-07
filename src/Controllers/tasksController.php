<?php
namespace Black\Controllers;
use Black\Core\Controller;
use Black\Models\TaskModel;


class tasksController extends Controller
{   
    protected $taskModel;

    function __construct() {
        $this->taskModel = new TaskModel;
    }

    function index()
    {   
        require_once "../../bootstrap.php";
        $taskRepository = $entityManager->getRepository(get_class($this->taskModel));
        $this->taskModel->listTask = $taskRepository->findAll();
        $this->render("index");
    }

    function create()
    {
        require_once "../../bootstrap.php";
        if (isset($_POST["title"]))
        {
            $this->taskModel->setTitle($_POST['title']);
            echo $this->taskModel->getTitle();
            $this->taskModel->setDescription($_POST['description']);
            $now = getdate();
            $create = $now['year'].'-'.$now['mon'].'-'.$now['mday'].'-'.$now['hours'].'-'.$now['minutes'].'-'.$now['seconds'];
            $this->taskModel->setCreated_at($create);
            $this->taskModel->setUpdated_at("#");
            $entityManager->persist($this->taskModel);
            $entityManager->flush();
        
            header("Location: " . WEBROOT . "tasks/index");
            
        }

        $this->render("create");
    }

    function edit($id)
    {
        require_once "../../bootstrap.php";
        $this->taskModel = $entityManager->find(get_class($this->taskModel), $id);
        if (isset($_POST["title"]))
        {
            $this->taskModel->setTitle($_POST['title']);
            $this->taskModel->setDescription($_POST['description']);
            $now = getdate();
            $update = $now['year'].'-'.$now['mon'].'-'.$now['mday'].'-'.$now['hours'].'-'.$now['minutes'].'-'.$now['seconds'];
            $this->taskModel->setUpdated_at($update);
            $entityManager->flush();
            header("Location: " . WEBROOT . "tasks/index");           
        }
        $this->render("edit");
    }

    function delete($id)
    {   
        require_once "../../bootstrap.php";
        $this->taskModel = $entityManager->find(get_class($this->taskModel), $id);
        $entityManager->remove($this->taskModel);
        $entityManager->flush();
        header("Location: " . WEBROOT . "tasks/index");
    }
}
?>