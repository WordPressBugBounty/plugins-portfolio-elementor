jQuery(window).on('load', function () {
    if (jQuery(".elpt-portfolio-content").length) {
        
        // Process video links with data attributes
        jQuery('a.elpt-portfolio-video-lightbox').each(function() {
            var videoUrl = jQuery(this).attr('data-video');
            if (videoUrl) {
                // Modify link behavior to open video in lightbox
                jQuery(this).on('click', function(e) {
                    e.preventDefault();
                    
                    // Open lightbox with video
                    if (videoUrl.indexOf('youtube.com') > -1 || videoUrl.indexOf('youtu.be') > -1) {
                        // Youtube video
                        var videoId = getYoutubeId(videoUrl);
                        if (videoId) {
                            // Usar o lightbox do SimpleLightbox
                            var embedUrl = 'https://www.youtube.com/embed/' + videoId + '?autoplay=1&rel=0';
                            openVideoLightbox(embedUrl);
                        }
                    } else if (videoUrl.indexOf('vimeo.com') > -1) {
                        // Vimeo video
                        var videoId = getVimeoId(videoUrl);
                        if (videoId) {
                            // Usar o lightbox do SimpleLightbox
                            var embedUrl = 'https://player.vimeo.com/video/' + videoId + '?autoplay=1&title=0&byline=0&portrait=0';
                            openVideoLightbox(embedUrl);
                        }
                    }
                    
                    return false;
                });
            }
        });
        
        // Prevent Elementor Lightbox from being triggered for our items
        jQuery('a.elpt-portfolio-lightbox, a.elpt-portfolio-video-lightbox').each(function() {
            // Remove any class that might trigger Elementor's lightbox
            jQuery(this).removeClass('elementor-clickable');
            // Add attribute that prevents Elementor from opening its lightbox
            jQuery(this).attr('data-elementor-open-lightbox', 'no');
            
            // Prevent event propagation to avoid Elementor capturing it (except for videos that already have handlers)
            if (!jQuery(this).hasClass('elpt-portfolio-video-lightbox') || !jQuery(this).attr('data-video')) {
                jQuery(this).on('click', function(e) {
                    e.stopPropagation();
                });
            }
        });
        
        // Inicializa lightbox para imagens
        jQuery('a.elpt-portfolio-lightbox').simpleLightbox({
            captions: true,
            disableScroll: false,
            rel: true,
        });
    }
    
    // Function to get YouTube video ID from URL
    function getYoutubeId(url) {
        var regExp = /^.*((youtu.be\/)|(v\/)|(\/u\/\w\/)|(embed\/)|(watch\?))\??v?=?([^#&?]*).*/;
        var match = url.match(regExp);
        return (match && match[7].length == 11) ? match[7] : false;
    }
    
    // Function to get Vimeo video ID from URL
    function getVimeoId(url) {
        var regExp = /^.*(vimeo\.com\/)((channels\/[A-z]+\/)|(groups\/[A-z]+\/videos\/))?([0-9]+)/;
        var match = url.match(regExp);
        return match ? match[5] : false;
    }
    
    // Function to open lightbox with embedded video
    function openVideoLightbox(embedUrl) {
        // Create a dark overlay
        var overlay = jQuery('<div id="elpt-video-overlay"></div>')
            .css({
                'position': 'fixed',
                'top': 0,
                'left': 0,
                'width': '100%',
                'height': '100%',
                'background-color': 'rgba(0,0,0,0.9)',
                'z-index': 9999,
                'display': 'flex',
                'justify-content': 'center',
                'align-items': 'center'
            })
            .appendTo('body');
            
        // Create video container
        var videoContainer = jQuery('<div id="elpt-video-container"></div>')
            .css({
                'position': 'relative',
                'width': '80%',
                'max-width': '900px',
                'padding-top': '56.25%', // Aspect ratio 16:9
                'box-sizing': 'border-box'
            })
            .appendTo(overlay);
            
        // Create video iframe
        var iframe = jQuery('<iframe></iframe>')
            .attr({
                'src': embedUrl,
                'frameborder': '0',
                'allowfullscreen': 'true',
                'allow': 'autoplay; fullscreen'
            })
            .css({
                'position': 'absolute',
                'top': 0,
                'left': 0,
                'width': '100%',
                'height': '100%'
            })
            .appendTo(videoContainer);
            
        // Create close button
        var closeButton = jQuery('<div id="elpt-video-close">×</div>')
            .css({
                'position': 'absolute',
                'top': '-40px',
                'right': '0',
                'color': 'white',
                'font-size': '30px',
                'cursor': 'pointer',
                'z-index': 10000
            })
            .appendTo(videoContainer);
            
        // Add click event to close lightbox
        closeButton.on('click', function() {
            overlay.remove();
        });
        
        // Close lightbox when clicking outside video
        overlay.on('click', function(e) {
            if (e.target === this) {
                overlay.remove();
            }
        });
        
        // Close lightbox when pressing ESC
        jQuery(document).on('keydown.elptVideo', function(e) {
            if (e.keyCode === 27) { // ESC key
                overlay.remove();
                jQuery(document).off('keydown.elptVideo');
            }
        });
    }
});