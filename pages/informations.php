


<?php
    session_start(); //démarrer une nouvelle session
    if(!isset($_SESSION['user'])){ //si l'utilisateur n'est pas connecté
        header('location:login.php'); //rediriger vers la page de connexion
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/informations.css">
    <title>Generate CV</title>
</head>
<body>

    <!-- NAVBAR -->
    <?php 
        include '../navfoot/navbar.php'; //inclusion de la barre de navigation
    ?>
    <center>
    <!-- CONTENU PRINCIPAL -->
    <form action="resume.php" method="POST" target="_blank">

        <h2>Compétences</h2>
    <h3>Compétence 1:</h3>
    <input type="text" name="SKILL1" placeholder="Compétence 1">  <!-- Champ pour entrer le nom de la compétence 1 -->
    <input type="number" name="PSKILL1" placeholder="?%">  <!-- Champ pour entrer le pourcentage de maîtrise de la compétence 1 -->

    <h3>Compétence 2:</h3>
    <input type="text" name="SKILL2" placeholder="Compétence 2">  <!-- Champ pour entrer le nom de la compétence 2 -->
    <input type="number" name="PSKILL2" placeholder="?%">  <!-- Champ pour entrer le pourcentage de maîtrise de la compétence 2 -->

    <h3>Compétence 3:</h3>
    <input type="text" name="SKILL3" placeholder="Compétence 3">  <!-- Champ pour entrer le nom de la compétence 3 -->
    <input type="number" name="PSKILL3" placeholder="?%">  <!-- Champ pour entrer le pourcentage de maîtrise de la compétence 3 -->

    <h3>Compétence 4:</h3>
    <input type="text" name="SKILL4" placeholder="Compétence 4">  <!-- Champ pour entrer le nom de la compétence 4 -->
    <input type="number" name="PSKILL4" placeholder="?%">  <!-- Champ pour entrer le pourcentage de maîtrise de la compétence 4 -->

    <h3>Compétence 5:</h3>
    <input type="text" name="SKILL5" placeholder="Compétence 5">  <!-- Champ pour entrer le nom de la compétence 5 -->
    <input type="number" name="PSKILL5" placeholder="?%">  <!-- Champ pour entrer le pourcentage de maîtrise de la compétence 5 -->


        <h2>Réseaux sociaux</h2>
    <input type="text" name="Facebook" placeholder="Lien de profil Facebook">  <!-- Champ pour entrer le lien de profil Facebook -->
    <input type="text" name="Twiter" placeholder="Lien de profil Twitter">  <!-- Champ pour entrer le lien de profil Twitter -->
    <input type="text" name="Linkedin" placeholder="Lien de profil LinkedIn">  <!-- Champ pour entrer le lien de profil LinkedIn -->



        <div class="block">

        

        <!-- <h2>Work Experience </h2>

        <input type="text" name="Entreprise1" placeholder="Name Entreprise">
        <label for="startDate">start date</label><input type="date" class="date2" name="startDate1" value="" >
        <label for="endDate">end date</label><input type="date"  name="endDate1" value="" >
        <textarea name="Active1" placeholder="Description"></textarea> -->

        <h2>Expériences professionnelles</h2>
    <h3>Expérience 1 :</h3>
    <input type="text" name="Entreprise1" placeholder="Nom de l'entreprise"> <!-- Champ pour entrer le nom de l'entreprise pour l'expérience 1 -->
    <label for="startDate">date de début</label><input type="date" class="date2" name="startDate1" value="" > <!-- Champ pour entrer la date de début de l'expérience 1 -->
    <label for="endDate">date de fin</label><input type="date"  name="endDate1" value="" > <!-- Champ pour entrer la date de fin de l'expérience 1 -->
    <textarea name="Active1" placeholder="Description"></textarea> <!-- Champ pour entrer une description de l'expérience 1 -->

        <!-- <input type="text" name="Entreprise2" placeholder="Name Entreprise">
        <label for="startDate">start date</label><input type="date" class="date2" name="startDate2" value="" >
        <label for="endDate">end date</label><input type="date"  name="endDate2" value="" >
        <textarea name="Active1" placeholder="Description"></textarea> -->
        <h3>Expérience 2 :</h3>
    <input type="text" name="Entreprise2" placeholder="Nom de l'entreprise"> <!-- Champ pour entrer le nom de l'entreprise pour l'expérience 2 -->
    <label for="startDate">date de début</label>
    <input type="date" class="date2" name="startDate2" value="" > <!-- Champ pour entrer la date de début de l'expérience 2 -->
    <label for="endDate">date de fin</label><input type="date"  name="endDate2" value="" > <!-- Champ pour entrer la date de fin de l'expérience 2 -->
    <textarea name="Active2" placeholder="Description"></textarea> <!-- Champ pour entrer une description de l'expérience 2 -->


        <!-- <input type="text" name="Entreprise3" placeholder="Name Entreprise">
        <label for="startDate">start date</label><input type="date" class="date2" name="startDate3" value="" >
        <label for="endDate">end date</label><input type="date"  name="endDate3" value="" >
        <textarea name="Active1" placeholder="Description"></textarea> -->

        <h3>Expérience 3 :</h3>
    <input type="text" name="Entreprise3" placeholder="Nom de l'entreprise"> <!-- Champ pour entrer le nom de l'entreprise pour l'expérience 3 -->
    <label for="startDate">date de début</label><input type="date" class="date2" name="startDate3" value="" > <!-- Champ pour entrer la date de début de l'expérience 3 -->
    <label for="endDate">date de fin</label><input type="date"  name="endDate3" value="" > <!-- Champ pour entrer la date de fin de l'expérience 3 -->
    <textarea name="Active3" placeholder="Description"></textarea> <!-- Champ pour entrer une description de l'expérience 3 -->



        <!-- <h2>Education </h2>
        <label for="startDate">start date</label><input type="date" class="date2" name="startDate4" value="" >
        <label for="endDate">end date</label><input type="date"  name="endDate4" value="" >
        <input type="text" name="Etablissement1" placeholder="Name Etablissement1">
        <textarea name="Educ1" placeholder="Description"></textarea>

        <label for="startDate">start date</label><input type="date" class="date2" name="startDate5" value="" >
        <label for="endDate">end date</label><input type="date"  name="endDate5" value="" >
        <input type="text" name="Etablissement2" placeholder="Name Etablissement1">
        <textarea name="Educ2" placeholder="Description"></textarea> -->

        <h2>Éducation</h2>
    <h3>Formation 1 :</h3>
    <label for="startDate">date de début</label><input type="date" class="date2" name="startDate4" value="" > <!-- Champ pour entrer la date de début de la formation 1 -->
    <label for="endDate">date de fin</label><input type="date"  name="endDate4" value="" > <!-- Champ pour entrer la date de fin de la formation 1 -->
    <input type="text" name="Etablissement1" placeholder="Nom de l'établissement"> <!-- Champ pour entrer le nom de l'établissement pour la formation 1 -->
    <textarea name="Educ1" placeholder="Description"></textarea> <!-- Champ pour entrer une description de la formation 1 -->


    <h3>Formation 2 :</h3>
    <label for="startDate">date de début</label><input type="date" class="date2" name="startDate5" value="" > <!-- Champ pour entrer la date de début de la formation 2 -->
    <label for="endDate">date de fin</label><input type="date"  name="endDate5" value="" > <!-- Champ pour entrer la date de fin de la formation 2 -->
    <input type="text" name="Etablissement2" placeholder="Nom de l'établissement"> <!-- Champ pour entrer le nom de l'établissement pour la formation 2 -->
    <textarea name="Educ2" placeholder="Description"></textarea> <!-- Champ pour entrer une description de la formation 2 -->


        <h2>HOBBY</h2>
        <input type="text" name="Hobby1" placeholder="Hobby1">
        <input type="text" name="Hobby2" placeholder="Hobby2">
        <input type="text" name="Hobby3" placeholder="Hobby3">
        <input type="text" name="Hobby4" placeholder="Hobby4">

        <button name="submit"  value="Envoyer">Envoyer</button>
        </div>
    
        </form>
    </center>
    <!-- FOOTER -->
    <?php
        include '../navfoot/footer.php';
    ?>
</body>
</html>