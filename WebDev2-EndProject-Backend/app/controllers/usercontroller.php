<?php

namespace Controllers;

use Services\UserService;

class UserController extends Controller
{
    private $service;

    // initialize services
    function __construct()
    {
        $this->service = new UserService();
    }

    public function login() {

        $loginData = $this->createObjectFromPostedJson("Models\\User");

        $user = $this->service->checkUsernamePassword($loginData->username, $loginData->password);

        if (!$user) {
            $this->respondWithError(401, "Incorrect username or password");
            return;
        }

        // generate jwt
        $key = "pindakaas";
        $payload = array(
            "iss" => "http://api.inholland.nl",
            "aud" => "http://www.inholland.nl",
            "username" => $user->username,
            "iat" => time(),
            "nbf" => time(),
            "exp" => time() + 3600, 
        );
        
        $jwt = \Firebase\JWT\JWT::encode($payload, $key, 'HS256');

        // return jwt
        $this->respond($jwt);
    }

    public function getUserByUsername($username) {

        $user = $this->service->getUserByUsername($username);

        if (!$user) {
            $this->respondWithError(404, "User not found");
            return;
        }

        $this->respond($user);
    }

    function hashPassword($password)
    {
        return password_hash($password, PASSWORD_DEFAULT);
    }


    public function registerUser() {

        $user = $this->createObjectFromPostedJson("Models\\User");

        if ($this->service->usernameExists($user->username)) {
            $this->respondWithError(409, "Username already exists");
            return;
        }

        $user->password = $this->hashPassword($user->password);

        $this->service->registerUser($user);

        $this->respond("User registered");
    }



}
