<?php
require_once 'config/loginController.php';

$liked = "";

if (isset($_GET['type'], $_GET['id'])) {
    $type = $_GET['type'];
    $id = (int)$_GET['id'];

    switch ($type) {
        case 'events':
            $conn->query("
            INSERT INTO event_likes (user_id, event)
            SELECT {$_SESSION['id']}, {$id}
            FROM events
            WHERE EXISTS (
                SELECT id
                FROM events
                WHERE id = {$id})
                AND NOT EXISTS(
                    SELECT id
                    FROM event_likes
                    WHERE user_id = {$_SESSION['id']}
                    AND event = {$id}
                    )
                    LIMIT 1
            ");
            break;
    }
    $_SESSION['liked'] = $liked;
}

header('Location: events.php');