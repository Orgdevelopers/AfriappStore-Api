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

        // echo json_encode($this->Users->find('all',array(
        //     'conditions' => array('Users.first_name' => 'test')
        // ))->count());

        // echo json_encode($this->Users->find('all',array(
        //     'conditions' => array('Users.first_name Like ' => '%test%')
        // ))->first());

        echo json_encode($this->params);

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
                'limit' => 5,
            ));

            $details['Reviews'] = $reviews;

            Response::success($details);

        }else{
            Response::noRecords();
        }

        die;

    }


    public function publishApp(){
        $this->checkParams(['app_name','description','long_description']);

        $app_icon = null; // $_FILES['tmp']['app_icon'];

        $this->loadModel('ReviewApps');

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
