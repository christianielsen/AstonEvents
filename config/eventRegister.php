<!-- This file handles the event registration system -->
<?php

// $events = "";
$errors = array();

//If signup button is pressed
if (isset($_POST['eventssignup-btn'])) {
    $events = $_POST['events'];
    $user_id = $_SESSION['id'];

    //Checks if event is already booked
    $stmt = $conn->prepare("SELECT * FROM user_events WHERE events='$events' AND user_id='$user_id'");
    $stmt->execute();
    $result = $stmt->get_result();
    $eventsCount = $result->num_rows;
    $stmt->close();

    if ($eventsCount > 0) {
        $errors['events'] = "You have already signed up for this event";
    }

    if (count($errors) === 0) {
        $stmt = $conn->prepare("INSERT INTO user_events(user_id, events) VALUES (?, ?)");
        $stmt->bind_param('is', $user_id, $events);

        if ($stmt->execute()) {
            $_SESSION['events'] = $events;

        } else {
            $errors['db_error'] = "Database error: failed to register event";
        }
    }
}
