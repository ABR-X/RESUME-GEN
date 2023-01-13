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
    <title>login page</title>
</head>
<body>

<?php 
$errors=[];
$array_not_null = 0;
    if(isset($_POST['submit'])){
        #getting input as variables
        if(isset($_POST['submit'])){
            include '..\db\connect.php';

            $email = htmlspecialchars($_POST['email']);
            $password = htmlspecialchars($_POST['password']);

            
            #validate email
            if (!filter_var($email,FILTER_VALIDATE_EMAIL)){
                $errors[]= "Please enter a valid email!!";
            }

            #validate password

            if(empty($password)){
                $errors[]= "Enter a password!!";
            }
    
            #checking if any errors accures

            for($i = 0;$i < count($errors);$i++){
                if($errors[$i] != NULL){
                    $array_not_null = 1;
                }
            }
            if(!$array_not_null){
                #interact with database

                $stmt = $con->prepare("SELECT * FROM pesonnal_info WHERE email='$email'");
                $stmt->execute();
                $result = $stmt->get_result();
                $data = $result->fetch_assoc(); 

                if (!$data){
                    $errors[] = "problem in login";
                }else{
                    $password_hash = !empty($data["password"]) ? $data['password'] : NULL;
                    if(!password_verify($password,$password_hash)){
                        $errors[] = "problem in login";
                    }else{
                       
                        $_SESSION['user']=[
                            "username"=>$data['username'],
                            "email"=>$email,
                        ];
                        $_SESSION["email"] = $email;
                        
                         header('location:informations.php');
                    }

                }
            }
    
        }
    }
    for($i = 0;$i < count($errors);$i++){
        if($errors[$i] != NULL){
            $array_not_null = 1;
        }
    }
?>
<!-- NAVBAR -->
<?php 
    include '../navfoot/navbar.php'; 
?>

<form action="login.php" method="POST">
    <center>
    <img src="..\img\undraw_secure_login_pdn4.svg" alt="hiring">
    <div class="login-block">

    <h1>Login</h1>
    <?php 
        if (isset($errors)){
            if($array_not_null){
                echo "<p>Problem Accured!</p><br>";
            }
        }
    ?>
    <input type="text" value="" placeholder="Email" name="email" required/>
    <input type="password" value="" placeholder="Password" name="password" required/>
    <button type="submit" name="submit" class="btn_1">Login</button>
    <a href="register.php"><button type="button" class="btn_2" value="">Register</button></a>
    </div>
    </center>
</form>

<!-- FOOTER -->
<?php
    include '../navfoot/footer.php';
?>
</body>
</html>