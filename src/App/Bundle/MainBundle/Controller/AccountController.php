<?php

namespace App\Bundle\MainBundle\Controller;

use App\Bundle\MainBundle\Form\Model\Account as FormAccount;
use App\Bundle\MainBundle\Form\Type\AccountType;
use App\Component\Account\Exception\NotFoundException;
use FOS\RestBundle\Controller\FOSRestController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;
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
            $user = $reader->findByIdentifier($identifier);
        } catch (NotFoundException $exception) {
            throw new NotFoundHttpException('Account not found');
        }

        $view = $this->view($user, 200);

        return $this->handleView($view);
    }

    /**
     * Create a new account
     *
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function postAction(Request $request)
    {
        $formAccount = new FormAccount();
        $form        = $this->createForm(new AccountType(), $formAccount);

        $form->handleRequest($request);
        if ($form->isValid()) {
            $factory = $this->getCommandFactory();
            $command = $factory->makeCreationFrom($formAccount);
            $writer  = $this->getWriter();
            $account = $writer->create($command);

            $response = new Response();
            $response->setStatusCode(201);
            $response->headers->set(
                'Location',
                $this->generateUrl(
                    'app_account_get',
                    ['identifier' => $account->getIdentifier()],
                    true
                )
            );

            return $response;
        }

        // @TODO: properly display errors instead of throwing an exeception
        throw new HttpException(400, 'Could not create an account from the given parameters.');

        $view = $this->view($form, 400);

        return $this->handleView($view);
    }

    /**
     * Get the configured account reader
     *
     * @return \App\Component\Account\ReaderInterface
     */
    private function getReader()
    {
        return $this->get('app_main.account.reader');
    }

    /**
     * Get the account commands factory
     *
     * @return \App\Bundle\MainBundle\Factory\Account\CommandFactory
     */
    private function getCommandFactory()
    {
        return $this->get('app_main.account.command.factory');
    }

    /**
     * Get the configured account writer
     *
     * @return \App\Component\Account\WriterInterface
     */
    private function getWriter()
    {
        return $this->get('app_main.account.writer');
    }
}
