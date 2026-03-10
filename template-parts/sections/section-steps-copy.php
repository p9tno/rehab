<?php if (get_field('steps-copy_boolean')) { ?>
  <!-- begin steps -->
  <section class="steps section" id="steps">
    <div class="container_center">
      <?php if (get_field('steps-copy_label')) { ?>
        <div class="section__label"><?php the_field('steps-copy_label'); ?></div>
      <?php } ?>
      <?php if (get_field('steps-copy_title')) { ?>
        <h2 class="section__title"><?php the_field('steps-copy_title'); ?></h2>
      <?php } ?>
      <?php if (get_field('steps-copy_desc')) { ?>
        <div class="section__desc"><?php the_field('steps-copy_desc'); ?></div>
      <?php } ?>
  
      <?php 
      $steps = get_field('steps-copy_list');
      if( $steps ) { ?>
        <div class="steps__grid counter-wrap no_zero">
          <?php foreach( $steps as $item ) { ?>
            <div class="steps__item counter-item">
              <div class="steps__label"><span class="counter-el"></span></div>
              <div class="steps__title"><?php echo $item['steps-copy_list_title']; ?></div>
              <div class="section__content"><?php echo $item['steps-copy_list_desc']; ?></div>
            </div>
          <?php } ?>
        </div>
      <?php } ?>

      <?php render_section_buttons('steps-copy_first_btn','steps-copy_second_btn'); ?>
    </div>
  </section>
  <!-- end steps -->
<?php } ?>