<?php
// Remove contact form 7 Google Recaptcha badge display

remove_action( 'wp_enqueue_scripts', 'wpcf7_recaptcha_enqueue_scripts' );