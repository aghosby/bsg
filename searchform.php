<form role="search" method="get" action="<?= bloginfo('url'); ?>" id="search-form" class="search-form search-form-overlay">

    <div class="input-group search-box">

        <input class="form-control rounded-0" type="text" name="s" id="s-desktop" placeholder="Type to Search..." required>

        <div class="input-group-append">
            <button type="submit" class="btn"><i class="fas fa-search"></i></button>
        </div>

    </div>

    <div id="search-close" class="search-close">
        <i class="fas fa-times"></i>
    </div>

</form>