<?php

namespace Ansi\GhassenBundle\Repository;

use Doctrine\ODM\MongoDB\DocumentRepository;

/**
 * GroupsRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class GroupsRepository extends DocumentRepository {

    public function fingroups($user) {
        $qb = $this->createQueryBuilder('u');
        $qb->addOr($qb->expr()
                        ->field('creatby')->references($user))
                ->addOr($qb->expr()
                        ->field('users')->references($user));

        //->group(array(), array('sender.id' ))
        //->distinct('sender');
        //->sort('date','desc')
        //->limit(1);

        return $qb->getQuery()->execute();
    }

    public function recherchegroup($user, $me) {

        $qb = $this->createQueryBuilder('u');
        $qb->addOr($qb->expr()
                        ->field('creatby')->references($me))
                ->addOr($qb->expr()
                        ->field('users')->references($me))
                ->field('users')->references($user);
        return $qb->getQuery()->execute();
    }

}
