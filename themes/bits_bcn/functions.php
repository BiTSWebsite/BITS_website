<?php add_action(‘template_redirect’, ‘bwp_template_redirect’);
function bwp_template_redirect(){
  if (is_author()){
    wp_redirect( home_url() ); exit;
  }
} ?>
