<?php

/* include the configuration and the functions files */
include './config.php';
include './dbAssistant.php';

/* Check if the session exists, if not start it */
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

/* Catch the action sent from teh ajax request */
$action = filter_input(INPUT_POST, 'action');

if($action == "signUp"){
    /* Encrypt the password */
    $encryptedPassword = password_hash(filter_input(INPUT_POST, 'password'), PASSWORD_DEFAULT);
    /* Execute the function that inserts the user into teh database */
    signUp(filter_input(INPUT_POST, 'username'), filter_input(INPUT_POST, 'email'), $encryptedPassword, $host, $dbUsername, $dbPassword, $dbName);
}

?>