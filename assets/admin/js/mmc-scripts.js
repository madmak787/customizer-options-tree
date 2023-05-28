jQuery(document).ready(function() {
    loadInputSettings();
    jQuery(document).on('click','.accordion-header .btn-info', function() {
        if(jQuery(this).parent().parent().hasClass('open')) {
            jQuery(this).parent().parent().removeClass('open');
            jQuery(this).parent().parent().find('.accordion-collapse.collapse').slideUp();
        } else {
            jQuery(this).parent().parent().addClass('open');
            jQuery(this).parent().parent().find('.accordion-collapse.collapse').slideDown();
        }
    });

    jQuery(document).on('click','.accordion-header .btn-danger', function() {
        var ele = jQuery(this).parent().parent();
        if(confirm('Are you sure?')) {
            ele.fadeOut();
            setTimeout(function() {
                ele.remove();
                rearrangeFields();
            },1000);
        }
    });

    jQuery(document).on('keyup change','.accordion-item .label', function() {
        var parent = jQuery(this).parent().parent().parent().parent().parent();
        var val = jQuery(this).val();
        parent.find('.accordion-header .accordion-button').html(val);
        if(parent.hasClass('control')) {
            var slug = val.replace(/\ /g, '_').toLowerCase();
            parent.find('.slug').val(slug);
        }
    });
});

//Functions
function loadInputSettings() {
    var data = {
        'action' : 'mmc_load_input_settings'
    };
    jQuery.ajax({
        url: ajaxurl,
        method: 'POST',
        data: data,
        success: function(result){
            var r = jQuery.parseJSON(result);
            jQuery('#options-wrap').html(r.result);
            initDragDrop();
            rearrangeFields();
        }
    });
}

function addSectionHtml() {
    var data = {
        'action' : 'mmc_add_section_html'
    };
    jQuery.ajax({
        url: ajaxurl,
        method: 'POST',
        data: data,
        success: function(result){
            var r = jQuery.parseJSON(result);
            jQuery('#options').append(r.result);
            initDragDrop();
            rearrangeFields();
        }
    });
}

function addControlHtml() {
    var data = {
        'action' : 'mmc_add_control_html'
    };
    jQuery.ajax({
        url: ajaxurl,
        method: 'POST',
        data: data,
        success: function(result){
            var r = jQuery.parseJSON(result);
            jQuery('#options').append(r.result);
            initDragDrop();
            rearrangeFields();
        }
    });
}

function saveOptionsFields() {
    var data = jQuery('.mmc-form').serialize();
    jQuery.ajax({
        url: ajaxurl,
        method: 'POST',
        data: data,
        success: function(result){
            var r = jQuery.parseJSON(result);
            console.log(r);
            notice(r.message);
            jQuery('html,body').animate({scrollTop:0},0);
            jQuery('.accordion-item').removeClass('open').find('.collapse').slideUp();
        }
    });
}

function initDragDrop() {
    jQuery( "#options" ).sortable({
        update: function(event, ui) {
            rearrangeFields();
        }
    });
}

function rearrangeFields() {
    var values = [];
    var section = -1;
    var control = 0;
    jQuery('.accordion-item').each(function (index) {
        values.push(jQuery(this).attr("id").replace("sort-", ""));
        
        if(jQuery(this).hasClass('section')) {
            section++;
            jQuery(this).find('.form-control').attr('name','section['+section+']');
            control = 0;
        }
        if(jQuery(this).hasClass('control')) {
            jQuery(this).find('.label').attr('name','control['+section+']['+control+'][label]');
            jQuery(this).find('.slug').attr('name','control['+section+']['+control+'][slug]');
            jQuery(this).find('.type').attr('name','control['+section+']['+control+'][type]');
            jQuery(this).find('.description').attr('name','control['+section+']['+control+'][description]');
            jQuery(this).find('.choices').attr('name','control['+section+']['+control+'][choices]');
            control++;
        }
    });
}

function notice(msg) {
    var notice = '<div id="mmc-message" class="updated notice is-dismissible"><p>'+msg+'</p><button type="button" class="notice-dismiss"><span class="screen-reader-text">Dismiss this notice.</span></button></div>';
    jQuery('.mmc-sub').before(notice);
    setTimeout(function() {
        jQuery('#mmc-message').fadeOut();
        setTimeout(function() {
            jQuery('#mmc-message').remove();
        },1000);
    },2000);
}
