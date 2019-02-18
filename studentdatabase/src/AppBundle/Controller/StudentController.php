<?php

namespace App\AppBundle\Controller;

use App\AppBundle\Service\StudentService;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Templating\EngineInterface;

class StudentController
{
    const EXPIRATION_TIME = 900;

    /**
     * @var EngineInterface
     */
    private $templatingEngine;

    /**
     * @var StudentService
     */
    private $studentService;

    /**
     * HomePageController constructor.
     * @param EngineInterface $templatingEngine
     */
    public function __construct(EngineInterface $templatingEngine, StudentService $studentService)
    {
        $this->templatingEngine = $templatingEngine;
        $this->studentService = $studentService;
    }

    /**
     * @param Request $request
     * @return Response
     */
    public function detailsAction(Request $request): Response
    {
        $response = new Response($this->templatingEngine->render(
            '@App/Student/details.html.twig',
            ['student' => $this->studentService->findByPath($request->get('path'))]
        ));

        $response->setSharedMaxAge(self::EXPIRATION_TIME);
        return $response;
    }
}
