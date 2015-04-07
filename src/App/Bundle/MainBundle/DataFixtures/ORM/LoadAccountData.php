<?php

namespace App\Bundle\MainBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use App\Bundle\MainBundle\Entity\Account;

class LoadAccountData extends AbstractFixture
{
    static public $accounts = [];

    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $account = new Account();
        $account->setUsername('existing_user');
        $account->setCredentials('toto42');
        $account->setDomain('default');

        $manager->persist($account);

        $manager->flush();

        self::$accounts = [$account];
    }
}
