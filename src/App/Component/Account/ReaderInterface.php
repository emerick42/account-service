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
     * @throws \App\Component\Account\Exception\InvalidIdentifierException
     */
    public function find($identifier);
}
