<h1>Tasks</h1>
<div class="row col-md-12 centered">
    <table class="table table-striped custab">
        <thead>
        <a href="/mvc/src/tasks/create/" class="btn btn-primary btn-xs pull-right"><b>+</b> Add new task</a>
        <tr>
            <th>ID</th>
            <th>Task</th>
            <th>Description</th>
            <th class="text-center">Action</th>
        </tr>
        </thead>
        <?php
        foreach ($this->taskModel->listTask as $task)
        {
            echo '<tr>';
            echo "<td>" . $task->getID() . "</td>";
            echo "<td>" . $task->getTitle() . "</td>";
            echo "<td>" . $task->getDescription() . "</td>";
            echo "<td class='text-center'><a class='btn btn-info btn-xs' href='/mvc/src/tasks/edit/" . $task->getID() . "' ><span class='glyphicon glyphicon-edit'></span> Edit</a> <a href='/mvc/src/tasks/delete/" . $task->getID() . "' class='btn btn-danger btn-xs'><span class='glyphicon glyphicon-remove'></span> Del</a></td>";
            echo "</tr>";
        }
        ?>
    </table>
</div>