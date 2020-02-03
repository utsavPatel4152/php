<?php

    if (isset($_POST['submit'])) {
        addToDatabase($_POST);
    }

    if (isset($_POST['update'])) {
        addToDatabase($_POST);
    }

    if (isset($_GET['deleteID'])) {
        $id = $_GET['deleteID'];
        deleteData($id);
    }

    function connect() {
        $dbhost = 'localhost';
        $dbuser = 'root';
        $dbpassword = '';
        $dbName = 'customer_portal';
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
            $lastID = mysqli_insert_id($conn);
            return $lastID;
        }
        else {
            echo 'Error inserting Row: '.mysqli_error($conn);
        }
    }

    function addToDatabase ($postArray) {
        $accountArray = getArray($postArray['account']);
        $addressArray = getArray($postArray['address']);
        $otherArray = getArray($postArray['other']);

        if (isset($_GET['updateID'])) {
            $id = $_GET['updateID'];
            echo 'Record Updated Successfully';
            updateData('account', $accountArray, $id);
            updateData('address', $addressArray, $id);
            updateOther('other', $otherArray, $id);
        }

        else {
            echo 'Record inserted Successfully!';
            $lastID = insertRow('customers', $accountArray);
            $addressArray['id'] = $lastID;
            insertRow('customer_address', $addressArray);

            $fieldArray['id'] = $lastID;
            foreach ($otherArray as $field_key => $value) {
                $fieldArray['field_key'] = $field_key;
                $fieldArray['value_info'] = $value;
                insertRow('customer_additional_info', $fieldArray);
            }
        }
    }

    function getArray ($valueArray) {

        foreach ($valueArray as $fieldName => $values) {
            if (is_array($values)) {
                $separate = implode(',', $values);
                $valueArray[$fieldName] = $separate;
            }   
        }
        return $valueArray;
    }

    function getDataFromDatabase ($section, $fieldName) {

        if ($section == 'account') {
            $tableName = 'customers';
        }
        else if ($section == 'address') {
            $tableName = 'customer_address';
        }

        $conn = connect();
        $sql = "SELECT $fieldName FROM $tableName ORDER BY id DESC LIMIT 1";
        if ($data = mysqli_query($conn, $sql)) {
            while ($row = mysqli_fetch_assoc($data)) {
                return $row[$fieldName];
            }
        }
    }

    function otherDataFromDatabase ($section, $fieldName) {
        $conn = connect();
        $sql = "SELECT value_info FROM customer_additional_info WHERE field_key='$fieldName' ORDER BY id DESC LIMIT 1";
        if ($data = mysqli_query($conn, $sql)) {
            while ($row = mysqli_fetch_assoc($data)) {
                $temp = explode(',', $row['value_info']);
                return $temp;
            }
        }
    }

    function fetch_all ($tableName) {
        $conn = connect();
        $sql = "SELECT c.id, c.firstName, c.lastName, c.email, ca.city, caiHOBB.value_info Hobbies, caiTOUCH.value_info getTouch FROM customers c
        LEFT JOIN customer_address ca ON c.id = ca.id
        LEFT JOIN customer_additional_info caiHOBB ON c.id = caiHOBB.id AND
                                    caiHOBB.field_key = 'Hobbies'
        LEFT JOIN customer_additional_info caiTOUCH ON c.id = caiTOUCH.id AND
                                    caiTOUCH.field_key = 'getTouch'";

        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) > 0) {
            echo "<table border=1><tr>";
            echo "<th>id</th>";
            echo "<th>firstName</th>";
            echo "<th>lastName</th>";
            echo "<th>email</th>";
            echo "<th>city</th>";
            echo "<th>hobbies</th>";
            echo "<th>get touch</th>";
            echo "<th>Action</th>";
            echo "</tr>";

            while($row = mysqli_fetch_assoc($result)) {
                foreach ($row as $key => $value) {
                    echo "<td>" . $value . "</td>";
                }
                echo '<td><a href="updateData.php?updateID='.$row['id'].'">Update</a>&nbsp;&nbsp;
                        <a href="showTable.php?deleteID='.$row['id'].'">Delete</a></td>';
                echo "</tr>";
            }
                
            echo "</table>";
            mysqli_free_result($result);
        }
        else {
            echo "No records matching your query were found.";
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

    function updateData($sectionName , $section, $id){
        $conn = connect();

        switch ($sectionName) {
            case 'account':
                $table = 'customers';
                break;
            case 'address':
                $table = 'customer_address';
                break;
        }

        foreach($section as $key => $value)
        {
            $updateQuery = "UPDATE $table SET $key = '$value' WHERE id = '$id'";
            if (mysqli_query($conn , $updateQuery)) { }
            else {
                echo 'Error updating account, address Record: ' . mysqli_error($conn);
            }
        }
    }

    function updateOther($sectionName , $section, $id){
        $conn = connect();
        $table = "customer_additional_info";

        foreach ($section as $key => $value) {
        
            $query = "UPDATE $table SET value_info='$value' WHERE id='$id' AND field_key='$key'";
            if (mysqli_query($conn, $query)) { }
            else {
                echo 'Error updating other Record: ' . mysqli_error($conn);
            }       
        }
    }
?>