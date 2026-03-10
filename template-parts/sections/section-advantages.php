<?php if (get_field('advantages_boolean')) { ?>
  <!-- begin advantages -->
  <section class="advantages section" id="advantages">
      <div class="container_center">
          <div class="advantages__content">
            <?php if (get_field('advantages_label')) { ?>
              <div class="section__label"><?php the_field('advantages_label'); ?></div>
            <?php } ?>
            <?php if (get_field('advantages_title')) { ?>
              <h2 class="section__title"><?php the_field('advantages_title'); ?></h2>
            <?php } ?>
            <?php if (get_field('advantages_desc')) { ?>
              <div class="section__desc"><?php the_field('advantages_desc'); ?></div>
            <?php } ?>

            <?php 
            $rows = get_field('advantages_list');
            if( $rows ) { ?>
              <div class="advantages__list">
                <?php foreach( $rows as $row ) { ?>
                    <div class="advantages__item">
                      <div class="section__icon"><?php echo wp_get_attachment_image($row['advantages_list_img_id'], 'full'); ?></div>
                      <div class="section__subtitle"><?php echo $row['advantages_list_item']; ?></div>
                      <div class="section__content"><?php echo $row['advantages_list_desc']; ?></div>
                    </div>
                <?php } ?>
              </div>
            <?php } ?>
  
            <?php render_section_buttons('advantages_first_btn','advantages_second_btn'); ?>  
          </div>
      </div>
  </section>
  <!-- end advantages -->
<?php } ?>