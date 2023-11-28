<?php

/**
 * Social Share Buttons template for Wordpress
 * 
 * @package SBX_Starter_Theme
 */

$post_url = get_permalink(); // Post URL
$post_title = get_the_title(); // Post title

?>

<div class="social-share">
    <!-- Facebook -->
    <a target="_blank" class="share share-facebook" href="https://www.facebook.com/sharer.php?u=<?= $post_url; ?>" title="<?= $post_title; ?>">
        <i class="fa-brands fa-facebook-f"></i>
        <!-- Share on Facebook -->
    </a>

    <!-- Twitter -->
    <a target="_blank" class="share share-twitter" href="https://twitter.com/intent/tweet?url=<?= $post_url; ?>&text=<?= $post_title; ?>&via=<?= the_author_meta('twitter'); ?>" title="<?= $post_title; ?>">
        <i class="fa-brands fa-twitter"></i>
        <!-- Share on Twitter -->
    </a>

    <!-- LinkedIn -->
    <a target="_blank" class="share share-linkedin" href="https://www.linkedin.com/sharing/share-offsite/?url=<?= $post_url; ?>" title="<?= $post_title; ?>">
        <i class="fa-brands fa-linkedin-in"></i>
        <!-- Share on LinkedIn -->
    </a>

    <!-- Whatsapp -->
    <a target="_blank" class="share share-whatsapp" href="whatsapp://send?text=<?= $post_title . '%20' . $post_url; ?>" data-action="share/whatsapp/share" title="<?= $post_title; ?>">
        <i class="fa-brands fa-whatsapp"></i>
        <!-- Share on Whatsapp -->
    </a>

    <!-- Email -->
    <a target="_blank" class="share share-email" href="mailto:?body=<?= $post_url; ?>&subject=<?= $post_title; ?>" title="<?= $post_title; ?>">
        <i class="fa-solid fa-envelope"></i>
        <!-- Share via Email -->
    </a>

    <!-- Google+ -->
    <!-- <a target="_blank" class="share share-googleplus" href="https://plus.google.com/share?url=<?= $post_url; ?>" title="<?= $post_title; ?>">
        <i class="fa-brands fa-google-plus-g"></i>
        Share on Google+
    </a> -->
</div>