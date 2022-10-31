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
							<h4 class="card-header fs-6 text-white">To do (<span id="to-do-tasks-count"></span>)</h4>

						</div>
						<div class="list-group list-group-flush" id="to-do-tasks">
							<!-- TO DO TASKS HERE -->
							<?php
								//PHP CODE HERE	
								if($tasks['status_id']==1){				
								foreach( $tasks as $task ){ ?>
                                <?php if($task['type_id']==1) $task['type_id'] = "Feature";
								      else  $task['type_id'] = "Bug";
									  if($task['priority_id']==1) $task['priority_id'] = "Low";
									  else if($task['priority_id']==2) $task['priority_id'] = "Medium";
									  else $task['priority_id'] = "High";
								?>
								<button class="card-body btn btn-white rounded-0 border-0 border-bottom p-2 d-flex">
								  <div class="px-3 py-2 fa-lg">
									<i class="bi bi-question-circle text-success "></i> 
								</div>
								<div class="text-start">
									<div class=" fw-bolder "><?php echo $task['title']; ?></div>
									<div class="card-text">
										<div class="text-secondary"># created in <?php echo $task['task_datetime']; ?></div>
										<div class="fw-bold" title="<?php echo $task['description']; ?>"> <?php echo $task['description']; ?></div>
									</div>
									<div class="">
										<span class="btn btn-primary px-2 py-1  border-0 "> <?php echo $task['priority_id']; ?></span>
										<span class="btn btn-primary px-2 py-1 bg-gray bg-opacity-25  border-0 text-black "><?php echo $task['type_id']; ?></span>
									</div>
								</div>
								<div class=" justify-content-end align-self-end  position-absolute end-0 mx-5 ">
								   <i onclick="updateTask(${x});"  data-bs-target="#modal-task"data-bs-toggle="modal" class="fa-solid fa-pen "></i>
								</div>
								<div class=" justify-content-end align-self-end  position-absolute end-0 mx-2">
								   <i onclick="deleteTask(${x});"  class="fa-solid fa-trash "></i>
								</div>					
	                          	</button>
	 							
								<?php
								//DATA FROM getTasks() FUNCTION

								getTasks(); }
								
								}	
							?>
						</div>
					</div>
				</div>


				<div class="col-12 col-md-4 my-2 ">
					<div class="card border-0 ">
						<div class="card-header py-1 px-2 bg-black">
							<h4 class="card-header fs-6 text-white">In Progress (<span id="in-progress-tasks-count"></span>)</h4>

						</div>
						<div class="list-group list-group-flush" id="in-progress-tasks">
							<!-- IN PROGRESS TASKS HERE -->
							<?php
								//PHP CODE HERE
								foreach( $tasks as $task ){ ?>
								<?php if($task['type_id']==1) $task['type_id'] = "Feature";
								      else  $task['type_id'] = "Bug";
									  if($task['priority_id']==1) $task['priority_id'] = "Low";
									  else if($task['priority_id']==2) $task['priority_id'] = "Medium";
									  else $task['priority_id'] = "High";
								?>
								<button class="card-body btn btn-white rounded-0 border-0 border-bottom p-2 d-flex">
								<div class="mx-3 my-2 spinner-border  spinner-border-sm text-success" role="status">
									<span class="visually-hidden"></span> 
								</div>
								<div class="text-start">
									<div class=" fw-bolder "><?php echo $task['title']; ?></div>
									<div class="card-text">
										<div class="text-secondary"># created in <?php echo $task['task_datetime']; ?></div>
										<div class="fw-bold" title="<?php echo $task['description']; ?>"> <?php echo $task['description']; ?></div>
									</div>
									<div class="">
										<span class="btn btn-primary px-2 py-1  border-0 "> <?php echo $task['priority_id']; ?></span>
										<span class="btn btn-primary px-2 py-1 bg-gray bg-opacity-25  border-0 text-black "><?php echo $task['type_id']; ?></span>
									</div>
								</div>
								<div class=" justify-content-end align-self-end  position-absolute end-0 mx-5 ">
								   <i onclick="updateTask(${x});"  data-bs-target="#modal-task"data-bs-toggle="modal" class="fa-solid fa-pen "></i>
								</div>
								<div class=" justify-content-end align-self-end  position-absolute end-0 mx-2">
								   <i onclick="deleteTask(${x});"  class="fa-solid fa-trash "></i>
								</div>					
	                          	</button>
	 							
								<?php
								//DATA FROM getTasks() FUNCTION

								getTasks(); }
								
								
							?>
						</div>
					</div>
				</div>
				<div class="col-12 col-md-4 my-2 ">
					<div class="card border-0  ">
						<div class="card-header py-1 px-2 bg-black ">
							<h4 class="card-header fs-6 text-white">Done (<span id="done-tasks-count"></span>)</h4>

						</div>
						<div class="list-group list-group-flush" id="done-tasks">
							<!-- DONE TASKS HERE -->
							<?php
								//PHP CODE HERE
								foreach( $tasks as $task ){ ?>
								<?php if($task['type_id']==1) $task['type_id'] = "Feature";
								      else  $task['type_id'] = "Bug";
									  if($task['priority_id']==1) $task['priority_id'] = "Low";
									  else if($task['priority_id']==2) $task['priority_id'] = "Medium";
									  else $task['priority_id'] = "High";
								?>
								<button class="card-body btn btn-white rounded-0 border-0 border-bottom p-2 d-flex">
								<div class="px-3 py-2 fa-lg">
									<i class="bi bi-check-circle text-success"></i> 
								</div>
								<div class="text-start">
									<div class=" fw-bolder "><?php echo $task['title']; ?></div>
									<div class="card-text">
										<div class="text-secondary"># created in <?php echo $task['task_datetime']; ?></div>
										<div class="fw-bold" title="<?php echo $task['description']; ?>"> <?php echo $task['description']; ?></div>
									</div>
									<div class="">
										<span class="btn btn-primary px-2 py-1  border-0 "> <?php echo $task['priority_id']; ?></span>
										<span class="btn btn-primary px-2 py-1 bg-gray bg-opacity-25  border-0 text-black "><?php echo $task['type_id']; ?></span>
									</div>
								</div>
								<div class=" justify-content-end align-self-end  position-absolute end-0 mx-5 ">
								   <i onclick="updateTask(${x});"  data-bs-target="#modal-task"data-bs-toggle="modal" class="fa-solid fa-pen "></i>
								</div>
								<div class=" justify-content-end align-self-end  position-absolute end-0 mx-2">
								   <i onclick="deleteTask(${x});"  class="fa-solid fa-trash "></i>
								</div>					
	                          	</button>
	 							
								<?php
								//DATA FROM getTasks() FUNCTION

								getTasks(); }
								
								
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
				        <form id="taskForm">
					        <div>
					            <label for="title" class="col-form-label">Title</label>
					            <input type="text" class="form-control" id="title">
					        </div>
				            <div id="type">
					            <label class="col-form-label">Type</label>
					            <div class="form-check mx-3">
						             <input class="form-check-input" type="radio" name="flexRadioDefault" id="feature">
						             <label class="form-check-label" for="flexRadioDefault1">
						               Feature
					                </label>
					            </div>
					            <div class="form-check mx-3">
						             <input class="form-check-input" type="radio" name="flexRadioDefault" id="bug" checked>
						             <label class="form-check-label" for="flexRadioDefault2">
						              Bug
						            </label>
					           </div>
				         	</div>
					        <div>  
						            <label for="priority" class="col-form-label">priority</label>
						            <select class="form-select" aria-label="Default select example" id="priority">
							        <option selected>PLease select</option>
							        <option value="Low">Low</option>
							        <option value="Medium">Medium</option>
							        <option value="High">High</option>
						            </select>
				            </div>
					        <div>
					             	<label for="status" class="col-form-label">status</label>
						            <select class="form-select" aria-label="Default select example" id="status">
						         	<option selected>PLease select</option>
							        <option value="To Do">To do</option>
							        <option value="In Progress">In Progress</option>
							        <option value="Done">Done</option>
						            </select>					
				            </div>
					        <div>
					                <label for="date" class="col-form-label">date</label>
						            <input type="date" class="form-control" id="date">
					        </div>
				        	<div class="mb-3">
					                <label for="description" class="col-form-label">description</label>
					                <textarea class="form-control" id="description"></textarea>
				          	</div>
				        </form>
				  </div>
				
				  <div class="modal-footer" id="modalFooter">
				       <button type="button" class="btn btn-white " data-bs-dismiss="modal">Cancel</button>
				       <button id="save" style="display: block;"  onclick="saveTask();"  type="button" class="btn btn-primary" data-bs-dismiss="modal">Save</button>
				       <button id="update" style="display: none;" type="button" class="btn btn-primary" data-bs-dismiss="modal">Update</button>
				  </div>
			  </div>
	     	</div>
		</div>
	<!-- ================== BEGIN core-js ================== -->
	<script src="./assets/js/data.js"></script>
	<script src="./assets/js/app.js"></script>
	<script src="./assets/js/vendor.min.js"></script>
	<script src=".assets/js/app.min.js"></script>
	<!-- ================== END core-js ================== -->
	
</body>
</html>