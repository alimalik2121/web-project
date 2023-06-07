<?php
    //Starting Session
    session_start();

    if(!isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn'] == false){
        header('Location: Login.php');
        exit();
    }

    include 'config.php';

    $name=$_SESSION['name'];
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
            <meta content="width=device-width, initial-scale=1" name="viewport">
                <title>
                    Music Player
                </title>
                    <link crossorigin="anonymous" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" rel="stylesheet"/>
                    <link href="Home.css" rel="stylesheet" type="text/css">
                    <script crossorigin="anonymous" src="https://kit.fontawesome.com/c37c961e4a.js">
                    </script>
            </meta>
        </meta>
    </head>
    <body>

      <!-- Nav Bar -->
      <nav class="navbar sticky-top navbar-expand-lg navbar-dark">
      	<h1 style="margin-left: 25px;"><a class="navbar-brand" href="Home.php">Music Player</a></h1><br>
          <h2>Welcome <?php echo $name; ?></h2>
      <ul class="navbar-nav ms-auto">
      <li class="nav-item">
      <a class="nav-link" aria-current="page" href="Home.php">Home</a>
       </li>
       <li class="nav-item">
      <a class="nav-link" href="addSongs.php">Addsongs</a>
       </li>
       <li class="nav-item">
      <a class="nav-link" href="mySongs.php">Mysongs</a>
       </li>
       <li class="nav-item">
      <a class="nav-link" href="trendingSongs.php">Trendingsongs</a>
       </li>
       </ul>
      </nav>

      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>

      <!-- Songs to Listen -->
      <h4 style="color: #000; font-weight: bold; text-align: center;">Songs to Listen</h4>
      <ul class="list-group list-group-flush list-group-numbered">
       <li class="list-group-item">Kahani Suno 2.0 <div id="singername" class="form-text">Kaifi Khalil</div></li>
       <audio controls>
       <source src="./songs/647c6de9d1c72_desires.mp3" type="audio/mpeg">
       </audio>
       <li class="list-group-item">Summer High <div id="singername" class="form-text">AP Dhillon</div></li>
       <audio controls>
        <source src="./songs/647c6de9d1c72_desires.mp3" type="audio/mpeg">
       </audio>
       <li class="list-group-item">Excuses <div id="singername" class="form-text">Gurinder Gill</div></li>
       <audio controls>
        <source src="./songs/647c6de9d1c72_desires.mp3" type="audio/mpeg">
       </audio>
       <li class="list-group-item">Desires <div id="singername" class="form-text">AP Dhillon</div></li>
       <audio controls>
        <source src="./songs/647c6de9d1c72_desires.mp3" type="audio/mpeg">
       </audio>
       <li class="list-group-item">MoonLight <div id="singername" class="form-text">Harnoor</div></li>
       <audio controls>
        <source src="./songs/647c6de9d1c72_desires.mp3" type="audio/mpeg">
       </audio>
     </ul>
    </body>
</html>