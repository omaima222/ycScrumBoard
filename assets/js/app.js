/**
 * In this file app.js you will find all CRUD functions name.
 * 
 */

 let title = document.getElementById("title");
 let priority = document.getElementById("priority");
 let statusInput = document.getElementById("status");
 let typeFeature = document.getElementById("feature");
 let typeBug = document.getElementById("bug");
 let date = document.getElementById("date");
 let description = document.getElementById("description");
 let toDoCount = document.getElementById("to-do-tasks-count");
 let inPCount = document.getElementById("in-progress-tasks-count");
 let doneCount = document.getElementById("done-tasks-count");
 let modalFooter = document.getElementById("modalFooter");
 let modalForm = document.getElementById("taskForm");

displayTasks();

//----------------------------------Display tasks----------------------------------//

function displayTasks(){
 let TODO = document.getElementById("to-do-tasks");
 let PROGRESS = document.getElementById("in-progress-tasks");
 let DONE = document.getElementById("done-tasks");
 let shortdes ;
 let x=1;
	TODO.innerHTML=" ";
	PROGRESS.innerHTML=" ";
	DONE.innerHTML=" ";
 let todoco=0;
 let iprco=0;
 let donco=0;

for(let i=0;i<tasks.length;i++)
{
	if(tasks[i].description.length>50){
		shortdes = tasks[i].description.substring(0,50);
	}   else{ shortdes = tasks[i].description }


	if(tasks[i].status == "To Do"){
	 todoco++;
     TODO.innerHTML += `
       <button class="card-body btn btn-white rounded-0 border-0 border-bottom p-2 d-flex">
								<div class="px-3 py-2 fa-lg">
									<i class="bi bi-question-circle text-success "></i> 
								</div>
								<div class="text-start">
									<div class=" fw-bolder ">${tasks[i].title}</div>
									<div class="card-text">
										<div class="text-secondary">#${x} created in ${tasks[i].date}</div>
										<div class="fw-bold" title="${tasks[i].description}">${shortdes}</div>
									</div>
									<div class="">
										<span class="btn btn-primary px-2 py-1  border-0 ">${tasks[i].priority}</span>
										<span class="btn btn-primary px-2 py-1 bg-gray bg-opacity-25  border-0 text-black ">${tasks[i].type}</span>
									</div>
								</div>
								<div class="justify-content-end align-self-end  position-absolute end-0 mx-5 ">
								   <i onclick="updateTask(${x});"  data-bs-target="#modal-task"data-bs-toggle="modal" class="fa-solid fa-pen "></i>
								</div>
								<div class="justify-content-end align-self-end  position-absolute end-0 mx-2">
								   <i onclick="deleteTask(${x});"  class="fa-solid fa-trash "></i>
								</div>
													
		</button>
     `;
    }

    if(tasks[i].status == "In Progress"){
		iprco++;
        PROGRESS.innerHTML += `
        <button class="card-body btn btn-white rounded-0 border-0 border-bottom p-2 d-flex position-relative ">
								<div class="mx-3 my-2 spinner-border  spinner-border-sm text-success" role="status">
									<span class="visually-hidden"></span> 
								</div>
								<div class="text-start">
									<div class="fw-bolder ">${tasks[i].title}</div>
									<div class="card-text">
										<div class="text-secondary">#${x} created in ${tasks[i].date}</div>
										<div class="fw-bold" title="${tasks[i].description}">${shortdes}</div>
									</div>
									<div class="">
										<span class="btn btn-primary  px-2 py-1 border-0 ">${tasks[i].priority}</span>
										<span class="btn btn-primary  px-2 py-1 bg-gray bg-opacity-25 border-0 text-black ">${tasks[i].type}</span>
									</div>
								</div>
								<div class="justify-content-end align-self-end  position-absolute end-0 mx-5 ">
								   <i onclick="updateTask(${x});"  data-bs-target="#modal-task"data-bs-toggle="modal" class="fa-solid fa-pen "></i>
								</div>
								<div class="justify-content-end align-self-end  position-absolute end-0 mx-2">
								   <i onclick="deleteTask(${x});"  class="fa-solid fa-trash "></i>
								</div>
		</button> 

        `
    }

    if(tasks[i].status == "Done"){
		donco++;
        DONE.innerHTML += `
        					<button class="card-body btn btn-white rounded-0  border-0 border-bottom card-body p-2 d-flex">
								<div class="px-3 py-2 fa-lg">
									<i class="bi bi-check-circle text-success"></i> 
								</div>
								<div class="text-start">
									<div class="fw-bolder ">${tasks[i].title}</div>
									<div class="card-text">
										<div class="text-secondary">#${x} created in ${tasks[i].date}</div>
										<div class="fw-bold" title="${tasks[i].description}">${shortdes}</div>
									</div>

									<div class="">
										<span class="btn btn-primary  px-2 py-1 border-0">${tasks[i].priority}</span>
										<span class="btn btn-primary  px-2 py-1 bg-gray bg-opacity-25 border-0 text-black">${tasks[i].type}</span>
									</div>
								</div>
							<div class="justify-content-end align-self-end  position-absolute end-0 mx-5 ">
								<i  onclick="updateTask(${x});" data-bs-target="#modal-task"data-bs-toggle="modal" class="fa-solid fa-pen "></i>
							 </div>
							 <div class="justify-content-end align-self-end  position-absolute end-0 mx-2">
								<i onclick="deleteTask(${x});"  class="fa-solid fa-trash "></i>
							 </div>
							</button>
        
        `
    }
	++x;

}
toDoCount.innerHTML = todoco;
inPCount.innerHTML = iprco;
doneCount.innerHTML = donco;
}

//----------------------------------Save task----------------------------------//

function saveTask() {
    
	document.getElementById("update").style.display="none";
	newTask = {
        'title'         :   title.value,
        'type'          :   '',
        'priority'      :   priority.value,
        'status'        :   statusInput.value,
        'date'          :   date.value,
        'description'   :   description.value,
	}
	if (typeFeature.checked == true) {
	           	newTask.type = "Feature";
		    }
		    else {
		        newTask.type = "Bug";
		    }
		 
	tasks.push(newTask);
    displayTasks();
	reloadTasks();
	
}

//----------------------------------Update task----------------------------------//

function updateTask(index) {
   
	document.getElementById("save").style.display="none";
	document.getElementById("update").style.display="block";

	let indexx = index-1;

	title.value = tasks[indexx].title;
    description.value = tasks[indexx].description;
    date.value = tasks[indexx].date;
	priority.value = tasks[indexx].priority;
    statusInput.value = tasks[indexx].status;

    if (tasks[indexx].type == "Feature") {
        typeFeature.checked = true;
    }
    else {
        typeBug.checked = true;
    }
	
       
	document.getElementById("update").onclick=()=>{

		task = {
			'title'         :   title.value,
			'type'          :   '',
			'priority'      :   priority.value,
			'status'        :   statusInput.value,
			'date'          :   date.value,
			'description'   :   description.value,
		}
		if (typeFeature.checked == true) {
					   task.type = "Feature";
				}
				else {
					task.type = "Bug";
				}

		tasks[index-1] = task;
	
		document.getElementById("update").style.display="none";
	    document.getElementById("save").style.display="block";

		displayTasks();
		
	}
}

//----------------------------------Delete task----------------------------------//

function deleteTask(index){
    
	alert("do you really want to delete this task ?");
	tasks.splice (index-1, 1);
    displayTasks();

} 

//----------------------------------Reload Modal form----------------------------------//

function reloadTasks() {
    taskForm.reset();
}