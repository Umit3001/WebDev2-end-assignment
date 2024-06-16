<?php

namespace Repositories;

use Models\User;
use PDO;
use PDOException;
use Repositories\Repository;

class UserRepository extends Repository
{
    function checkUsernamePassword($username, $password)
    {
        try {
            $stmt = $this->connection->prepare("SELECT user_id, username, password, email, role FROM users WHERE username = :username");
            $stmt->bindParam(':username', $username);
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Models\User');
            $user = $stmt->fetch();

            if (!$user || !$user->password) {
                return false;
            }

            $result = $this->verifyPassword($password, $user->password);

            if (!$result)
                return false;

            $user->password = "";

            return $user;
        } catch (PDOException $e) {
            error_log($e->getMessage());
        }
    }
    function verifyPassword($input, $hash)
    {
        return password_verify($input, $hash);
    }

    function getUserByUsername($username)
    {
        try {
            $stmt = $this->connection->prepare("SELECT user_id, username, password, email, role FROM users WHERE username = :username");
            $stmt->bindParam(':username', $username);
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Models\User');
            $user = $stmt->fetch();

            return $user;
        } catch (PDOException $e) {
            error_log($e->getMessage());
        }
    }

    public function registerUser(User $user) {
        $statement = $this->connection->prepare('INSERT INTO users (username, password, email, role) VALUES (:username, :password, :email, :role)');
        $statement->bindParam(':username', $user->username);
        $statement->bindParam(':password', $user->password);
        $statement->bindParam(':email', $user->email);
        $statement->bindParam(':role', $user->role);
        $statement->execute();
    }

    public function usernameExists($username) {
        $statement = $this->connection->prepare('SELECT * FROM users WHERE username = :username');
        $statement->bindParam(':username', $username);
        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_CLASS, 'Models\User');
        return $statement->fetch();
    }

}
