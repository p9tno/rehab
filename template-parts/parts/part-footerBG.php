<?php if (get_field('footer_img_bottom', 'option')) { ?>
    <div class="footer__bg no_interaction desktop">
        <img 
            class="parallax-el-js" 
            data-speed="-0.8" 
            data-scale="1.05"
            src="<?php echo wp_get_attachment_url(get_field('footer_img_bottom', 'option')); ?>" alt="map" 
        />
    </div>
<?php } ?> 
