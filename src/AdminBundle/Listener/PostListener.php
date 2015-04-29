<?php


namespace AdminBundle\Listener;

use AdminBundle\Entity\Post;
use Doctrine\ORM\Event\LifecycleEventArgs;


class PostListener
{
    /**
     * @param LifecycleEventArgs $args
     */
    public function prePersist(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();

        if ($entity instanceof Post)
        {
            $entity->setCreatedAt(new \DateTime());
            $entity->setUpdatedAt(new \DateTime());
        }
    }

    /**
     * @param LifecycleEventArgs $args
     */
    public  function  preUpdate(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();

        if($entity instanceof Post)
        {
            $entity->setUpdatedAt(new \DateTime());
        }
    }
}