<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
session_start();
if (!isset($_SESSION["login"])){
    header("Location:index.php");
}
include "../partials/navbar.php";
include "../partials/side_bar.php";
include "../inc/config.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/dash.css">
  <link rel="icon" href="/favicon.ico?v=2" type="image/x-icon" />
  <title>Document</title>
</head>

<body style="">
  <div class="big">
 
    <body>
<?php
$sub= array();
$rev= array();
$file= array();
$log_session = $_SESSION['login'];
$sql1 = "select submitted,reviewed,file_name from status where reg_number = '$log_session';";
$results = mysqli_query($conn,$sql1);
$rows= mysqli_num_rows($results);
if(mysqli_num_rows($results) > 0){
    while($row = mysqli_fetch_assoc($results)){
        $submit = $row['submitted'];
        $review = $row['reviewed'];
        if(!in_array($row['file_name'],$file)){
            array_push($file,$row['file_name']);
        }
        array_push($sub,$submit);
        array_push($rev,$review);
    }
}
$len = count($sub);
$_SESSION['completion']=count($file)*100/6;
function get_ext($conn, $file,$file_cat){
  $reg = $_SESSION['login'];
  $sql = "select file_cat, mime from files where reg_number='$reg' and file_cat = '$file_cat';";
  $results = mysqli_query($conn,$sql);
  $ext_array1 = array();
  while($row = mysqli_fetch_assoc($results)){
    try{
    $ext_val = explode('-',$row['mime']);
    $explode_count= count($ext_val);
    if($explode_count>1){
      print_r($ext_val[1].' , ');
    }else{
      echo $row['mime'];
    }
    }catch(Exception $e){
      echo $e;  
    }
    }
  }
?>
      <div class="repos">
        <div class="sem1">
          <p>Semester 1</p>
          <div class="iner">
            <a href="" class="title">System Proposal,<?php $_SESSION['login']?></a>
            <p class="lang">&#x2022 <?php get_ext($conn,$file,'system_proposal');?></p>
            <div class="submit">
              <p>
                <?php
                        $value = "<p style='color:red'>Submitted</p>";
                           if(count($file)>0){
                            foreach ($file as $val) {
                                if($val =="system_proposal"){
                                    $value ="<p style='color:green'>Submitted</p>";
                                }
                            }
                        }
                        echo $value;
                         ?>
              </p>
              <p>Reviewed</p>
            </div>
          </div>
          <div class="iner">
            <a href="" class="title">System Requirements Specification</a>

            <p class="lang">&#x2022 <?php get_ext($conn,$file,'system_requirements');?></p>
            <div class="submit">
              <p>
                <?php
                        $value = "<p style='color:red'>Submitted</p>";
                           if(count($file)>0){
                            foreach ($file as $val) {
                              // echo $val ."-----:";
                                if($val =="system_requirements"){
                                    // $value = "Submitted";
                                    $value = "<p style='color:green'>Submitted</p>";
                                    // exit();
                                }
                            }
                        }
                        echo $value;
                         ?>
              </p>
              <p>Reviewed</p>
            </div>
          </div>
          <div class="iner">
            <a href="" class="title">System design Document</a>
            <p class="lang">&#x2022 <?php get_ext($conn,$file,'system_design');?></p>
            <div class="submit">
              <p style="">
                <?php
                        $value = "<p style='color:red'>Submitted</p>";
                           if(count($file)>0){
                            foreach ($file as $val) {
                                if($val =="system_design"){
                                    $value = "<p style='color:green'>Submitted</p>";
                                }
                            }
                        }
                        echo $value;
                         ?>
              </p>
              <p>Reviewed</p>
            </div>
          </div>
        </div>
        <div class="sem2">
          <p>Semester 2</p>
          <div class="iner">
            <a href="" class="title">Actual System Development</a>
            <p class="lang">&#x2022 <?php get_ext($conn,$file,'actual_sys');?></p>
            <div class="submit">
              <p>
                <?php
                        $value = "<p style='color:red'>Submitted</p>";
                           if(count($file)>0){
                            foreach ($file as $val) {
                                if($val =="actual_sys"){
                                    // $value = "Submitted";
                                    $value = "<p style='color:green'>Submitted</p>";
                                    // exit();
                                }
                            }
                        }
                        echo $value;
                         ?>
              </p>
              <p>Reviewed</p>
            </div>
          </div>
          <div class="iner">
            <a href="" class="title">Implementation & Testing</a>
            <p class="lang">&#x2022 <?php get_ext($conn,$file,'system_design');?></p>
            <div class="submit">
              <p>
                <?php
                        $value = "<p style='color:red'>Submitted</p>";
                           if(count($file)>0){
                            foreach ($file as $val) {
                                if($val =="implementation_testing"){
                                    $value = "<p style='color:green'>Submitted</p>";
                                }
                            }
                        }
                        echo $value;
                         ?>
              </p>
              <p>Reviewed</p>
            </div>

          </div>
          <div class="iner">
            <a href="" class="title">Final System Documentation</a>
            <p class="lang">&#x2022 <?php get_ext($conn,$file,'system_design');?></p>
            <div class="submit">
              <p>
                <?php
                        $value = "<p style='color:red'>Submitted</p>";
                           if(count($file)>0){
                            foreach ($file as $val) {
                                if($val =="documentation"){
                                    $value = "<p style='color:green'>Submitted</p>";
                                }
                            }
                        }
                        echo $value;
                         ?>
              </p>
              <p>Reviewed</p>
            </div>

          </div>
        </div>
      </div>
  </div>
  <script src="../js/dash.js"></script>
  <script>
    Window.onscro
  </script>
</body>
</html>