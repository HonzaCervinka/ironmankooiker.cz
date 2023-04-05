<?php

namespace app\model\orm;

use DateTimeImmutable;
use Nextras\Orm\Entity\Entity;


/**
 * @property    int                     $id {primary}
 * @column(name="gameNight_id")
 * @property    DateTimeImmutable       $date
 * @property    Boardgame_list          $idGame {m:1 Boardgame_list, oneSided=true}
 * @column(name="id_game")        
 * @property    bool                    $honza
 * @property    bool                    $michal
 * @property    bool                    $sevi
 * @property    bool                    $johny
 */
class GameNight extends Entity
{
}
