<?php

namespace AppBundle\Controller;

use AppBundle\Form\BatteriesFrom;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    const FLASH_SUCCESS = 'success';
    const FLASH_ERROR = 'error';
    const ERROR_MESSAGE = 'Data was not saved successfully';

    /**
     * @param Request $request
     * @return RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function indexAction(Request $request)
    {
        $form = $this->getBatteriesFrom();
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            try {
                $this->getBatteriesService()->save($data);

                return new RedirectResponse(
                    $this->generateUrl('statistic_page')
                );
            } catch (\Exception $e) {
                $this->addFlash(self::FLASH_ERROR, self::ERROR_MESSAGE);
                return new RedirectResponse(
                    $this->generateUrl('add_battery')
                );
            }
        }

        return $this->render('AppBundle::add_battery.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function statisticAction()
    {
        $data = $this->getBatteriesService()->getStatistic();

        return $this->render('AppBundle::statistic.html.twig', [
           'data' => $data
        ]);
    }

    /**
     * @return Form
     */
    private function getBatteriesFrom(): Form
    {
        return $this->createForm(
            BatteriesFrom::class
        );
    }

    /**
     * @return \AppBundle\Service\BatteriesService
     */
    private function getBatteriesService()
    {
        return $this->get('service.batteries_service');
    }
}
