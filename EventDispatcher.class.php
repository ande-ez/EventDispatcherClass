<?php

/**
 * Event class.
 *
 * Contains a list of events and what callables should be notified when
 * the event fires
 *
 */
class EventDispatcher {

	/**
	 * Holds all the possible events and their listeners
	 */
	static private $eventsAndListeners = [];


	/**
	 * Dispatch an event by name and optional arguments
	 *
	 */
	public static function dispatch($eventName, $arguments = NULL) {
		if(isset(self::$eventsAndListeners[$eventName])) {
			$eventAndListeners = self::$eventsAndListeners[$eventName];
			foreach($eventAndListeners as $listener) {
				self::fireEventFunction($listener, $arguments);
			}
		} else {
			throw new Exception('Event by name "' . $eventName . '" was not found.');
		}
	}


	/**
	 * Function to actually call the event listener function
	 *
	 * In it's own function to make it easier to customize this
	 *
	 */
	private static function fireEventFunction($listener, $arguments) {
		// We accept both custom functions and EventListener class implementations
		if(!is_callable($listener)) {
			// Not a valid custom functio, check if EventListener exists
			$eventListenerPath = 'Events/'.$listener.'.class.php';
			if(is_string($listener) && file_exists($eventListenerPath)) {
				require_once($eventListenerPath);
				$listener .= '::run';
			}

			// If still not callable
			if(!is_callable($listener)) {
				throw new Exception('That is not callable');
			}
		}

		// Call listener function with or without arguments
		if(is_null($arguments)) {
			call_user_func($listener);
		} else {
			call_user_func($listener, $arguments);
		}
	}


	/**
	 * Registers / appends an event by name and callable
	 *
	 */
	public static function registerEvent($eventName, $callable) {
		if(isset(self::$eventsAndListeners[$eventName])) {
			self::$eventsAndListeners[$eventName][] = $callable;
		} else {
			self::$eventsAndListeners[$eventName] = [$callable];
		}
	}

}



?>
