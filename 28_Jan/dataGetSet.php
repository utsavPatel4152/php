<?php

    session_start();

    function getValuesInSession($section, $fieldName, $returnType = '') {
        return isset($_SESSION[$section][$fieldName])
        ? $_SESSION[$section][$fieldName]
        : $returnType;
    }

    function setValuesInSession($section) {
        isset($_POST[$section])
        ? $_SESSION[$section] = $_POST[$section]
        : [];
    }

    setValuesInSession('account');
    setValuesInSession('address');
    setValuesInSession('other');

?>