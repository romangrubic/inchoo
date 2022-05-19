<?php

class Index
{
    public static function countPhoto()
    {
        $connection = DB::getInstance();
        $query = $connection->prepare('
        
            SELECT count(id)
            FROM Photo;
        
        ');
        $query->execute();
        return  $query->fetchColumn();
    }
}