<?php

namespace newartBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class ExpoController extends Controller
{

    public function booksAction($id)
    {
        $min = 0;
        $max = 9;
        if($id != null){
            if($id > 1){
                $max = ($max * $id);
                $min = ($max - 9);
                $max = $max +1;
            }
        }
        $em = $this->getDoctrine()->getManager();
        $users = $em->getRepository('AdminBundle:UserPersonalInformation')->findAll();

        return $this->render('newartBundle:Expo:books.html.twig',[
            'users' => $users,
            'min' => $min,
            'max' => $max,
        ]);
    }
    public function profileAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('AdminBundle:UserPersonalInformation')->findOneById($id);

        $em = $this->getDoctrine()->getManager();
        $posts = $em->getRepository('AdminBundle:Post')->findby([],['updatedAt' => 'DESC']);

        return $this->render('newartBundle:Expo:profile.html.twig',[
            'user' => $user,
            'posts' => $posts,
        ]);
    }

    public function expoAction()
    {
        return $this->render('newartBundle:Expo:expo.html.twig');
    }

    public function naeAction()
    {
        return $this->render('newartBundle:Expo:nae.html.twig');
    }

    public function contactAction()
    {
        return $this->render('newartBundle:Expo:contact.html.twig');
    }

    public function articlesAction()
    {
        return $this->render('newartBundle:Expo:articles.html.twig');
    }

    public function articleAction()
    {
        return $this->render('newartBundle:Expo:article.html.twig');
    }


    public function cvgAction()
    {
        return $this->render('newartBundle:Expo:cvg.html.twig');
    }
}
