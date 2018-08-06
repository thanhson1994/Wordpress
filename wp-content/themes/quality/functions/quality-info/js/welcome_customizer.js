jQuery(document).ready(function() {
    var quality_aboutpage = qualityLiteWelcomeScreenCustomizerObject.aboutpage;
    var quality_nr_actions_required = qualityLiteWelcomeScreenCustomizerObject.nr_actions_required;

    /* Number of required actions */
    if ((typeof quality_aboutpage !== 'undefined') && (typeof quality_nr_actions_required !== 'undefined') && (quality_nr_actions_required != '0')) {
        jQuery('#accordion-section-themes .accordion-section-title').append('<a href="' + quality_aboutpage + '"><span class="quality-actions-count">' + quality_nr_actions_required + '</span></a>');
    }

    /* Upsell in Customizer (Link to Welcome page) */
    if ( !jQuery( ".quality-upsells" ).length ) {
        jQuery('#customize-theme-controls > ul').prepend('<li class="accordion-section quality-upsells">');
    }
    if (typeof quality_aboutpage !== 'undefined') {
        jQuery('.quality-upsells').append('<a style="width: 80%; margin: 5px auto 15px auto; display: block; text-align: center;" href="' + quality_aboutpage + '" class="button" target="_blank">{themeinfo}</a>'.replace('{themeinfo}', qualityLiteWelcomeScreenCustomizerObject.themeinfo));
    }
    if ( !jQuery( ".quality-upsells" ).length ) {
        jQuery('#customize-theme-controls > ul').prepend('</li>');
    }
});