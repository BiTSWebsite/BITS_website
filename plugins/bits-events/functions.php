<?php
/**
 * Get the bootstrap!
 */
if ( file_exists(  __DIR__ . '/cmb2/init.php' ) ) {
  require_once  __DIR__ . '/cmb2/init.php';
} elseif ( file_exists(  __DIR__ . '/CMB2/init.php' ) ) {
  require_once  __DIR__ . '/CMB2/init.php';
}

require_once __DIR__ . '/events_presenter.php';
require_once __DIR__ . '/event-store.php';
require_once __DIR__ . '/event.php';
