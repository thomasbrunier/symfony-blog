<?php

namespace JoliBlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class DefaultController extends Controller
{

    /**
     * @Route("/hello/{name}", name="hello_toto")
     */

    public function indexAction(string $name): Response
    {

        $url = $this->get('router')->generate('hello_toto',
            ["name" => $name],
            UrlGeneratorInterface::ABSOLUTE_URL
        );


        switch ($name) {
            case 'google':
                return $this->redirect('https://www.google.com');
                break;
            case 'facebook':
                return $this->redirect('https://www.facebook.com');
                break;
            case 'twitter':
                return $this->redirect('https://www.twitter.com');
                break;
            default :
                return $this->render(
                    'JoliBlogBundle:Default:index.html.twig',
                    ["name" => $name, "url" => $url]);
                break;

        }


    }

    /**
     * @Route("/goto/{sitename}", name="redirect_toto")
     */

    public function redirectAction(string $sitename): Response
    {

        $url = 'http://'.$sitename.'.com';

        switch ($sitename) {
            case 'google':
            case 'facebook':
            case 'twitter':
                return $this->redirect('https://www.'.$sitename.'.com');
                break;
            default :
                return $this->render(
                    'JoliBlogBundle:Default:redirect.html.twig',
                    ["url" => $url ]);
                break;

        }


    }

    /**
     * @Route("/jai/{age}/ans", name="age_toto")
     */

    public function ageAction(int $age): Response
    {


        $url = $this->get('router')->generate('age_toto',
            ["age" => $age],
            UrlGeneratorInterface::ABSOLUTE_URL
        );


        return $this->render(
            'JoliBlogBundle:Default:age.html.twig',
            ["age" => $age, "url" => $url]);

    }

}
