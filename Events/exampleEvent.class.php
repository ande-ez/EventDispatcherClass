<?php

/**
 * Fires after a new user has registered
 *
 */
class exampleEvent implements EventListener {

	/**
	 * Event
	 *
	 */
	public static function run($args = NULL) {
		echo('Example parameter is: ' . $args['exampleParameter']);
	}

}

?>
