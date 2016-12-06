<?php
/**
 *
 * @author Anna Addei
 */
include_once("Adb2.php");
class functions extends Adb2
{
    /**
     *Constructor
     */
    public function __destruct()
    {
        parent::__destruct();
    }


    function addUser($name, $email, $phonenumber, $password )
    {
        $strQuery = /** @lang MySQL */
            "INSERT into users set
						name = ?,
						email = ?,
						phoneNumber = ?,
						password = ?
						
						";
        if ($statement = $this->prepare($strQuery)) {
            $statement->bind_param("ssss", $name, $email, $phonenumber, $password);
            return $statement->execute();

        }
    }

    function addPlace($name, $longitude, $latitude, $type, $address )
    {
        $strQuery = /** @lang MySQL */
            "INSERT into markers set
						name = ?,
						address = ?,
						lat = ?,
						lng = ?,
						type = ?
						";
        if ($statement = $this->prepare($strQuery)) {
            $statement->bind_param("ssdds", $name, $address, $latitude, $longitude, $type);
            return $statement->execute();
        }
    }

    function login($email, $password)
    {
        $strQuery = /** @lang MySQL */
            "SELECT email, password , phoneNumber, name
              FROM users 
              WHERE email = ? 
              AND password = ?
              LIMIT 1";

        if ($statement = $this->prepare($strQuery)) {
            $statement->bind_param("ss", $email, $password);
            $statement->execute();
            return $statement->get_result();
        }
    }

    function get_database_markers()
    {
        $strQuery = /** @lang MySQL */
            "SELECT *
              FROM markers 
            ";

        if ($statement = $this->prepare($strQuery)) {
            $statement->execute();
            return $statement->get_result();
        }
    }


}
//$obj = new functions();
//$result = $obj->addPlace('Ashesi University Cafeteria', 5.759368, -0.220132, 'restaurant', 'No. 1 University Avenue, Berekuso' );
//print_r($result);
//
//if ($result == 1) {
//    echo "Successful";
//} else {
//    echo "failed";
//}