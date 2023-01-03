<?php

declare(strict_types=1);

namespace App\Model;

use App\Model\DatabaseManager;
use Nette\Database\Table\ActiveRow;
use Nette\Database\Table\Selection;
use Nette\Utils\ArrayHash;


/**
 * Model pro správu článků
 * @package App\CoreModule\Model
 */

class ArticleManager extends DatabaseManager
{
    const
        TABLE_NAME = 'travel_posts',
        COLUMN_ID = 'id';

    /**
     * Vrátí seznam všech článků v databázi seřazený sestupně od naposledy přidaného.
     * @return Selection seznam všech článků
     */
    public function getTravels()
    {
        return $this->database->table(SELF::TABLE_NAME)->order(self::COLUMN_ID . ' DESC');
    }
         
    /**
     * Vrátí článek z databáze podle jeho ID.
     * @param  mixed $postId ID clanku
     * @return false|ActiveRow první článek, který odpovídá URL nebo false pokud článek s danou URL neexistuje
     */
    public function getTravel($postId)
    {
        return $this->database->table(self::TABLE_NAME)->where(self::COLUMN_ID, $postId)->fetch();
    }
    
    /**
     * Odstraní článek s danou URL.
     * @param int $postId ID článku
     */
    public function removeArticle(int $postId)
    {
        $this->database->table(self::TABLE_NAME)->where(self::COLUMN_ID, $postId)->delete();
    }

    public function saveArticle(ArrayHash $data)
    {
        if (empty($data[self::COLUMN_ID])) {
            unset($data[self::COLUMN_ID]);
            return $this->database->table(self::TABLE_NAME)->insert($data);
        } else
            $this->database->table(self::TABLE_NAME)->where(self::COLUMN_ID, $data[self::COLUMN_ID])->update($data);
    }
}