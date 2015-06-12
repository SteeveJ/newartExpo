<?php

namespace newartBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class ExpoController extends Controller
{

    public function booksAction($id)
    {
        if(empty($max) && empty($min) && $id == 1){
            $max = 9;
            $min = 0;
        }else{
             if($id > 1){
                 $min = ($id*9)+1;
                 $max = $min + 8;
             }
        }
        $em = $this->getDoctrine()->getManager();
        $users = $em->getRepository('AdminBundle:User')->findAll();
        //var_dump($users);die;
        return $this->render('newartBundle:Expo:books.html.twig',[
            'users' => $users,
            'min' => $min,
            'max' => $max,
        ]);
    }
    public function profileAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('AdminBundle:User')->findOneById($id);
        $pictures = $em->getRepository('AdminBundle:Picture')->findBy(['user' => $user],[]);
        //var_dump($pictures);
        $helper = $this->container->get('vich_uploader.templating.helper.uploader_helper');
        $path = [];
        $i = 0;
        foreach($pictures as $picture){
            // Permet d'exposer ou non une image

            $container = $helper->asset($picture, 'imageFile');
            $path[$i] = $container;
            $i++;
        }
        $em = $this->getDoctrine()->getManager();
        $posts = $em->getRepository('AdminBundle:Post')->findby([],['updatedAt' => 'DESC']);
        var_dump($path);
        return $this->render('newartBundle:Expo:profile.html.twig',[
            'user' => $user,
            'posts' => $posts,
            'urlImage' => $path,
        ]);
    }

    public function expoAction()
    {
        $em = $this->getDoctrine()->getManager();
        $pictures = $em->getRepository('AdminBundle:Picture')->findBy([],['updatedAt' =>'DESC']);
        //var_dump($pictures);
        $helper = $this->container->get('vich_uploader.templating.helper.uploader_helper');
        //var_dump($pictures);
        $i = 0;
        foreach($pictures as $picture){

            $container = $helper->asset($picture, 'imageFile');
            $path[$i] = $container;
            $i++;
        }
        return $this->render('newartBundle:Expo:expo.html.twig',[
            'pictures' => $pictures,
        ]);
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
