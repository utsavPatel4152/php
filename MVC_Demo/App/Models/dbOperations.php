<?php

namespace App\Models;
use PDO;

class dbOperations extends \Core\Model
{    
    public static function getAll($tableName)
    {
        try {
     
            $db = static::getDB();

            $stmt = $db->query("SELECT * FROM $tableName ORDER BY createdAt");

            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $results;

        } catch (PDOException $e) {
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

    public static function insertData($array, $tableName)
    {
        $db = static::getDB();
        
        $query = "INSERT INTO $tableName (";
        foreach ($array as $key => $value) {
            $query .= "$key, ";
        }
        $query = substr($query, 0, -2);
        $query .= ") VALUES (";
        foreach ($array as $key => $value) {
            $query .= "'$value', ";
        }
        $query = substr($query, 0, -2);
        $query .= ")";
        $stmt = $db->exec($query);

        return $stmt;
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
        $db = static::getDB();
        
        $query = "UPDATE $tableName SET ";
        foreach ($array as $key => $value) {
            $query .= "$key = '$value', ";
        }
        $query = substr($query, 0, -2);

        $query .= " WHERE $columnId=$id";
        $stmt = $db->exec($query);

        return $stmt;
    }
    
}

?>