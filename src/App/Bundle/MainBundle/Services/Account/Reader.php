<?php

namespace App\Bundle\MainBundle\Services\Account;

use App\Component\Account\Account;
use App\Component\Account\ReaderInterface;

/**
 * A simple implementation of the reader interface used for tests
 */
class Reader implements ReaderInterface
{
    /**
     * {@inheritdoc}
     */
    public function find($identifier)
    {
        return new Account($identifier, 'Username', '3NCRYP73DP455W0RD', 'default');
    }
}
