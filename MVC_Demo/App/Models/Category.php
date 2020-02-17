<?php

namespace App\Models;
use PDO;

class Category extends \Core\Model
{    
    public static function getAll($tableName)
    {
        try {
     
            $db = static::getDB();

            $stmt = $db->query("SELECT categoryId, categoryName, `description` FROM $tableName ORDER BY createdAt");

            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $results;

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    
    public static function executeQuery($query) {
        $db = static::getDB();

        if ($db->exec($query)) {
            return true;
        }
        else {
            return false;
        }
        
    }
}

?>