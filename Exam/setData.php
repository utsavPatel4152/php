<?php

    if (isset($_POST['Submit'])) {
        addToDatabase($_POST);
    }
    if (isset($_POST['SubmitCategory'])) {
        addToDatabase($_POST);
    }
    if (isset($_POST['SubmitBlog'])) {
        addToDatabase($_POST);
    }

    function connect() {
        $dbhost = 'localhost';
        $dbuser = 'root';
        $dbpassword = '';
        $dbName = 'user_portal';
        $conn = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbName);

        if (!$conn) {
            echo 'Connection not Established';
        }
        else {
            return $conn;
        }
    }

    function insertRow($tableName, $section) {

        $conn = connect();
        $fieldValue = implode(',', array_keys($section));
        $KeyValue = '"'.implode('","', $section).'"';

        $insertData = "INSERT INTO $tableName($fieldValue) VALUES ($KeyValue)";

        if (mysqli_query($conn, $insertData)) {
            echo 'Record Inserted<br>';
        }
        else {
            echo 'Error inserting Row: '.mysqli_error($conn);
        }
    }

    function addToDatabase ($postArray) {
        insertRow('user', $postArray);
        insertRow('category', $postArray);
        insertRow('blog_spot', $postArray);
    }
    
    function getDataFromDatabase ($fieldName) {

        $conn = connect();
        $tableName = 'user';

        $sql = "SELECT $fieldName FROM $tableName ORDER BY id DESC LIMIT 1";
        if ($data = mysqli_query($conn, $sql)) {
            while ($row = mysqli_fetch_assoc($data)) {
                return $row[$fieldName];
            }
        }
    }
    
    function updateData($section, $id){
        $conn = connect();

        foreach($section as $key => $value)
        {
            $updateQuery = "UPDATE $table SET $key = '$value' WHERE id = '$id'";
            if (mysqli_query($conn , $updateQuery)) { }
            else {
                echo 'Error updating account, address Record: ' . mysqli_error($conn);
            }
        }
    }
    
    function deleteData ($id) {
        $conn = connect();
        $deleteSQL = "DELETE FROM customers WHERE id = '$id'";
        if (mysqli_query($conn, $deleteSQL)) { 
            echo 'Record Deleted Successfully!<br><br>';
        }
        else {
            echo 'Error deleting Record: ' . mysqli_error($conn);
        }
    }

?>