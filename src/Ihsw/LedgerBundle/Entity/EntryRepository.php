<?php

namespace Ihsw\LedgerBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\NoResultException;

/**
 * EntryRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class EntryRepository extends EntityRepository
{
	public function findOneById($id)
	{
		try
		{
			$parameters = array(
				"id" => $id
			);
			$result = $this->createQueryBuilder("e")
				->select("e, ei")
				->leftJoin("e.entryItems", "ei")
				->where("e.id = :id")
				->setParameters($parameters)
				->getQuery()
				->getSingleResult();
		}
		catch (NoResultException $exception)
		{
			return null;
		}

		return $result;
	}
}
