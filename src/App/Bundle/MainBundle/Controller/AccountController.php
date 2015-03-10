<?php

namespace App\Bundle\MainBundle\Controller;

use App\Component\Account\Exception\InvalidIdentifierException;
use FOS\RestBundle\Controller\FOSRestController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class AccountController extends FOSRestController
{
    /**
     * Retrieve data of the account having the given identifier
     *
     * @param int $identifier
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function getAction($identifier)
    {
        $reader = $this->getReader();

        try {
            $user = $reader->find($identifier);
        } catch (InvalidIdentifierException $exception) {
            throw new NotFoundHttpException('Account not found');
        }

        $view = $this->view($user, 200);

        return $this->handleView($view);
    }

    /**
     * Get the configured account reader
     *
     * @return ReaderInterface
     */
    private function getReader()
    {
        return $this->get('app_main.account.reader');
    }
}
