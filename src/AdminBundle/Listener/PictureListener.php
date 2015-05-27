<?php


namespace AdminBundle\Listener;

use AdminBundle\Entity\Picture;
use Doctrine\ORM\Event\LifecycleEventArgs;


class PictureListener
{
    /**
     * @param LifecycleEventArgs $args
     */
    public function prePersist(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();

        if ($entity instanceof Picture)
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

        if($entity instanceof Picture)
        {
            $entity->setUpdatedAt(new \DateTime());
        }
    }
}