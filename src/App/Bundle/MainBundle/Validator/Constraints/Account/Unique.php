<?php

namespace App\Bundle\MainBundle\Validator\Constraints\Account;

use Symfony\Component\Validator\Constraint;

/**
 * The constraint asserting that there is no other existing account with the
 * same username
 *
 * @Annotation
 */
class Unique extends Constraint
{
    public $message = 'An account with the same username "%username%" already exists.';

    /**
     * {@inheritdoc}
     */
    public function validatedBy()
    {
        return 'unique_account';
    }

    /**
     * {@inheritdoc}
     */
    public function getTargets()
    {
        return self::CLASS_CONSTRAINT;
    }
}
