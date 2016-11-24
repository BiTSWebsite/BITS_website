<?php function register_my_scripts() {

  wp_register_script('jquery', "http://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js", array(),'2.1.0',true);
  wp_register_script('foundation', get_template_directory_uri()."/js/vendor/foundation.min.js", array('jquery'),'5.1.1',true);

  wp_enqueue_script(array('jquery','modernizer','foundation'));
}

add_action('wp_print_scripts','register_my_scripts'); ?>
