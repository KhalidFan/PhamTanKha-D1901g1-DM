jQuery(document).ready(function ($) {
    if (scriptParams.simple_banner_text != "") {
        if (!scriptParams.pro_version_enabled || (scriptParams.pro_version_enabled && !scriptParams.in_array)) {
            $('<div id="simple-banner" class="simple-banner"><div class="simple-banner-text"><span>' + scriptParams.simple_banner_text + '</span></div></div>')
                .prependTo('body');

            var bodyPaddingLeft = $('body').css('padding-left')
            var bodyPaddingRight = $('body').css('padding-right')

            if (bodyPaddingLeft != "0px") {
                $('head').append('<style type="text/css" media="screen">.simple-banner{margin-left:-' + bodyPaddingLeft + ';padding-left:' + bodyPaddingLeft + ';}</style>');
            }
            if (bodyPaddingRight != "0px") {
                $('head').append('<style type="text/css" media="screen">.simple-banner{margin-right:-' + bodyPaddingRight + ';padding-right:' + bodyPaddingRight + ';}</style>');
            }
        }
    }

    // Debug Mode
    // Console log all variables
    if (scriptParams.pro_version_enabled && scriptParams.debug_mode) {
        console.log(scriptParams);
    }
});
