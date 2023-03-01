<?php

namespace app\model\orm;

use Nextras\Orm\Collection\ICollection;
use Nextras\Orm\Repository\Repository;


final class Travel_postsRepository extends Repository
{
	static function getEntityClassNames(): array
	{
		return [Travel_post::class];
	}

    /**
     * @return ICollection|Book[]
     */
    public function findLatest($limit)
    {
        return $this->findAll()->orderBy('id', ICollection::DESC)->limitBy($limit);
    }
}