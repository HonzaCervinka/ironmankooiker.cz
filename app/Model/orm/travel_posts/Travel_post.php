<?php

namespace app\model\orm;

use Nextras\Orm\Entity\Entity;


/**
 * @property int        $id {primary}
 * @property string     $title
 * @property string     $content
 * @property string     $date
 * @property string     $photoTitle
 * @column(name="photo_title")
 */
class Travel_post extends Entity
{
}