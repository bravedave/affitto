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

<ul class="nav flex-column" id="<?= $_nav = strings::rand() ?>">
  <li class="h6"><?= config::label_index ?></li>
  <li class="nav-item">
    <a class="nav-link" href="#" data-trigger="navigate-about">about</a>

  </li>

</ul>
<script>
  (_ => $(document)
    .on('navigate-about', (e) => {
      _.get(_.url('<?= $this->route ?>/about'))
        .then(html => $('[data-role="content-primary"]').html(html));
    })
    .ready(() => {
      $('#<?= $_nav ?> [data-trigger]').each((i, el) => {
        $(el).on('click', function(e) {
          e.stopPropagation();
          e.preventDefault();

          let _me = $(this);
          let _data = _me.data();

          $(document).trigger(_data.trigger);

        });

      });

    }))(_brayworth_);
</script>