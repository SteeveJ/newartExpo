<?php


namespace AdminBundle\Listener;

use AdminBundle\Entity\Articles;
use Doctrine\ORM\Event\LifecycleEventArgs;


class articleListener
{
    /**
     * @param LifecycleEventArgs $args
     */
    public function prePersist(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();

        if ($entity instanceof Articles)
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

        if($entity instanceof Articles)
        {
            $entity->setUpdatedAt(new \DateTime());
        }
    }
}