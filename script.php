<?php
    //INCLUDE DATABASE FILE
    include('database.php');
    //SESSSION IS A WAY TO STORE DATA TO BE USED ACROSS MULTIPLE PAGES
    session_start();

    //ROUTING
    if(isset($_POST['save']))        saveTask();
    if(isset($_POST['delete']))      deleteTask();
      
    // =========================== Getting and displaying data =========================== //  

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
                                <form action="script.php" method="post" class="d-flex justify-content-end align-items-end p-0 m-0 card-footer ">
                                 <div class="btn-group border-bottom" role="toolbar" >
                                     <button type="button" class="border-0 btn btn-white task-action-btn">
                                        <a href="update.php?updateId=<?=$task['task_id']; ?>"><i class="fa-solid fa-pen "></i></a>
                                     </button>
                                     <button type="submit" name="delete" value="<?php echo $task['task_id']; ?>" class="border-0 btn btn-white task-action-btn"><i class="fa-solid fa-trash" ></i></button>	
                                 </div>
                                </form>				
	       </button>
          <?php    
        }        
    }
    
    // =========================== Updating tasks =========================== //  

   if(isset($_POST['update']))
   {
            $id          = $_POST['taskId'];
            $title       = $_POST['taskTitle'];
			$date        = $_POST['taskDate'];
			$status      = $_POST['taskStatus'];
            $priority    = $_POST['taskPriority'];
			$type        = $_POST['taskType'];
            $description = $_POST['taskDescription'];
            
        
            $updateit="UPDATE tasks SET  title='$title', type_id='$type', priority_id='$priority', status_id='$status', task_datetime='$date', description='$description' WHERE task_id='$id'";
            $resultup=mysqli_query($conn,$updateit);
            
			if($resultup){
				echo "Updated successefully";
				header('location: index.php');
			}else
			{
				die(mysqli_error($conn));
			}
    }

// =========================== Saving data =========================== //  

    function saveTask()
    {
        //CODE HERE
        //SQL INSERT
        global $conn;
        @$taskTitle       = $_POST['taskTitle'];
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
  
    // =========================== Deleting data =========================== //  


    function deleteTask()
    {
        //CODE HERE
        //SQL DELETE
        global $conn;
        $id = $_POST['delete'];
        $sql2 = "DELETE FROM tasks WHERE task_id = '$id'";
        mysqli_query($conn,$sql2);
    
        $_SESSION['message'] = "Task has been deleted successfully !";
		header('location: index.php');
    }
     
  