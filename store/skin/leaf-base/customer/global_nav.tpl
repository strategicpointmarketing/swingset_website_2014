
<div class="secondary-bg-dark">
    <div class="top-header relative-container wrapper">
        <div class="eyebrow-nav group">
            <div class="gm-columns gm-half">
                <a href="/"><img class="logo" src="{$AltImagesDir}/logo.png" alt="{$config.Company.company_name}" /></a>
            </div>
            <div class="gm-columns gm-half align-right">
                <i class="mobile-none icon--phone"></i>
                <a class="link--phone secondary-font" href="tel:800-794-6473">1-800-794-6473</a>
            </div>
        </div>
    </div>

</div>

<!-- Main Navigation -->

<div class="relative-container middle-header">
    <div class="wrapper">
        <nav class="main-nav" role="navigation">
            <ul class="nav white">
                <li class="sub-nav">
                    <a class="main-nav__link" href="pages.php?pageid=6">Products</a>
                    <div class="secondary-nav">
                        <div class="group">
                            <ul class="gd-columns gt-columns gd-half gt-half">
                                <li><a href="/?cat=245">Swingsets</a></li>
                                <li><a href="/?cat=258">Playhouses</a></li>
                                <li><a href="/?cat=254">Trampolines</a></li>
                                <li><a href="/?cat=256">Surfacing</a></li>
                            </ul>
                            <ul class="gd-columns gt-columns gd-half gt-half">
                                <li><a href="/?cat=255">Basketball Goals</a></li>
                                <li><a href="/?cat=257">Sheds</a></li>
                                <li><a href="/?cat=262">Outdoor Furniture</a></li>
                                <li><a href="/?cat=259">Specials</a></li>
                            </ul>
                        </div>
                    </div>
                </li>
                <li><a class="main-nav__link" href="/pages.php?pageid=8">Locations</a></li>
                <li><a class="main-nav__link" href="/pages.php?pageid=9">About</a></li>
                <li><a class="main-nav__link" href="/pages.php?pageid=10">Gallery</a></li>
            </ul>
        </nav>
    </div>
</div>



<div class="relative-container bottom-header">
    <div class="wrapper">
        <div class="tertiary-nav" role="navigation">
            <ul class="nav normal-text">
                <li><a href="/pages.php?pageid=7">Blog</a></li>

                {if $login eq ''}
                    <li><a href="register.php">{$lng.lbl_register}</a></li>
                    <li><a href="login.php?mode=login">Login</a></li>
                {else}

                    <li><a href="register.php?mode=update">Account</a></li>
                    <li><a href="{$xcart_web_dir}/login.php?mode=logout">Logout</a></li>

                {/if}


                {if $login}
                    <li><a class="capitalize" href="orders.php">Orders</a></li>
                {/if}



                <li>
                    <a class="cart" href="/cart.php">({$minicart_total_items}) Cart</a>
                </li>

            </ul>
        </div>
    </div>
</div>




<!-- End Main Navigation -->
