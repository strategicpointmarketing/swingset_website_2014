<div class="tabs mtm">

    <section class="tabbed-nav--container">

            <div class="tabbed-nav--interior">
                <div class="tabbed-nav--row">
                    <a data-reveal="tab1" class="is-current tabbed-nav--item" href="#">
                        <div class="tabbed-nav--label">Description</div>
                    </a>
                    <a data-reveal="tab2" class="tabbed-nav--item" href="#">
                        <div class="tabbed-nav--label">Configuration</div>
                    </a>
                </div>
            </div>

    </section>

    <!-- Tab 1 -->
    <section id="tab1" class="tab is-current tabbed-content--container">

            <div class="tabbed-content--body pts">
                <p>{$product.fulldescr|default:$product.descr}</p>
            </div>

    </section>
    <!-- End Tab 1 -->

    <!-- Tab 2 -->
    <section id="tab2" class="tab is-current tabbed-content--container">

            <div class="tabbed-content--body pts">
                <p>{$product.shortdescr|default:$product.descr}</p>
            </div>

    </section>
    <!-- End Tab 2 -->


</div>