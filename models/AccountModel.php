<?php

class AccountModel extends BaseModel {

    public function register($username, $email, $password) {
        $statement = self::$db->prepare("SELECT COUNT(id) FROM users WHERE username = ?");
        $statement->bind_param("s", $username);
        $statement->execute();
        $result = $statement->get_result()->fetch_assoc();
        if ($result['COUNT(Id)']) {
            return false;
        }
        $hashPassword = password_hash($password, PASSWORD_BCRYPT);
        $registerStatement = self::$db->prepare("INSERT INTO users(username, email, password) VALUES (?, ?, ?)");
        $registerStatement->bind_param("sss", $username, $email, $hashPassword);
        $registerStatement->execute();

        return true;
    }
    public function login($username, $password) {
        $statement = self::$db->prepare("SELECT id, username, password FROM users WHERE username = ?");
        $statement->bind_param("s", $username);
        $statement->execute();
        $result = $statement->get_result()->fetch_assoc();
        if (password_verify($password, $result['password'])) {
            return true;
        }
        return false;
    }
}