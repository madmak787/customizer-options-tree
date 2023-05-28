<div class="accordion-item section" id="sort-<?php echo esc_attr($s_index);?>">
    <h2 class="accordion-header">
        <button class="accordion-button collapsed" type="button">
            <?php echo esc_html($section['label']); ?>
        </button>
        <button type="button" class="btn btn-info btn-sm" data-up="<?php echo esc_attr($up_html);?>" data-down="<?php echo esc_attr($down_html);?>"><?php echo esc_html($down_html);?></button>
        <button type="button" class="btn btn-danger btn-sm"><?php echo esc_html($close_html);?></button>
    </h2>
    <div class="accordion-collapse collapse">
        <div class="accordion-body">
            <div class="input-wrap">
                <div class="half">
                    <input type="text" class="form-control label" name="section[<?php echo esc_attr($s_index);?>]" placeholder="Section Name" value="<?php echo esc_attr($section['label']);?>" />
                </div>
                <label class="half"><strong>Section Title:</strong> Displayed as Section in Appearance &#187; Customize.</label>
            </div>
        </div>
    </div>
</div>