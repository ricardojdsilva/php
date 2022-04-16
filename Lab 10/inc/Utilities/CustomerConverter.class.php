<?php

class CustomerConverter {

    //This function will conver tot Standard Classes
    public static function convertToStdClass($data) {


        //Store the return objects
        $stdObjects = new stdClass;

        if (is_array($data)) {

            $stdObjects = array();

             //go througheach element of the array and surface the data that is relevant
             foreach ($data as $customers) {

                //Create a new blank object with the standard class definitionm
                $stdObject = new stdClass;

                //Populate all
                $stdObject->CustomerID = $customers->getCustomerID();
                $stdObject->Name = $customers->getName();
                $stdObject->Address = $customers->getAddress();
                $stdObject->City = $customers->getCity();

                //Add it to the array
                $stdObjects[] = $stdObject;

             }

        
        } else {
            //This path will be hit if a single object is passed in as $data, we assume its a single student becuase we are in the student DAO
                //Create a new blank object with the standard class definitionm
                $stdObjects = new stdClass;
                //Populate all
                $stdObjects->CustomerID = $data->getCustomerID();
                $stdObjects->Name = $data->getName();
                $stdObjects->Address = $data->getAddress();
                $stdObjects->City = $data->getCity();
       
       
        }
        //REturn the stdObjects
        return $stdObjects;
    }

    public static function convertToCustomerClass($data)    {


        $newCustomers = array();

        if (is_array($data)) {
        //Store the new Customers
            $newCustomers = array();
            //Go through all stndard Customers
            foreach ($data as $item)    {
                $nc = new Customer();

                $nc->setCustomerID($item->CustomerID);
                $nc->setName($item->Name);
                $nc->setAddress($item->Address);
                $nc->setCity($item->City);

                //Store customers
                $newCustomers[] = $nc;


            }



        } else {
            //Create a single new Customer
            $nc1 = new Customer();
            $nc1->setCustomerID($data->CustomerID);
            $nc1->setName($data->Name);
            $nc1->setAddress($data->Address);
            $nc1->setCity($data->City);
            $newCustomers[] = $nc1;
       
        }
        return $newCustomers;
    }

}