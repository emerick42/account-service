<?php

namespace App\Component\Account;

/**
 * The account object
 */
class Account
{
    /**
     * The unique identifier automatically generated
     *
     * @var int
     */
    private $identifier;

    /**
     * The username for this account
     *
     * @var string
     */
    private $username;

    /**
     * The credentials for this account
     *
     * @var string
     */
    private $credentials;

    /**
     * The domain where this account is stored
     *
     * @var string
     */
    private $domain;

    /**
     * __construct
     *
     * @param int    $identifier
     * @param string $username
     * @param string $credentials
     * @param string $domain
     */
    public function __construct($identifier, $username, $credentials, $domain)
    {
        $this->identifier  = $identifier;
        $this->username    = $username;
        $this->credentials = $credentials;
        $this->domain      = $domain;
    }

    /**
     * Get identifier
     *
     * @return int
     */
    public function getIdentifier()
    {
        return $this->identifier;
    }

    /**
     * Get username
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Get credentials
     *
     * @return string
     */
    public function getCredentials()
    {
        return $this->credentials;
    }

    /**
     * Get domain
     *
     * @return string
     */
    public function getDomain()
    {
        return $this->domain;
    }
}
