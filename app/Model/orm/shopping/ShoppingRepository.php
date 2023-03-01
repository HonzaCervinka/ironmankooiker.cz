<?php

namespace app\model\orm;

use Nextras\Orm\Collection\ICollection;
use Nextras\Orm\Repository\Repository;


final class ShoppingRepository extends Repository
{
	static function getEntityClassNames(): array
	{
		return [Shopping::class];
	}
}