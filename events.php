<?php

// connect to your database using Laravel's DB facade
use Illuminate\Support\Facades\DB;

// retrieve the bookings from your database
$bookings = DB::table('bookings')->get();

// format the bookings as an array of events
$events = [];

foreach ($bookings as $booking) {
    $event = [
        'id' => $booking->id,
        'title' => $booking->title,
        'start' => $booking->start_time,
        'end' => $booking->finish_time
    ];

    $events[] = $event;
}

// return the events as a JSON response
header('Content-Type: application/json');
echo json_encode($events);
