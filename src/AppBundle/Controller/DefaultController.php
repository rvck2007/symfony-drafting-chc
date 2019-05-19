<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Activity;
use Doctrine\Common\Persistence\ObjectManager;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
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
     * @Route("/query1", name="query_1")
     */
    public function query1Action()
    {
        $em = $this->getDoctrine()->getManager();

        $query = $em->createQuery('
            SELECT a FROM AppBundle:Activity a
            WHERE a.label LIKE :label
        ')
            ->setParameter('label', '%Saun%')
        ;

        $activity = $query->getResult();

        var_dump($activity);

        exit();
        return new Response("Hello à tous");
    }
}
