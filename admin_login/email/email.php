<?php

session_start();
ob_start();

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="utf-8" />
    <title>RMK HIRING SYNERGY</title>

    <meta name="description" content="overview &amp; stats" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

    <!-- bootstrap & fontawesome -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../assets/font-awesome/4.5.0/css/font-awesome.min.css" />


    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>


    <!--button-navigation-->
    <script type="text/javascript">
        function myfuncreport() {
            location.href = "../reports/reports.php";

        }
        function myfuncadmin() {
            location.href = "../admin_panel/admin_panel.php";

        }
        function myfuncjobs() {
            location.href = "../jobs/jobs_panel.php";

        }
        function myfuncsettings() {
            location.href = "../settings.php";

        }



    </script>






    <!-- page specific plugin styles -->

    <link rel="stylesheet" href="../assets/css/jquery-ui.custom.min.css" />
    <link rel="stylesheet" href="../assets/css/chosen.min.css" />
    <link rel="stylesheet" href="../assets/css/bootstrap-datepicker3.min.css" />
    <link rel="stylesheet" href="../assets/css/bootstrap-timepicker.min.css" />
    <link rel="stylesheet" href="../assets/css/daterangepicker.min.css" />
    <link rel="stylesheet" href="../assets/css/bootstrap-datetimepicker.min.css" />
    <link rel="stylesheet" href="../assets/css/bootstrap-colorpicker.min.css" />
    <link rel="stylesheet" href="../assets/css/ace-part2.min.css" />





    <!-- text fonts -->
    <link rel="stylesheet" href="../assets/css/fonts.googleapis.com.css" />

    <!-- ace styles -->
    <link rel="stylesheet" href="../assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

    <!--[if lte IE 9]>
    <link rel="stylesheet" href="../assets/css/ace-part2.min.css" class="ace-main-stylesheet"/>
    <![endif]-->
    <link rel="stylesheet" href="../assets/css/ace-skins.min.css" />
    <link rel="stylesheet" href="../assets/css/ace-rtl.min.css" />

    <!--[if lte IE 9]>
    <link rel="stylesheet" href="../assets/css/ace-ie.min.css"/>
    <![endif]-->

    <!-- inline styles related to this page -->

    <!-- ace settings handler -->
    <script src="../assets/js/ace-extra.min.js"></script>

    <!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

    <!--[if lte IE 8]>
    <script src="../assets/js/html5shiv.min.js"></script>
    <script src="../assets/js/respond.min.js"></script>
    <![endif]-->
</head>

<body class="no-skin">
<div id="navbar" class="navbar navbar-default          ace-save-state">
    <div class="navbar-container ace-save-state" id="navbar-container">
        <button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
            <span class="sr-only">Toggle sidebar</span>

            <span class="icon-bar"></span>

            <span class="icon-bar"></span>

            <span class="icon-bar"></span>
        </button>
        <div class="navbar-header pull-left">
            <a href="email.php" class="navbar-brand">
                <small>
                    <i class=""></i>
                    <?php

                    $database=$_SESSION['database_name'];

                    if(preg_match('/rmd_database/', $database)){
                        ?>
                        <img src="../images/rmd.jpg" style="height: 25px;">
                        <label style="font-size: large;">RMD Engineering College  </label>

                        <?php
                    }

                    if(preg_match('/rmk_database/', $database)){
                        ?>
                        <img src="../images/rmk.jpg" style="height: 25px;">
                        <label style="font-size: large;">RMK Engineering College </label>

                        <?php
                    }

                    if(preg_match('/rmkcet_database/', $database)){
                        ?>
                        <img src="../images/rmkcet.jpg" style="height: 25px;">
                        <label style="font-size: large;">RMK College of Engineering and Technology </label>

                        <?php
                    }


                    ?>
                </small>
            </a>
        </div>
        <div class="navbar-buttons navbar-header pull-right" role="navigation">
            <ul class="nav ace-nav">
                <li class="purple dropdown-modal">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">



                        <?php


                        include "../connect.php";
                        $query_table = "SELECT * FROM table_map";
                        $result_table = mysqli_query($connect, $query_table);

                        $no_notification=0;
                        while ($row = mysqli_fetch_assoc($result_table)) {
                            $tname = $row['table_name'];
                            $query_year = "SELECT * from $tname WHERE NOT  st_changephone='' OR NOT st_changemail=''";
                            $result_year = mysqli_query($connect, $query_year);

                            $no_notification  = $no_notification + mysqli_num_rows($result_year);


                        }



                        ?>











                        <i class="ace-icon fa fa-bell icon-animated-bell"></i>
                        <span class="badge badge-important"><?php echo $no_notification ?></span>
                    </a>

                    <ul class="dropdown-menu-right dropdown-navbar navbar-pink dropdown-menu dropdown-caret dropdown-close">
                        <li class="dropdown-header">
                            <i class="ace-icon fa fa-exclamation-triangle"></i>
                            <?php echo $no_notification ?> Notifications
                        </li>


                        <li class="dropdown-content">


                            <ul class="dropdown-menu dropdown-navbar navbar-pink">

                                <?php



                                include "../connect.php";
                                $query_table = "SELECT * FROM table_map";
                                $result_table = mysqli_query($connect, $query_table);

                                while ($row = mysqli_fetch_assoc($result_table)) {
                                    $tname = $row['table_name'];
                                    $query_year = "SELECT * from $tname";
                                    $result_year = mysqli_query($connect, $query_year);

                                    $no_notification=mysqli_num_rows($result_year);


                                    while ($row1 = mysqli_fetch_assoc($result_year)) {


                                        if ($row1['st_changemail'] != NULL || $row1['st_changephone']!= NULL) {


                                            ?>

                                            <li>
                                                <a href="../approve.php?roll=<?php  echo $row1['st_roll']; ?>">
                                                    <div class="clearfix">

		             <span class="pull-left">
			               <i class="btn btn-xs no-hover btn-pink fa fa-comment"></i>
                         <?php  $content= $row1['st_roll'] ;
                         $content.= "," ;
                         $content.= $row1['st_name'];

                         $content.= " has  requested for the change of";

                         if ($row1['st_changemail'] != NULL) {
                             $content.= " Email id : ";
                             $content.=$row1['st_email'];

                             $content.="to : ";
                             $content.=$row1['st_changemail'];



                         }

                         if($row1['st_changephone'] != NULL && $row1['st_changemail'] != NULL ){


                             $content.= " and  ";

                         }






                         if($row1['st_changephone'] != NULL) {



                             $content.= " Phone No : ";
                             $content.= $row1['st_phone'];

                             $content.= "to : ";
                             $content.= $row1['st_changephone'] ;
                         }




                         echo substr($content, 0,25)."......";


                         ?>


                         </p>
				</span>


                                                    </div>
                                                </a>
                                            </li>




                                            <?php
                                        }


                                    }


                                }


                                ?>




                            </ul>
                        </li>
                        <li class="dropdown-footer">
                            <a href="../approve.php">
                                See all notifications
                                <i class="ace-icon fa fa-arrow-right"></i>
                            </a>
                        </li>
                    </ul>
                </li>



                <li class="light-blue dropdown-modal">
                    <a data-toggle="dropdown" href="#" class="dropdown-toggle">

                        <?php
                        include "../connect.php";
                        $name=$_SESSION['user'];

                        $query="select * from login_admin where username='{$name}'";




                        $result=mysqli_query($connect,$query);

                        if(!$result){


                            mysqli_error($connect);
                        }

                        while($row=mysqli_fetch_assoc($result)){



                            ?>


                            <img class="nav-user-photo" src="../images/<?php echo $row['admin_pic']; ?>" alt="Jason's Photo" />
                        <?php } ?>
                        <span class="user-info">
									<small>Welcome,</small>
									Admin
								</span>

                        <i class="ace-icon fa fa-caret-down"></i>
                    </a>

                    <ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
                        <li>
                            <a href="#">
                                <i class="ace-icon fa fa-cog"></i>
                                Settings
                            </a>
                        </li>

                        <li>
                            <a href="../profile/profile.php">
                                <i class="ace-icon fa fa-user"></i>
                                Profile
                            </a>
                        </li>

                        <li class="divider"></li>

                        <li>
                            <a href="../../login_out/logout.php">
                                <i class="ace-icon fa fa-power-off"></i>
                                Logout
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div><!-- /.navbar-container -->
</div>

<div class="main-container ace-save-state" id="main-container">
    <script type="text/javascript">
        try{ace.settings.loadState('main-container')}catch(e){}
    </script>

    <div id="sidebar" class="sidebar                  responsive                    ace-save-state">
        <script type="text/javascript">
            try{ace.settings.loadState('sidebar')}catch(e){}
        </script>

        <div class="sidebar-shortcuts" id="sidebar-shortcuts">
            <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">



                <button class="btn btn-success"  onclick="myfuncreport()" id="myButton1" >

                    <i class="ace-icon fa fa-signal" ></i>


                </button>


                <button class="btn btn-info"  onclick="myfuncadmin()" id="myButton2">
                    <i class="ace-icon fa fa-pencil"></i>
                </button>

                <button class="btn btn-warning"  onclick="myfuncjobs()" id="myButton3">
                    <i class="ace-icon fa fa-users"></i>
                </button>

                <button class="btn btn-danger"  onclick="myfuncsettings()" id="myButton4">
                    <i class="ace-icon fa fa-cogs"></i>
                </button>




            </div>

            <div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
                <span class="btn btn-success"></span>

                <span class="btn btn-info"></span>

                <span class="btn btn-warning"></span>

                <span class="btn btn-danger"></span>
            </div>
        </div><!-- /.sidebar-shortcuts -->

        <ul class="nav nav-list">
            <li class="">
                <a href="../index.php">
                    <i class="menu-icon fa fa-tachometer"></i>
                    <span class="menu-text"> Dashboard </span>
                </a>

                <b class="arrow"></b>
            </li>

            <li class="">
                <a href="../profile/profile.php" >
                    <i class="menu-icon fa fa-user"></i>
                    <span class="menu-text">
							Your Profile
							</span>


                </a>

                <b class="arrow"></b>


            </li>

            <li class="">
                <a href="../settings.php" >
                    <i class="menu-icon fa fa-list"></i>
                    <span class="menu-text"> Settings </span>


                </a>

                <b class="arrow"></b>


            </li>

            <li class="">
                <a href="../admin_panel/admin_panel.php" >
                    <i class="menu-icon fa fa-pencil-square-o"></i>
                    <span class="menu-text"> Admin Panel </span>


                </a>

                <b class="arrow"></b>


            </li>

            <li class="">
                <a href="../approve.php">
                    <i class="menu-icon fa fa-list-alt"></i>
                    <span class="menu-text"> Approve </span>
                </a>

                <b class="arrow"></b>


            </li>




            <li>
                <a href="#" class="dropdown-toggle">
                    <i class="menu-icon fa fa-briefcase"></i>
                    <span class="menu-text"> Jobs </span>

                    <b class="arrow fa fa-angle-down"></b>
                </a>

                <b class="arrow"></b>

                <ul class="submenu">
                    <li class="">
                        <a href="../jobs/view_jobs.php">
                            <i class="menu-icon fa fa-caret-right"></i>
                            View all Jobs
                        </a>

                        <b class="arrow"></b>
                    </li>

                    <li class="">
                        <a href="../jobs/post_jobs.php">
                            <i class="menu-icon fa fa-caret-right"></i>
                            Post Job
                        </a>

                        <b class="arrow"></b>
                    </li>

                    <li class="">
                        <a href="../jobs/jobs_panel.php">
                            <i class="menu-icon fa fa-caret-right"></i>
                            Jobs Panel
                        </a>

                        <b class="arrow"></b>
                    </li>

                </ul>

            </li>


            <li class="">
                <a href="../reports/reports.php">

                    <i class="menu-icon fa fa-bar-chart"></i>

                    <span class="menu-text"> Reports </span>
                </a>

                <b class="arrow"></b>
            </li>




            <li class="">
                <a href="#" class="dropdown-toggle">
                    <i class="menu-icon fa fa-laptop"></i>
                    <span class="menu-text"> Companies </span>

                    <b class="arrow fa fa-angle-down"></b>
                </a>

                <b class="arrow"></b>

                <ul class="submenu">
                    <li class="">
                        <a href="../company/create_company.php">
                            <i class="menu-icon fa fa-caret-right"></i>
                            Create Company
                        </a>

                        <b class="arrow"></b>
                    </li>

                    <li class="">
                        <a href="../company/companies.php">
                            <i class="menu-icon fa fa-caret-right"></i>
                            View Companies
                        </a>

                        <b class="arrow"></b>
                    </li>
                    <li class="">
                        <a href="../company/companies.php">
                            <i class="menu-icon fa fa-caret-right"></i>
                            Company Panel
                        </a>

                        <b class="arrow"></b>
                    </li>


                </ul>
            </li>

            <li class="active open">
                <a href="#" class="dropdown-toggle">
                    <i class="menu-icon fa fa-tag"></i>
                    <span class="menu-text"> More Pages </span>

                    <b class="arrow fa fa-angle-down"></b>
                </a>

                <b class="arrow"></b>

                <ul class="submenu">
                    <li class="">
                        <a href="../search/advanced_search.php">
                            <i class="menu-icon fa fa-caret-right"></i>
                            Advanced Search
                        </a>

                        <b class="arrow"></b>
                    </li>
                    <li class="active">
                        <a href="email.php">
                            <i class="menu-icon fa fa-caret-right"></i>
                            Email
                        </a>

                        <b class="arrow"></b>
                    </li>

                    <li class="">
                        <a href="../inbox.php">
                            <i class="menu-icon fa fa-caret-right"></i>
                            Inbox
                        </a>

                        <b class="arrow"></b>
                    </li>






                </ul>
            </li>


        </ul><!-- /.nav-list -->

        <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
            <i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
        </div>
    </div>

    <div class="main-content">
        <div class="main-content-inner">
            <div class="breadcrumbs ace-save-state" id="breadcrumbs">
                <ul class="breadcrumb">
                    <li>
                        <i class="ace-icon fa fa-home home-icon"></i>
                        <a href="../../index.html">Home</a>
                    </li>
                    <li class="active">Email</li>
                </ul><!-- /.breadcrumb -->
                <!-- /.nav-search -->
            </div>

            <div class="page-content">




                <!-- PAGE CONTENT BEGINS -->

                <?php



                if(isset($_POST['send'])){




                    $to=$_POST['recipient'];
                    /*
                    $to=$_POST['recipient'];

                    $subject= $_POST['subject'];

                    $message='<h3>'.$_POST['message'].'<h3>';

                    $headers="From: RMD Placements<karthickakash17@gmail.com>\r\n";
                    $headers.="Reply-To: karthickakash17@gmail.com\r\n";
                    $headers.="Content-type: text/html\r\n";

                    mail($to,$subject,$message,$headers);
                    */

                    $send_file=array();
                    if(isset($_FILES['attachment'])){






                        $count= count($_FILES['attachment']['name']);


                        for ($i=0;$i<$count;$i++) {

                            $file_name = $_FILES['attachment']['name'][$i];
                            $file_size = $_FILES['attachment']['size'][$i];
                            $file_tmp = $_FILES['attachment']['tmp_name'][$i];
                            $file_type = $_FILES['attachment']['type'][$i];



                            $value = explode('.',$file_name);




                            $file_ext=strtolower(end($value));

                            $newfilename = $file_name.'_'.time() . '.' . $file_ext;


                            move_uploaded_file($file_tmp,"files/".$newfilename);

                            $send_file[]=$newfilename;









                        }












                    }







                    require "PHPMailer/PHPMailerAutoload.php";

                    $mail=new PHPMailer();

                    $mail->isSMTP();
                    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
                    $mail->SMTPAuth = true;                               // Enable SMTP authentication
                    $mail->Username = 'dhoni.singh1703@gmail.com';                 // SMTP username
                    $mail->Password = 'akash170397';                           // SMTP password
                    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
                    $mail->Port = 465;


                    $mail->setFrom('dhoni.singh1703@gmail.com', 'RMD Placements');
                    $mail->addAddress($to, $to);     // Add a recipient

                    $mail->addReplyTo('dhoni.singh1703@gmail.com', 'Reply');


                    if(isset($_FILES['attachment'])){

                        foreach ($send_file as $file_to_send){


                            $mail->addAttachment('files/'.$file_to_send, $file_to_send);

                        }




                    }


                    $mail->isHTML(true);

                    $mail->Subject = $_POST['subject'];
                    $mail->Body    = '<h3> '.$_POST['message'].' </h3>';



                    if(!$mail->send()) {


                        ?>

                        <div class="alert alert-block alert-danger">
                            <button type="button" class="close" data-dismiss="alert">
                                <i class="ace-icon fa fa-times"></i>
                            </button>

                            <i class="ace-icon fa fa-times red"></i>

                            Your mail to
                            <strong class="red">
                                <?php echo $to ?>

                            </strong>,

                            has been failed to send, check the Recipient mail address.....
                        </div>


                        <?php

                    } else {

                        ?>



                        <div class="alert alert-block alert-success">
                            <button type="button" class="close" data-dismiss="alert">
                                <i class="ace-icon fa fa-times"></i>
                            </button>

                            <i class="ace-icon fa fa-check green"></i>

                            Your mail to
                            <strong class="green">
                                <?php echo $to ?>

                            </strong>,

                            has been sent Successfully
                        </div>



                        <?php

                    }


                    if(isset($_FILES['attachment'])){

                        foreach ($send_file as $file_sent){

                            unlink("files/$file_sent");



                        }



                    }







                }








                ?>














                <div class="row">
                    <div class="col-xs-12">
                        <div class="tabbable">
                            <ul id="inbox-tabs" class="inbox-tabs nav nav-tabs padding-16 tab-size-bigger tab-space-1">



														<span class="purple no-border bigger-240 center" style=" border-radius: 5px; background-color: #9B59B6 ;">
															<i class="ace-icon fa fa-envelope smaller-70 white middle align-center " style="padding-left: 10px; "></i>
															<span class=" white smaller-60 middle align-center " style="padding-right: 10px; " > Write Mail</span>
														</span>

                                <!-- /.li-new-mail -->

                                <!-- /.dropdown -->
                            </ul>

                            <!-- /.tab-content -->
                        </div><!-- /.tabbable -->
                    </div><!-- /.col -->
                </div><!-- /.row -->

                <form id="id-message-form" action="email.php" method="post" class="active form-horizontal message-form col-xs-12" enctype="multipart/form-data">
                    <div>
                        <div class="form-group ">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-recipient">Recipient:</label>

                            <div class="col-sm-9">
												<span class="input-icon">
													<input type="email"  name="recipient" size="35"  id="form-field-recipient"  placeholder="user@gmail.com" />
													<i class="ace-icon fa fa-user"></i>
												</span>
                            </div>
                        </div>

                        <div class="hr hr-18 dotted"></div>


                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-subject">Subject:</label>

                            <div class="col-sm-6 col-xs-12">
                                <div class="input-icon block col-xs-12 no-padding">
                                    <input maxlength="100" type="text" class="col-xs-12" name="subject" id="form-field-subject" placeholder="Subject" />
                                    <i class="ace-icon fa fa-comment-o"></i>
                                </div>
                            </div>
                        </div>

                        <div class="hr hr-18 dotted"></div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right">
                                <span class="inline space-24 hidden-480"></span>
                                Message:
                            </label>


                            <div class="col-sm-9">
                                <div class="wysiwyg-editor" id="editor1"></div>
                            </div>
                        </div>

                        <div class="hr hr-18 dotted"></div>

                        <div class="form-group no-margin-bottom">
                            <label class="col-sm-3 control-label no-padding-right">Attachments:</label>

                            <div class="col-sm-9">
                                <div id="form-attachments">
                                    <input type="file" id="id-input-file-2" name="attachment[]" />
                                </div>
                            </div>
                        </div>

                        <div class="space"></div>



                        <div class="align-right">
                            <button id="id-add-attachment" type="button" class="btn btn-sm btn-danger">
                                <i class="ace-icon fa fa-paperclip bigger-140"></i>
                                Add Attachment
                            </button>
                        </div>

                        <div class="space"></div>
                        <div class="space"></div>

                        <div class="align-center">
                                            <span class="inline btn-send-message">
                                                <button type="submit" name="send" class="btn btn-sm btn-primary border btn-bold btn-round">
                                                    <span class="bigger-120">Send</span>
                                                        <i class="ace-icon fa fa-arrow-right icon-on-right"></i>
                                                </button>
                                            </span>
                        </div>
                        <div class="space"></div>
                    </div>
                </form>
                <!-- /.message-content -->

                <!-- PAGE CONTENT ENDS -->
            </div><!-- /.col -->
        </div>
        <!-- /.row -->
    </div><!-- /.page-content -->
</div>
</div><!-- /.main-content -->

<div class="footer">
    <div class="footer-inner">
        <div class="footer-content">
						<span class="bigger-120">
							<span class="blue bolder">RMK</span>
							Group of Institutions
						</span>
        </div>
    </div>
</div>

<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
    <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
</a>
</div><!-- /.main-container -->

<!-- basic scripts -->

<!--[if !IE]> -->
<script src="../assets/js/jquery-2.1.4.min.js"></script>

<!-- <![endif]-->

<!--[if IE]>
<script src="../assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->
<script type="text/javascript">
    if('ontouchstart' in document.documentElement) document.write("<script src='../assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
</script>
<script src="../assets/js/bootstrap.min.js"></script>

<!-- page specific plugin scripts -->
<script src="../assets/js/jquery-ui.custom.min.js"></script>
<script src="../assets/js/jquery.ui.touch-punch.min.js"></script>
<script src="../assets/js/chosen.jquery.min.js"></script>
<script src="../assets/js/spinbox.min.js"></script>
<script src="../assets/js/bootstrap-datepicker.min.js"></script>
<script src="../assets/js/bootstrap-timepicker.min.js"></script>
<script src="../assets/js/moment.min.js"></script>
<script src="../assets/js/daterangepicker.min.js"></script>
<script src="../assets/js/bootstrap-datetimepicker.min.js"></script>
<script src="../assets/js/bootstrap-colorpicker.min.js"></script>
<script src="../assets/js/jquery.knob.min.js"></script>
<script src="../assets/js/autosize.min.js"></script>
<script src="../assets/js/jquery.inputlimiter.min.js"></script>
<script src="../assets/js/jquery.maskedinput.min.js"></script>
<script src="../assets/js/bootstrap-tag.min.js"></script>
<script src="../assets/js/jquery-ui.custom.min.js"></script>
<script src="../assets/js/jquery.ui.touch-punch.min.js"></script>
<script src="../assets/js/markdown.min.js"></script>
<script src="../assets/js/bootstrap-markdown.min.js"></script>
<script src="../assets/js/jquery.hotkeys.index.min.js"></script>
<script src="../assets/js/bootstrap-wysiwyg.min.js"></script>
<script src="../assets/js/bootbox.js"></script>
<script src="../assets/js/bootstrap-tag.min.js"></script>
<script src="../assets/js/jquery.hotkeys.index.min.js"></script>
<script src="../assets/js/bootstrap-wysiwyg.min.js"></script>


<!-- ace scripts -->
<script src="../assets/js/ace-elements.min.js"></script>
<script src="../assets/js/ace.min.js"></script>

<!-- inline scripts related to this page -->
<script type="text/javascript">
    jQuery(function($){

        $('.message-form .wysiwyg-editor').ace_wysiwyg({
            toolbar:
                [
                    'bold',
                    'italic',
                    'strikethrough',
                    'underline',
                    null,
                    'justifyleft',
                    'justifycenter',
                    'justifyright',
                    null,
                    'createLink',
                    'unlink',
                    null,
                    'undo',
                    'redo'
                ]
        }).prev().addClass('wysiwyg-style1');


        $('#id-message-form').on('submit', function() {
            var hidden_input =
                $('<input type="hidden" name="message" />')
                    .appendTo('#id-message-form');

            var html_content = $('#editor1').html();
            hidden_input.val( html_content );
            //put the editor's HTML into hidden_input and it will be sent to server
        });



        //file input
        $('.message-form input[type=file]').ace_file_input()
            .closest('.ace-file-input')
            .addClass('width-90 inline')
            .wrap('<div class="form-group file-input-container"><div class="col-sm-7"></div></div>');

        //Add Attachment
        //the button to add a new file input
        $('#id-add-attachment')
            .on('click', function(){
                var file = $('<input type="file" name="attachment[]" />').appendTo('#form-attachments');
                file.ace_file_input();

                file.closest('.ace-file-input')
                    .addClass('width-90 inline')
                    .wrap('<div class="form-group file-input-container"><div class="col-sm-7"></div></div>')
                    .parent().append('<div class="action-buttons pull-right col-xs-1">\
							<a href="#" data-action="delete" class="middle">\
								<i class="ace-icon fa fa-trash-o red bigger-130 middle"></i>\
							</a>\
						</div>')
                    .find('a[data-action=delete]').on('click', function(e){
                    //the button that removes the newly inserted file input
                    e.preventDefault();
                    $(this).closest('.file-input-container').hide(300, function(){ $(this).remove() });
                });
            });

    });
</script>
</body>
</html>