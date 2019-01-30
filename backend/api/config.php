<?php 

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'angular_db');
$pdo = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

try{

    if (!$pdo->query ("DESCRIBE authen")){
        //create table
        $sql = "CREATE TABLE authen(
            id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
            users_email VARCHAR(70) NOT NULL UNIQUE,
            users_password VARCHAR(70) NOT NULL
        )";    
        $pdo->exec($sql);
        echo "Table created successfully.";
    }

}catch(PDOException $e){

    //recived table create error
    die("ERROR: Could not able to execute $sql. " . $e->getMessage());

}

?>