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
     * getTravels
     * Vrátí určitý počet článků
     * @param  mixed $limit určí kolik článků se vrátí. Při zadané 0 vrátí všechny
     * @return void
     */
    public function getTravels($limit)
    {
        if ($limit)
            return $this->database->table(SELF::TABLE_NAME)->order(self::COLUMN_ID . ' DESC')->limit($limit);
        else
            return $this->database->table(SELF::TABLE_NAME)->order(self::COLUMN_ID . ' DESC');
    }
         
    /**
     * Vrátí článek z databáze podle jeho ID.
     * @param  mixed $postId ID clanku
     *      */
    public function getTravel($postId)
    {
        return $this->database->table(self::TABLE_NAME)->where(self::COLUMN_ID, $postId)->fetch();
    }
    
    /**
     * Odstraní článek.
     * @param int $postId ID článku
     */
    public function removeArticle(int $postId)
    {
        $this->database->table(self::TABLE_NAME)->where(self::COLUMN_ID, $postId)->delete();
    }

    /**
     * Uloží nebo updatuje článek
     * @param int $postId ID článku
     */
    public function saveArticle(ArrayHash $data)
    {
        if (empty($data[self::COLUMN_ID])) {
            unset($data[self::COLUMN_ID]);
            return $this->database->table(self::TABLE_NAME)->insert($data);
        } else
            $this->database->table(self::TABLE_NAME)->where(self::COLUMN_ID, $data[self::COLUMN_ID])->update($data);
    }
}