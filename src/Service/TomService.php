<?php
/**
 * Created by PhpStorm.
 * User: andreas.holzmann
 * Date: 06.06.2020
 * Time: 19:01
 */

namespace App\Service;


use App\Entity\Team;
use App\Entity\Tom;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;


class TomService
{
    private $em;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->em = $entityManager;
    }

    function newTom(Team $team, User $user)
    {
        $tom = new Tom();
        $tom->setTeam($team);
        $tom->setActiv(true);
        $tom->setCreatedAt(new \DateTime());
        $tom->setUser($user);

        return $tom;
    }

    function cloneTom(Tom $tom, User $user)
    {
        $newTom = clone $tom;
        $newTom->setPrevious($tom);
        $newTom->setCreatedAt(new \DateTime());
        $newTom->setUser($user);

        return $newTom;
    }
}
