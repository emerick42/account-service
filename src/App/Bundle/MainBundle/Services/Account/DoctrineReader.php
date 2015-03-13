<?php

namespace App\Bundle\MainBundle\Services\Account;

use App\Component\Account\Account;
use App\Component\Account\ReaderInterface;
use App\Component\Account\Exception\NotFoundException;
use Doctrine\ORM\EntityManagerInterface;

/**
 * Read account informations from the database configured with Doctrine
 */
class DoctrineReader implements ReaderInterface
{
    /**
     * The doctrine entity manager
     *
     * @var EntityManagerInterface
     */
    private $entityManager;

    /**
     * __construct
     *
     * @param EntityManagerInterface $repository
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * {@inheritdoc}
     */
    public function find($identifier)
    {
        $accountRepository = $this->getAccountRepository();
        $entity            = $accountRepository->findByIdentifier($identifier);

        if ($entity === null) {
            throw new NotFoundException(sprintf('Account with the identifier \'%s\' not found.', $identifier));
        }

        return new Account($identifier, $entity->getUsername(), $entity->getPassword(), $entity->getDomain());
    }

    /**
     * Retrieve the doctrine account repository
     *
     * @return \App\Bundle\MainBundle\Entity\AccountRepository
     */
    private function getAccountRepository()
    {
        return $this->entityManager->getRepository('App\Bundle\MainBundle\Entity\Account');
    }
}
