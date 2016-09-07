# Event Dispatcher Class


## Author
This repository is created by <ande@evilzone.org>  

Feel free to use it as you want  


## Introduction
This is a class to dispatch global events in your application.  
The event dispatcher accepts both custom functions and EventListener interface implemenations.  

### EventListener interface
The EventListener interface has one static function called 'run'.
The EventListener implemented classes are expected to be in a sub-folder named 'Events'.


## Function overview
### Public
* public static function dispatch($eventName, $arguments = NULL)
* public static function registerEvent($eventName, $callable)

### Private
* private static function fireEventFunction($listener, $arguments)

### EventListener
The EventListener interface also has:
* public static function run($args = NULL)  
This is the entry point for your EventListener interface implemented events.


## Usage
### EventListener interface implemenation
Create your EventListener implemented class.
This is expected to be in a sub-folder named 'Events'.
The file name is also expected to be called the same as the class name + '.class.php'.
In this case the full path would be Events/newUserRegisteredEvent.class.php:
```PHP
/**
 * Fires after a new user has registered
 *
 */
class newUserRegisteredEvent implements EventListener {

	/**
	 * Event
	 *
	 */
	public static function run($args = NULL) {
		echo('New user registered: ' . $args['username'] . '<hr>');
	}

}
```

### Register and fire event
```PHP
EventDispatcher::registerEvent('newUserRegistered', 'newUserRegisteredEvent');
EventDispatcher::dispatch('newUserRegistered', ['username' => 'myUsername']);
```

### Custom functions
You can also add any method format that can be used in call_user_func():
```PHP
function newUserRegisteredFunc {
	echo('New user registered: ' . $args['username'] . '<hr>');
}

EventDispatcher::registerEvent('newUserRegistered', 'newUserRegisteredFunc');
EventDispatcher::dispatch('newUserRegistered', ['username' => 'myUsername']);
```


## Future plans
* This is good for now. But there are plenty of more complex implementations of the event dispatcher pattern floating around the web, so who knows.
