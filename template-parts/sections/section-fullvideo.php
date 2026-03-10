<?php if (get_field('fullvideo_boolean') && get_field('fullvideo_short_video_id')) { ?>
  <!-- begin fullvideo -->
  <section class="fullvideo section" id="fullvideo">
    <div class="container_center">
      <div class="fullvideo__content">
          <div class="video">
            <video 
              class="video__teg" 
              width="100%" 
              allowfullscreen="true" 
              muted="muted" 
              autoplay="autoplay"
              playsinline="playsinline" 
              loop="loop"
              poster="<?php echo wp_get_attachment_image_src(get_field('fullvideo_poster_id'), 'full')[0]; ?>"
            >
              <source src="<?php echo wp_get_attachment_url(get_field('fullvideo_short_video_id')); ?>" type="video/mp4" />
            </video>
            
            <?php if (get_field('fullvideo_video_id')) { ?>
              <a 
                class="videoModal_js video__btn" 
                href="#modalVideo" 
                data-src="<?php echo wp_get_attachment_url(get_field('fullvideo_video_id')); ?>"
                data-poster="<?php echo wp_get_attachment_image_src(get_field('fullvideo_poster_id'), 'full')[0]; ?>"
              >
                <svg width="48" height="48" viewBox="0 0 24 24" fill="currentColor"><path d="M8 5v14l11-7z" /></svg>
              </a>
            <?php } ?>
          </div>
      </div>
      <?php render_section_buttons('fullvideo_first_btn','fullvideo_second_btn'); ?>
    </div>
  </section>
  <!-- end fullvideo -->
<?php } ?>