<?php
class ShopController extends BaseController
{
    public function getGroupAction($cn_value)
    {
        $strErrorDesc = '';
        $requestMethod = $_SERVER["REQUEST_METHOD"];
        if (strtoupper($requestMethod) == 'GET') {
            try {
                //get group
                $shopModel = new ShopModel();
                $result = $shopModel->getGroup($cn_value);
                $responseData["data"] = json_encode($result);
            }
            catch (Error $e) {
                $strErrorDesc = $e->getMessage().'Something went wrong! Please contact support.';
                $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
            }
        } else {
            $strErrorDesc = 'Method not supported';
            $strErrorHeader = 'HTTP/1.1 422 Unprocessable Entity';
        }
        // send output
        if (!$strErrorDesc) {
            $this->sendOutput(
                $responseData,
                array('Content-Type: application/json', 'HTTP/1.1 200 OK')
            );
        } else {
            $this->sendOutput(json_encode(array('error' => $strErrorDesc)), 
                array('Content-Type: application/json', $strErrorHeader)
            );
        }
    }
    public function getGroupsAction()
    {
        $strErrorDesc = '';
        $requestMethod = $_SERVER["REQUEST_METHOD"];
        if (strtoupper($requestMethod) == 'GET') {
            try {
                //get groups
                $shopModel = new ShopModel();
                $result = $shopModel->getGroups();
                $responseData['data'] = json_encode($result);
                //check Cookie
                if(count($result) > 0) {
                    $cookieProds = $this->checkCookie();
                    if(count($cookieProds)>0) {
                        foreach($cookieProds as $key=>$val) {
                            $cookieProd = $this->getProductAction($val,$getProductFlag=false,$getCookieFlag=true);
                        }
                    }
                }
            }
            catch (Error $e) {
                $strErrorDesc = $e->getMessage().'Something went wrong! Please contact support.';
                $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
            }
        } else {
            $strErrorDesc = 'Method not supported';
            $strErrorHeader = 'HTTP/1.1 422 Unprocessable Entity';
        }
        // send output
        if (!$strErrorDesc) {
            $this->sendOutput(
                $responseData,
                array('Content-Type: application/json', 'HTTP/1.1 200 OK')
            );
        } else {
            $this->sendOutput(json_encode(array('error' => $strErrorDesc)), 
                array('Content-Type: application/json', $strErrorHeader)
            );
        }
    }
    public function getProductAction($cn_value=null,$getProductFlag = true, $getCookieFlag = false)
    {
        $strErrorDesc = '';
        $requestMethod = $_SERVER["REQUEST_METHOD"];
        if (strtoupper($requestMethod) == 'GET') {
            try {
                //get product
                if($cn_value != null) {
                $shopModel = new ShopModel();
                $result = $shopModel->getProduct($cn_value);
                if($getProductFlag == false && $getCookieFlag == true) {
                    //check cookie
                    $responseData['dataCookie'] = json_encode($result);
                }
                elseif($getProductFlag == true && $getCookieFlag == false){
                    //set Cookie
                    $this->checkCookie($cn_value);
                    $responseData['data'] = json_encode($result);
                }
            }
        }
            catch (Error $e) {
                $strErrorDesc = $e->getMessage().'Something went wrong! Please contact support.';
                $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
            }
        } else {
            $strErrorDesc = 'Method not supported';
            $strErrorHeader = 'HTTP/1.1 422 Unprocessable Entity';
        }
        // send output
        if (!$strErrorDesc) {
            $this->sendOutput(
                $responseData,
                array('Content-Type: application/json', 'HTTP/1.1 200 OK')
            );
        } else {
            $this->sendOutput(json_encode(array('error' => $strErrorDesc)), 
                array('Content-Type: application/json', $strErrorHeader)
            );
        }
    }
    public function getProductsAction()
    {
        $strErrorDesc = '';
        $requestMethod = $_SERVER["REQUEST_METHOD"];
        if (strtoupper($requestMethod) == 'GET') {
            try {
                //get products
                $shopModel = new ShopModel();
                $result = $shopModel->getProducts();
                $responseData["data"] = json_encode($result);
                //check Cookie
                if(count($result) > 0) {
                    $cookieProds = $this->checkCookie();
                    if(count($cookieProds)>0) {
                        foreach($cookieProds as $key=>$val) {
                            $cookieProd = $this->getProductAction($val,$getProductFlag=false,$getCookieFlag=true);
                        }
                    }
                }
            }
            catch (Error $e) {
                $strErrorDesc = $e->getMessage().'Something went wrong! Please contact support.';
                $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
            }
        } else {
            $strErrorDesc = 'Method not supported';
            $strErrorHeader = 'HTTP/1.1 422 Unprocessable Entity';
        }
        // send output
        if (!$strErrorDesc) {
            $this->sendOutput(
                $responseData,
                array('Content-Type: application/json', 'HTTP/1.1 200 OK')
            );
        } else {
            $this->sendOutput(json_encode(array('error' => $strErrorDesc)), 
                array('Content-Type: application/json', $strErrorHeader)
            );
        }
    }
    public function getMainAction()
    {
        echo 'Sorry, check the query parameters';
    }

    public function checkCookie($product_id=null)
    {
        //set Cookie
        if(!is_null($product_id)){
            $userIpProduct = $_SERVER['REMOTE_ADDR'] . '->' . $product_id;
            if(!isset($_COOKIE[$userIpProduct])) {
                setcookie($userIpProduct, $product_id, time() + (86400 * 30), "/"); 
            }
        }
        //check Cookie
        $prodArr = array();
        foreach($_COOKIE as $key=>$val) {
            if (preg_match('/^.+?->\d+$/', $key)) {
                $prodArr[] =  $val;
            }
        }
            return $prodArr;
    }
}