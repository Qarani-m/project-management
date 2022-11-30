<?php
    
 if(!isset($_SESSION['username'])){
    session_start();
   }
 
 ?>



<link rel="stylesheet" href="../css/dash.css">
<div class="left">





    <div class="inner_left" id="inner_left">
        <form action="" method="post" enctype="multipart/form-data">
            <label for="chng_profile" class="label" id='label_'></label>
                <?php
                    $conn = new PDO("mysql:host=localhost;dbname=PROJECT","root","");
                    $reg = $_SESSION['login'];
                    $st = $conn->prepare("select name_img,mime,data from student_details where registration=?");
                    $st->bindParam(1,$reg);
;                    if($st->execute()){
                        while($row=$st->fetch()){
                            echo"
                            <img class='profile_image' src='data:".$row['mime'].";base64,".base64_encode($row['data'])."'width='200'/>
                           ";
                            }
                        }
                ?>
            </label>
            <input type="file" name="profile_pic" id="chng_profile">
            <button id='vvvv' type="submit" name="pro_pic"><img style="height:2vw;width:2vw;" src="../assets/arrow-right.svg"></button>
        </form>


<style>
    .chpwd{ 
    width: 10vw;
    height: 5vh;
    background-color: crimson;
    border: none;
    border-radius: 2vh;
    margin-top: 2vh;
    }
    .profile_image{
        border-radius:50%;
        height:40vh;
        width:40vh;
    }
    .username{
        background:crimson;
        border-radius:10px;
        padding-top:1vh;
        padding-bottom:1vh;
    }
    .label{
        padding:18vh;
        position:absolute;
        opacity: 0;
}
</style>
    </div>
    <h2 class="username"><?php echo $_SESSION['username'];?></h2>
    <a href="profile.php" id="btn"><button class="viewProfile">View profile</button></a>
    <p id="progress">
<?php
    echo"<script>window.location.href</script>";
$vall =0;
if(!round($_SESSION['completion'],2)){
    $vall = 0;
    echo $vall;
}else{
$vall= round($_SESSION['completion'],2);
echo $vall;
}
?> % complete
    </p>
</div>




<?php
if(isset($_POST['pro_pic'])){
$name = $_FILES['profile_pic']['name'];
$mime = $_FILES['profile_pic']['type'];
$data = file_get_contents($_FILES['profile_pic']['tmp_name']);
$reg= $_SESSION['login'];
$stmt =  $conn-> prepare("update student_details set name_img=?,mime=?,data=? where registration='$reg'");
$stmt ->bindParam(1,$name);
$stmt ->bindParam(2,$mime);
$stmt ->bindParam(3,$data);
if($stmt->execute()){
    echo"<script>window.location.href</script>";
}
}
?>


<script>
    var url="http://localhost/pr2/views/profile.php"
    if(window.location.href !=url){
        document.getElementById("label_").style.display='none';
        document.getElementById("vvvv").style.display='none';
    }
    if(window.location.href== "http://localhost/pr2/views/profile.php"){
        document.getElementById("btn").style.display='none';

    }
</script>