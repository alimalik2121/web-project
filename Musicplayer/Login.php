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
        
        $email = $_POST['email'];
        $password = $_POST['password'];

        //Checking Existing Email
        $sql = "SELECT * FROM user where email='$email' and password='$password'";
        $result = mysqli_query($conn, $sql);
        
        if(empty(mysqli_num_rows($result))){
            header("Location: Login.php?error=No Account Found!");
            exit();
        }

        $row = mysqli_fetch_array($result);

        $_SESSION['user_id'] = $row['user_id'];
        $_SESSION['name'] = $row['name'];
        $_SESSION['isLoggedIn'] = true;

        header('Location: Home.php');
    }
?>


<html>
    <head>
        <meta charset="utf-8">
            <meta content="width=device-width, initial-scale=1" name="viewport">
                <title>
                    Login - Music Player
                </title>
                <link crossorigin="anonymous" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" rel="stylesheet"/>
                <link href="Login.css" rel="stylesheet" type="text/css">
                    <script crossorigin="anonymous" src="https://kit.fontawesome.com/c37c961e4a.js">
                    </script>
                        </link>
                    </link>
            </meta>
        </meta>
    </head>
    <body>
        <h1>
            Music Player
        </h1>
        <hr>
                    
                    <br>
                    <div class="login-form">
                    <form action="Login.php" method='post'>
                    	<label style="color: #000000; font-weight: bold;" for="email">Email address or username</label>
                    	<br>
                        <br>
                    	<input style="width: 500px; padding: 10px;" type="email" name="email" placeholder="Email address or username">
                    	<br>
                        <br>
                    	<label style="color: #000000; font-weight: bold;" for="password">Password</label>
                    	<br>
                        <br>
                    	<input style="width: 500px; padding: 10px;" type="password" name="password" placeholder="Password">
                    	<br>
                    	<br>
                    	<button style="color: #000000; background-color: #1ed760; margin-top: 10px; margin-left: 50%; font-weight: bold;" type='submit' class="rounded-pill btn btn-success">LOG IN</button>
                    </form>
                    </div>
                    <br>
                     <hr style="margin: auto; width: 500px;">
                     <br>
                     <h3 style="color: #000000; font-weight: bold; text-align: center;">Don't have an account?</h3>
                     
                     <div class="text-center">
                      <button style="margin-bottom: 1%;" class="rounded-pill btn btn-light btn-lg" type="button"><a href="Register.php">SIGN UP FOR MUSIC PLAYER</a></button>
                        </div>
                </body>
                </html>