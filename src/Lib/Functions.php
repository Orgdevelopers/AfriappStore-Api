<?php
namespace App\Lib;

class Functions {

    public static function index(){
        return '';
    }

    public static function getVerificationEmailTemplate($username,$email,$token){

        $raw = file_get_contents(BASE_URL.VERIFICATION_EMAIL_TEMPLATE_PATH);

        $header = VERIFICATION_EMAIL_HEADING;
        $body = VERIFICATION_EMAIL_BODY;

        $body = str_replace('{first_name}',$username,$body);
        $body = str_replace('{company_name}',APP_NAME,$body);

        //

        $raw = str_replace('${body}',$body,$raw);
        $raw = str_replace('${heading}',$header,$raw);
        $raw = str_replace('${btn_txt}',VERIFICATION_EMAIL_BTN_TXT,$raw);
        $raw = str_replace('${verification_link}',BASE_URL.'api/verifyEmail?token='.$token,$raw);

        return $raw;
    }


    public static function getCustomEmailTemplate($header,$body,$btn_txt,$btn_enabled){

        $raw = file_get_contents(BASE_URL.VERIFICATION_EMAIL_TEMPLATE_PATH);

        $raw = str_replace('${body}',$body,$raw);
        $raw = str_replace('${heading}',$header,$raw);
        $raw = str_replace('${btn_txt}',$btn_txt,$raw);
        $raw = str_replace('${verification_link}','https://google.com',$raw);

        return $raw;
    }


}

?>
