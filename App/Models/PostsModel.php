<?php

namespace App\Models;

use PDO;
use \App\Models\Model;


class PostsModel extends Model
{

    public static function all()
    {
        $db = static::getDB();
        $stmt = $db->query('SELECT * FROM posts');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }



    public static function find($id)
    {
        $db = static::getDB();
        $sql = $db->query("SELECT * FROM posts WHERE id = $id");
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }
}
