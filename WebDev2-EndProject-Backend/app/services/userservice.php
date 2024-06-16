<?php
namespace Services;

use Repositories\UserRepository;

class UserService {

    private $repository;

    function __construct()
    {
        $this->repository = new UserRepository();
    }

    public function checkUsernamePassword($username, $password) {
        return $this->repository->checkUsernamePassword($username, $password);
    }

    public function getUserByUsername($username) {
        return $this->repository->getUserByUsername($username);
    }

    public function registerUser($user) {
        return $this->repository->registerUser($user);
    }

    public function usernameExists($username) {
        $user = $this->repository->usernameExists($username);
        if($user) {
            return true;
        } else {
            return false;
        }
    }
}

?>