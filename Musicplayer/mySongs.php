<?php 
    //Starting Session
    session_start();

    if(!isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn'] == false){
        header('Location: Login.php');
        exit();
    }

    //Including Database Configs
    include('config.php');

    $name=$_SESSION['name'];
?>
<html>
    <head>
    <link crossorigin="anonymous" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" rel="stylesheet"/>
                    <link href="Home.css" rel="stylesheet" type="text/css">
                    <script crossorigin="anonymous" src="https://kit.fontawesome.com/c37c961e4a.js">
                    </script>
        <style>
            .songs-options{
                display: flex;
                gap: 10px;
                font-size: 18px;
            }

            .songs-options a{
                color: gray;
            }

        </style>
    </head>
    <body>
        <!-- Nav Bar -->
      <nav class="navbar sticky-top navbar-expand-lg navbar-dark">
      	<h1 style="margin-left: 25px;"><a class="navbar-brand" href="Home.php">Music Player</a></h1>

          <h2>Welcome <?php echo $name; ?></h2>
      <ul class="navbar-nav ms-auto">
      <li class="nav-item">
      <a class="nav-link" aria-current="page" href="#">Home</a>
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
        <div class='heading'>
            <h2 style="font-weight: bold;">My Songs:</h2>
        </div>
        <div class='songs-section'>
            <?php
                $user_id = $_SESSION['user_id'];
                $sql = "SELECT * from songs where artist=$user_id order by song_id desc";
                $result = mysqli_query($conn, $sql);

                while($row = mysqli_fetch_array($result)){
                    echo "
                        <div class='song'>
                            <div class='song-info'>
                                <h4 class='title'> Song Name: ".substr($row[1], 0, 50)."</h4>
                                <span class='name'>Song File Name: $row[3]</span>
                            </div>
                            <div class='song-content'>
                                <p> Uploaded By:".substr($row[2],0,100)."</p>
                            </div>
                        </div>
                    ";
                }
            ?>
        </div>