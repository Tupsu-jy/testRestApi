<?php

namespace ReallySimpleJWT;

use ReallySimpleJWT\Token;

class Authenticator
{
    private $secret;

    public function __construct(){
        $this->secret="qwertyuiopasdfghjklzxcvbnm123456";
    }

    public function validate($token){//validate validate lol
           return Token::validate($token, $this->secret);
    }
}