/**
 * In this file app.js you will find all CRUD functions name.
 * 
 */


// let title = document.getElementById("title");
// let priority = document.getElementById("priority");
// let status = document.getElementById("status");
// //let type = document.getElementById("type");
// let typeFeature = document.getElementById("feature");
// let typeBug = document.getElementById("bug");
// let date = document.getElementById("date");
// let description = document.getElementById("description");

// let card={};
// function stock(){
//     card["title"]= title.value;
//     card["description"]=description.value;
//     card["date"]=date.value;
//     if( status.value == 1 ){
//         card["status"]="To Do";
//     }else if( status.value == 2 ){
//         card["status"]="In Progress";
//     }else if ( status.value == 3 ){
//         card["status"]="Done";
//     }
    
// }
let TODO = document.getElementById("to-do-tasks");
let PROGRESS = document.getElementById("in-progress-tasks");
let DONE = document.getElementById("done-tasks");
console.log(tasks);
let x=0;
for(let i=0;i<tasks.length;i++){
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
										<div class="fw-bold" title="${tasks[i].description}">There is hardly anything more frustrating than having t...</div>
									</div>
									<div class="">
										<span class="btn btn-primary px-2 py-1 border-0 ">High</span>
										<span class="btn btn-primary px-2 py-1 bg-gray bg-opacity-25 border-0 text-black ">Feature</span>
									</div>
								</div>
		</button>
     `;
    }
    if(tasks[i].status == "In Progress"){
        PROGRESS.innerHTML += `
        <button class="card-body btn btn-white rounded-0 border-0 border-bottom p-2 d-flex ">
								<div class="mx-3 my-2 spinner-border  spinner-border-sm text-success" role="status">
									<span class="visually-hidden"></span> 
								</div>
								<div class="text-start">
									<div class="fw-bolder ">${tasks[i].title}</div>
									<div class="card-text">
										<div class="text-secondary">#${x} created in ${tasks[i].date}</div>
										<div class="fw-bold"" title="${tasks[i].description}">including as many details as possible.</div>
									</div>
									<div class="">
										<span class="btn btn-primary px-2 py-1 border-0 ">High</span>
										<span class="btn btn-primary px-2 py-1 bg-gray bg-opacity-25 border-0 text-black ">Feature</span>
									</div>
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
										<div class="fw-bold" title="${tasks[i].description}">as they can be helpful in reproducing the steps that ca...</div>
									</div>
									<div class="">
										<span class="btn btn-primary px-2 py-1 border-0">High</span>
										<span class="btn btn-primary px-2 py-1 bg-gray bg-opacity-25 border-0 text-black">Bug</span>
									</div>
								</div>
							</button>
        
        `
    }



}

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

function deleteTask() {
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