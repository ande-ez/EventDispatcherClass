<?php

include('EventListener.class.php');
include('EventDispatcher.class.php');


EventDispatcher::registerEvent('newUserRegistered', 'newUserRegisteredEvent');

EventDispatcher::dispatch('newUserRegistered', ['username' => 'myUsername']);

?>
