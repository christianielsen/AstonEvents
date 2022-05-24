<?php
session_start();
require_once 'config/database.php';
require_once 'config/tables.php';
require_once 'config/sort.php';

while ($row = $eventQuery->fetch_object()) {
    $events[] = $row;
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">

    <link rel="stylesheet" href="style.css">

    <!-- Jscript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    
    <link rel="icon" href="images/logo.png">

    <title>Events</title>
</head>

<body>
    <?php include_once('header.php'); ?>


    <div id="wrap">
        <div id="main">

            <div class="section primary top">
                <div class="container" id="t">
                    <div class="row">
                        <div class="col section-hero text-center">
                            <h2 id='header'>Events</h2>
                            <p>List of current Aston Events</p>
                            <p id="countdown"></p>
                        </div>
                    </div>
                </div>
            </div>

            <br>
            <br>

            <div class="container">
                <div class="row row-cols-1" id="order">
                    <h5>Sort by:</h5>
                    <div class="btn-toolbar" role="toolbar">
                        <a type="button" class="btn btn-sm" href="?">All</a>
                        <a type="button" class="btn btn-sm" href="?order=Sports" style="margin-left: 10px">Sports</a>
                        <a type="button" class="btn btn-sm" href="?order=Games" style="margin-left: 10px">Games</a>
                        <a type="button" class="btn btn-sm" href="?order=Other" style="margin-left: 10px">Other</a>
                    </div>
                </div>
            </div>

            <!-- Display events -->
            <div class="container" id="page-container">
                <div class="row row-cols-1 row-cols-md-3 g-4" id="content-wrap">
                    <?php foreach ($events as $event) : ?>
                        <div class="col" style="padding-bottom: 10px;">
                            <h4><?php echo $event->category; ?></h4>
                            <div class="card h-100">
                                <img class="card-img-top" src=<?php echo $event->img ?>>
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $event->title; ?></h5>
                                    <p class="card-text"><?php echo $event->description; ?></p>
                                </div>
                                <div class="card-footer">
                                    <a href="likes.php?type=events&id=<?php echo $event->id; ?>" type="button" class="btn btn-primary"><i class="bi bi-hand-thumbs-up-fill"></i> Like</a>
                                    <medium class="text-muted" id="tm">Likes: <?php echo $event->likes; ?></medium>
                                </div>
                                <div class="card-footer">
                                    <medium class="text-muted" id="tm">Organiser: <?php echo $event->organiser; ?></medium>
                                    <br>
                                    <medium class="text-muted" id="tm">Location: <?php echo $event->location; ?></medium>
                                    <br>
                                    <medium class="text-muted" id="tm">Time: <?php echo $event->time; ?></medium>
                                    <br>
                                    <medium class="text-muted" id="tm">Date: <?php echo $event->date; ?></medium>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <!-- Event registration button will only show up when user is logged in -->
                <?php if (isset($_SESSION['username'])) { ?>
                    <div class="d-grid gap-2" id="events-signup-rd">
                        <a href="eventssignup.php" type="button" name="events-signup-rd" class="btn btn-primary btn-lg">Click here to sign up for an event</a>
                    </div>
                <?php } ?>

            </div>

        </div>
        <?php include_once('footer.php'); ?>

    </div>

</body>

</html>

<!-- From w3schools.com -->
<script>
    //set event, date and time
    var datetime = "May 26 2022 12:15:00";
    var event = "Football"
    // Set the date we're counting down to
    // Date set is for the latest event to occur (football)
    var countDownDate = new Date(datetime).getTime();

    // Update the count down every 1 second
    var x = setInterval(function() {

        // Get today's date and time
        var now = new Date().getTime();

        // Find the distance between now and the count down date
        var distance = countDownDate - now;

        // Time calculations for days, hours, minutes and seconds
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        // Display the result in the element with id="countdown"
        document.getElementById("countdown").innerHTML = days + "d " + hours + "h " +
            minutes + "m " + seconds + "s " + "until the " + event + " event";

        // If the count down is finished, write some text
        if (distance < 0) {
            clearInterval(x);
            document.getElementById("countdown").innerHTML = "EXPIRED";
        }
    }, 1000);
</script>