<?php
namespace Black\Controllers;
use Black\Core\Controller;
use Black\Models\TaskModel;
use Black\Models\TaskModelResponsity;

class TasksController extends Controller
{   
    protected $taskModel;
    protected $taskModelResponsity;

    function __construct() {
        $this->taskModel = new TaskModel;
        $this->taskModelResponsity = new TaskModelResponsity;
    }

    function index()
    {   
        $this->taskModel->listTask = $this->taskModelResponsity->listTask();

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

            //Do Creat
            $this->taskModelResponsity->create($this->taskModel);
            header("Location: " . WEBROOT . "tasks/index");        
        }

        $this->render("create");
    }

    function edit($id)
    {
        $this->taskModel = $this->taskModelResponsity->getOneTask($id);
        if (isset($_POST["title"]))
        {
            $this->taskModel->setTitle($_POST['title']);
            $this->taskModel->setDescription($_POST['description']);
            $now = getdate();
            $update = $now['year'].'-'.$now['mon'].'-'.$now['mday'].'-'.$now['hours'].'-'.$now['minutes'].'-'.$now['seconds'];
            $this->taskModel->setUpdated_at($update);

            //Do Edit
            $this->taskModelResponsity->edit();
            header("Location: " . WEBROOT . "tasks/index");           
        }
        $this->render("edit");
    }

    function delete($id)
    {   
        //Do Delete
        $this->taskModelResponsity->delete($this->taskModelResponsity->getOneTask($id));

        header("Location: " . WEBROOT . "tasks/index");
    }
}
?>