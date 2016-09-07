<?php

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

?>
