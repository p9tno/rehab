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
    
                    <!-- <form class="form form__grid form_secondary" action="send.php">
                        <div class="form__row">
                            <label>Name</label>
                            <input type="text" placeholder="Name" />
                        </div>
                        <div class="form__row">
                            <label>Name</label>
                            <input type="text" placeholder="Phone" />
                        </div>
                        <div class="form__row form__row_full">
                            <label>How we can help?</label>
                            <input type="text" placeholder="How we can help?" />
                        </div>
                        <div class="form__row form__row_btn">
                            <button class="btn" type="submit">Send</button><span>By clicking the button, you accept the
                                privacy policy and also agree to the processing of your personal data.</span>
                        </div>
                    </form> -->
    
                </div>
            </div>
        </div>
    </div>
    <!-- End modal message -->
<?php } ?>


