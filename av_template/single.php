<?php
  $post = $wp_query->post;
  if ( in_category('5') ) {
  include(TEMPLATEPATH . '/single_rent.php');
  } elseif ( in_category('1') ) {
  include(TEMPLATEPATH . '/single_sell.php');
  } elseif ( in_category('8') ) {
  include(TEMPLATEPATH . '/single_exclusives.php');
  } else {
  include(TEMPLATEPATH . '/single_other.php');
  }
?>