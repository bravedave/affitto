<?php
/*
 * David Bray
 * BrayWorth Pty Ltd
 * e. david@brayworth.com.au
 *
 * MIT License
 *
*/

namespace affitto;

use strings;

?>
<style>
  .restrict-height {
    max-height: 80vh;
  }
</style>
<img src="<?= strings::url( $this->route . '/mindmap.drawio.svg') ?>" class="img-fluid d-block mx-auto restrict-height">