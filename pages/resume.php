<?php
  include '..\db\connect.php';
    session_start();
    if(!isset($_SESSION['user'])){
        header('location:login.php');
        exit();
    }
  if(isset($_POST['submit'])){
    $email = $_SESSION['email'];
    $errors=[];
    $array_not_null = 0;
    $stmt = $con->prepare("SELECT * FROM pesonnal_info WHERE email='$email'");
    $stmt->execute();
    $result = $stmt->get_result();
    $data = $result->fetch_assoc(); 
  if (!$data){
    $errors[] = "problem accured !!";
  }
  else{
    // $avatar=$_POST['avatar'];
    $NOM=$data['last_name'];
    $PRENOM=$data['first_name'];
    $WORK=$data['title'];
    $ADRESSE=$data['adress'];
    $COUNTRY=$data['pays'];
    $NUMBERTELE=$data['phone_number'];
    $EMAIL=$data['email'];
    // $SiteWeb=$_POST['SiteWeb'];
    $SKILL1=$_POST['SKILL1'];
    $PSKILL1=$_POST['PSKILL1'];
    $SKILL2=$_POST['SKILL2'];
    $PSKILL2=$_POST['PSKILL2'];
    $SKILL3=$_POST['SKILL3'];
    $PSKILL3=$_POST['PSKILL3'];
    $SKILL4=$_POST['SKILL4'];
    $PSKILL4=$_POST['PSKILL4'];
    $SKILL5=$_POST['SKILL5'];
    $PSKILL5=$_POST['PSKILL5'];
    $Facebook=$_POST['Facebook'];
    $Twiter=$_POST['Twiter'];
    // $Youtube=$_POST['Youtube'];
    $Linkedin=$_POST['Linkedin'];
    $Objective=$data['objective'];
    $Entreprise1=$_POST['Entreprise1'];
    $Active1=$_POST['Active1'];
    $Entreprise2=$_POST['Entreprise2'];
    $Active2= isset($_POST['Active2']) ? $_POST['Active2'] : NULL;
    $Entreprise3=$_POST['Entreprise3'];
    $Active3= isset($_POST['Active3']) ? $_POST['Active3'] : NULL;
    $Etablissement1=$_POST['Etablissement1'];
    $Educ1=$_POST['Educ1'];
    $Etablissement2=$_POST['Etablissement2'];
    $Educ2=$_POST['Educ2'];
    $Hobby1=$_POST['Hobby1'];
    $Hobby2=$_POST['Hobby2'];
    $Hobby3=$_POST['Hobby3'];
    $Hobby4=$_POST['Hobby4'];
    $StartDate1 = $_POST['startDate1'];
    $StartDate2 = $_POST['startDate2'];
    $StartDate3 = $_POST['startDate3'];
    $StartDate4 = $_POST['startDate4'];
    $StartDate5 = $_POST['startDate5'];
    $EndDate1 = $_POST['endDate1'];
    $EndDate2 = $_POST['endDate2'];
    $EndDate3 = $_POST['endDate3'];
    $EndDate4 = $_POST['endDate4'];
    $EndDate5 = $_POST['endDate5'];
    
}
for($i = 0;$i < count($errors);$i++){
  if($errors[$i] != NULL){
      $array_not_null = 1;
  }
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/resume.css">
    <title>CV</title>
</head>
<body>

<!-- NAVBAR -->
<?php 
        include '../navfoot/navbar.php'; 
    ?>
<!-- //////////////////////////////////////////////////  -->

<?php 
        if (isset($errors)){
            if($array_not_null){
                echo "<p>Problem in Login!</p><br>";
            }
        }
    ?>

<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>

<div class="resume">
   <div class="resume_left">
     <div class="resume_profile">
       <!-- <img src="Screenshot_2022.10.14_18.30.04.581.png" alt="images"> -->
     </div>
     <div class="resume_content">
       <div class="resume_item resume_info">
         <div class="title">
           <p class="bold"><?php echo $NOM.'<br>'.$PRENOM ; ?></p>
           <p class="regular"><?php echo  $WORK; ?></p>
         </div>
         <ul>
           <li>
             <div class="icon">
               <i class="fas fa-map-signs"></i>
             </div>
             <div class="data">
              <?php echo $ADRESSE; ?> <br /><?php echo $COUNTRY; ?>
             </div>
           </li>
           <li>
             <div class="icon">
               <i class="fas fa-mobile-alt"></i>
             </div>
             <div class="data">
               <?php echo $NUMBERTELE; ?>
             </div>
           </li>
           <li>
             <div class="icon">
               <i class="fas fa-envelope"></i>
             </div>
             <div class="data">
               <?php echo $EMAIL; ?>
             </div>
           </li>
           
           <!-- <?php #if(!empty($SiteWeb)){?>
           
           <li>
             <div class="icon">
               <i class="fab fa-weebly"></i>
             </div>
             <div class="data">
               <?php #echo $SiteWeb; ?>
             </div>
           </li>
           <?php #}?> -->
         </ul>
       </div>
       <div class="resume_item resume_skills">
         <div class="title">
           <p class="bold">skill's</p>
         </div>
         <ul>
           <li>
             <div class="skill_name">
               <?php echo $SKILL1 ?>
             </div>
             <div class="skill_progress">
               <span style="width: <?php echo$PSKILL1.'%';?>"></span>
             </div>
             <div class="skill_per"><?php echo $PSKILL1.'%' ?></div>
           </li>
           <li>
             <div class="skill_name">
             <?php echo $SKILL2 ?>
             </div>
             <div class="skill_progress">
               <span style="width: <?php echo$PSKILL2.'%';?>"></span>
             </div>
             <div class="skill_per"><?php echo $PSKILL2.'%'; ?></div>
           </li>
           <li>
             <div class="skill_name">
             <?php echo $SKILL3 ?>

             </div>
             <div class="skill_progress">
               <span style="width: <?php echo $PSKILL3.'%';?>"></span>
             </div>
             <div class="skill_per"><?php echo $PSKILL3.'%'; ?></div>
           </li>
           <li>
             <div class="skill_name">
             <?php echo $SKILL4 ?>

             </div>
             <div class="skill_progress">
               <span style="width: <?php echo$PSKILL4.'%';?>"></span>
             </div>
             <div class="skill_per"><?php echo $PSKILL4.'%'; ?></div>
           </li>
           <li>
             <div class="skill_name">
             <?php echo $SKILL5 ?>

             </div>
             <div class="skill_progress">
               <span style="width: <?php echo$PSKILL5.'%';?>"></span>
             </div>
             <div class="skill_per"><?php echo $PSKILL5.'%'; ?></div>
           </li>
         </ul>
       </div>
       <div class="resume_item resume_social">
         <div class="title">
           <p class="bold">Social</p>
         </div>
         <ul>
           <li>
             <div class="icon">
               <i class="fab fa-facebook-square"></i>
             </div>
             <div class="data">
               <p class="semi-bold">Facebook</p>
               <p><?php echo $Facebook; ?></p>
             </div>
           </li>
           <li>
             <div class="icon">
               <i class="fab fa-twitter-square"></i>
             </div>
             <div class="data">
               <p class="semi-bold">Twitter</p>
               <p><?php echo $Twiter; ?></p>
             </div>
           </li>
           
           <li>
             <div class="icon">
               <i class="fab fa-linkedin"></i>
             </div>
             <div class="data">
               <p class="semi-bold">Linkedin</p>
               <p><?php echo $Linkedin; ?></p>
             </div>
           </li>
         </ul>
       </div>
     </div>
  </div>
  <div class="resume_right">
    <div class="resume_item resume_about">
        <div class="title">
           <p class="bold">Objective</p>
         </div>
        <p><?php echo $Objective; ?></p>
    </div>
    <div class="resume_item resume_work">
        <div class="title">
           <p class="bold">Work Experience</p>
         </div>
        <ul>
            <li>
                <div class="date"><?php echo date('Y', strtotime($StartDate1)) . '-' . date('Y', strtotime($EndDate1)) ?></div> 
                <div class="info">
                     <p class="semi-bold"><?php echo  $Entreprise1 ?></p> 
                <p><?php echo $Active1; ?></p>
                </div>
            </li>
            <?php if(!empty($Active2)){?>
            <li>
              <div class="date"><?php echo date('Y', strtotime($StartDate2)) . '-' . date('Y', strtotime($EndDate2)) ?></div>
              <div class="info">
              <p class="semi-bold"><?php echo  $Entreprise2 ?></p>  
                  <p><?php echo $Active2; ?></p>
                </div>
            </li>
            <?php }?>
            <?php if(!empty($Active3)){?>
            <li>
              <div class="date"><?php echo date('Y', strtotime($StartDate3)) . '-' . date('Y', strtotime($EndDate3)) ?></div>
              <div class="info">
              <p class="semi-bold"><?php echo  $Entreprise3 ?></p>  
                  <p><?php echo $Active3; ?></p>
                </div>
            </li>
            <?php } ?>
        </ul>
    </div>
    <div class="resume_item resume_education">
      <div class="title">
           <p class="bold">Education</p>
         </div>
      <ul>
            <li>
                <div class="date"><?php echo date('Y', strtotime($StartDate4)) . '-' . date('Y', strtotime($EndDate4)) ;?></div> 
                <div class="info">
                     <p class="semi-bold"><?php echo $Etablissement1; ?></p> 
                  <p><?php echo $Educ1 ?></p>
                </div>
            </li>
            <?php if(!(empty($StartDate5) && empty($EndDate5))){ ?>
            <li>
              <div class="date"><?php echo date('Y', strtotime($StartDate5)) . '-' . date('Y', strtotime($EndDate5)) ;?></div>
              <div class="info">
              <p class="semi-bold"><?php echo $Etablissement2 ;?></p> 
                  <p><?php echo $Educ2 ?></p>
                </div>
            </li>
            <?php } ?>
        </ul>
    </div>
    <div class="resume_item resume_hobby">
      <div class="title">
           <p class="bold">Hobby</p>
         </div>
       <ul>
         <li><i class=""><?php echo $Hobby1 ?></i></li>
         <li><i class=""><?php echo $Hobby2 ?></i></li>
         <li><i class=""><?php echo $Hobby3 ?></i></li>
         <li><i class=""><?php echo $Hobby4 ?></i></li>
      </ul>
    </div>
  </div>
</div>

<!-- //////////////////////////////////////////////////  -->
<!-- FOOTER -->
<?php
        include '../navfoot/footer.php';
    ?>
</body>
</html>