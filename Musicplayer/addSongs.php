<?php 
    //Starting Session
    session_start();

    //Including Database Configs
    include('config.php');
    function saveFileAndReturnName($file){
        $uniqueName = uniqid() . '_' . $file['name'];
        $uploadDir = './songs/';
        $filePath = $uploadDir . $uniqueName;
        move_uploaded_file($file['tmp_name'], $filePath);
        return $uniqueName;
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $title = $_POST['title'];
        $artist = $_SESSION['user_id'];
        $uploadedFile = $_FILES['song_path'];
        $song_path = saveFileAndReturnName($uploadedFile);

        $sql = "INSERT INTO songs (title, artist, song_path) VALUES ('$title', '$artist', '$song_path')";
        $result = mysqli_query($conn, $sql);

        header('Location: Home.php?success=Song Added Successfully');
    }


?>

<html>
    <head>
        <title>Add New Song</title>
        <link rel='stylesheet' href='addsongs.css'>
        <link crossorigin="anonymous" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" rel="stylesheet"/>
    </head>
    <body>
        <div class='addSong'>
            <h2>Add New Song</h2>
            <form action='addSongs.php' method='post' enctype="multipart/form-data">
                <div class='form-item'>
                    <label>Song Title</label>
                    <input type='text' name='title' required>
                </div>
                <div class='form-item content-input'>
                    <label>Artist</label>
                    <textarea name='artist' required></textarea>
                </div>
                <div class='form-item'>
                    <label>Song Path</label>
                    <input type='file' name='song_path' required>
                <div class='form-item'>
                    <input type='submit' value='Upload'>
                </div>
            </form>
        </div>