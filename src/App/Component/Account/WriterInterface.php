<?php

namespace App\Component\Account;

use App\Component\Account\Command\Creation;

/**
 * The service used to execute write operations about accounts
 */
interface WriterInterface
{
    /**
     * Create an account from the given creation command
     *
     * @param Creation $command
     *
     * @return Account
     */
    public function create(Creation $command);
}
