<?php
namespace Black\Controllers;
use Black\Core\Controller;
use Black\Models\TaskModel;
use Black\Models\TaskResponsity;

class TasksController extends Controller
{   
    protected $taskModel;
    protected $taskResponsity;

    function __construct()
    {
        $this->taskModel = new TaskModel;
        $this->taskResponsity = new TaskResponsity;
    }

    function index()
    {   
        $this->taskModel->listTask = $this->taskResponsity->list();

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
            $this->taskResponsity->create($this->taskModel);
            header("Location: " . WEBROOT . "tasks/index");        
        }

        $this->render("create");
    }

    function edit($id)
    {
        $this->taskModel = $this->taskResponsity->getOne($id);
        if (isset($_POST["title"]))
        {
            $this->taskModel->setTitle($_POST['title']);
            $this->taskModel->setDescription($_POST['description']);
            $now = getdate();
            $update = $now['year'].'-'.$now['mon'].'-'.$now['mday'].'-'.$now['hours'].'-'.$now['minutes'].'-'.$now['seconds'];
            $this->taskModel->setUpdated_at($update);

            //Do Edit
            $this->taskResponsity->edit();
            header("Location: " . WEBROOT . "tasks/index");           
        }
        $this->render("edit");
    }

    function delete($id)
    {   
        //Do Delete
        $this->taskResponsity->delete($this->taskResponsity->getOne($id));

        header("Location: " . WEBROOT . "tasks/index");
    }
}
?>