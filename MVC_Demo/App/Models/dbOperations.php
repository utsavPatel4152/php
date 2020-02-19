<?php

namespace App\Models;
use PDO;

class dbOperations extends \Core\Model
{    
    public static function getAll($tableName, $condition = '')
    {
        try {
            $db = static::getDB();
            if(func_num_args() == 1) {
                $stmt = $db->query("SELECT * FROM ($tableName)");
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $result;
            }
            else {
                $stmt = $db->query("SELECT * FROM ($tableName) WHERE ($condition)");
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $result;
            }
            
        }
        catch (PDOExcetion $e) {
            echo $e->getMessage();
        }
    }
    
    public static function getData($tableName, $columnId, $id)
    {

        $db = static::getDB();
        $stmt = $db->query("SELECT * FROM
                    $tableName WHERE $columnId = $id");

        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $results;

    }

    public static function insertData($tableName, $array)
    {
        try {
            $db = static::getDB();
            $tableField = array_keys($array);
            $field = implode(",", $tableField );

            foreach(array_values($array) as $value) {
                if($value != 'NULL') {
                    $tableValue[] = "'" . $value . "'";
                }
                else {
                    $tableValue[] = $value;
                }
            }
            $value = implode(",", $tableValue);
            $db->exec("INSERT INTO $tableName ($field) VALUES ($value)");
            return $db->lastInsertId();
        }
        catch (PDOExcetion $e) {
            echo $e->getMessage();
        }
    }

    public static function deleteData($tableName, $columnId, $id)     
    {
        $db = static::getDB();

        $query = "DELETE FROM $tableName WHERE $columnId = $id ";
        $stmt = $db->exec($query);

        return $stmt;
    }

    public static function updateData($tableName, $columnId, $id, $array)  
    {
        try {
            $db = static::getDB();
            $updatearg = [];
            foreach($array as $key => $value) {
                if ($key == 'parentCategory') {
                    $updatearg[] = "$key = $value";
                }
                else {
                    $updatearg[] = "$key = '$value'";
                }
            }
            $sql = "UPDATE $tableName SET " . implode(', ',$updatearg) . " WHERE ($columnId)='$id'";
            $result = $db->exec($sql);
            return $result;
        }
        catch (PDOExcetion   $e) {
            echo $e->getMessage();
        }
    }
    
    public static function queryData($query) {
        try{
            $db = static::getDB();
            $stmt = $db->query($query);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
        catch (PDOExcetion $e) {
            echo $e->getMessage();
        }
    }
    
}

?>