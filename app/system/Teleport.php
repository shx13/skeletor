<?php

/*
* Class Teleport
*
* Simple class for redirecting the user
*/

class Teleport {
	/*
	* To the homepage
	*/
	public static function home()
	{
		header("location: " . Config::get('URL'));
	}

	/*
	* To the defined page
	*
	* @param $path
	*/
	public static function to($path)
	{
		header("location: " . Config::get('URL') . $path);
	}
}
