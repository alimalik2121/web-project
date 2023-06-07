<?php
    //Starting Session
    session_start();

    if(isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn'] == true){
        header('Location: Home.php');
        exit();
    }

    //Including Database Configs
    include('config.php');

    //Checking is there is a POST Request
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        //Checking Existing Email
        $sql = "SELECT * FROM user where email='$email'";
        $result = mysqli_query($conn, $sql);
        
        if(!empty(mysqli_num_rows($result))){
            header("Location: Register.php?error=Account Already Exsist!");
            exit();
        }

        //Inserting Record
        $sql = "INSERT INTO user (name, email, password) VALUES ('$name', '$email', '$password')";
        $result = mysqli_query($conn, $sql);

        $_SESSION['user_id'] = $conn->insert_id;
        $_SESSION['name'] = $full_name;
        $_SESSION['isLoggedIn'] = true;

        header('Location: Home.php');
    }
?>

<html>
    <head>
        <meta charset="utf-8">
            <meta content="width=device-width, initial-scale=1" name="viewport">
                <title>
                    Sign up - Music Player
                </title>
                <link crossorigin="anonymous" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" rel="stylesheet"/>
                <link href="Register.css" rel="stylesheet" type="text/css">
                    <script crossorigin="anonymous" src="https://kit.fontawesome.com/c37c961e4a.js">
                    </script>
                </link>
            </meta>
        </meta>
    </head>
    <body>
    <?php
            if(isset($_GET['error'])){
                echo "
                <div class='error-message'>
                    <div class='message'>
                        <span>".$_GET['error']."</span>
                    </div>
                </div>
                ";
            }
        ?>
        <h1>
            Music Player
        </h1>
        <br>
            <h4 style="text-align: center; color: #000000; font-weight: bold; line-height: 36px; letter-spacing: -0.04em;">
                Sign up for free to start listening.
            </h4>
            <br>
                    <h5 style="color: #000000; text-align: center;">
                        Sign up with your email address
                    </h5>
                    <br>
                    <div class="login-form">
                    <form action='Register.php' method='post'>
                    <label class="label" for="username">Your Name</label><br><br>
                        <input class="input" type="text" name="name" placeholder="Enter your profile name."><br><br>
                        
                    	<label class="label" for="email">Your email</label><br><br>
                    	<input class="input" type="email" name="email" placeholder="Enter your email."><br><br>
                    	
                    	<label class="label" for="password">Create a password</label><br><br>
                    	<input class="input" type="password" name="password" placeholder="Create a password."><br>
                    
                       <button type="submit" class="signupbutton rounded-pill btn btn-success">Sign up</button>
                        
                    </form>
                </div>
                </body>
              </html>