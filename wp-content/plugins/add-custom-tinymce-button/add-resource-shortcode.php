<?php
header('Content-Type: application/javascript');
include "../../../wp-load.php";
?>
(function() {
	tinymce.PluginManager.add('dr_tc_button', function( editor, url ) {
        editor.addButton( 'dr_tc_button', {
            text: "Kossi's Add Resource",
            icon: true,
            type: 'menubutton',
            menu: [<?php list_of_mm_post_ids() ?>]
        });
	});
})();