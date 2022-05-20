<?php

class Login
{
    public static function authorize($email, $password)
    {
        $connection = DB::getInstance();
        $query = $connection->prepare('
        
            SELECT *
            FROM User
            WHERE email = :email;
        
        ');
        $query->execute(['email' => $email]);
        $user = $query->fetch();

//        Check if user email exist in DB
        if ($user == null){
            return null;
        }

//        Check if password is correct
        if (!password_verify($password, $user->user_password)){
            return null;
        }

//        Remove password from user and send user data
        unset($user->user_password);
        return $user;

    }
}