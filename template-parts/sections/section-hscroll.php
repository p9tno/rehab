<?php if (get_field('hscroll_boolean') && get_field('hscroll_images')) { ?>
  <!-- begin hscroll -->
  <section class="hscroll section" id="hscroll">
    <div class="hscroll__content">
      <div class="swiper hscroll_swiper_js">
        <div class="swiper-wrapper">
          <?php 
          $images = get_field('hscroll_images');
          $duplicated_images = array_merge($images, $images);
          
          foreach($duplicated_images as $img_id) { ?>
            <div class="swiper-slide img no_interaction"><?php echo wp_get_attachment_image($img_id['hscroll_img_id'], 'full'); ?></div>
          <?php } ?>
        </div>
      </div>
    </div>
  </section>
  <!-- end hscroll -->
<?php } ?>