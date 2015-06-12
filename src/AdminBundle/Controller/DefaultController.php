<?php

namespace AdminBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use FOS\UserBundle\Model\UserInterface;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $user = $this->container->get('security.context')->getToken()->getUser();
        $em = $this->getDoctrine()->getManager();
        $articles = $em->getRepository('AdminBundle:Post')->findBy([],['updatedAt' =>'DESC']);
        return $this->render('newartBundle:Expo:index.html.twig',[
            'user' => $user,
            'articles' => $articles,
        ]);
    }


    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function profileAction()
    {
        $user = $this->container->get('security.context')->getToken()->getUser();
        $em = $this->getDoctrine()->getManager();
        $posts = $em->getRepository('AdminBundle:Post')->findBy([],['updatedAt' =>'DESC']);
        if (!is_object($user) || !$user instanceof UserInterface) {
            throw new AccessDeniedException('This user does not have access to this section.');
        }

        return $this->render('newartBundle:Expo:profile.html.twig',[
            'user' => $user,
            'posts'=> $posts,
        ]);
    }

    /**
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function artisteDuJourAction($id){
        /*$em = $this->getDoctrine()->getManager();
        //$artisteDuJour = $em->getRepository('AdminBundle:duJour');

        //$artiste =$artisteDuJour->findOneById(1)->setIdUser($id);
        if($id != null || $id != ""){
            $userManager = $this->container->get('fos_user.user_manager');
            $users = $userManager->findUsers();

            $artisteDuJour = new duJour();

            $artisteDuJour->setIdUser($id) ;
            $em->persist($artisteDuJour);
            $em->flush();

            return $this->render('AdminBundle:dujour:artiste.html.twig'/*,[
                'users'=>$users,
            ]);
        }*/
    }
}
