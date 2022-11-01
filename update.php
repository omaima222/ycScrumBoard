<?php

include('database.php');
global $conn;

$id = $_GET['update'];


$sql = "SELECT * FROM tasks 
       INNER JOIN types on tasks.type_id=types.id 
       INNER JOIN priorities on tasks.priority_id=priorities.id 
       WHERE  task_id=$id";


  $result = mysqli_query($conn,$sql);
  $task = mysqli_fetch_assoc($result);

  $title = $task['title'];
  $date = $task['task_datetime'];
  $status =  $task['status_id'];
  $priority = $task['priority_id'];
  $type = $task['type_id'];
  $description =  $task['description'];


if(isset($_POST['update'])){
    

    $taskTitle       = $_POST['taskTitle'];
    $taskType        = $_POST['taskType'];
    $taskPriority    = $_POST['taskPriority'];
    $taskStatus      = $_POST['taskStatus'];
    $taskDate        = $_POST['taskDate'];
    $taskDescription = $_POST['taskDescription'];
    

    $updateit = "UPDATE tasks SET  title='$taskTitle', type_id='$taskType', priority_id='$taskPriority', status_id='$taskStatus', task_datetime='$taskDate', description='$taskDescription' WHERE task_id='$id'";
    $resultup = mysqli_query($conn,$updateit);
    
    $_SESSION['message'] = "Task has been updated successfully !";
    header('location: index.php');
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>update task</title>
</head>
<body>
   
<div class="modal fade" id="modal-task" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
			  <div class="modal-content">
						 <!-- Modal content goes here -->
				  <div class="modal-header">
				       <h1 class="modal-title fs-5" id="exampleModalLabel">Add Task</h1>
				       <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				  </div>
				  <div class="modal-body">
				        <form id="taskForm" action="script.php" method="POST" >
					        <div>
					            <label for="title" class="col-form-label">Title</label>
					            <input type="text" name="taskTitle" value="<?php echo $title?>" class="form-control" id="title">
					        </div>
				            <div id="type">
					            <label class="col-form-label">Type</label>
					            <div class="form-check mx-3">
						             <input class="form-check-input" type="radio" name="taskType" id="feature" value= "1" >
						             <label class="form-check-label" for="flexRadioDefault1">
						               Feature
					                </label>
					            </div>
					            <div class="form-check mx-3">
						             <input class="form-check-input" type="radio" name="taskType" id="bug" value="2">
						             <label class="form-check-label" for="flexRadioDefault2">
						              Bug
						            </label>
					           </div>
				         	</div>
					        <div>  
						            <label for="priority" class="col-form-label">priority</label>
						            <select class="form-select" aria-label="Default select example" name="taskPriority" id="priority">
							        <option selected>PLease select</option>
							        <option value= 1 >Low</option>
							        <option value= 2 >Medium</option>
							        <option value= 3 >High</option>
						            </select>
				            </div>
					        <div>
					             	<label for="status" class="col-form-label">status</label>
						            <select class="form-select" aria-label="Default select example" name="taskStatus" id="status">
						         	<option selected>PLease select</option>
							        <option value= 1 >To do</option>
							        <option value= 2 >In Progress</option>
							        <option value= 3 >Done</option>
						            </select>					
				            </div>
					        <div>
					                <label for="date" class="col-form-label">date</label>
						            <input type="date" class="form-control" value="<?php echo $date?>" name="taskDate" id="date">
					        </div>
				        	<div class="mb-3">
					                <label for="description" class="col-form-label">description</label>
					                <textarea class="form-control" value="<?php echo $description?>" name="taskDescription" id="description"></textarea>
				          	</div>
				       
				  </div>	
				
				  <div class="modal-footer" id="modalFooter">
				       <button type="submit" class="btn btn-white " data-bs-dismiss="modal">Cancel</button>
				       <button type="submit" id="task-save-btn" name = "save" class="btn btn-primary" >Save</button>
				       <button  type="submit" id="task-update-btn" style="display: block;"   name = "update" class="btn btn-primary" data-bs-dismiss="modal">Update</button>
				  </div>                                                                                                 
				  </form>
			  </div>
	     	</div>
		</div>

</body>
</html>






























