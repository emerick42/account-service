<?php

namespace App\Bundle\MainBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * The doctrine repository retrieving accounts
 */
class AccountRepository extends EntityRepository
{
    /**
     * Retrieve the account with the given identifier
     *
     * @param int $identifier
     *
     * @return Account|null
     */
    public function findByIdentifier($identifier)
    {
        $queryBuilder = $this->createQueryBuilder('account');

        $queryBuilder
            ->where('account.identifier = :identifier')
            ->setParameter('identifier', $identifier)
        ;

        $account = $queryBuilder->getQuery()->getOneOrNullResult();

        return $account;
    }

    /**
     * Retrieve the account with the given username
     *
     * @param string $username
     *
     * @return Account|null
     */
    public function findByUsername($username)
    {
        $queryBuilder = $this->createQueryBuilder('account');

        $queryBuilder
            ->where('account.username = :username')
            ->setParameter('username', $username)
        ;

        $account = $queryBuilder->getQuery()->getOneOrNullResult();

        return $account;
    }
}
