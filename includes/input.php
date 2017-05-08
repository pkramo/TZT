<?php
class Input
{
	public static function get($postKey=null){
		if (!empty($_POST)){
			if ($postKey){
				if (isset($_POST[$postKey])){
					return $_POST[$postKey];
				}
			} else {
				return $_POST;
			}
		}
		if (!empty($_GET)){
			if ($postKey){
				if (isset($_GET[$postKey])){
					return $_GET[$postKey];
				}
			} else {
				return $_POST;
			}
		}
		return false;
	}
	public static function has($postKey=null){
		if (!empty($_POST)){
			if ($postKey){
				if (isset($_POST[$postKey])){
					return (!empty($_POST[$postKey])) ? true : false ;
				}
			}
		}
		if (!empty($_GET)){
			if ($postKey){
				if (isset($_GET[$postKey])){
					return (!empty($_GET[$postKey])) ? true : false ;
				}
			}
		}
		return false;
	}
}
