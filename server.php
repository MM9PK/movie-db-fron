<?php
session_start();

// initializing variables
$username = "";
$email    = "";
$errors = array();

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'movie-db');

// REGISTER USER
if (isset($_POST['reg_user'])) {
    // receive all input values from the form
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
    $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

    // form validation: ensure that the form is correctly filled ...
    // by adding (array_push()) corresponding error unto $errors array
    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($email)) {
        array_push($errors, "Email is required");
    }
    if (empty($password_1)) {
        array_push($errors, "Password is required");
    }
    if ($password_1 != $password_2) {
        array_push($errors, "The two passwords do not match");
    }

    // first check the database to make sure
    // a user does not already exist with the same username and/or email
    $user_check_query = "SELECT * FROM users WHERE email='$email' OR email='$email' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);
  
    if ($user) { // if user exists
        if ($user['email'] === $email) {
            array_push($errors, "Email already exists");
        }

        if ($user['username'] === $username) {
            array_push($errors, "Username already exists");
        }
    }

    // Finally, register user if there are no errors in the form
    if (count($errors) == 0) {
        $password = md5($password_1);//encrypt the password before saving in the database

        $query = "INSERT INTO users (username, email, password) 
  			  VALUES('$username', '$email', '$password')";
        mysqli_query($db, $query);
        $_SESSION['username'] = $username;
        $_SESSION['success'] = "You are now logged in";
        header('location: index.php');
    }
}

if (isset($_POST['login_user'])) {
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
  
    if (empty($email)) {
        array_push($errors, "Email is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }
  
    if (count($errors) == 0) {
        $password = md5($password);
        $query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
        $results = mysqli_query($db, $query);
        if (mysqli_num_rows($results) == 1) {
            $row = $results->fetch_assoc();
            $_SESSION['id'] = $row['id'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['email'] = $row['email'];
          
            $_SESSION['success'] = "You are now logged in";
            header('location: index.php');
        } else {
            array_push($errors, "Wrong username/password combination");
        }
    }
}

<<<<<<< HEAD
=======
//ADD NEW MOVIE
if (isset($_POST['add'])) {
    // receive all input values from the form
    $title = mysqli_real_escape_string($db, $_POST['title']);
    $director = mysqli_real_escape_string($db, $_POST['director']);
    $actors = mysqli_real_escape_string($db, $_POST['actors']);
    $releaseYear = mysqli_real_escape_string($db, $_POST['releaseYear']);
    $description = mysqli_real_escape_string($db, $_POST['description']);
    $img = mysqli_real_escape_string($db, $_POST['img']);

    // form validation: ensure that the form is correctly filled ...
    // by adding (array_push()) corresponding error unto $errors array
    if (empty($title)) {
        array_push($errors, "Title is required");
    }
    if (empty($director)) {
        array_push($errors, "Director is required");
    }
    if (empty($actors)) {
        array_push($errors, "Actor is required");
    }
    if ($releaseYear) {
        array_push($errors, "Release Year is required");
    }
    if ($description) {
        array_push($errors, "Description is required");
    }
    if ($img) {
        array_push($errors, "File is required");
    }


    if (is_uploaded_file($_FILES['img']['tmp_name'])) {
        $max = 1024 * 2; // 2MB
        $wielkosc_pliku = $_FILES['img']['size'];
        $typ_pliku = $_FILES['img']['type'];
        $nazwa_pliku = $_FILES['img']['name'];
        $tymczasowa_nazwa_pliku = $_FILES['img']['tmp_name'];
        $miejsce_docelowe = './obrazki/' . $nazwa_pliku;
        if ($wielkosc_pliku <= 0) {
            echo 'File is too big.';
        }
        elseif ($wielkosc_pliku > $max) {
            echo 'File is too big, max: ' . $max . '.';
        }
        else {
            if (!@move_uploaded_file($tymczasowa_nazwa_pliku, $miejsce_docelowe))
                echo 'Localization do not exist';
            else
                echo 'Uploaded file successfully.';
        }
    }

    if (count($errors) == 0) {
        $query = "INSERT INTO movies (title, director, actors, releaseYear, description, img) 
  			  VALUES('$title', '$director', '$actors', '$releaseYear', '$descriptionusername', '$img')";
        mysqli_query($db, $query);
        $_SESSION['success'] = "Add movie successfully";
        header('location: index.php');
    }
}
       

>>>>>>> add_movie_panel
?>
