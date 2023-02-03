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

class ReceptyManager extends DatabaseManager
{
    const
        TABLE_NAME = 'recipes',
        COLUMN_ID = 'recipes_id';

    /**
     * getRecipes
     * Vrátí všechny recepty
     * @return void
     */
    public function getRecipes()
    {
        return $this->database->table(SELF::TABLE_NAME)->order(self::COLUMN_ID . ' DESC');
    }    
         
    /**
     * Vrátí recept z databáze podle jeho ID.
     * @param  mixed $postId ID clanku
     *      */
    public function getRecipe($postId)
    {
        return $this->database->table(self::TABLE_NAME)->where(self::COLUMN_ID, $postId)->fetch();
    }
    
    /**
     * Odstraní recept z databaze podle jeho ID.
     * @param int $postId ID článku
     */
    public function removeRecipe(int $postId)
    {
        $this->database->table(self::TABLE_NAME)->where(self::COLUMN_ID, $postId)->delete();
    }

    /**
     * Uloží nebo updatuje článek
     * @param int $postId ID článku
     */
    public function saveRecipe(ArrayHash $data)
    {
        if (empty($data[self::COLUMN_ID])) {
            unset($data[self::COLUMN_ID]);
            return $this->database->table(self::TABLE_NAME)->insert($data);
        } else
            $this->database->table(self::TABLE_NAME)->where(self::COLUMN_ID, $data[self::COLUMN_ID])->update($data);
    }
}