<?php
    //INCLUDE DATABASE FILE
    include('database.php');
    //SESSSION IS A WAY TO STORE DATA TO BE USED ACROSS MULTIPLE PAGES
    session_start();

    //ROUTING
    if(isset($_POST['save']))        saveTask();
    if(isset($_POST['update']))      updateTask();
    if(isset($_POST['delete']))      deleteTask();
    
    $sql = 'SELECT * FROM tasks';
    $result = mysqli_query( mysqli_connect("localhost","root","","youcodescrumboard") , $sql);
    $tasks = mysqli_fetch_all($result , MYSQLI_ASSOC);
    // print_r($tasks);
    
    function getTasks()
    {
        //CODE HERE
        //SQL SELECT
        // echo "Fetch all tasks";
    }
   

    function saveTask()
    {
        //CODE HERE
        //SQL INSERT
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
        $_SESSION['message'] = "Task has been deleted successfully !";
		header('location: index.php');
    }

?>