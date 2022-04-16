<?php

//Require configuration
require_once('inc/config.inc.php');

//Require Entities
require_once('inc/Entities/Customer.class.php');
require_once('inc/Utilities/PDOAgent.class.php');
require_once('inc/Utilities/CustomerDAO.class.php');
require_once('inc/Utilities/CustomerConverter.class.php');


//Iniitalize the DAO
CustomerDAO::initialize();


//read in data for our web service
//Read in the stream data
$requestData = json_decode(file_get_contents('php://input'));


//default header
header('Content-Type: application/json');


//check what kind of request we got
switch ($_SERVER["REQUEST_METHOD"]) {
    case "GET":
        if (isset($requestData->id))  {
            //get the specific Customer
            //Return the Customer we want
            $nc = CustomerDAO::getCustomer($requestData->id);
        echo json_encode(CustomerConverter::convertToStdClass($nc));


        } else {
            echo json_encode(CustomerConverter::convertToStdClass(CustomerDAO::getCustomers()));    
        }
        
        break;
    case "PUT":
        //Do update things

        $object = new stdClass;
        foreach($requestData as $key => $value) {
            $object->$key = $value;
        }
        //Assemble the the postData


       $customerOBJ =new Customer();
       $customerOBJ->setCustomerID($object->CustomerID);
       $customerOBJ->setName($object->name);
       $customerOBJ->setAddress($object->address);
       $customerOBJ->setCity($object->city);

       //echo json_encode(CustomerConverter::convertToStdClass($customerOBJ));

       CustomerDAO::updateCustomer($customerOBJ);
       
        echo json_encode(array("message" => "Customer Updated"));
        break;
    case "POST":
        //Do Insert things

        $object = new stdClass;
        foreach($requestData as $key => $value) {
            $object->$key = $value;
        }
 
      
       $xpto = New Customer;
       $xpto->setName($object->name);
       $xpto->setAddress($object->address);
       $xpto->setCity($object->city);

       print_r($xpto);
       // $xpto = CustomerConverter::convertToCustomerClass($requestData);
       
       CustomerDAO::createCustomer($xpto);     
        echo json_encode(array("message" => "Do insert things"));

        break;
    case "DELETE":
        if (isset($requestData->id))   {
            //delete the request keyboard
            echo json_encode(array("result" => CustomerDAO::deleteCustomer($requestData->id)));
        }  else {
            echo json_encode(array("message" => "You must specify a keyboard to delete."));
        }
        //do delete things
        
        break;
    default:
        //Turkce konus muyo rum
        echo json_encode(array("message" => "HTTP konus muyo rum"));
        break;
}