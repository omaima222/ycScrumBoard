

    <?php
 
        include('script.php');


        global $conn;
        if(isset($_GET['updateId']))
        $GLOBALS['id'] = $_GET['updateId'];


        $sql ="SELECT * FROM tasks 
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
        
    ?>
        
        
    <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title>update task</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
	<link rel="stylesheet" href="http://www.w3.org/2000/svg">
	<link rel="stylesheet" href="http://www.w3.org/2000/svg">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
	<link href="assets/css/vendor.min.css" rel="stylesheet" />
	<link href="assets/css/default/app.min.css" rel="stylesheet" />
	<link href="assets/css/style.css" rel="stylesheet" />
        </head>
        <body>
           
        <div  id="modal-task" tabindex="-1" aria-labelledby="exampleModalLabel" >
			<div class="modal-dialog">
			  <div class="modal-content">
						 <!-- Modal content goes here -->
				  <div class="modal-header">
				       <h1 class="modal-title fs-5" id="exampleModalLabel">Add Task</h1>
				       <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				  </div>
				  <div class="modal-body">
				        <form id="taskForm" action="update.php" method="POST" >
                     
                          <input type="hidden" name="taskId" value="<?php echo $id?>" class="form-control" id="id">
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
                                            <input type="date" class="form-control"name="taskDate" id="date">
                                    </div>
                                    <div class="mb-3">
                                            <label for="description" class="col-form-label">description</label>
                                            <textarea class="form-control" name="taskDescription" id="description"><?php echo $description?></textarea>
                                    </div>
                                                     
                                                                                                
				
                <div class="modal-footer" id="modalFooter">
                                        <button type="submit" class="btn btn-white " >Cancel</button>
                                        <button  type="submit" name="update" class="btn btn-primary" >Update</button>
                </div>                                                                                                 
                </form>
            </div>
           </div>
      </div>
        
        </body>
    </html>
    <script>
      <?php if($type == 1){  ?>
        document.getElementById("feature").checked = true;
      <?php }else{ ?> document.getElementById("bug").checked = true; <?php }
         ?>
         document.getElementById("priority").value = $priority;
         document.getElementById("status").value   = $status;
         document.getElementById("date").value   = $date;

    </script>








