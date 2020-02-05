<?php

    // session_start();

    function getValuesInSession($fieldName, $returnType = '') {
        return isset($_SESSION[$fieldName])
        ? $_SESSION[$fieldName]
        : $returnType;
    }

    function setValuesInSession($fieldName) {
        isset($_POST[$fieldName])
        ? $_SESSION[$fieldName] = $_POST[$fieldName]
        : [];
    }

    setValuesInSession('email');
    setValuesInSession('password');
    
?>