<?php

namespace app\model\orm;

use Nextras\Orm\Collection\ICollection;
use Nextras\Orm\Repository\Repository;


final class RecipesRepository extends Repository
{
	static function getEntityClassNames(): array
	{
		return [Recipe::class];
	}
}