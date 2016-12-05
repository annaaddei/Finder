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

    function login($username, $password)
    {
        $strQuery = /** @lang MySQL */
            "SELECT username, password , phonenumber
              FROM users 
              WHERE username = ? 
              AND password = ?
              LIMIT 1";

        if ($statement = $this->prepare($strQuery)) {
            $statement->bind_param("ss", $username, $password);
            $statement->execute();
            return $statement->get_result();
        }
    }


}
//$obj = new functions();
//$result = $obj->addUser("Anna Addei", "anna.addei@gmail.com", "love", "233274446115");
//print_r($result);
//
//if ($result == 1) {
//    echo "Successful";
//} else {
//    echo "failed";
//}