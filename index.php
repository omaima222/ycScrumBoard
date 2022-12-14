<?php
    include('script.php');
?>


<!DOCTYPE html>
<html lang="en" >
<head>
	<meta charset="utf-8" />
	<title>YouCode | Scrum Board</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	
	<!-- ================== BEGIN core-css ================== -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
	<link rel="stylesheet" href="http://www.w3.org/2000/svg">
	<link rel="stylesheet" href="http://www.w3.org/2000/svg">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
	<link href="assets/css/vendor.min.css" rel="stylesheet" />
	<link href="assets/css/default/app.min.css" rel="stylesheet" />
	<link href="assets/css/style.css" rel="stylesheet" />
	<!-- ================== END core-css ================== -->
</head>
<body>

	<!-- BEGIN #app -->
	<div id="app" class="app-without-sidebar">
		<!-- BEGIN #content -->
		<div id="content" class="app-content main-style">
			<div class="d-flex justify-content-between">
				<div aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
						<li class="breadcrumb-item active">Scrum Board </li>
					</ol>
					<!-- BEGIN page-header -->
					<h1 class="page-header">
						Scrum Board 
					</h1>
					<!-- END page-header -->
				</div>
				
				<div class="py-3 text-center ">
					<button onclick="reloadTasks();" class="btn btn-white text-black px-4 rounded-pill border-0 border-bottom border-3 border-black" data-bs-toggle="modal" data-bs-target="#modal-task"><i class=" fa fa-plus text-black"></i > Add Task</button>
				</div>
			</div>
			
			<div class="d-flex justify-content-between row mx-auto ">

				<div class=" col-12 col-md-4 my-2 ">
					<div class=" card border-0 ">
						<div class="card-header py-1 px-2 bg-black">
							<h4 class="card-header fs-6 text-white">To do(<?= countTask(1) ?>)</h4>

						</div>
						<div class="list-group list-group-flush" id="to-do-tasks">
							<!-- TO DO TASKS HERE -->
							<?php
								//PHP CODE HERE								
								//DATA FROM getTasks() FUNCTION					
								getTasks(1,"bi bi-question-circle text-success"); 											
							?>
						</div>
					</div>
				</div>


				<div class="col-12 col-md-4 my-2 ">
					<div class="card border-0 ">
						<div class="card-header py-1 px-2 bg-black">
							<h4 class="card-header fs-6 text-white">In Progress(<?= countTask(2) ?>)</h4>
						</div>
						<div class="list-group list-group-flush" id="in-progress-tasks">
							<!-- IN PROGRESS TASKS HERE -->
							<?php
								//PHP CODE HERE	
								//DATA FROM getTasks() FUNCTION
								getTasks(2,"spinner-border  spinner-border-sm text-success"); 				
							?>
						</div>
					</div>
				</div>
				<div class="col-12 col-md-4 my-2 ">
					<div class="card border-0  ">
						<div class="card-header py-1 px-2 bg-black ">
							<h4 class="card-header fs-6 text-white">Done(<?= countTask(3) ?>)</h4>

						</div>
						<div class="list-group list-group-flush" id="done-tasks">
							<!-- DONE TASKS HERE -->
							<?php
								//PHP CODE HERE					
								//DATA FROM getTasks() FUNCTION
								getTasks(3,"bi bi-check-circle text-success"); 								
							?>
					
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- END #content -->
		
		
		<!-- BEGIN scroll-top-btn -->
		<a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top" data-toggle="scroll-to-top"><i class="fa fa-angle-up"></i></a>
		<!-- END scroll-top-btn -->
	</div>
	
	<!-- END #app -->
	
	<!-- TASK MODAL -->
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
					            <input type="text" name="taskTitle"  class="form-control" id="title" required>
					        </div>
				            <div id="type">
					            <label class="col-form-label">Type</label>
					            <div class="form-check mx-3">
						             <input checked class="form-check-input" type="radio" name="taskType" id="feature" value= "1" >
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
						            <select class="form-select" aria-label="Default select example" name="taskPriority" id="priority" required>
							        <option selected disabled value="">PLease select</option>
							        <option value= 1 >Low</option>
							        <option value= 2 >Medium</option>
							        <option value= 3 >High</option>
									<option value= 4 >Critical</option>

						            </select>
				            </div>
					        <div>
					             	<label for="status" class="col-form-label">status</label>
						            <select class="form-select" aria-label="Default select example" name="taskStatus" id="status"required >
						         	<option selected  disabled value="">PLease select</option>
							        <option value= 1 >To do</option>
							        <option value= 2 >In Progress</option>
							        <option value= 3 >Done</option>
						            </select>					
				            </div>
					        <div>
					                <label for="date" class="col-form-label">date</label>
						            <input type="date" class="form-control" name="taskDate" id="date" required>
					        </div>
				        	<div class="mb-3">
					                <label for="description" class="col-form-label">description</label>
					                <textarea class="form-control" name="taskDescription" id="description" required></textarea>
				          	</div>
				       
				  </div>	
				
				  <div class="modal-footer" id="modalFooter">
				       <button type="button" class="btn btn-white" data-bs-dismiss="modal" aria-label="Close" >Cancel</button>
				       <button type="submit" id="task-save-btn" name="save" class="btn btn-primary" >Save</button>
				  </div>                                                                                                 
				  </form>
			  </div>
	     	</div>
		</div>
	<!-- ================== BEGIN core-js ================== -->
	<script src="./assets/js/vendor.min.js"></script>
	<script src=".assets/js/app.min.js"></script>
	<!-- ================== END core-js ================== -->
	
</body>
</html>