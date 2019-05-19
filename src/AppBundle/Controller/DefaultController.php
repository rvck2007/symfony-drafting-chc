<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Activity;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Repository\ActivityRepository;

class DefaultController extends Controller
{/*
    private $em;

    public function __construct()
    {
        $em = $this->getDoctrine()->getManager();
    }
*/

    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/testeur.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * @Route("/query1/{label}", name="query_1")
     */
    public function query1Action($label)
    {
        $em = $this->getDoctrine()->getManager();

        $query = $em->createQuery('
            SELECT a FROM AppBundle:Activity a
            WHERE a.label LIKE :label
        ')
            ->setParameter('label', '%'. $label . '%')
        ;

        $activity = $query->getResult();

        var_dump($activity);

        exit();
        return new Response("Hello à tous");
    }

    /**
     * @Route("/query2/{label}", name="query_2")
     */
    public function query2Action($label)
    {
        $em = $this->getDoctrine()->getManager();

        $repository = $em->getRepository('AppBundle:Activity');

        $activity = $repository->findActivityWhereLabelInclude($label);

        var_dump($activity);

        exit();
    }

}
