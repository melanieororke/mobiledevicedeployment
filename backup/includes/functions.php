<?php
  //This function prevents SQL injection by stripping all tags and adding slashes for quotation marks
	//and apostrophes.
	function protect($string){
		$string = trim(strip_tags(addslashes($string)));
		return $string;
	}

?>