<?php

namespace App\Bundle\MainBundle\Factory\Account;

use App\Bundle\MainBundle\Form\Model\Account;
use App\Component\Account\Command\Creation;

/**
 * The factory creating commands to write informations about accounts
 */
class Command
{
    /**
     * Make a creation command from the given form account
     *
     * @param Account $account
     *
     * @return Creation
     */
    public function makeCreationFrom(Account $account)
    {
        return new Creation(
            $account->username,
            $account->credentials,
            $account->domain
        );
    }
}
