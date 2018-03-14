<?php
/**
 * 
 * 
 * 
 */



namespace Stannp\API;
use Stannp\StannpPhp as StannpPhp;


class User extends StannpPhp
{
    /**
     * Return info about user
     * 
     * @return JSON Encoded JSON object
     */
    public function getMe() 
    {
        $path = "/users/me";

        return $this->get($path);
    }

    /**
     * Return balance on account
     * 
     * @return JSON Encoded JSON object
     */
    public function getBalance() 
    {
        $path = "/accounts/balance";

        return $this->get($path);
    }
}