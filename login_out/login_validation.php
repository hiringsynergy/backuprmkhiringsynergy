<?php

ob_start();
session_start();


if(isset($_POST['login'])){

//value initialization
    $connect=null;
    $student_branch=null;
    $student_table=null;
    $admin_database=null;
    $admin_name="initialize";
    $admin_password="initialize";
    $student_name="initialize";
    $student_password="initialize";
    $coordinator_name="initialize";
    $coordinator_password="initialize";



    $username=$_POST['username'];
    $password=$_POST['password'];

    $connect_database=mysqli_connect("localhost","root","","login_database");



    //selecting admin database........
    $query_selection="SELECT * FROM admin_login WHERE username='{$username}'";
    $result_selection=mysqli_query($connect_database, $query_selection);
    if(!$result_selection==null){
        $row_selection=mysqli_fetch_assoc($result_selection);
        $admin_database=$row_selection['database_name'];


        $connect=mysqli_connect("localhost","root","","$admin_database");

    }



    //selecting student database.........
    $student_user=$username[0].$username[1].$username[2].$username[3];
    if($student_user=='1115'){

        $database_session_set='rmd_database';
        $connect=mysqli_connect("localhost","root","","rmd_database");


    }
    else if($student_user=='1116'){

        $database_session_set='rmkcet_database';
        $connect=mysqli_connect("localhost","root","","rmkcet_database");

    }
    else if($student_user=='1117'){

        $database_session_set='rmk_database';
        $connect=mysqli_connect("localhost","root","","rmk_database");

    }




    // admin login

    $query_admin="SELECT * FROM login_admin WHERE username='{$username}'";
    $result_admin=mysqli_query($connect, $query_admin);
    if(!$result_admin==null){
        $row_admin=mysqli_fetch_assoc($result_admin);
        $admin_name=$row_admin['username'];
        $admin_password=$row_admin['password'];
    }


    //coordinator login

    $query_coordinator="SELECT * FROM login_coordinator WHERE username='{$username}'";
    $result_coordinator=mysqli_query($connect, $query_coordinator);
    if(!$result_coordinator==null){
        $row_coordinator=mysqli_fetch_assoc($result_coordinator);
        $coordinator_name=$row_coordinator['username'];
        $coordinator_password=$row_coordinator['password'];
        $coordinator_branch=$row_coordinator['cood_branch'];
    }





    //student login

    $isstudent=$username[4].$username[5];
    $isstudent+=4;

    $query_short="SELECT * FROM table_map WHERE table_short='{$isstudent}'";
    $result_short=mysqli_query($connect, $query_short);


    if(!$result_short==null){

        $row_short=mysqli_fetch_assoc($result_short);
        $student_table=$row_short['table_name'];
        $query_student="SELECT * FROM $student_table WHERE st_roll='{$username}'";
        $result_student=mysqli_query($connect, $query_student);


        if(!$result_student==null){
            $row_student=mysqli_fetch_assoc($result_student);

            $student_roll=$row_student['st_roll'];
            $student_name=$row_student['st_name'];
            $student_password=$row_student['st_pass'];
            $student_branch=$row_student['st_ugspecialization'];


        }




    }















    //admin validation
    if($admin_name==$username && $admin_password==$password){



        $_SESSION['database_name']=$admin_database;

        $_SESSION['user']=$username;

        header("Location: ../admin_login/index.php");
    }




    //coordinator validation

    else if($coordinator_name == $username && $coordinator_password == $password){



        $_SESSION['database_name']=$admin_database;

        $_SESSION['user']=$username;
        $_SESSION['cood_branch']=$coordinator_branch;



        header("Location: ../coordinator_login/index.php");
    }




    //student validation


    else if($student_roll == $username && $student_password==$password){







        $_SESSION['user'] = $username;

        $_SESSION['student_name']=$student_name;

        $_SESSION['student_roll']=$student_roll;
        $_SESSION['student_branch']=$student_branch;
        $_SESSION['table_name']=$student_table;
        $_SESSION['database_name']=$database_session_set;

        $graduation=explode('_',$student_table);

        $_SESSION['year_of_graduation']= end($graduation);


        header("Location: ../student_login/index.php");

    }


    else{
        header("Location: ../login.html");
    }





}



?>

