<?php
add_filter( 'wpcf7_validate_email*', 'custom_business_email_validation_filter', 20, 2 );

function custom_business_email_validation_filter( $result, $tag ) {
    if ( 'email' == $tag->name ) {
        $email = isset( $_POST['email'] ) ? trim( $_POST['email'] ) : '';

        $lang = isset( $_POST['lang'] ) ? trim( $_POST['lang'] ) : '';

        if($lang == 'de') :

            $error_msg = 'Das ist keine Firmen-E-Mailadresse';

        elseif($lang == 'us') :

            $error_msg = 'Please use a business email';

        else :
            $error_msg = 'Please use a business email';
        endif;



        if(!is_company_email($email)) :
            $result->invalidate( $tag, $error_msg );
        endif;

    }


    return $result;
}

function is_company_email($email){
// Check against list of common public email providers & return true if the email provided *doesn't* match one of them
    $blocklist = json_decode(
        file_get_contents(
            WPCF7BV_PLUGIN_DIR . '/domains.json', true
        )
    );

    $parts = explode('@', $email);
    $domain = end($parts);

    if (in_array($domain, $blocklist)) {
        return false;
    } else {
        return true;
    }
}
