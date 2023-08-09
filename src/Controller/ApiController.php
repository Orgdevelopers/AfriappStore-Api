<?php
declare(strict_types=1);

namespace App\Controller;
//namespace App\Lib;
use App\Lib\Utility;
use App\Lib\Functions;
use App\Lib\Response;
use App\Model\Entity\Review;

/**
 * Api Controller
 *
 */
class ApiController extends AppController
{

    public $autoRender = false;
    public $params = array();

    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        //check api keys and params
        $headers = apache_request_headers();

        $api_key = '';

        if(isset($headers['api-key'])){
            $api_key = $headers['api-key'];
        }

        if(isset($headers['API-KEY'])){
            $api_key = $headers['API-KEY'];
        }

        if(isset($headers['Api-Key'])){
            $api_key = $headers['Api-Key'];
        }

        if(isset($headers['x-api-key'])){
            $api_key = $headers['x-api-key'];
        }

        if(!API_KEY_ENABLE){
            $api_key = API_KEY;
        }

        if($api_key == ''){
            //missing
            Response::apiMissing('api key missing');
            die;

        }else if(!$api_key == API_KEY){
            // incorrect key
            Response::apiMissing('incorrect api key');
            die;

        }else{
            //authenticated
        }


        //params setup

        $params = array();

        $post = $_POST;
        $get = $_GET;
        $raw = json_decode("php://input",true);

        if(is_array($post)){
            $params = $post;

        }

        if(is_array($get)){
            $params = array_merge($params,$get);
        }

        if(is_array($raw)){
            $params = array_merge($params,$raw);
        }

        $this->params = $params;

    }

    public function index()
    {


        //Utility::sendMail(Utility::generateEmailTemplate("kinddusingh1k2k3@gmail.com",'Test','something','test'),false);
        //echo PHP_VERSION;
        // echo json_encode($this->Users->find('all',array(
        //     'conditions' => array('Users.first_name' => 'test')
        // ))->count());

        // echo json_encode($this->Users->find('all',array(
        //     'conditions' => array('Users.first_name Like ' => '%test%')
        // ))->first());


        //getting data from teggs :)
        $this->loadModel('Apps');
        echo json_encode($this->Apps->find('all',array(
            'conditions' => array(
                'OR' =>[
                    ['Apps.tags Like' => '%wasstch%'],
                    ['Apps.tags Like' => '%entertainment%']
                ]
                )
        )));

        die;
        echo json_encode($this->params);

    }

    public function showAllTags(){
        $this->loadModel('Tags');

        $page = 0;
        $records_count = ADMIN_RECORDS_PER_PAGE;

        if(isset($this->params['page'])){
            $page = $this->params['page'];
        }

        if(isset($this->params['records_count'])){
            $records_count = $this->params['records_count'];
        }

        $categories = $this->Tags->find('all',array(
            'offset' => $records_count*$page,
            'limit' => $records_count,
        ));

        Response::success($categories);
        die;
    }

    public function showAllCategories(){
        $this->loadModel('Categories');

        $page = 0;
        $records_count = ADMIN_RECORDS_PER_PAGE;

        if(isset($this->params['page'])){
            $page = $this->params['page'];
        }

        if(isset($this->params['records_count'])){
            $records_count = $this->params['records_count'];
        }

        $categories = $this->Categories->find('all',array(
            'offset' => $records_count*$page,
            'limit' => $records_count,
        ));

        Response::success($categories);
        die;

    }


    public function showAllSliders(){
        $this->loadModel('Sliders');

        $page = 0;
        $records_count = ADMIN_RECORDS_PER_PAGE;

        if(isset($this->params['page'])){
            $page = $this->params['page'];
        }

        if(isset($this->params['records_count'])){
            $records_count = $this->params['records_count'];
        }

        $categories = $this->Sliders->find('all',array(
            'offset' => $records_count*$page,
            'limit' => $records_count,
        ));

        Response::success($categories);
        die;

    }


    public function showAllReviews(){

        $this->loadModel('Reviews');
        //$this->loadModel('Users');

        $page = 0;
        $records_count = ADMIN_RECORDS_PER_PAGE;

        if(isset($this->params['page'])){
            $page = $this->params['page'];
        }

        if(isset($this->params['records_count'])){
            $records_count = $this->params['records_count'];
        }

        $reviews = $this->Reviews->find('all',array(
            'contain' => array('Users'),
            'offset' => $records_count*$page,
            'limit' => $records_count,
        ));

        // foreach ($reviews as $key => $review) {
        //     $user = $this->User->find('all',array('conditions' => array('User.id' => $review['user_id'])))->first();

        // }

        Response::success($reviews);

    }

    public function showAllApps(){
        $this->loadModel('Apps');

        $page = 0;
        $records_count = ADMIN_RECORDS_PER_PAGE;

        if(isset($this->params['page'])){
            $page = $this->params['page'];
        }

        if(isset($this->params['records_count'])){
            $records_count = $this->params['records_count'];
        }

        $apps = $this->Apps->find('all',array(
            'offset' => $records_count*$page,
            'limit' => $records_count,
            //'contain' => array('Users','Reviews','AppImages'),
        ));

        Response::success($apps);
        die;

    }


    public function showAllAfriApps(){
        $this->loadModel('Apps');

        $page = 0;
        $records_count = ADMIN_RECORDS_PER_PAGE;

        if(isset($this->params['page'])){
            $page = $this->params['page'];
        }

        if(isset($this->params['records_count'])){
            $records_count = $this->params['records_count'];
        }

        $apps = $this->Apps->find('all',array(
            'conditions' => array('Apps.is_afri_app' => 1),
            'offset' => $records_count*$page,
            'limit' => $records_count,
            //'contain' => array('Users','Reviews','AppImages'),
        ));

        Response::success($apps);
        die;

    }


    // public function showAfriApps(){
    //     $this->loadModel('AfriApps');

    //     $page = 0;
    //     $records_count = ADMIN_RECORDS_PER_PAGE;

    //     if(isset($this->params['page'])){
    //         $page = $this->params['page'];
    //     }

    //     if(isset($this->params['records_count'])){
    //         $records_count = $this->params['records_count'];
    //     }

    //     $apps = $this->AfriApps->find('all',array(
    //         'offset' => $records_count*$page,
    //         'limit' => $records_count,
    //         //'contain' => array('Users','Reviews','AppImages'),
    //     ));

    //     Response::success($apps);
    //     die;

    // }


    // public function showAfriAppDetails(){
    //     $this->checkParams(['app_id']);

    //     $this->loadModel('AfriApps');
    //     $this->loadModel('Reviews');

    //     $id = $this->params['app_id'];

    //     $details = $this->AfriApps->find('all',array(
    //         'conditions' => array('AfriApps.id' => $id),
    //         'contain' => array('AppImages','LongDescription')
    //     ))->first();

    //     if($details){
    //         $reviews = $this->Reviews->find('all',array(
    //             'conditions' => array('Reviews.app_id' => $id),
    //             'contain' => array('Users'),
    //             // 'order' => array('Reviews.id' => 'ASC')
    //             'order' => 'RAND()',
    //             'limit' => 5,
    //         ));

    //         $details['Reviews'] = $reviews;

    //         Response::success($details);

    //     }else{
    //         Response::noRecords();
    //     }

    //     die;

    // }


    public function showAllUsers() {
        $this->loadModel('Users');

        $page = 0;
        $records_count = ADMIN_RECORDS_PER_PAGE;

        if(isset($this->params['page'])){
            $page = $this->params['page'];
        }

        if(isset($this->params['records_count'])){
            $records_count = $this->params['records_count'];
        }

        $users = $this->Users->find('all',array(
            'offset' => $records_count*$page,
            'limit' => $records_count,
        ));

        Response::success($users);
        die;

    }


    public function showCategoryApps(){
        $this->checkParams(['category_id']);

        $this->loadModel('Apps');
        //$this->loadModel()

        $id = $this->params['category_id'];

        $apps = $this->Apps->find('all',array(
            'conditions' => array('Apps.id' => $id)
        ));

        Response::success($apps);

    }


    public function showAppDetails(){
        $this->checkParams(['app_id']);

        $this->loadModel('Apps');
        $this->loadModel('Reviews');
        //$this->loadModel('Users');

        $id = $this->params['app_id'];

        $details = $this->Apps->find('all',array(
            'conditions' => array('Apps.id' => $id),
            'contain' => array('AppImages','LongDescription')
        ))->first();

        if($details){
            $reviews = $this->Reviews->find('all',array(
                'conditions' => array('Reviews.app_id' => $id),
                'contain' => array('Users'),
                // 'order' => array('Reviews.id' => 'ASC')
                'order' => 'RAND()',
                'limit' => 3,
            ));

            if(isset($this->params['user_id'])){
                $user_id = $this->params['user_id'];

                $my_rev = $this->Reviews->find('all',array(
                    'conditions' => array(
                        'Reviews.app_id' => $id,
                        'Reviews.user_id' => $user_id
                    ),
                    'contain' => array('Users'),

                ))->first();

                if($my_rev != null){
                    $details['user_review'] = $my_rev;

                }

            }


            $details['Reviews'] = $reviews;

            //ratings
            $reviews_count = array();
            $reviews_count['1star'] = $this->Reviews->find('all',array('conditions' => array('Reviews.app_id' => $id, 'Reviews.stars' => 1 ),))->count();
            $reviews_count['2star'] = $this->Reviews->find('all',array('conditions' => array('Reviews.app_id' => $id, 'Reviews.stars' => 2 ),))->count();
            $reviews_count['3star'] = $this->Reviews->find('all',array('conditions' => array('Reviews.app_id' => $id, 'Reviews.stars' => 3 ),))->count();
            $reviews_count['4star'] = $this->Reviews->find('all',array('conditions' => array('Reviews.app_id' => $id, 'Reviews.stars' => 4 ),))->count();
            $reviews_count['5star'] = $this->Reviews->find('all',array('conditions' => array('Reviews.app_id' => $id, 'Reviews.stars' => 5 ),))->count();

            $reviews_count['total'] = $reviews_count['1star']+$reviews_count['2star']+$reviews_count['3star']+$reviews_count['4star']+$reviews_count['5star'];

            $rating = 0.0;
            $stars = $reviews_count['1star']+ ($reviews_count['2star'] * 2) + ($reviews_count['3star'] * 3) + ($reviews_count['4star'] * 4) + ($reviews_count['5star'] * 5);
            $total_stars = $reviews_count['total'] * 5;

            $rating = round(($stars / $total_stars) * 5,1);

            $reviews_count['actual_rating'] = $rating;

            $details['reviews_count'] = $reviews_count;

            Response::success($details);

        }else{
            Response::noRecords();
        }

        die;

    }


    public function publishApp(){
        $this->checkParams(['app_name','description','long_description']);

        $app_icon = null; // $_FILES['tmp']['app_icon'];
        $apk_file = null; //$_FILES['tmp']['apk_file'];

        $this->loadModel('ReviewApps');

        $pachage_name = $this->params['package_name'];

        $upload_icon = UPLOAD_FOLDER_PATH.'images/'.uniqid().' '.$pachage_name.'.png';
        $upload_apk = UPLOAD_FOLDER_PATH.'apks/'.uniqid().' '.$pachage_name.'.apk';

        move_uploaded_file($app_icon,$upload_icon);
        move_uploaded_file($apk_file,$upload_apk);

        /////////// work pending /////////

    }

    public function login(){
        $this->checkParams(['email','password']);
        $this->loadModel('Users');

        $user = $this->Users->find('all',array(
            'conditions' => array('Users.email' => $this->params['email'])
        ))->first();

        if($user != null){
            $password = Utility::EncryptPassword($this->params['password']);
            if($user['password'] == $password){
                //login successfull
                Response::success($user);
            }else{
                Response::AuthorizationRevoked('incorrect password');
            }

        }else{
            Response::noRecords('user not found');
        }

        die;
    }

    public function signup(){
        $this->checkParams(['email','password','first_name','last_name']);

        //load models
        $this->loadModel('Users');

        $email_user = $this->Users->find('all',array(
            'conditions' => array('Users.email' => $this->params['email'])
        ))->first();

        if($email_user == null){

            $user = $this->Users->newEmptyEntity();

            $password = Utility::EncryptPassword($this->params['password']);

            if(isset($this->params['profile_pic'])){
                $path = UPLOAD_FOLDER_PATH.'images/'.uniqid().'.png';
                $hash = $this->params['profile_pic'];

                Utility::base64ToImage($path,$hash);
                $user->profile_pic = $path;
            }

            $user->first_name = $this->params['first_name'];
            $user->last_name = $this->params['last_name'];
            $user->email = $this->params['email'];
            $user->password = $password;

            $data = $this->Users->save($user);
            if($data){

                $id = $data['id'];

                $user = $this->Users->find('all',array(
                    'conditions' => array('Users.id' => $id)
                ))->first();

                $username  = $user['first_name'].' '.$user['last_name'];

                $message = Functions::getVerificationEmailTemplate($username,$user['email'],Utility::EncryptPassword($user['id']));
                $email_data = array(
                    'to' => $user['email'],
                    'name'=>$username,
                    'subject' => VERIFICATION_EMAIL_SUBJECT,
                    'message' => $message
                );

                Utility::sendMail($data,true);
                Response::success($user);


            }else{
                //
                Response::AuthorizationRevoked('failed to register');
            }


        }else{
            //user already exists
            Response::AuthorizationRevoked("user already exists with this email");
        }

        die;

    }

    public function testEmail(){
        //$message = Functions::getVerificationEmailTemplate('kulvinder','kinddusingh1k2k3@gmail.com',Utility::EncryptPassword("1"));
        $email_data = array(
            'to' => 'kinddusingh1k2k3@gmail.com',
            'name'=> 'kulvinder',
            'subject' => VERIFICATION_EMAIL_SUBJECT,
            'message' => 'testEmail sent from localhost.'
        );

        echo json_encode(Utility::sendMail($email_data,false));
    }


    public function verifyEmail(){
        $this->checkParams(['token']);

        $id = Utility::DecryptPassword($this->params['token']);

        $this->loadModel('Users');

        $user = $this->Users->find('all',array(
            'conditions' => array('Users.id' => $id)
        ))->first();

        if($user){

            if($user['verified'] = 0){

                $user->verified = 1;
                $this->Users->save($user);

                echo 'accound verified you can close this page now';


            }else if($user['verified'] = 1){
                //already verified
                echo 'account already verified';

            }else{
                //account blocked or banned
                echo 'access restricted your account has been blocked by admin';
            }

        }else{
            //user not found
            echo 'user not found';
        }

    }

    public function forgetPassword(){
        $this->checkParams(['email']);

        $this->loadModel('Users');

        $user = $this->Users->find('all',array(
            'conditions' => array('Users.email' => $this->params['email'])
        ))->first();

        $otp = rand(100000,999999);

        if($user!=null){
            $email_data = array(
                'to' => $this->params['email'],
                'name'=> $user['first_name'].' '.$user['last_name'],
                'subject' => 'Forget Password',
                'message' => 'Here is your Verification code for AfriappStore :- '.$otp
            );

            Utility::sendMail($email_data);

            Response::success($otp.'');

        }else{
            Response::noRecords("user not found");
        }
        die;

    }


    public function updatePassword(){
        $this->checkParams(['email','password']);
        $this->loadModel('Users');

        $user = $this->Users->find('all',array(
            'conditions' => array('Users.email' => $this->params['email'])
        ))->first();

        if($user!=null){

            $password = Utility::EncryptPassword($this->params['password']);

            $user->password = $password;
            $this->Users->save($user);
            // $email_data = array(
            //     'to' => $this->params['email'],
            //     'name'=> $user['first_name'].' '.$user['last_name'],
            //     'subject' => 'Forget Password',
            //     'message' => 'Here is your Verification code for AfriappStore :- '.$otp
            // );

            // Utility::sendMail($email_data);

            Response::success('password updated successfully');

        }else{
            Response::noRecords("user not found");
        }
        die;

    }

    public function checkParams($params_names)
    {
        foreach ($params_names as $key => $params_name) {
            if(!isset($this->params[$params_name])){
                Response::missingParams();
                die;
            }
        }

    }



}
