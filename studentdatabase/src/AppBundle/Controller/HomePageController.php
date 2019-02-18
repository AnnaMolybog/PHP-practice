<?php

namespace App\AppBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Templating\EngineInterface;

class HomePageController
{
    /**
     * @var EngineInterface
     */
    private $templatingEngine;

    /**
     * HomePageController constructor.
     * @param EngineInterface $templatingEngine
     */
    public function __construct(EngineInterface $templatingEngine)
    {
        $this->templatingEngine = $templatingEngine;
    }

    public function indexAction()
    {
        return new Response(
            $this->templatingEngine->render('@App/HomePage/index.html.twig')
        );
    }
}
