<?php
require 'config/database.php';
require 'config/loginController.php';
require 'config/tables.php';

//Event 1
$sql = "SELECT * FROM events WHERE id='1'";
$result = $conn->query($sql);
//Event 4
$sql = "SELECT * FROM events WHERE id='4'";
$result2 = $conn->query($sql);
//Event 6
$sql = "SELECT * FROM events WHERE id='6'";
$result3 = $conn->query($sql);


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="images/aston-logo.png">

    <!-- Jscript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

    <title>Home</title>
</head>

<body>
    <?php include_once('header.php'); ?>
    <div class="site-wrapper" id="wrap">
        <div class="site-wrapper-inner" id="main">
            <div class="container">
                <div class="inner cover" style="padding-top: 100px;">
                    <h1 class="cover-heading text-center">Aston Events</h1>
                    <p class="lead text-center">Here are our most popular events!</p>
                    <p class="lead text-center" id="countdown"></p>

                    <div class="container">
                        <div class="row row-cols-1 row-cols-md-3 g-4">
                            <div class="col">
                                <?php while ($row = $result->fetch_assoc()) {
                                    echo '<h4>' . $row['category'] . '</h4>' . '<div class="card h-100"><img src="' . $row["img"] . '" class="card-img-top" alt="basketball">' . '<div class="card-body"> <h5 class="card-title">' . $row["title"] . '</h5>' . '<p class="card-text">' . $row["description"] . '</p> </div> </div>';
                                }
                                ?>
                            </div>
                            <div class="col">
                                <?php while ($row = $result2->fetch_assoc()) {
                                    echo '<h4>' . $row['category'] . '</h4>' . '<div class="card h-100"><img src="' . $row["img"] . '" class="card-img-top" alt="basketball">' . '<div class="card-body"> <h5 class="card-title">' . $row["title"] . '</h5>' . '<p class="card-text">' . $row["description"] . '</p> </div> </div>';
                                }
                                ?>
                            </div>
                            <div class="col">
                                <?php while ($row = $result3->fetch_assoc()) {
                                    echo '<h4>' . $row['category'] . '</h4>' . '<div class="card h-100"><img src="' . $row["img"] . '" class="card-img-top" alt="basketball">' . '<div class="card-body"> <h5 class="card-title">' . $row["title"] . '</h5>' . '<p class="card-text">' . $row["description"] . '</p> </div> </div>';
                                }
                                $conn->close();

                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="d-grid gap-2" id="events-signup-rd">
                        <a href="events.php" type="button" name="events-signup-rd" class="btn btn-primary btn-lg">Check out our full list of events</a>
                    </div>
                </div>

            </div>

        </div>
        <?php include_once('footer.php'); ?>

    </div>
</body>

</html>

<!-- From w3schools.com -->
<script>
    //set event, date and time
    var datetime = "May 26 2021 12:15:00";
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