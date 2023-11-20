<?php

// include the configs / constants for the database connection
require_once("../config/db.php");
require_once("helpers/general.php");



$page_identity = "lawyers";

//authorization
if (!isAdminLoggedIn()){
    
    header("Location: ".ROOT_URL."admin/login.php");
    die();
}

$errors = array();
$messages = array();




$db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
// change character set to utf8 and check it
if (!$db_connection->set_charset("utf8")) {
    $errors[] = $db_connection->error;
}
if (!$db_connection->connect_errno) {
    
    if (isset($_POST["add_lawyer"])) {
        
   
    //server side validation starts here

    if(empty($_POST['lawyer_full_name'])){
    $errors[] = "Lawyer full name is required";
    }elseif (empty($_POST['lawyer_bioinfo'])){
        $errors[] = "Lawyer bioinfo is required";
    }elseif (empty($_POST['academic_ach'])){
        $errors[] = "Academic Achievements is required";
    }elseif (empty($_POST['practice_areas'])){
        $errors[] = "Practice areas are required";
    }elseif (empty($_POST['lawyer_email'])){
        $errors[] = "Please provide email address of lawyer.";
    }elseif (!filter_var($_POST['lawyer_email'], FILTER_VALIDATE_EMAIL)){
        $errors[] = "Enter valid Email Address.";
    }elseif (empty($_POST['lawyer_seq'])){
        $errors[] = "Please provide order number for this lawyer on the homepage.";
    }elseif (empty($_POST['lawyer_phone'])){
        $errors[] = "Please provide phone number.";
    }elseif (!preg_match('/^[0-9]+[0-9-]+[0-9]+$/D', $_POST['lawyer_phone'])){
        $errors[] = "Only digits and - are allowed in phone number e.g. 123-456-7890 or 1234567890";
    }
    
   
    //file uploading validation format
    
    if (!empty($_FILES['lawyer_image1']['name']) ){


        $fileName = $_FILES['lawyer_image1']['name'];
        $fileExtension = strtolower(end(explode('.',$fileName)));
        if (! in_array($fileExtension,IMAGE_FORMATS_ARRAY)) {
             $errors[] = "This image format is not allowed. Only jpg, jpeg, png, and gif are allowed.";

        }elseif ($_FILES['lawyer_image1']['size'] > MAX_IMAGE_SIZE) {

            $errors[] = "Maximum image file size must be ".MAX_IMAGE_SIZE." mb.";
            
        }

    }
    
    //cv uploading validation format
    if (!empty($_FILES['lawyer_cv']['name']) ){


        $fileName = $_FILES['lawyer_cv']['name'];
        $fileExtension = strtolower(end(explode('.',$fileName)));
        if (! in_array($fileExtension,CV_FORMATS_ARRAY)) {
             $errors[] = "This cv format is not allowed. Only pdf is allowed.";

        }elseif ($_FILES['lawyer_cv']['size'] > MAX_IMAGE_SIZE) {

            $errors[] = "Maximum cv file size must be ".MAX_IMAGE_SIZE." mb.";
            
        }

    }
    //contact info uploading validation format
    if (!empty($_FILES['lawyer_cinfo']['name']) ){


        $fileName = $_FILES['lawyer_cinfo']['name'];
        $fileExtension = strtolower(end(explode('.',$fileName)));
        if (! in_array($fileExtension,CI_FORMATS_ARRAY)) {
             $errors[] = "This contact info file format is not allowed. Only vcf is allowed.";

        }elseif ($_FILES['lawyer_cinfo']['size'] > MAX_IMAGE_SIZE) {

            $errors[] = "Maximum contact info file size must be ".MAX_IMAGE_SIZE." mb.";
            
        }

    }
   
   
        if (empty($errors)) {




                // escaping, additionally removing everything that could be (html/javascript-) code
                $lawyer_full_name = $db_connection->real_escape_string(strip_tags($_POST['lawyer_full_name'], ENT_QUOTES));
                $lawyer_phone = $db_connection->real_escape_string(strip_tags($_POST['lawyer_phone'], ENT_QUOTES));
                $lawyer_bioinfo = $db_connection->real_escape_string(strip_tags($_POST['lawyer_bioinfo'], ENT_QUOTES));
                $academic_ach = $db_connection->real_escape_string(strip_tags($_POST['academic_ach'], ENT_QUOTES));
                
                $professional_act = $db_connection->real_escape_string(strip_tags($_POST['professional_act'], ENT_QUOTES));
                $memberships = $db_connection->real_escape_string(strip_tags($_POST['memberships'], ENT_QUOTES));
                $awards  = $db_connection->real_escape_string(strip_tags($_POST['awards'], ENT_QUOTES));
                $lawyer_email  = $db_connection->real_escape_string(strip_tags($_POST['lawyer_email'], ENT_QUOTES));
                
                $lawyer_seq = $db_connection->real_escape_string(strip_tags($_POST['lawyer_seq'], ENT_QUOTES));
                $lawyer_status = $db_connection->real_escape_string(strip_tags($_POST['lawyer_status'], ENT_QUOTES));
                
                $new_file_name = "";
                $lawyer_cv_name = "";
                $lawyer_CIFile_name = "";
                
                $practice_areas = array();
                $practice_areas_string = "";
                for($i=0; $i < count($_POST['practice_areas']); $i++){
                    
                    $pracitce_area = $db_connection->real_escape_string(strip_tags($_POST['practice_areas'][$i], ENT_QUOTES));
                    if($i == 0){
                        
                        $practice_areas_string .= $pracitce_area;
                        
                    }else{
                        
                        $practice_areas_string = $practice_areas_string.",".$pracitce_area;
                        
                    }
                }
                
                //Image uploading part 
                if (!empty($_FILES['lawyer_image1']['name']) ){

                    $fileTmpName  = $_FILES['lawyer_image1']['tmp_name'];
                    $new_file_name = "lawyer_images/".time()."_".$db_connection->real_escape_string($_FILES['lawyer_image1']['name']);
                    $copy_file_path = "../images/".$new_file_name;
                    $didUpload = move_uploaded_file($fileTmpName, $copy_file_path);

                }
                
                //CV uploading part 
                if (!empty($_FILES['lawyer_cv']['name']) ){

                    $fileTmpName  = $_FILES['lawyer_cv']['tmp_name'];
                    $lawyer_cv_name = "lawyer_cvs/".$db_connection->real_escape_string($_FILES['lawyer_cv']['name']);
                    $copy_file_path = "../images/".$lawyer_cv_name;
                    move_uploaded_file($fileTmpName, $copy_file_path);

                }
                
                //Contact info file uploading part 
                if (!empty($_FILES['lawyer_cinfo']['name']) ){

                    $fileTmpName  = $_FILES['lawyer_cinfo']['tmp_name'];
                    $lawyer_CIFile_name = "lawyer_vcfs/".$db_connection->real_escape_string($_FILES['lawyer_cinfo']['name']);
                    $copy_file_path = "../images/".$lawyer_CIFile_name;
                    move_uploaded_file($fileTmpName, $copy_file_path);

                }
                    

                    $sql_lawyer_info = "INSERT INTO lawyers (lawyer_full_name, lawyer_phone, lawyer_bioinfo, academic_ach, practice_areas, professional_act, memberships, awards, lawyer_email, lawyer_image1, lawyer_cv, lawyer_vcf, lawyer_seq, lawyer_status       )
                            VALUES('" . $lawyer_full_name . "', '" . $lawyer_phone . "', '" . $lawyer_bioinfo. "', '" . $academic_ach. "', '" . $practice_areas_string. "', '" . $professional_act. "', '" . $memberships. "', '" . $awards. "', '" .$lawyer_email. "', '" .$new_file_name. "', '" .$lawyer_cv_name. "', '" .$lawyer_CIFile_name. "', '" .$lawyer_seq. "', '" .$lawyer_status."');";
                    $query_lawyer_info_insert = $db_connection->query($sql_lawyer_info);
                    if ($query_lawyer_info_insert) {


                        $messages[] = "Record Added Successfully.";
                        $_POST = array();

                    } else {
                            $errors[] = "Sorry, database server error. Please try again.";
                    }




        }
    }//form handler code ends here
    
    //fetching Law practices for drop down
    
    $sql_all_practices = "Select practice_id, practice_name  "
       
        . "from  law_practices "
        . "ORDER BY practice_name";
       
    $result_all_practices = $db_connection->query($sql_all_practices);
    
}else {
    
    $errors[] = "Sorry, no database connection.";
}


 


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title><?php echo ADMIN_TITLE; ?></title>

    <!-- Bootstrap core CSS -->
    <link href="../css/admin/bootstrap.min.css" rel="stylesheet">
    

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../css/admin/ie10-viewport-bug-workaround.css" rel="stylesheet">
    <link rel="stylesheet"  type="text/css" href="../css/admin/jquery-ui.min.css">

    <!-- Custom styles for this template -->
    <link href="../css/admin/dashboard.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../js/admin/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
<!--      header area starts-->
  <?php require_once("includes/admin_header.php"); ?>
<!--      header area ends-->
    <div class="container-fluid">
      <div class="row">
          <!-- left menu starts -->
        <?php require_once("includes/admin_left_menu.php"); ?>
          <!-- left menu ends -->
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Admin Dashboard</h1>
          
        <!-- Right section starts -->
        <div class="row-fluid">
				
            <div class="box span12 right-main-container-db" >

                                    <?php   
                                        if (!empty($errors)) {
                                        ?>    

                                            <div align="left" class="bg-warning">
                                                <ul>
                                                    <?php   
                                                       foreach ($errors as $error) {
                                                     ?> 

                                                    <li><?php echo $error;?></li>
                                                     <?php  
                                                        }
                                                     ?> 

                                                </ul>
                                            </div>
                                    <?php   
                                    }    
                                    ?>  
                                    <?php   
                                        if (!empty($messages)) {
                                        ?>    

                                            <div align="left" class="bg-success">
                                                <ul>
                                                    <?php   
                                                       foreach ($messages as $success) {
                                                     ?> 

                                                    <li><?php echo $success;?></li>
                                                     <?php  
                                                        }
                                                     ?> 

                                                </ul>
                                            </div>
                                    <?php   
                                    }    
                                    ?>    
                                    <!--box content area starts here-->
<!--                                    <div class="row  profile_info_line">
        	
                                    <div class="col-xs-12" >
                                        
                                        &nbsp;
                                        
                                    </div>
                                    
                                    </div>-->
                                     
                                        <div data-original-title="" class="box-header">
                                            <h3><i class="halflings-icon white list"></i><span class="break"></span><b class="student_db_heading">Add Lawyer:</b></h3>
                                        </div>
                                    <hr/>
                                    <div align="left">
                                        <form class="form-horizontal" method="post" action="" name="addLawyerForm" enctype="multipart/form-data" novalidate>
                                            
                                            <div class="form-group">
                                                <label for="lawyer_full_name" class="col-sm-2 control-label">Full Name*:</label>
                                                <div class="col-sm-5">
                                                    <input type="text" class="form-control" id="lawyer_full_name" name="lawyer_full_name"  value="<?php if (!empty($_POST['lawyer_full_name'])) echo $_POST['lawyer_full_name'];  ?>" required >
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="lawyer_email" class="col-sm-2 control-label">Email*:</label>
                                                <div class="col-sm-5">
                                                    <input type="text" class="form-control" id="lawyer_email" name="lawyer_email"  value="<?php if (!empty($_POST['lawyer_email'])) echo $_POST['lawyer_email'];  ?>" required >
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="lawyer_phone" class="col-sm-2 control-label">Phone*:</label>
                                                <div class="col-sm-5">
                                                    <input type="text" class="form-control" id="lawyer_phone" name="lawyer_phone"  value="<?php if (!empty($_POST['lawyer_phone'])) echo $_POST['lawyer_phone'];  ?>" required >
                                                    <small id="elementHelp" class="form-text text-muted">e.g. 123-456-7890</small>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="practice_areas" class="col-sm-2 control-label">Law Practices*:</label>
                                                <div class="col-sm-5">
                                                    
                                                    <select id="practice_areas" class="form-control" name="practice_areas[]" multiple="multiple" required>
                                                        
                                                        <?php
                                                        while ($practice_record = mysqli_fetch_assoc($result_all_practices)) {
                                                        ?>
                                                        
                                                            <option value="<?php echo $practice_record['practice_id']; ?>" <?php if ($practice_record['practice_id'] == $_POST["practice_areas"]) echo "selected";  ?>><?php echo $practice_record['practice_name']; ?></option>
                                                        <?php
                                                        }
                                                        ?> 
                                                    </select>
                                                    <small id="elementHelp" class="form-text text-muted">Hold on 'Ctrl' key to select multiple items.</small>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="lawyer_bioinfo" class="col-sm-2 control-label">Bio Info*:</label>
                                                <div class="col-sm-9">
                                                    <textarea class="form-control" name="lawyer_bioinfo" id="lawyer_bioinfo" rows="04" cols="60" required ><?php if (!empty($_POST['lawyer_bioinfo'])) echo $_POST['lawyer_bioinfo'];  ?></textarea>
                                                    
                                                </div>
                                            </div>
                                            
                                             
                                            <div class="form-group">
                                                <label for="academic_ach" class="col-sm-2 control-label">Academic Achievements*:</label>
                                                <div class="col-sm-9">
                                                    <textarea class="form-control" name="academic_ach" id="academic_ach" rows="04" cols="60" required ><?php if (!empty($_POST['academic_ach'])) echo $_POST['academic_ach'];  ?></textarea>
                                                    <small id="elementHelp" class="form-text text-muted">One item per line.</small>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="professional_act" class="col-sm-2 control-label">Professional Activities:</label>
                                                <div class="col-sm-9">
                                                    <textarea class="form-control" name="professional_act" id="professional_act" rows="04" cols="60"  ><?php if (!empty($_POST['professional_act'])) echo $_POST['professional_act'];  ?></textarea>
                                                    <small id="elementHelp" class="form-text text-muted">One item per line.</small>
                                                </div>
                                            </div>
                                            
                                            
                                            <div class="form-group">
                                                <label for="memberships" class="col-sm-2 control-label">Memberships:</label>
                                                <div class="col-sm-9">
                                                    <textarea class="form-control" name="memberships" id="memberships" rows="04" cols="60"  ><?php if (!empty($_POST['memberships'])) echo $_POST['memberships'];  ?></textarea>
                                                    <small id="elementHelp" class="form-text text-muted">One item per line.</small>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="awards" class="col-sm-2 control-label">Awards:</label>
                                                <div class="col-sm-9">
                                                    <textarea class="form-control" name="awards" id="awards" rows="04" cols="60"  ><?php if (!empty($_POST['awards'])) echo $_POST['awards'];  ?></textarea>
                                                    <small id="elementHelp" class="form-text text-muted">One item per line.</small>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="lawyer_seq" class="col-sm-2 control-label">Order*:</label>
                                                <div class="col-sm-2">
                                                    <input type="text" class="form-control" id="lawyer_seq" name="lawyer_seq"  value="<?php if (!empty($_POST['lawyer_seq'])) echo $_POST['lawyer_seq'];  ?>" required >
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="lawyer_status" class="col-sm-2 control-label">Lawyer Status*:</label>
                                                <div class="col-sm-5">
                                                    
                                                    <select id="lawyer_status" class="form-control" name="lawyer_status" required>
                                                        <option value="1" <?php if ($_POST['lawyer_status'] == "1" ) echo "selected";  ?>>Active</option>
                                                        <option value="0" <?php if ($_POST['lawyer_status'] == "0" ) echo "selected";  ?>>Inactive</option>
                                                        
                                                    </select>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="lawyer_image1" class="col-sm-2 control-label">Lawyer Image1:</label>
                                                <div class="col-sm-5">
                                                    
                                                    <input type="file" name="lawyer_image1" class="form-control-file"  aria-describedby="" >
                                                    <small id="elementHelp" class="form-text text-muted">Allowed image formats: jpg, jpeg, png, gif.</small>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="lawyer_cv" class="col-sm-2 control-label">Lawyer CV:</label>
                                                <div class="col-sm-5">
                                                    
                                                    <input type="file" name="lawyer_cv" id="lawyer_cv" class="form-control-file"  aria-describedby="" >
                                                    <small id="elementHelp" class="form-text text-muted">Allowed CV formats: pdf only.</small>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="lawyer_cinfo" class="col-sm-2 control-label">Lawyer Contact info:</label>
                                                <div class="col-sm-5">
                                                    
                                                    <input type="file" name="lawyer_cinfo" id="lawyer_cinfo" class="form-control-file"  aria-describedby="" >
                                                    <small id="elementHelp" class="form-text text-muted">Please upload contact info in vcf format.</small>
                                                </div>
                                            </div>
                                            
                                            
                                            

                                            <!--Dynamic rows creation ends-->
                                            <div class="form-group" >
                                            <div class="col-sm-10" align="center">
                                                <button type="submit" style="margin: 50px 0px 50px 0px;" class="btn btn-primary" name="add_lawyer" value="add lawyer">-ADD LAWYER-</button>
                                            </div>
                                          </div>
                                        
                                        </form>
                                    </div>
                                   
                                     
                                    
                                    
                                    
                                    
                    
				</div>
				
            <!--box content area ends here-->
				
            <?php require_once("includes/admin_footer.php"); ?>	
        </div>	<!-- Right section ends -->	
        
        
        

          
         
        </div>
      </div>
    </div>

  

     <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../js/admin/jquery-1.11.3.min.js"></script>
    <script src="../js/admin/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../js/admin/ie10-viewport-bug-workaround.js"></script>
   
   
    
  </body>
</html>
