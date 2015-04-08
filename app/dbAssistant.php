<?php

/* Check if the session is started, if not then start it */
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

/* Sign up function - executed from controller.php */
function signUp($username, $email, $password, $host, $dbUsername, $dbPassword, $dbName) {

    /* Create connection */
    $mysqli = new mysqli($host, $dbUsername, $dbPassword, $dbName);

    /* The query that will be executed */
    $insertBannerAdQ = "INSERT INTO Users1(username, email, password) VALUES(?, ?, ?)";

    /* Execute teh query */
    if ($stmt = $mysqli->prepare($insertBannerAdQ)) {

        $stmt->bind_param('sss', $username, $email, $password);

        $stmt->execute();
        
        /* close statement */
        $stmt->close();
    }

    $mysqli->close();
    
    http_response_code(200);
}

?>