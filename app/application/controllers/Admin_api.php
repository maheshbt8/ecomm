<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/API_Controller.php';

class Admin_api extends API_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model('AdminModel');
        $this->load->model('DeliveryBoyModel');
    }

    public function login()
    {
        header("Access-Control-Allow-Origin: *");

        // API Configuration
        $this->_apiConfig([
            'methods' => ['POST'],
        ]);
        $email = $this->input->post('email', TRUE);
        $password = $this->input->post('password', TRUE);
        $userdata = $this->AdminModel->get_admin($email)->result();

        if (!empty($userdata)) {

            if (sha1($password) == $userdata[0]->password) {

                $payload = [
                    "data" => $userdata,
                ];

                // Load Authorization Library or Load in autoload config file
                $this->load->library('authorization_token');

                // generte a token
                $token = $this->authorization_token->generateToken($payload);


                // return data
                $this->api_return(
                    [
                        'status' => true,
                        "result" => [
                            'token' => $token,
                        ],
                        
                    ],
                200);
            }
            else {
                // return data
                $this->api_return(
                    [
                        'status' => false,
                        "messages" => 'Incorrect details'                        
                    ],
                200);
            }
        }
        else {

                // return data
                $this->api_return(
                    [
                        'status' => false,
                        "messages" => 'User not found'                        
                    ],
                200);
            }
    }

    public function view()
    {
        header("Access-Control-Allow-Origin: *");
        // API Configuration [Return Array: User Token Data]
        $user_data = $this->_apiConfig([
            'methods' => ['POST'],
            'requireAuthorization' => true,
        ]);
        
        // return data
        $this->api_return(
            [
                'status' => true,
                "result" => [
                    'user_data' => $user_data['token_data']
                ],
            ],
        200);
    }

    public function deliveryBoyStatus($status){
        header("Access-Control-Allow-Origin: *");
        // API Configuration [Return Array: User Token Data]
        $user_data = $this->_apiConfig([
            'methods' => ['POST'],
            'requireAuthorization' => true
        ]);
        $user_id=$user_data['token_data']['data'][0]->admin_id;
        $checkDeliveryExist= $this->DeliveryBoyModel->checkDataExistOrNot($user_id);
        if(!empty($checkDeliveryExist)){
            $updateStatus=$this->DeliveryBoyModel->updateDeliveryBoyStatus($status,$user_id);
            $this->api_return(
                [
                    'status' => true,
                    'result'=> 'Data Updated Successfully'
                ],
            200);
        }
        else{
            $insertDeliveryBoyDetails=$this->DeliveryBoyModel->InsertDelniveryBoyData($user_id,$status);
            $this->api_return(
                [
                    'status' => true,
                    'result'=> 'Data Inserted Successfully'
                ],
            200);
        }
       
    }

    public function UpdateDeliveryBoyLocation(){
        header("Access-Control-Allow-Origin: *");
        // API Configuration [Return Array: User Token Data]
        $user_data = $this->_apiConfig([
            'methods' => ['POST'],
            'requireAuthorization' => true
        ]);
        $latitude = $this->input->post('latitude', TRUE);
        $longitude = $this->input->post('longitude', TRUE);

        $user_id=$user_data['token_data']['data'][0]->admin_id;
        $checkDeliveryBoyActiveOrNot= $this->DeliveryBoyModel->checkDataExistOrNot($user_id);
        if($checkDeliveryBoyActiveOrNot[0]['delivery_boy_status'] == 1){
            $updateDeliveryBoyLocation=$this->DeliveryBoyModel->updateDeliveryBoyLocation($user_id,$latitude,$longitude);
            $this->api_return(
                [
                    'status' => true,
                    'result'=> 'Data Updated Successfully'
                ],
            200);
        }
        else{
            $this->api_return(
                [
                    'status' => true,
                    'result'=> 'Please Active Your Statusly'
                ],
            200);
        }
       
    }
}