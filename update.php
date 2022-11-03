

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
				       <a href="index.php"><button type="button" class="btn-close" ></button></a>
				  </div>
				  <div class="modal-body">
				        <form id="taskForm" action="update.php" method="POST" >
                     
                          <input type="hidden" name="taskId" value="<?php echo $id?>" class="form-control" id="id">
                                    <div>
                                        <label for="title" class="col-form-label">Title</label>
                                        <input type="text" name="taskTitle" value="<?php echo $title?>" class="form-control" id="title" required>
                                    </div>
                                    <div id="type">
                                        <label class="col-form-label">Type</label>
                                        <div class="form-check mx-3">
                                             <input class="form-check-input" type="radio" name="taskType" id="feature" value= "1" <?php echo $type==1 ? 'checked':'';?> >
                                             <label class="form-check-label" for="flexRadioDefault1">
                                               Feature
                                            </label>
                                        </div>
                                        <div class="form-check mx-3">
                                             <input class="form-check-input" type="radio" name="taskType" id="bug" value="2" <?php echo $type==2 ? 'checked':'';?>>
                                             <label class="form-check-label" for="flexRadioDefault2">
                                              Bug
                                         </label>
                                       </div>
                                     </div>
                                    <div>  
                                            <label for="priority" class="col-form-label">priority</label>
                                            <select class="form-select" aria-label="Default select example" name="taskPriority" id="priority" required>
                                            <option  disabled value="">PLease select</option>
                                            <option value= 1 <?php echo $priority==1 ? 'selected':'';?> >Low</option>
                                            <option value= 2 <?php echo $priority==2 ? 'selected':'';?> >Medium</option>
                                            <option value= 3 <?php echo $priority==3 ? 'selected':'';?> >High</option>
                                            <option value= 4 <?php echo $priority==4 ? 'selected':'';?> >Critical</option>
                                            </select>
                                    </div>
                                    <div>
                                             <label for="status" class="col-form-label">status</label>
                                            <select class="form-select" aria-label="Default select example" name="taskStatus" id="status" required>
                                            <option  disabled value="">PLease select</option>
                                            <option value= 1 <?php echo $status==1 ? 'selected':'';?> >To do</option>
                                            <option value= 2 <?php echo $status==2 ? 'selected':'';?> >In Progress</option>
                                            <option value= 3 <?php echo $status==3 ? 'selected':'';?> >Done</option>
                                            </select>					
                                    </div>
                                    <div>
                                            <label for="date" class="col-form-label">date</label>
                                            <input type="date" value="<?php echo $date?>" class="form-control"name="taskDate" id="date" required>
                                    </div>
                                    <div class="mb-3">
                                            <label for="description" class="col-form-label">description</label>
                                            <textarea class="form-control" name="taskDescription" id="description" required><?php echo $description?></textarea>
                                    </div>
                                                     
                                                                                                
				
                <div class="modal-footer" id="modalFooter">
                                        <button type="button" class="btn btn-white" ><a href="index.php">Cancel</a></button>
                                        <button  type="submit" name="update" class="btn btn-primary" >Update</button>
                </div>                                                                                                 
                </form>
            </div>
           </div>
      </div>
        
        </body>
    </html>








