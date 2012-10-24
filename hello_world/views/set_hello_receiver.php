<?php
 
if (!defined('IN_CMS')) { exit(); }

?>
 
<h1>Set hello receiver</h1>
 	       <!-- an action "say_hello", as in the behaviour! -->
		<form action="<?php echo (USE_MOD_REWRITE == false) ? '?' : ''; echo $callerUri."/say_hello"; ?>" method="post">
			<fieldset style="padding: 0.5em;">
        <legend style="padding: 0em 0.5em 0em 0.5em; font-weight: bold;">Say hello to someone</legend>
			<table class="fieldset" cellpadding="0" cellspacing="0" border="0">
            <tr>
                <td class="label"><label for="say_hello_to">People to say hello: </label></td>
                <td class="field"><input 
                	id="say_hello_to" name="say_hello_to" 
                	type="text" 
                	value="" /></td>
                <td class="help"><?php echo __('the guy to say hello.'); ?></td>
            </tr>
       </table>
      </fieldset>
			<p class="buttons">
        <input class="button" name="say" type="submit" accesskey="s" value="<?php echo __('Say'); ?>" />
    </p>
	</form>
