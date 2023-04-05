<?php

namespace app\model\orm;

use Nextras\Orm\Collection\ICollection;
use Nextras\Orm\Repository\Repository;


final class Boardgame_listRepository extends Repository
{
	static function getEntityClassNames(): array
	{
		return [Boardgame_list::class];
	}
}