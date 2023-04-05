<?php

namespace app\model\orm;

use Nextras\Orm\Entity\Entity;


/**
 * @property int        $id {primary}
 * @column(name="boardgame_id")
 * @property string     $name
 */
class Boardgame_list extends Entity
{

}