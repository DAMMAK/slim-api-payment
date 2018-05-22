<?php

define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_HOST', 'localhost');
define('DB_NAME', 'payment');

define('USER_CREATED', 101);
define('USER_EXIST', 102);
define('USER_CREATION_FAILED', 103);

?>


<?php

class DbConnect
{
    //Variable to store database link
    private $con;

    //Class constructor
    function __construct()
    {

    }

    //This method will connect to the database
    function connect()
    {
        //Including the constants.php file to get the database constants
        //connecting to mysql database
        $this->con = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

        //Checking if any error occured while connecting
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
            return null;
        }

        //finally returning the connection link
        return $this->con;
    }

}
