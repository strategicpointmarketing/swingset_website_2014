$(document).ready(function() {

    $("body").addClass('js');

    windowScroll = {
        config: {
            targetElems: $(".js-scroll-btn"),
            speed: 350
        },

        init: function() {
            var config = this.config;

            // Check if elements exist
            if (config.targetElems.length) {
                this.bindButtons( config );
            }

        },
        bindButtons: function( config ) {
            var buttons = config.targetElems;

            $(document.body).on("click", ".js-scroll-btn", function( e ) {

                var data = $(this).data('scroll'),
                    destination = $(".js-scroll-dest[data-scroll='" + data + "']"),
                    offset = destination.offset();

                // Prevent Click
                e.preventDefault();

                // Animate
                windowScroll.animateScroll( offset );

            });
        },
        animateScroll: function( offset ) {

            $('html, document').animate({
                scrollTop: offset.top - 20
            }, this.config.speed);

        }
    };

    homeSlider = {
        config: {
            targetElems: $(".flex-js"),
            pluginOptions: {
                "controlNav": true,
                "directionNav": false,
                "slideshowSpeed": 12000
            }
        },

        init: function() {
            var config = homeSlider.config;

            if ( config.targetElems.length ) {
                $.get("/store/skin/leaf-base/js/jquery.flexslider.js")
                    .done(function() {
                        homeSlider.callSlider();
                    }).fail(function() {
                        config.targetElems.hide();
                    });
            }

        },

        callSlider: function() {
            var context = homeSlider.config;

            context.targetElems.flexslider( context.pluginOptions );
        }
    };

    tabbedWidget = {
        config: {
            targetElems: $(".tabs"),
            currentClass: "is-current"
        },

        init: function() {
            var context = this.config,
                revealNavItem = context.targetElems.find("[data-reveal]");

            if ( context.targetElems.length ) {

                revealNavItem.on("click", function( e ) {
                    tabbedWidget.revealTab.call($(this), revealNavItem);
                    e.preventDefault();
                });

            }
        },

        revealTab: function( item ) {
            var thisButton = $(this),
                thisData = thisButton.data("reveal"),
                context = tabbedWidget.config,
                tab = context.targetElems.find(".tab");

            // Handles the classes on the navigation

            if ( !thisButton.hasClass( context.currentClass ) ) {
                // Remove is-current class from nav item
                item.removeClass( context.currentClass );

                // Add is-current class to item clicked
                thisButton.addClass( context.currentClass );
            }

            // Handles Revealing Tabs
            if ( tab.hasClass( context.currentClass ) ) {
                tab.removeClass( context.currentClass );
            }

            context.targetElems.find("#" + thisData).addClass( context.currentClass );

        }
    };

    // Call the script
    homeSlider.init();
    windowScroll.init();
    tabbedWidget.init();



});
