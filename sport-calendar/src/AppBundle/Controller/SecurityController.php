<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class SecurityController extends Controller
{
    public function loginAction(Request $request)
    {
        $error = $this->getAuthHelper()->getLastAuthenticationError();

        return $this->render(
            '@App/login.html.twig',
            [
                'error' => $error
            ]
        );
    }

    protected function getAuthHelper()
    {
        return $this->get('security.authentication_utils');
    }
}
