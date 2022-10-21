/**
 * In this file app.js you will find all CRUD functions name.
 * 
 */

 let x=17;
 let title = document.getElementById("title");
 let priority = document.getElementById("priority");
 let statusInput = document.getElementById("status");
 let typeFeature = document.getElementById("feature");
 let typeBug = document.getElementById("bug");
 let date = document.getElementById("date");
 let description = document.getElementById("description");
 let TODO = document.getElementById("to-do-tasks");
 let PROGRESS = document.getElementById("in-progress-tasks");
 let DONE = document.getElementById("done-tasks");
 console.log(tasks);
 let newTask={};

function stock(){
	 newTask["title"]= title.value;
     newTask["description"]=description.value;
     newTask["date"]=date.value;

     if( statusInput.value == 1 ){
         newTask["status"]="To Do";
     }else if( statusInput.value == 2 ){
         newTask["status"]="In Progress";
     }else if ( statusInput.value == 3 ){
         newTask["status"]="Done";
     }

	 if( priority.value == 1 ){
		newTask["priority"]="Low";
	}else if( priority.value == 2 ){
		newTask["priority"]="Medium";
	}else if ( priority.value == 3 ){
		newTask["priority"]="High";
	}

	if (typeFeature.checked == true) {
        newTask["type"] = "Feature";
    }
    else {
        newTask["type"] = "Bug";
    }
 }
function displayTasks(){
for(let i=0;i<tasks.length;i++){
	x=0;
	x++;
    if(tasks[i].status == "To Do"){
     TODO.innerHTML += `
       <button class="card-body btn btn-white rounded-0 border-0 border-bottom p-2 d-flex">
								<div class="px-3 py-2 fa-lg">
									<i class="bi bi-question-circle text-success "></i> 
								</div>
								<div class="text-start">
									<div class=" fw-bolder ">${tasks[i].title}</div>
									<div class="card-text">
										<div class="text-secondary">#${x} created in ${tasks[i].date}</div>
										<div class="fw-bold" title="${tasks[i].description}">${tasks[i].description}</div>
									</div>
									<div class="">
										<span class="btn btn-primary px-2 py-1 border-0 ">${tasks[i].priority}</span>
										<span class="btn btn-primary px-2 py-1 bg-gray bg-opacity-25 border-0 text-black ">${tasks[i].type}</span>
									</div>
								</div>
								<div class="justify-content-end align-self-end   mx-3 ">
								   <i  data-bs-target="#modal-task"data-bs-toggle="modal" class="fa-solid fa-pen "></i>
								</div>
								<div class="justify-content-end align-self-end  ">
								   <i onclick="deleteTask(${tasks[i].id});"  class="fa-solid fa-trash "></i>
								</div>
							
								
							
		</button>
     `;
    }
    if(tasks[i].status == "In Progress"){
        PROGRESS.innerHTML += `
        <button class="card-body btn btn-white rounded-0 border-0 border-bottom p-2 d-flex position-relative ">
								<div class="mx-3 my-2 spinner-border  spinner-border-sm text-success" role="status">
									<span class="visually-hidden"></span> 
								</div>
								<div class="text-start">
									<div class="fw-bolder ">${tasks[i].title}</div>
									<div class="card-text">
										<div class="text-secondary">#${x} created in ${tasks[i].date}</div>
										<div class="fw-bold" title="${tasks[i].description}">${tasks[i].description}</div>
									</div>
									<div class="">
										<span class="btn btn-primary px-2 py-1 border-0 ">${tasks[i].priority}</span>
										<span class="btn btn-primary px-2 py-1 bg-gray bg-opacity-25 border-0 text-black ">${tasks[i].type}</span>
									</div>
								</div>
								<div class="justify-content-end align-self-end   mx-3 ">
								   <i  data-bs-target="#modal-task"data-bs-toggle="modal" class="fa-solid fa-pen "></i>
								</div>
								<div class="justify-content-end align-self-end  ">
								   <i onclick="deleteTask(${tasks[i].id});"  class="fa-solid fa-trash "></i>
								</div>
		</button> 

        `
    }
    if(tasks[i].status == "Done"){
        DONE.innerHTML += `
        					<button class="card-body btn btn-white rounded-0  border-0 border-bottom card-body p-2 d-flex">
								<div class="px-3 py-2 fa-lg">
									<i class="bi bi-check-circle text-success"></i> 
								</div>
								<div class="text-start">
									<div class="fw-bolder ">${tasks[i].title}</div>
									<div class="card-text">
										<div class="text-secondary">#${x} created in ${tasks[i].date}</div>
										<div class="fw-bold" title="${tasks[i].description}">${tasks[i].description}</div>
									</div>

									<div class="">
										<span class="btn btn-primary px-2 py-1 border-0">${tasks[i].priority}</span>
										<span class="btn btn-primary px-2 py-1 bg-gray bg-opacity-25 border-0 text-black">${tasks[i].type}</span>
									</div>
								</div>
								<div class="justify-content-end align-self-end   mx-3 ">
								   <i  data-bs-target="#modal-task"data-bs-toggle="modal" class="fa-solid fa-pen "></i>
								</div>
								<div class="justify-content-end align-self-end  ">
								   <i onclick="deleteTask(${tasks[i].id})"  class="fa-solid fa-trash "></i>
								</div>
							</button>
        
        `
    }

}
}
function addTask(){
	    stock();
		x++;
		tasks.push(newTask);
		if(newTask.status == "To Do"){

		 TODO.innerHTML += `
		   <button class="card-body btn btn-white rounded-0 border-0 border-bottom p-2 d-flex">
									<div class="px-3 py-2 fa-lg">
										<i class="bi bi-question-circle text-success "></i> 
									</div>
									<div class="text-start">
										<div class=" fw-bolder ">${newTask.title}</div>
										<div class="card-text">
											<div class="text-secondary">#${x} created in ${newTask.date}</div>
											<div class="fw-bold" title="${newTask.description}">${newTask.description}</div>
										</div>
										<div class="">
											<span class="btn btn-primary px-2 py-1 border-0 ">${newTask.priority}</span>
											<span class="btn btn-primary px-2 py-1 bg-gray bg-opacity-25 border-0 text-black ">${newTask.type}</span>
										</div>
									</div>
									<div class="justify-content-end align-self-end   mx-3 ">
								      <i  data-bs-target="#modal-task"data-bs-toggle="modal" class="fa-solid fa-pen "></i>
								    </div>
								    <div class="justify-content-end align-self-end  ">
								      <i onclick="deleteTask(${tasks[i].id});"  class="fa-solid fa-trash "></i>
								    </div>
			</button>
		 `;
		}
		if(newTask.status == "In Progress"){
			PROGRESS.innerHTML += `
			<button class="card-body btn btn-white rounded-0 border-0 border-bottom p-2 d-flex ">
									<div class="mx-3 my-2 spinner-border  spinner-border-sm text-success" role="status">
										<span class="visually-hidden"></span> 
									</div>
									<div class="text-start">
										<div class="fw-bolder ">${newTask.title}</div>
										<div class="card-text">
											<div class="text-secondary">#${x} created in ${newTask.date}</div>
											<div class="fw-bold"" title="${newTask.description}">${newTask.description}</div>
										</div>
										<div class="">
											<span class="btn btn-primary px-2 py-1 border-0 ">${newTask.priority}</span>
											<span class="btn btn-primary px-2 py-1 bg-gray bg-opacity-25 border-0 text-black ">${newTask.type}</span>
										</div>
									</div>
									<div class="justify-content-end align-self-end   mx-3 ">
								      <i  data-bs-target="#modal-task"data-bs-toggle="modal" class="fa-solid fa-pen "></i>
								    </div>
								    <div class="justify-content-end align-self-end  ">
								      <i onclick="deleteTask(${tasks[i].id});"  class="fa-solid fa-trash "></i>
								    </div>
			</button>
	
			`
		}
		if(newTask.status == "Done"){
			DONE.innerHTML += `
								<button class="card-body btn btn-white rounded-0  border-0 border-bottom card-body p-2 d-flex">
									<div class="px-3 py-2 fa-lg">
										<i class="bi bi-check-circle text-success"></i> 
									</div>
									<div class="text-start">
										<div class="fw-bolder ">${newTask.title}</div>
										<div class="card-text">
											<div class="text-secondary">#${x} created in ${newTask.date}</div>
											<div class="fw-bold" title="${newTask.description}">${newTask.description}</div>
										</div>
										<div class="">
											<span class="btn btn-primary px-2 py-1 border-0">${newTask.priority}</span>
											<span class="btn btn-primary px-2 py-1 bg-gray bg-opacity-25 border-0 text-black">${newTask.type}</span>
										</div>
									</div>
									<div class="justify-content-end align-self-end   mx-3 ">
								      <i  data-bs-target="#modal-task"data-bs-toggle="modal" class="fa-solid fa-pen "></i>
								    </div>
								    <div class="justify-content-end align-self-end  ">
								      <i onclick="deleteTask();"  class="fa-solid fa-trash "></i>
								    </div>
								</button>
			
			`
		}
	
}

displayTasks();


function createTask() {
    // initialiser task form
    // Afficher le boutton save
    // Ouvrir modal form
}

function saveTask() {
    // Recuperer task attributes a partir les champs input
    // Créez task object
    // Ajoutez object au Array
    // refresh tasks
    
}

function editTask(index) {
    // Initialisez task form

    // Affichez updates

    // Delete Button

    // Définir l’index en entrée cachée pour l’utiliser en Update et Delete

    // Definir FORM INPUTS

    // Ouvrir Modal form
}

function updateTask() {
    // GET TASK ATTRIBUTES FROM INPUTS

    // Créez task object

    // Remplacer ancienne task par nouvelle task

    // Fermer Modal form

    // Refresh tasks
    
}
function deleteTask(){
      let index;
	  for(let i=0;i<tasks.length;i++){
		if( tasks[i].id == id ) index=i;
	  }
	  tasks.splice(index,1);

} 
function deleteTasks() {
    // Get index of task in the array
    // Remove task from array by index splice function
    // close modal form
    // refresh tasks
}

function initTaskForm() {
    // Clear task form from data

    // Hide all action buttons
}

function reloadTasks() {
    // Remove tasks elements

    // Set Task count
}