<?php

namespace Club\MatchBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * LeagueTableRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class LeagueTableRepository extends EntityRepository
{
  public function getTeam(\Club\MatchBundle\Entity\League $league, \Club\MatchBundle\Entity\Team $team)
  {
    $lt = $this->_em->getRepository('ClubMatchBundle:LeagueTable')->findOneBy(array(
      'league' => $league->getId(),
      'team' => $team->getId()
    ));

    if (!$lt)
      $lt = $this->addTeam($league, $team);

    return $lt;
  }

  public function addTeam(\Club\MatchBundle\Entity\League $league, \Club\MatchBundle\Entity\Team $team)
  {
    $lt = new \Club\MatchBundle\Entity\LeagueTable();
    $lt->setLeague($league);
    $lt->setTeam($team);

    $this->_em->persist($lt);

    return $lt;
  }
}