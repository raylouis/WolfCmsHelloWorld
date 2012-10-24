<?php
 
if (!defined('IN_CMS')) { exit(); }
 echo $originalContent;
?>
 <br>
<h1>Say Hello</h1>
 
	<?php
	/**
	 * If no menus exist, a menu object cannot be passed.
	 * In this instance, lets display a user friendly warning
	 * encouraging them to create a menu.
	 */
	if (isset($say_hello_to)){
		echo "You said hello to ".$say_hello_to;
	}else{
	    echo "No hello today...";
	}
	?>