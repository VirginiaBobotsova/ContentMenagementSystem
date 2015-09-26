<?php

class AccountModel extends BaseModel {

    public function register($username, $password) {
        $statement = self::$db->prepare("SELECT COUNT(Id) FROM Users WHERE Username = ?");
        $statement->bind_param("s", $username);
        $statement->execute();
        $result = $statement->get_result()->fetch_assoc();
        if ($result['COUNT(Id)']) {
            return false;
        }
        $hashPassword = password_hash($password, PASSWORD_BCRYPT);
        $registerStatement = self::$db->prepare("INSERT INTO Users(username, password) VALUES (?, ?)");
        $registerStatement->bind_param("ss", $username, $hashPassword);
        $registerStatement->execute();

        return true;
    }
    public function login($username, $password) {

    }
}