jQuery(document).ready(function() {

	/* If there are required actions, add an icon with the number of required actions in the About quality page -> Actions required tab */
    var quality_nr_actions_required = qualityLiteWelcomeScreenObject.nr_actions_required;

    if ( (typeof quality_nr_actions_required !== 'undefined') && (quality_nr_actions_required != '0') ) {
        jQuery('li.quality-w-red-tab a').append('<span class="quality-actions-count">' + quality_nr_actions_required + '</span>');
    }

    /* Dismiss required actions */
    jQuery(".quality-dismiss-required-action").click(function(){

        var id= jQuery(this).attr('id');
        console.log(id);
        jQuery.ajax({
            type       : "GET",
            data       : { action: 'quality_dismiss_required_action',dismiss_id : id },
            dataType   : "html",
            url        : qualityLiteWelcomeScreenObject.ajaxurl,
            beforeSend : function(data,settings){
				jQuery('.quality-tab-pane#actions_required h1').append('<div id="temp_load" style="text-align:center"><img src="' + qualityLiteWelcomeScreenObject.template_directory + '/inc/quality-info/img/ajax-loader.gif" /></div>');
            },
            success    : function(data){
				jQuery("#temp_load").remove(); /* Remove loading gif */
                jQuery('#'+ data).parent().remove(); /* Remove required action box */

                var quality_lite_actions_count = jQuery('.quality-actions-count').text(); /* Decrease or remove the counter for required actions */
                if( typeof quality_lite_actions_count !== 'undefined' ) {
                    if( quality_lite_actions_count == '1' ) {
                        jQuery('.quality-actions-count').remove();
                        jQuery('.quality-tab-pane#actions_required').append('<p>' + qualityLiteWelcomeScreenObject.no_required_actions_text + '</p>');
                    }
                    else {
                        jQuery('.quality-actions-count').text(parseInt(quality_lite_actions_count) - 1);
                    }
                }
            },
            error     : function(jqXHR, textStatus, errorThrown) {
                console.log(jqXHR + " :: " + textStatus + " :: " + errorThrown);
            }
        });
    });

	/* Tabs in welcome page */
	function quality_welcome_page_tabs(event) {
		jQuery(event).parent().addClass("active");
        jQuery(event).parent().siblings().removeClass("active");
        var tab = jQuery(event).attr("href");
        jQuery(".quality-tab-pane").not(tab).css("display", "none");
        jQuery(tab).fadeIn();
	}

	var quality_actions_anchor = location.hash;

	if( (typeof quality_actions_anchor !== 'undefined') && (quality_actions_anchor != '') ) {
		quality_welcome_page_tabs('a[href="'+ quality_actions_anchor +'"]');
	}

    jQuery(".quality-nav-tabs a").click(function(event) {
        event.preventDefault();
		quality_welcome_page_tabs(this);
    });

		/* Tab Content height matches admin menu height for scrolling purpouses */
	 $tab = jQuery('.quality-tab-content > div');
	 $admin_menu_height = jQuery('#adminmenu').height();
	 if( (typeof $tab !== 'undefined') && (typeof $admin_menu_height !== 'undefined') )
	 {
		 $newheight = $admin_menu_height - 180;
		 $tab.css('min-height',$newheight);
	 }

});
