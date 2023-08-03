<?php
namespace App\Lib;

class Response {

    public static function success($msg){
        echo json_encode(array('code'=>200,'msg'=>$msg));
    }

    public static function AuthorizationRevoked($msg = '')
    {
        echo json_encode(array('code'=>401,'msg'=>'Unauthorized-'.$msg));
    }

    public static function missingParams($msg = "incomplete parameters")
    {
        echo json_encode(array('code'=>422,'msg'=>$msg));
    }

    public static function noRecords($msg = 'no records')
    {
        echo json_encode(array('code'=>201,'msg'=> $msg));

    }

}

?>
