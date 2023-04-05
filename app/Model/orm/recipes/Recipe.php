<?php

namespace app\model\orm;

use Nextras\Orm\Entity\Entity;

/**
 * @property int        $id {primary}
 * @column(name="recipes_id")
 * @property string     $title
 * @property string     $recipe
 */

class Recipe extends Entity
{
}