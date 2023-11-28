<?php

/**
 * Site-wide notice 
 */

// Get site-wide notice toggle
$enable_notice = false;

if (get_field('enable_site_wide_notice', 'options'))
{
    $enable_notice = true;
}

?>

<?php if ($enable_notice) : ?>

    <section class="site-notice">

        <div class="site-notice__message">
            <?= get_field('site_wide_notice_text', 'options'); ?>
        </div>

        <i class="site-notice__dismiss fa-solid fa-xmark"></i>

    </section>

<?php endif; ?>