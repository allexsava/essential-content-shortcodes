(function($) {
    $(document).ready(function () {
        if($('.acidcode__carousel').length){
            $('.acidcode__carousel').each(function(i,v){

                var slider = $(this),
                    options = options || {},
                    slider_fullwidth = '',

                    slider_duration = slider.data('duration'),
                    slider_padding = slider.data('padding'),
                    slider_shift = slider.data('shift'),
                    slider_autoplay = slider.data('autoplay');

                    if(slider.hasClass('acidcode__carousel--full-width')){
                        slider_fullwidth = true;

                        var arrows = `<div class="carousel-fixed-item">
                                        <div class="left">
                                            <a href="#" class="movePrevCarousel middle-indicator-text waves-effect waves-light content-indicator">
                                                <i class="material-icons left  middle-indicator-text">chevron_left</i>
                                            </a>
                                        </div>
                                    <div class="right">
                                             <a href="#" class=" moveNextCarousel middle-indicator-text waves-effect waves-light content-indicator">
                                                <i class="material-icons right middle-indicator-text">chevron_right</i>
                                             </a>
                                        </div>
                                    </div>`;

                        slider.prepend(arrows);

                        slider.find('.moveNextCarousel').click(function(e){
                            e.preventDefault();
                            e.stopPropagation();
                            slider.carousel('next');
                        });

                        slider.find('.movePrevCarousel').click(function(e){
                            e.preventDefault();
                            e.stopPropagation();
                            slider.carousel('prev');
                        });

                    } else {
                        slider_fullwidth = false;
                    }

                function callback() {
                    if(slider_autoplay === 'on'){
                        slider.carousel('next');
                        setTimeout(callback, 3500);
                    }

                }

                    $.extend(options, {
                        indicators: true,
                        duration: slider_duration,
                        padding: slider_padding,
                        shift: slider_shift,
                        fullWidth: slider_fullwidth
                    });
                    // console.log(options);

                slider.carousel(options,callback());
            });


        }
            $('.parallax').parallax();
    });
})(jQuery);