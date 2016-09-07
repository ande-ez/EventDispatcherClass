<?php

include('EventListener.class.php');
include('EventDispatcher.class.php');

EventDispatcher::registerEvent('example', 'exampleEvent');

EventDispatcher::dispatch('example', ['exampleParameter' => 'myExample']);

?>
