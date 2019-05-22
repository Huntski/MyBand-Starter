<?php

class EventsController {
    function loadPage($option = null) {
        
        require "../private/models/get_events.php";
        $event = new events;

        if ($option) {
            $event_info = $event->getEvent();
        } else {
            $allEvents_info = $event->getAllEvents();
        }

        echo "<pre>";
        if ($option) {
            var_dump($event_info);
        } else {
            var_dump($allEvents_info);
        }
        echo "</pre>";
    }
}