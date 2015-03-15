<?php

namespace App\Bundle\MainBundle\Services\Account;

use App\Bundle\MainBundle\Entity\Account as AccountEntity;
use App\Component\Account\Account;
use App\Component\Account\WriterInterface;
use App\Component\Account\Command\Creation;
use Doctrine\ORM\EntityManagerInterface;

/**
 * Write account informations to the database configured with Doctrine
 */
class DoctrineWriter implements WriterInterface
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
    public function create(Creation $command)
    {
        $entity = new AccountEntity();
        $entity->setUsername($command->getUsername());
        $entity->setCredentials($command->getCredentials());
        $entity->setDomain($command->getDomain());

        $this->entityManager->persist($entity);
        $this->entityManager->flush();

        return new Account(
            $entity->getIdentifier(),
            $entity->getUsername(),
            $entity->getCredentials(),
            $entity->getDomain()
        );
    }
}
