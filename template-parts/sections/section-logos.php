<?php 

$logos = get_field('logos_list', 'option');
if( $logos && get_field('logos_boolean') ) { ?>

  <!-- begin logos -->
  <section class="logos section" id="logos">
      <div class="logos__swiper">
          <div class="container_center">
              <div class="swiper logos_swiper_js">
                <div class="swiper-wrapper">
                  <?php foreach( $logos as $logo_id ) { ?>
                    <div class="swiper-slide">
                      <?php if ($logo_id['logos_img_url']) { ?>
                        <a href="<?php echo $logo_id['logos_img_url']; ?>" target="_blank" class="logos__img">
                          <?php echo wp_get_attachment_image($logo_id['logos_img_id'], 'full'); ?>
                        </a>
                      <?php } else { ?>
                        <div class="logos__img">
                          <?php echo wp_get_attachment_image($logo_id['logos_img_id'], 'full'); ?>
                        </div>
                      <?php } ?>
                    </div>
                  <?php } ?>
                </div>
                <div class="swiper-pagination logos_pagination_js mobile"></div>
                <div class="swiper-nav logos__nav desktop">
                  <i class="swiper-arrow icon_arrow_left"></i>
                  <i class="swiper-arrow icon_arrow_right"></i>
                </div>
              </div>
          </div>
      </div>
  </section>
  <!-- end logos -->

<?php } ?>