<?php

namespace App\Bundle\MainBundle\Form\Model;

use App\Bundle\MainBundle\Validator\Constraints\Account as AccountAssert;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * The data transfer object for account forms
 *
 * @AccountAssert\Unique()
 */
class Account
{
    /**
     * The username of the account
     *
     * @var string
     *
     * @Assert\NotBlank()
     * @Assert\Type(type="string")
     * @Assert\Length(max=255)
     */
    public $username;

    /**
     * The credentials for this account
     *
     * @var string
     *
     * @Assert\NotBlank()
     * @Assert\Type(type="string")
     * @Assert\Length(max=255)
     */
    public $credentials;

    /**
     * The domain where this account is registered
     *
     * @var string
     *
     * @Assert\NotBlank()
     * @Assert\Type(type="string")
     * @Assert\Length(max=255)
     */
    public $domain;
}
