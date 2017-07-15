<?php
require_once "DB.php";

class CategoriesModel extends DB {
    
    function getTop() {
        $query = "SELECT c.title, c.id FROM categories AS c
                  JOIN applications AS a ON a.category_id = c.id
                  GROUP BY a.category_id
                  ORDER BY COUNT(*) DESC limit 5";
        return $this->executeQuery($query);
    }
}