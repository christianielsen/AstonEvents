<!-- This file handles the login system with the logout button -->
<?php

session_start();

require_once 'config/database.php';

$errors = array();
$first_name = "";
$last_name = "";
$username = "";
$email = "";

// If signup button is pressed
if (isset($_POST['signup-btn'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Checks if entered fields are valid
    if (empty($username)) {
        $errors['username'] = "ID Number required";
    }
    if (empty($email)) {
        $errors['email'] = "Email required";
    }
    if (empty($password)) {
        $errors['password'] = "Password required";
    }
    // Checks if the email is a valid Aston email
    if (strpos($email, "@aston.ac.uk") == false) {
        $errors['email'] = "The email provided needs to end in @aston.ac.uk";
    }
    // Checks if the username is a valid username (Currently accepts 9 number digit)
    if (strlen($username) != 9) {
        $errors['username'] = "This is not a valid ID Number";
    }
    if (empty($first_name)) {
        $errors['first_name'] = "First name required";
    }
    if (empty($last_name)) {
        $errors['last_name'] = "Last name required";
    }

    // Checks if the email already exists in the database
    $stmt = $conn->prepare("SELECT * FROM users WHERE email=? LIMIT 1");
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $userCount = $result->num_rows;
    $stmt->close();

    if ($userCount > 0) {
        $errors['email'] = "This email already exists";
    }

    // Checks if the username already exists in the database
    $stmt = $conn->prepare("SELECT * FROM users WHERE username=? LIMIT 1");
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $userCount2 = $result->num_rows;
    $stmt->close();

    if ($userCount2 > 0) {
        $errors['username'] = "This username already exists";
    }

    // This will only run if all the fields provided are valid
    if (count($errors) === 0) {
        $password = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $conn->prepare("INSERT INTO users (first_name, last_name, username, email, password) VALUES (?, ?, ?, ?, ?)");
        //5 strings
        $stmt->bind_param('sssss', $first_name, $last_name, $username, $email, $password);

        if ($stmt->execute()) {
            //Sets the sessions on login
            $user_id = $conn->insert_id;
            $_SESSION['id'] = $user_id;
            $_SESSION['first_name'] = $first_name;
            $_SESSION['last_name'] = $last_name;
            $_SESSION['username'] = $username;
            $_SESSION['email'] = $email;

            header('location: events.php');
            exit();
        } else {
            $errors['db_error'] = "Database error: failure to register";
        }
    }
}


// If user clicks the login button
if (isset($_POST['login-btn'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];


    // Checks if entered fields are valid
    if (empty($username)) {
        $errors['username'] = "ID Number or Email required";
    }
    if (empty($password)) {
        $errors['password'] = "Password required";
    }
    // Checks if the email is a valid Aston email or checks if the username is 9 characters long
    if (strpos($username, "@aston.ac.uk") == false && strlen($username) != 9) {
        $errors['login_fail'] = "Wrong username format use an @aston.ac.uk email or ID number";
    }


    //checks if email already exists
    if (count($errors) === 0) {
        $stmt = $conn->prepare("SELECT * FROM users WHERE email=? OR username=? LIMIT 1");
        // Username was used for both the ID number and email so that they are able to login with either their username or email
        $stmt->bind_param('ss', $username, $username);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        if (password_verify($password, $user['password'])) {
            // User login success
            $_SESSION['id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['first_name'] = $first_name;
            $_SESSION['last_name'] = $last_name;


            header('location: events.php');
            exit();
        } else {
            $errors['login_fail'] = "Wrong username/password";
        }
    }
}


//logout unsets all sessions
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['id']);
    unset($_SESSION['username']);
    unset($_SESSION['email']);
    unset($_SESSION['first_name']);
    unset($_SESSION['last_name']);
    unset($_SESSION['events']);
    header('location: login.php');
    exit();
}
