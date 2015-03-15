<?php

namespace App\Component\Account\Command;

/**
 * The command used to create a new account
 */
class Creation
{
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
     * @param string $username
     * @param string $credentials
     * @param string $domain
     */
    public function __construct($username, $credentials, $domain)
    {
        $this->username    = $username;
        $this->credentials = $credentials;
        $this->domain      = $domain;
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
