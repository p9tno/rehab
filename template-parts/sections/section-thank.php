<!-- begin thank -->
<section id="thank" class="thank section">
    <div class="container_center">
    
       
        <div class="thank__wrap">
            <?php if (get_field('thank_img_id')) { ?>
                <div class="thank__img img"><?php echo wp_get_attachment_image(get_field('thank_img_id'), 'full'); ?></div>
            <?php } ?>
            <?php if (get_field('thank_title')) { ?>
                <h1 class="thank__title"><?php the_field('thank_title'); ?></h1>
            <?php } ?>
            <?php if (get_field('thank_desc')) { ?>
                <div class="thank__desc"><span><?php the_field('thank_desc'); ?></span></div>
            <?php } ?>
            <div class="thank__btn">
                <a class="btn" href="<?php echo esc_url(home_url("/")) ?>">Go to Main Page</a>
            </div>
        </div>
       

    </div>
</section>
<!-- end thank -->