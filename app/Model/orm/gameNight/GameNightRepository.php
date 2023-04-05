<?php

namespace app\model\orm;

use Nextras\Orm\Collection\ICollection;
use Nextras\Orm\Repository\Repository;


final class GameNightRepository extends Repository
{
	static function getEntityClassNames(): array
	{
		return [GameNight::class];
	}

	public function test()
	{
		return $this->findAll();
	}
}