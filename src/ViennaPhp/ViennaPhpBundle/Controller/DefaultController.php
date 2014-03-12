<?php

namespace ViennaPhp\ViennaPhpBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     * @Template()
     */
    public function indexAction()
    {
        $rep = $this->get('doctrine')->getRepository('ViennaPhpBundle:Status');
        return array(
            'tweets' => $rep->findAll()
        );
    }
}
