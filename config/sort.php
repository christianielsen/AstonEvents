<?php

$limit = 9;

if (isset($_GET['order'])) {
    $order = $_GET['order'];
    $limit = 3;
} else {
    $order = 'Sports';
    $limit = 9;
}

if (isset($_GET['sort'])) {
    $sort = $_GET['sort'];
} else {
    $sort = 'DESC';
}

$eventQuery = $conn->query(
    "SELECT 
    events.id, 
    events.title,
    events.description,
    events.img,
    events.organiser,
    events.date,
    DATE_FORMAT(events.time,'%k:%i') AS 'time',
    events.category,
    events.location,
    COUNT(event_likes.id) AS likes

    FROM events

    LEFT JOIN event_likes
    ON events.id = event_likes.event

    GROUP BY events.id

    ORDER BY FIELD(category, '$order') $sort
    
    LIMIT $limit
"
);
