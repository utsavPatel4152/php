<?php

    if (isset($_POST['SubmitCategory'])) {
        insertRow('category', $_POST['category']);
    }
    if (isset($_POST['SubmitBlog'])) {
        insertRow('blog_spot', $_POST['blog']);
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

        // echo '<pre>';
        // print_r($section);
        // echo '</pre>';
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

    // function getDataFromDatabase ($fieldName) {

    //     $conn = connect();
    //     $tableName = 'user';

    //     $sql = "SELECT $fieldName FROM $tableName ORDER BY id DESC LIMIT 1";
    //     if ($data = mysqli_query($conn, $sql)) {
    //         while ($row = mysqli_fetch_assoc($data)) {
    //             return $row[$fieldName];
    //         }
    //     }
    // }
    
    function getParentCategory() {
        $conn = connect();
        $query = "SELECT * FROM parent_category";
        $result = mysqli_query($conn, $query); 
        return $result;
    }
    
    function fetchBlog() {
        $conn = connect();
        $query = "SELECT id_blogSpot,title FROM blog_spot";
        $result = mysqli_query($conn, $query); 
        $fetchedData = [];
        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
            array_push($fetchedData, $row);
            }
        } else {
            echo mysqli_error($conn);
        }
        return $fetchedData;
    }
    
    function fetchCategory() {
        $conn = connect();
        $query = "SELECT id_category,title FROM category";
        $result = mysqli_query($conn, $query); 
        $fetchedData = [];
        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
            array_push($fetchedData, $row);
            }
        } else {
            echo mysqli_error($conn);
        }
        return $fetchedData;
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
    
    function deleteData($tableName, $deleteID, $fieldName) {
        $conn = connect();
        $query = "DELETE FROM $tableName WHERE $fieldName ='$deleteID' ";
        if (mysqli_query($conn, $query)) {
        }
        else {
            echo mysqli_error($conn);
        }
    }

?>