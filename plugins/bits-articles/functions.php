<?php
require_once  __DIR__ . '/article.php';
require_once  __DIR__ . '/mapping-functions.php';
require_once  __DIR__ . '/presentation-functions.php';

/**
 * Get the bootstrap!
 */
if ( file_exists(  __DIR__ . '/cmb2/init.php' ) ) {
  require_once  __DIR__ . '/cmb2/init.php';
} elseif ( file_exists(  __DIR__ . '/CMB2/init.php' ) ) {
  require_once  __DIR__ . '/CMB2/init.php';
}
?>
