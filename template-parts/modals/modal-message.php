<?php if (get_field('header_wp_form_relations', 'option')) {
    $form_id = get_field('header_wp_form_relations', 'option');    
    ?>
    
    
 
    <!-- Begin Modal message -->
    <div class="modal lg fade message admission" id="message">
        <div class="modal-dialog">
            <div class="modal-content"><a class="modal-close" href="#" data-dismiss="modal"></a>
                <div class="modal-header">
                    <div class="modal-title">Admission Form</div>
                </div>
                <div class="modal-body">
                    <?php echo do_shortcode('[wpforms id="' . $form_id . '"]'); ?>
                </div>
            </div>
        </div>
    </div>
    <!-- End modal message -->
<?php } ?>


