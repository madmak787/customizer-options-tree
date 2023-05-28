<div class="accordion-item control" id="sort-<?php echo esc_attr($s_index);?>-<?php echo esc_attr($c_index);?>">
    <h2 class="accordion-header">
        <button class="accordion-button collapsed" type="button">
            <?php echo esc_html($control['label']);?>
        </button>
        <button type="button" class="btn btn-info btn-sm" data-up="<?php echo esc_attr($up_html);?>" data-down="<?php echo esc_attr($down_html);?>"><?php echo esc_html($down_html);?></button>
        <button type="button" class="btn btn-danger btn-sm"><?php echo esc_html($close_html);?></button>
    </h2>
    <div id="collapseTwo" class="accordion-collapse collapse">
        <div class="accordion-body">
            <div class="input-wrap">
                <div class="half">
                    <input type="text" class="form-control label" name="control[<?php echo esc_attr($s_index);?>][<?php echo esc_attr($c_index);?>][label]" value="<?php echo esc_html($control['label']);?>" placeholder="Label" />
                </div>
                <div class="half">
                    <label class="form-label"><b>Label:</b> Displayed as the label of a form element on the Theme Options page.</label>
                </div>
            </div>
            <div class="input-wrap">
                <div class="half">
                    <input type="text" class="form-control slug" name="control[<?php echo esc_attr($s_index);?>][<?php echo esc_attr($c_index);?>][slug]" value="<?php echo esc_html(MAKCustomizer_slug($control['label']))?>" placeholder="Slug" />
                </div>
                <div class="half">
                    <label class="form-label"><b>Slug:</b> A unique lower case alphanumeric string, underscores allowed.</label>
                </div>
            </div>
            <?php
            //Add range
            //Add mime type
            //Add menu, just register dropdown control and get all menu in that
            $types = ['text', 'textarea', 'email', 'url', 'number', 'hidden', 'date', 'radio', 'checkbox', 'select', 'dropdown-pages', 'range', 'color', 'upload', 'media', 'image'];
            sort($types);
            ?>
            <div class="input-wrap">
                <div class="half">
                    <select class="form-control type" name="control[<?php echo esc_attr($s_index);?>][<?php echo esc_attr($c_index);?>][type]">
                        <option selected>-Type-</option>
                        <?php
                        foreach($types as $type) {
                            $selected = $type==$control['type']?'selected="selected"':'';
                            ?>
                            <option value="<?php echo esc_attr($type);?>" <?php echo esc_attr($selected);?>><?php echo esc_html(MAKCustomizer_unslug($type));?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="half">
                    <label class="form-label"><b>Type:</b> Choose one of the available option types from the dropdown.</label>
                </div>
            </div>
            <div class="input-wrap">
                <div class="half">
                    <textarea class="form-control description" rows="3" name="control[<?php echo esc_attr($s_index);?>][<?php echo esc_attr($c_index);?>][description]" placeholder="Descriptions"><?php echo esc_html($control['description']);?></textarea>
                </div>
                <div class="half">
                    <label class="form-label"><b>Description:</b> Enter a detailed description for the users to read on the Theme Options page, HTML is allowed. This is also where you enter content for both the Textblock & Textblock Titled option types.</label>
                </div>
            </div>
            <div class="input-wrap">
                <div class="half">
                    <textarea class="form-control choices" rows="1" name="control[<?php echo esc_attr($s_index);?>][<?php echo esc_attr($c_index);?>][choices]" placeholder="Choices"><?php echo esc_html($control['choices']);?></textarea>
                </div>
                <div class="half">
                    <label class="form-label"><b>Choices:</b> This will only affect the following option types: Radio & Select <i>(Options seperated by '|' eg: Option 1|Option 2)</i>.</label>
                </div>
            </div>
        </div>
    </div>
</div>