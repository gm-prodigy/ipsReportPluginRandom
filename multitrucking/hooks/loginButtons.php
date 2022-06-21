//<?php

/* To prevent PHP errors (extending class does not exist) revealing path */
if ( !\defined( '\IPS\SUITE_UNIQUE_KEY' ) )
{
	exit;
}

class multitrucking_hook_loginButtons extends _HOOK_CLASS_
{

/* !Hook Data - DO NOT REMOVE */
public static function hookData() {
 return array_merge_recursive( array (
  'footer' => 
  array (
    0 => 
    array (
      'selector' => '#elWidgetControls',
      'type' => 'add_after',
      'content' => '<script>
	{{if (!\IPS\Member::loggedIn()->member_id)}}
		var buttons = document.getElementsByTagName(\'button\');

		let ids = [\'5\', \'4\', \'7\']

		let whitelist = [
    			"https://multitrucking.com/login/?do=link&"
			]

		for (let i = 0; i < buttons.length; i++) {
    		let button = buttons[i];

    		let currentLink = window.location.href.split(\'ref=\')[0]
    
    		if (!whitelist.includes(currentLink)) {
        		if (ids.includes(button.value)) {
            		button.classList.add(\'hidden-custom-button\')
        		}
    		}
		}
 {{endif}}
</script>',
    ),
  ),
), parent::hookData() );
}
/* End Hook Data */


}
