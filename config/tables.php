<!-- This file creates the tables if they don't already exist -->
<?php

require_once('config/database.php');

$sql = mysqli_query($conn, 'SELECT * FROM users');
$sql2 = mysqli_query($conn, 'SELECT * FROM events');
$sql3 = mysqli_query($conn, 'SELECT * FROM event_likes');
$sql4 = mysqli_query($conn, 'SELECT * FROM user_events');


if ($sql !== FALSE && $sql2 !== FALSE && $sql3 !== FALSE && $sql4 !== FALSE) {
    //table already exists
} else {
    $sql = "CREATE TABLE users (
        id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        first_name VARCHAR(100) NOT NULL,
        last_name VARCHAR(100) NOT NULL,
        username VARCHAR(100) NOT NULL,
        email VARCHAR(200) NOT NULL,
        password VARCHAR(255) NOT NULL
    )";

    $sql2 = "CREATE TABLE events (
            id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            category VARCHAR(100) NOT NULL,
            title VARCHAR(100) NOT NULL,
            img VARCHAR(200) NOT NULL,
            organiser VARCHAR(100) NOT NULL,
            location VARCHAR(200) NOT NULL,
            date DATE,
            time TIME NOT NULL,
            description TEXT NOT NULL
        )";

    $sql3 = "CREATE TABLE event_likes (
        id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        event INT NOT NULL,
        user_id INT NOT NULL
    )";

    $sql4 = "CREATE TABLE user_events (
        id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        user_id INT NOT NULL,
        events VARCHAR(200) NOT NULL
        )";

    $conn->query($sql);
    $conn->query($sql2);
    $conn->query($sql3);
    $conn->query($sql4);
}
