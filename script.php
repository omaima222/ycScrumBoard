<?php
    //INCLUDE DATABASE FILE
    include('database.php');
    //SESSSION IS A WAY TO STORE DATA TO BE USED ACROSS MULTIPLE PAGES
    session_start();

    //ROUTING
    if(isset($_POST['save']))        saveTask();
    if(isset($_POST['update']))      updateTask();
    if(isset($_POST['delete']))      deleteTask();
       
    
    function getTasks($status)
    {
       //CODE HERE
       global $conn;
       //SQL SELECT
       $sql = "SELECT * FROM tasks 
       INNER JOIN types on tasks.type_id=types.id 
       INNER JOIN priorities on tasks.priority_id=priorities.id 
       WHERE status_id = $status";

        $result = mysqli_query( $conn , $sql);
        while(    $task = mysqli_fetch_assoc($result)   )  {
          ?>
          <button class="card-body btn btn-white rounded-0 border-0 border-bottom p-2 d-flex">
                                <input type = "hidden" name="thisId" value=<?php echo $task['task_id']; ?>>
								  <div class="px-3 py-2 fa-lg">
									<i class="bi bi-question-circle text-success "></i> 
								</div>
								<div class="text-start">
									<div class=" fw-bolder "><?php echo $task['title']; ?></div>
									<div class="card-text">
										<div class="text-secondary">#<?php echo $task['task_id'];  ?> created in <?php echo $task['task_datetime']; ?></div>
										<div class="fw-bold" title="<?php echo $task['description']; ?>"> <?php echo $task['description']; ?></div>
									</div>
									<div class="">
										<span class="btn btn-primary px-2 py-1  border-0 "> <?php echo $task['Pname']; ?></span>
										<span class="btn btn-primary px-2 py-1 bg-gray bg-opacity-25  border-0 text-black "><?php echo $task['Tname']; ?></span>
									</div>
								</div>
								<div class=" justify-content-end align-self-end  position-absolute end-0 mx-5 ">
								   <i name ="update"  data-bs-target="#modal-task"data-bs-toggle="modal" class="fa-solid fa-pen "></i>
								</div>
								<div class=" justify-content-end align-self-end  position-absolute end-0 mx-2">
								   <i type="submit" name ="delete" class="fa-solid fa-trash "></i>
								</div>					
	                          	</button>
          <?php    
        }        
    }

   

    function saveTask()
    {
        //CODE HERE
        //SQL INSERT
        global $conn;
        @$taskTitle      = $_POST['taskTitle'];
        @$taskType        = $_POST['taskType'];
        @$taskPriority    = $_POST['taskPriority'];
        @$taskStatus      = $_POST['taskStatus'];
        @$taskDate        = $_POST['taskDate'];
        @$taskDescription = $_POST['taskDescription'];

        $quee = "INSERT INTO tasks VALUES( null, '$taskTitle', '$taskType', '$taskPriority','$taskStatus','$taskDate','$taskDescription' )";
    
        mysqli_query($conn,$quee);
        
        $_SESSION['message'] = "Task has been added successfully !";
		header('location: index.php');
        
    }
  

    function updateTask()
    {
        //CODE HERE
        //SQL UPDATE
        $_SESSION['message'] = "Task has been updated successfully !";
		header('location: index.php');
    }

    function deleteTask()
    {
        //CODE HERE
        //SQL DELETE
        global $conn;
        $id = $_GET['thisId'];
        $sql2 = "DELETE FROM `tasks` WHERE task_id = $id";
        mysqli_query($conn,$sql2);
        
        $_SESSION['message'] = "Task has been deleted successfully !";
		header('location: index.php');
    }

?>