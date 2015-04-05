<?php

namespace App\Component\Account;

/**
 * Service used to retrieve accounts
 */
interface ReaderInterface
{
    /**
     * Find an account by its identifier. Throw an exeception when there is no
     * existing account for the given identifier
     *
     * @param int
     *
     * @return Account
     *
     * @throws \App\Component\Account\Exception\NotFoundException
     */
    public function findByIdentifier($identifier);

    /**
     * Find an account by its username. Throw an exception when there is no
     * existing account for the givenusername
     *
     * @param string
     *
     * @return Account
     *
     * @throws \App\Component\Account\Exception\NotFoundException
     */
    public function findByUsername($username);
}
