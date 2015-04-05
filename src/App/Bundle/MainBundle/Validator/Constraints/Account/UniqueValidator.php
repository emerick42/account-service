<?php

namespace App\Bundle\MainBundle\Validator\Constraints\Account;

use App\Bundle\MainBundle\Form\Model\Account as FormAccount;
use App\Component\Account\Exception\NotFoundException;
use App\Component\Account\ReaderInterface;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

/**
 * Validate the unique account constraint
 */
class UniqueValidator extends ConstraintValidator
{
    /**
     * The configured account reader
     *
     * @var ReaderInterface
     */
    private $reader;

    /**
     * __construct
     */
    public function __construct(ReaderInterface $reader)
    {
        $this->reader = $reader;
    }

    /**
     * {@inheritdoc}
     */
    public function validate($formAccount, Constraint $constraint)
    {
        $username = $formAccount->username;

        try {
            // If no exception is thrown, it means that an account with the
            // given username already exists
            $this->reader->findByUsername($username);
            $this->context
                ->buildViolation($constraint->message)
                ->setParameter('%username%', $username)
                ->atPath('username')
                ->addViolation()
            ;
        } catch (NotFoundException $exception) {
        }
    }
}
