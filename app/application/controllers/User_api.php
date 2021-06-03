<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/API_Controller.php';

class User_Api extends API_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model('User');
        $this->load->model('CategoryModel');
        $this->load->model('SubCategoryModel');
        $this->load->model('BrandModel');
        $this->load->model('VendorModel');
        $this->load->model('ProductModel');
        $this->load->model('BlogModel');
        $this->load->model('BannerModel');
        $this->load->model('BlogCategoryModel');
        $this->load->model('StockModel');
        $this->load->model('RatingModel');
        $this->load->model('CouponModel');
        $this->load->model('LanguageModel');
    }

    /**
     * Simple API
     * 
     * @link : api/v1/simple
     */
    public function simple_api()
    {
        header("Access-Control-Allow-Origin: *");

        // API Configuration
        $this->_apiConfig([
            'methods' => ['POST', 'GET'], // Request Execute Only POST and GET Method
        ]);
    }


    /**
     * API Limit
     * 
     * @link : api/v1/limit
     */
    public function api_limit()
    {
        /**
         * API Limit
         * ----------------------------------
         * @param: {int} API limit Number
         * @param: {string} API limit Type (IP)
         * @param: {int} API limit Time [minute]
         */

        $this->_APIConfig([
            'methods' => ['POST'],

            /**
             * Number limit, type limit, time limit (last minute)
             */
            'limit' => [1000, 'ip', 'everyday'] 
        ]);
    }

    /**
     * API Key without Database
     */
    public function api_key()
    {
        /**
         * Use API Key without Database
         * ---------------------------------------------------------
         * @param: {string} Types
         * @param: {string} API Key
         */

        $this->_APIConfig([
            'methods' => ['POST'],
            // 'key' => ['header', '123456'],

            // API Key with Database
            'key' => ['header'],

            // Add Custom data in API Response
            'data' => [
                'is_login' => false,
            ],
        ]);

        // Data
        $data = array(
            'status' => 'OK',
            'data' => [
                'user_id' => 12,
            ]
        );

        /**
         * Return API Response
         * ---------------------------------------------------------
         * @param: API Data
         * @param: Request Status Code
         */
        if (!empty($data)) {

            $this->api_return($data, '200');
        } else {
            
            $this->api_return(['statu' => false, 'error' => 'Invalid Data'], '404');
        }
    }

    /**
     * Login User with API
     */
    public function login()
    {
        header("Access-Control-Allow-Origin: *");

        // API Configuration
        $this->_apiConfig([
            'methods' => ['POST'],
        ]);
        $email = $this->input->post('email', TRUE);
        $password = $this->input->post('password', TRUE);
        $userdata = $this->User->get_user($email)->result();

        if (!empty($userdata)) {

            if (password_verify($password, $userdata[0]->password)) {

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

    /**
     * View User Data
     *
     * @method POST
     * @return Response|void
     */
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

    public function allCategories(){
        header("Access-Control-Allow-Origin: *");
        $category = $this->CategoryModel->get_all_categories()->result_array();
        $this->_apiConfig([
            'methods' => ['POST'],
            'requireAuthorization' => true,
        ]);
        $this->api_return(
            [
                'status' => true,
                "result" => [
                    'categories' => $category
                ],
            ],
        200);
        
    }

    public function subCategoriesList(){
        header("Access-Control-Allow-Origin: *");
        $subcategoryList = $this->SubCategoryModel->get_all_subcategories()->result();
        $this->_apiConfig([
            'methods' => ['POST'],
            'requireAuthorization' => true,
        ]);
        $this->api_return(
            [
                'status' => true,
                "result" => [
                    'sub_categories' => $subcategoryList
                ],
            ],
        200);
    }

    public function subCategory($category_id){
        header("Access-Control-Allow-Origin: *");
        $subcategory = $this->SubCategoryModel->get_subcategory($category_id)->result();
        $this->_apiConfig([
            'methods' => ['POST'],
            'requireAuthorization' => true,
        ]);
        $this->api_return(
            [
                'status' => true,
                "result" => [
                    'subcategory' => $subcategory
                ],
            ],
        200);
    }

    public function allBrands(){
        header("Access-Control-Allow-Origin: *");
        $brandList= $this->BrandModel->get_all_brands();
        $this->_apiConfig([
            'methods' => ['POST'],
            'requireAuthorization' => true,
        ]);
        $this->api_return(
            [
                'status' => true,
                "result" => [
                    'brand_list' => $brandList
                ],
            ],
        200);
    }

    public function latestVendors(){
        header("Access-Control-Allow-Origin: *");
        $VendorList= $this->VendorModel->get_all_latest_vendors();
        $this->_apiConfig([
            'methods' => ['POST'],
            'requireAuthorization' => true,
        ]);
        $this->api_return(
            [
                'status' => true,
                "result" => [
                    'vendor_list' => $VendorList
                ],
            ],
        200);
    }

    public function vendorProfile($vendor_id){
        header("Access-Control-Allow-Origin: *");
        $VendorProfile= $this->VendorModel->get_vendor_profile($vendor_id);
        $this->_apiConfig([
            'methods' => ['POST'],
            'requireAuthorization' => true,
        ]);
        $this->api_return(
            [
                'status' => true,
                "result" => [
                    'vendor_profile' => $VendorProfile
                ],
            ],
        200);
    }
    public function latestFeatureProducts(){
        header("Access-Control-Allow-Origin: *");
        $latestFeatureProducts= $this->ProductModel->get_latest_feature_products();
        $this->_apiConfig([
            'methods' => ['POST'],
            'requireAuthorization' => true,
        ]);
        $this->api_return(
            [
                'status' => true,
                "result" => [
                    'latest_featur_products' => $latestFeatureProducts
                ],
            ],
        200);
    }
    
    public function todayDealsProducts(){
        header("Access-Control-Allow-Origin: *");
        $todayDealsProducts= $this->ProductModel->get_today_deals_products();
        $this->_apiConfig([
            'methods' => ['POST'],
            'requireAuthorization' => true,
        ]);
        $this->api_return(
            [
                'status' => true,
                "result" => [
                    'today_deals_products' => $todayDealsProducts
                ],
            ],
        200);
    }

    public function bundleProducts(){
        header("Access-Control-Allow-Origin: *");
        $bundleProducts= $this->ProductModel->get_bundle_products();
        $this->_apiConfig([
            'methods' => ['POST'],
            'requireAuthorization' => true,
        ]);
        $this->api_return(
            [
                'status' => true,
                "result" => [
                    'bundle_products' => $bundleProducts
                ],
            ],
        200);
    }

    public function ClassifiedProducts(){
        header("Access-Control-Allow-Origin: *");
        $classifiedProducts= $this->ProductModel->get_classified_products();
        $this->_apiConfig([
            'methods' => ['POST'],
            'requireAuthorization' => true,
        ]);
        $this->api_return(
            [
                'status' => true,
                "result" => [
                    'classified_products' => $classifiedProducts
                ],
            ],
        200);
    }

    public function LatestBlogs(){
        header("Access-Control-Allow-Origin: *");
        $latestBlogs= $this->BlogModel->get_latest_blogs();
        $this->_apiConfig([
            'methods' => ['POST'],
            'requireAuthorization' => true,
        ]);
        $this->api_return(
            [
                'status' => true,
                "result" => [
                    'latest_blogs' => $latestBlogs
                ],
            ],
        200);
    }

    public function BlogCategoryList(){
        header("Access-Control-Allow-Origin: *");
        $blogCategoryList= $this->BlogCategoryModel->get_blog_category_list();
        $this->_apiConfig([
            'methods' => ['POST'],
            'requireAuthorization' => true,
        ]);
        $this->api_return(
            [
                'status' => true,
                "result" => [
                    'blog_category_list' => $blogCategoryList
                ],
            ],
        200);
    }

    public function blogByCat($blog_category_id){
        header("Access-Control-Allow-Origin: *");
        $blogCategory= $this->BlogCategoryModel->get_blog_by_category($blog_category_id);
        $this->_apiConfig([
            'methods' => ['POST'],
            'requireAuthorization' => true,
        ]);
        $this->api_return(
            [
                'status' => true,
                "result" => [
                    'blog_category' => $blogCategory
                ],
            ],
        200);
    }

    public function blog($blog_category){
        header("Access-Control-Allow-Origin: *");
        $blogs= $this->BlogModel->get_blogs($blog_category);
        $this->_apiConfig([
            'methods' => ['POST'],
            'requireAuthorization' => true,
        ]);
        $this->api_return(
            [
                'status' => true,
                "result" => [
                    'blogs' => $blogs
                ],
            ],
        200);
    }

    public function bannerInformation()
	{
        header("Access-Control-Allow-Origin: *");
        $bannerInformation= $this->BannerModel->get_banner_information();
        $this->_apiConfig([
            'methods' => ['GET'],
            'requireAuthorization' => true,
        ]);
        $this->api_return(
            [
                'status' => true,
                "result" => [
                    'Banner_nformation' => $bannerInformation
                ],
            ],
        200);
	}

    public function getStock($category, $sub_category, $product)
	{
        header("Access-Control-Allow-Origin: *");
        $stockInformation= $this->StockModel->get_stock_information($category,$sub_category,$product);
        $this->_apiConfig([
            'methods' => ['GET'],
            'requireAuthorization' => true,
        ]);
        $this->api_return(
            [
                'status' => true,
                "result" => [
                    'Stock_information' => $stockInformation
                ],
            ],
        200);
	}
    public function productRating($product_id)
	{
        header("Access-Control-Allow-Origin: *");
        $RatingInformation= $this->RatingModel->get_rating_information($product_id);
        $this->_apiConfig([
            'methods' => ['GET'],
            'requireAuthorization' => true,
        ]);
        $this->api_return(
            [
                'status' => true,
                "result" => [
                    'Rating_information' => $ratingInformation
                ],
            ],
        200);
	}

    public function productView($product_id,$title){
        header("Access-Control-Allow-Origin: *");
        $productView=$this->ProductModel->get_product_view_data($product_id,$title);
        $this->_apiConfig([
            'methods' => ['POST'],
            'requireAuthorization' => true,
        ]);
        $this->api_return(
            [
                'status' => true,
                "result" => [
                    'Product_View' => $productView
                ],
            ],
        200);
    }

    public function coupon()
	{
		header("Access-Control-Allow-Origin: *");
        $couponInformation=$this->CouponModel->get_coupon_data();
        $this->_apiConfig([
            'methods' => ['GET'],
            'requireAuthorization' => true,
        ]);
        $this->api_return(
            [
                'status' => true,
                "result" => [
                    'coupon_information' => $couponInformation
                ],
            ],
        200);
	}

    public function getLanguages()
	{
		header("Access-Control-Allow-Origin: *");
        $languageInformation=$this->LanguageModel->get_language_data();
        $this->_apiConfig([
            'methods' => ['GET'],
            'requireAuthorization' => true,
        ]);
        $this->api_return(
            [
                'status' => true,
                "result" => [
                    'language_information' => $languageInformation
                ],
            ],
        200);
	}
}