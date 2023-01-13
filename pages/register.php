<?php
    session_start();
    if(isset($_SESSION['user'])){
        header('location:logout.php');  
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/login_register.css">
    <title>register page</title>
</head>
<body>
<?php 
    #functions 
    function max_lenght_error_traitement($inputValue, $inputName, $maxLenght){
        if(strlen($inputValue)>$maxLenght){
            return $inputName . " cannot be greather than " . $maxLenght ." letters!";
        }
    }

    #getting input as variables
    if(isset($_POST['submit'])){
        include '..\db\connect.php';

        $first_name = htmlspecialchars($_POST['first_name']);
        $last_name = htmlspecialchars($_POST['last_name']);
        $username = htmlspecialchars($_POST['username']);
        $adress = htmlspecialchars($_POST['adress']);
        $pays = htmlspecialchars($_POST['pays']);
        $titre = htmlspecialchars($_POST['titre']);
        $email = htmlspecialchars($_POST['email']);
        $phone_number = htmlspecialchars($_POST['phone_number']);
        $password = htmlspecialchars($_POST['password']);
        $confirm_password = htmlspecialchars($_POST['confirm_password']);
        $birthday = htmlspecialchars($_POST['birthday']) . ' 00:00:00';
        $gender = htmlspecialchars($_POST['Gender']);
        $objective = htmlspecialchars($_POST['objective']);
        $errors=[];
        
        #validate first name and last name
        if (!preg_match("/^[a-zA-Z-' ]{3,}$/",$first_name)) {
            $errors[] = "First name contains only letters or white spaces and must be less than 6 letters!";
          }
        if (!preg_match("/^[a-zA-Z-' ]{3,}$/",$last_name)) {
            $errors[] = "Last name contains only letters or white spaces and must be less than 6 letters!";
          }

        #validate username
        if(!preg_match('/^[a-zA-Z0-9]{5,}$/', $username)) {
            $errors[] = "Username can't be less than 5 letters!";
        }
            #---> check if already exists
            $stmt = $con->prepare("SELECT * FROM pesonnal_info WHERE username= '$username'");
            $stmt->execute(); 
            $username_check = $stmt->fetch();
            if ($username_check) {
               $errors[] = 'the username you entered is already used!';
            }
            $stmt->close();
        #max lenght error traitements

        $errors[] = max_lenght_error_traitement($first_name, "First name", 25);
        $errors[] = max_lenght_error_traitement($last_name, "Last name", 25);
        $errors[] = max_lenght_error_traitement($username, "Username", 20);
        $errors[] = max_lenght_error_traitement($email, "Email", 50);
        $errors[] = max_lenght_error_traitement($password, "Password", 25);
        $errors[] = max_lenght_error_traitement($adress, "Adress", 100);
        $errors[] = max_lenght_error_traitement($pays, "Pays", 20);
        $errors[] = max_lenght_error_traitement($titre, "Titre", 25);
        $errors[] = max_lenght_error_traitement($objective, "Objective", 250);

        
        #validate password strength
        $uppercase = preg_match('@[A-Z]@', $password);
        $lowercase = preg_match('@[a-z]@', $password);
        $number    = preg_match('@[0-9]@', $password);
        $specialChars = preg_match('@[^\w]@', $password);
        
        if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
            $errors[] = 'Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.';
        }
        #validate email
        if (!filter_var($email,FILTER_VALIDATE_EMAIL)){
            $errors[]= "Please enter a valid email!!";
        }
        #---> check if already exists
        ############################################################################################

        $email_check = [];
        $stmt = $con->prepare("SELECT * FROM pesonnal_info WHERE email= '$email'");
        $stmt->execute(); 
        $email_check = $stmt->fetch();
        if ($email_check) {
           $errors[] = 'the email you entered is already used!';
        }

        #
        #validate confirm password
        if($password != $confirm_password){
            $errors[] = "The passwords doesn't match";
        }

        #phone number
        if(!preg_match("#^0[67][0-9]{8}#",$phone_number)){
            $errors[] = "invalid phone number!";
        }

        #birthday traitements
        $dateMinesTenYears = strtotime(date('Y-m-d', strtotime('-10 years')));
        if($dateMinesTenYears < strtotime($birthday)){ 
            $errors[] = "Sorry, you need to be more than 10 years old!";
        }


        
	       
        #checking if any errors accures
        $array_not_null = 0;
        for($i = 0;$i < count($errors);$i++){
            if($errors[$i] != NULL){
                $array_not_null = 1;
            }
        }
        if(!$array_not_null){
            #interact with database
            $password = password_hash($password,PASSWORD_DEFAULT);
            $stmt = $con->prepare("INSERT INTO pesonnal_info (first_name, last_name, username, password, email, phone_number, gender, birthday,adress,pays, title, objective) VALUES ('$first_name', '$last_name', '$username', '$password', '$email', '$phone_number', '$gender', '$birthday', '$adress','$pays', '$titre', '$objective')");
            $stmt->execute();
            echo "<br>new user registered successfully!!";
            $_POST['first_name']='';
            $_POST['last_name']='';
            $_POST['username']='';
            $_POST['email']='';
            $_POST['phone_number']='';
            $_POST['adress']='';
            $_POST['objective']='';
            
            $_SESSION['user']=[
                "username"=>$username,
                "email"=>$email,
            ];
            
            header('location:profile.php');
        }

    }

?>
<!-- NAVBAR -->
<?php 
        include '../navfoot/navbar.php'; 
    ?>
<form action="" method="POST">
    <center>
    
    <img src="..\img\undraw_professional_card_otb4.svg" alt="hiring">
    <div class="login-block">
    <h1>Register</h1>
    <?php 
        if (isset($errors)){
            if($array_not_null){
                foreach ($errors as $msg){
                    echo $msg . "<br>";
                }
            }
        }
    ?>
    <label >First Name : </label>
    <input type="text" placeholder="E.g: John " value="<?php if(isset($_POST['first_name'])){echo $_POST['first_name'];} ?>" name="first_name" required>
    <label >Last Name : </label>
    <input type="text" placeholder="E.g: Smith" name="last_name" value="<?php if(isset($_POST['last_name'])){echo $_POST['last_name'];} ?>" required>
    <label >Username : </label>
    <input type="text"  placeholder="Username" name="username" value="<?php if(isset($_POST['username'])){echo $_POST['username'];} ?>" required/>
    <label >Titre : </label>
    <input type="text"  placeholder="Titre" name="titre" value="<?php if(isset($_POST['titre'])){echo $_POST['titre'];} ?>" required/>
    
    <label >Email : </label>
    <input type="email"  name="email" placeholder="johnsmith@hotmail.com" value="<?php if(isset($_POST['email'])){echo $_POST['email'];} ?>" required>  
    <label for="phone">Phone Number :</label>
    <input type="tel" name="phone_number" pattern="0[0-9]{9}" placeholder="063625XXXX" title="example : 063625XXXX" value="<?php if(isset($_POST['phone_number'])){echo $_POST['phone_number'];} ?>" required> 
    <label >Adress : </label>
    <input type="text"  placeholder="Adress" name="adress" value="<?php if(isset($_POST['adress'])){echo $_POST['adress'];} ?>" required/>
    <label >Pays : </label>
    <input type="text"  placeholder="Pays" name="pays" value="<?php if(isset($_POST['pays'])){echo $_POST['pays'];} ?>" required/>
    <label >Objective : </label>
    <br><br>
    <textarea name="objective" id="" cols="30" rows="10" placeholder="Objective" value="<?php if(isset($_POST['objective'])){echo $_POST['objective'];} ?>"required></textarea>     
    <br><br>
    <label >Password : </label>
    <input type="password" placeholder="********" name="password" required>
    <label >Confirm Password : </label>
    <input type="password" placeholder="********" name="confirm_password" required>
    <label for="birthday">Birthday :    </label>
    <input type="date"  name="birthday" value="<?php if(isset($_POST['birthday'])){echo $_POST['birthday'];} ?>" required>
    <label for="gender">Gender : </label>
    <select  id="Gender" name="Gender" required>
        <option  value="Man">M</option>
        <option  value="Woman">F</option>
    </select>     
    <button class="btn_1" type="submit" name="submit">Submit</button>           
    </div>
    </center>
</form>

<!-- FOOTER -->
<?php
        include '../navfoot/footer.php';
    ?>
</body>
</html>