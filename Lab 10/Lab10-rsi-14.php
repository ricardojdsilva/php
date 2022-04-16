<?php

//Require configuration
require_once('inc/config.inc.php');

//Require Entities
require_once('inc/Entities/Customer.class.php');

require_once('inc/Utilities/RestClient.class.php');
require_once('inc/Utilities/Page.class.php');
require_once('inc/Utilities/CustomerConverter.class.php');

//Check if there was get data, perofrm the action
if (!empty($_GET))    {
    //Perform the Action
    if ($_GET["action"] == "delete")  {
        //Call the rest client with DELETE
            //Call the Reset API to delete the keyboard
          $deleteResult = RestClient::call("DELETE",array("id" => $_GET["id"]));
         //Encode the result
          $deletedRecordCount = json_decode($deleteResult);
         
    }

    if ($_GET["action"] == "edit")  {
        //Call the rest client with GET, decode the result
        $editClient = RestClient::call("GET",array("id" => $_GET["id"]));
        //Convert the decoded customer
       // var_dump($editClient);
        $data = json_decode($editClient);

        $client = CustomerConverter::convertToCustomerClass($data);

      
    }

}

//Check for post data
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST["action"]) && $_POST["action"] == "edit")    {

        //var_dump( $_POST);
       $editClient = RestClient::call("PUT",array("CustomerID" => $_POST["CustomerID"], "name" => $_POST["name"], "address" => $_POST["address"], "city" =>$_POST["city"]));

      // var_dump($_POST["city"]);
        
    //Was probably a create
    } else {
        //Assemble the Customer


        //Add the the Customer 
        $InsertClient = RestClient::call("POST", array("name" => $_POST["name"], "address" => $_POST["address"], "city" =>$_POST["city"]));
 
       // var_dump($_POST);
    }
}

//Get all the customers from the web service via the REST client

//Store the customer objects 

// $keyboards = KeyboardDAO::getKeyboards();
$jcustomers = json_decode(RestClient::call("GET",array()));
$customers = CustomerConverter::convertToCustomerClass($jcustomers);


Page::$title = "Lab 10 - Ricardo Silva - 300329214";
Page::header();

//Check Get again, display the right form edit or add
if (isset($_GET["action"]) && $_GET["action"] == "edit")  {
    
    Page::editCustomer($client);
} else {
    Page::listCustomers($customers);
    Page::addCustomer();
}
    

Page::footer();