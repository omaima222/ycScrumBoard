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
// function stock(){
// 	 newTask["title"]= title.value;
//      newTask["description"]=description.value;
//      newTask["date"]=date.value;

//      if( statusInput.value == 1 ){
//          newTask["status"]="To Do";
//      }else if( statusInput.value == 2 ){
//          newTask["status"]="In Progress";
//      }else if ( statusInput.value == 3 ){
//          newTask["status"]="Done";
//      }

// 	 if( priority.value == 1 ){
// 		newTask["priority"]="Low";
// 	}else if( priority.value == 2 ){
// 		newTask["priority"]="Medium";
// 	}else if ( priority.value == 3 ){
// 		newTask["priority"]="High";
// 	}

// 	if (typeFeature.checked == true) {
//         newTask["type"] = "Feature";
//     }
//     else {
//         newTask["type"] = "Bug";
//     }
//  }

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

for(let i=0;i<tasks.length;i++){
	if(tasks[i].description.length>50){
		shortdes = tasks[i].description.substring(0,50);
	}else{ shortdes = tasks[i].description }

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
										<span class="btn btn-primary px-2 py-1 rounded-pill border-0 ">${tasks[i].priority}</span>
										<span class="btn btn-primary px-2 py-1 bg-gray bg-opacity-25 rounded-pill border-0 text-black ">${tasks[i].type}</span>
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
										<span class="btn btn-primary px-2 py-1 border-0 ">${tasks[i].priority}</span>
										<span class="btn btn-primary px-2 py-1 bg-gray bg-opacity-25 border-0 text-black ">${tasks[i].type}</span>
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
										<span class="btn btn-primary px-2 py-1 border-0">${tasks[i].priority}</span>
										<span class="btn btn-primary px-2 py-1 bg-gray bg-opacity-25 border-0 text-black">${tasks[i].type}</span>
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


function createTask() {
    // initialiser task form
    // Afficher le boutton save
    // Ouvrir modal form
}

function saveTask() {
    // Recuperer task attributes a partir les champs input
    // Créez task object
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
		 
    // Ajoutez object au Array
	tasks.push(newTask);
    // refresh tasks
    displayTasks();
	
}

// function editTask(index) {
//     // Initialisez task form
// 	const task = {
//         'title'         :   title.value,
//         'type'          :   '',
//         'priority'      :   priority.value,
//         'status'        :   statusInput.value,
//         'date'          :   date.value,
//         'description'   :   description.value,
// 	}
// 	if (typeFeature.checked == true) {
// 	           	task.type = "Feature";
// 		    }
// 		    else {
// 		        task.type = "Bug";
// 		    }
//     // Affichez updates
//     tasks[index] = task;
//     // Delete Button
// 	// Définir l’index en entrée cachée pour l’utiliser en Update et Delete
//     // Definir FORM INPUTS
//     // Ouvrir Modal form
// 	displayTasks();
// }
// console.log(tasks);

function updateTask(index) {
    // GET TASK ATTRIBUTES FROM INPUTS

    // Créez task object

    // Remplacer ancienne task par nouvelle task

    // Fermer Modal form

	document.getElementById("save").style.display="none";
	document.getElementById("update").style.display="block";

    // Refresh tasks
	let indexx = index-1;
	title.value = tasks[indexx].title;
    description.value = tasks[indexx].description;
    date.value = tasks[indexx].date;
    if (tasks[indexx].type == "Feature") {
        typeFeature.checked = true;
    }
    else {
        typeBug.checked = true;
    }
    priority.value = tasks[indexx].priority;
    statusInput.value = tasks[indexx].status;
       
	document.getElementById("update").onclick=()=>{
		// Initialisez task form
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
		// Affichez updates
		tasks[index-1] = task;
		// Delete Button
		// Définir l’index en entrée cachée pour l’utiliser en Update et Delete
		// Definir FORM INPUTS
		
	document.getElementById("save").style.display="block";
	document.getElementById("update").style.display="none";
		// Ouvrir Modal form
		displayTasks();
		
	}
}
function deleteTask(index){
    // Get index of task in the array
    // Remove task from array by index splice function
    // close modal form
    // refresh tasks
	alert("do you really want to delete this task ?");
	tasks.splice (index-1, 1);
    displayTasks();

} 

function initTaskForm() {
    // Clear task form from data

    // Hide all action buttons
}

// function reloadTasks() {
//     // Remove tasks elements

//     // Set Task count
// }

function reloadTasks() {
    taskForm.reset();
}