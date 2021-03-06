<?php

namespace AppBundle\Entity\Repository;

use AppBundle\Entity;

class CityRepository extends AbstractRepository
{
    /** @return array */
    public function findForList()
    {
        return $this
            ->createQueryBuilder('city')
            ->innerJoin('city.events', 'event')
            ->groupBy('city')
            ->select('city.id, city.name, COUNT(event.id) AS events_count')
            ->orderBy('events_count', 'DESC')
            ->getQuery()
            ->getArrayResult()
        ;
    }
}
