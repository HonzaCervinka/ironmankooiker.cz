<?php

declare(strict_types=1);

namespace App\Model;

use App\Model\DatabaseManager;
use Nette\Database\Table\ActiveRow;
use Nette\Database\Table\Selection;
use Nette\Utils\ArrayHash;


/**
 * Model pro správu her
 * @package App\CoreModule\Model
 */

class PanDeskovekManager extends DatabaseManager
{
    const
        BOARDGAME_TABLE_NAME = 'boardgame_list',
        BOARDGAME_COLUMN_ID = 'boardgame_id',

        GAMENIGHT_TABLE_NAME = 'gameNight',
        GAMENIGHT_COLUMN_DATE = 'date',
        GAMENIGHT_COLUMN_ID = 'gameNight_id',
        GAMENIGHT_COLUMN_ID_GAME = 'ig_game',
        GAMENIGHT_COLUMN_PLAYER_HONZA = 'honza',
        GAMENIGHT_COLUMN_PLAYER_MICHAL = 'michal',
        GAMENIGHT_COLUMN_PLAYER_SEVI = 'sevi',
        GAMENIGHT_COLUMN_PLAYER_JOHNY = 'johny';
  
    /**
     * Vrátí seznam všech deskovek v databázi seřazený sestupně od naposledy přidaného.
     */
    public function getBoardgames()
    {
        return $this->database->table(SELF::BOARDGAME_TABLE_NAME)->order(self::BOARDGAME_COLUMN_ID . ' DESC');
    }

    /**
     * Vrátí seznam všech herních sezení v databázi seřazený sestupně od naposledy přidaného.
     */
    public function getGameNights()
    {
        return $this->database->query('SELECT date, name, honza, michal, sevi, johny, gameNight_id FROM `gameNight`JOIN `boardgame_list` ON id_game = boardgame_id ORDER BY gameNight_id DESC;');
    }

    /**
     * Vrátí pocet vyher jednotlivych hracu sezarenych od prvniho po posledniho
     */
    public function getPlayerVictory()
    {
        return $this->database->query('
            SELECT player, points, ROW_NUMBER() OVER (ORDER BY points DESC) as rank FROM (SELECT "Honza" as player, sum(honza) as points FROM gameNight 
            UNION all
            SELECT "Michal" as player, sum(michal) as points FROM gameNight 
            UNION all
            SELECT "Ševi" as player, sum(sevi) as points FROM gameNight 
            UNION all
            SELECT "Johny" as player, sum(johny) as points FROM gameNight ) as src
            ORDER BY points DESC
        ');
    }

    /**
     * Vrati data urcene pro graf
     */
    public function getGraphData()
    {
        return $this->database->query('
        SELECT date, `honza`, `michal`,`sevi`, `johny`,
        SUM(`honza`) OVER (
        ORDER BY date
        ROWS BETWEEN UNBOUNDED PRECEDING AND CURRENT ROW) honza_points,
        SUM(`michal`) OVER (
        ORDER BY date
        ROWS BETWEEN UNBOUNDED PRECEDING AND CURRENT ROW) michal_points,
        SUM(`sevi`) OVER (
        ORDER BY date
        ROWS BETWEEN UNBOUNDED PRECEDING AND CURRENT ROW) sevi_points,
        SUM(`johny`) OVER (
        ORDER BY date
        ROWS BETWEEN UNBOUNDED PRECEDING AND CURRENT ROW) johny_points
        FROM gameNight
        ORDER BY date
        ');
    }
           
    /**
     * Odstraní hru podle ID
     * @param int $postId ID článku
     */
    public function removeBoardgame(int $postID)
    {
        $this->database->table(self::BOARDGAME_TABLE_NAME)->where(self::BOARDGAME_COLUMN_ID, $postID)->delete();
    }
    
    /**
     * removeGameNight
     * Odstrani herni sezeni podle ID
     * @param  mixed $postID herniho sezeni
     * @return void
     */
    public function removeGameNight(int $postID)
    {
        $this->database->table(self::GAMENIGHT_TABLE_NAME)->where(self::GAMENIGHT_COLUMN_ID, $postID)->delete();
    }
    
    /**
     * saveBoardgame
     * Uloží deskovou hru
     * @param  mixed $data
     * @return void
     */
    public function saveBoardgame(ArrayHash $data)
    {
        if (empty($data[self::BOARDGAME_COLUMN_ID])) {
            unset($data[self::BOARDGAME_COLUMN_ID]);
            return $this->database->table(self::BOARDGAME_TABLE_NAME)->insert($data);
        } else
            $this->database->table(self::BOARDGAME_TABLE_NAME)->where(self::BOARDGAME_COLUMN_ID, $data[self::BOARDGAME_COLUMN_ID])->update($data);
    }
    
    /**
     * saveGameNight
     * Uloží herní sezení
     * @param  mixed $data
     * @return void
     */
    public function saveGameNight(ArrayHash $data)
    {
        if (empty($data[self::GAMENIGHT_COLUMN_ID])) {
            unset($data[self::GAMENIGHT_COLUMN_ID]);
            return $this->database->table(self::GAMENIGHT_TABLE_NAME)->insert($data);
        } else
            $this->database->table(self::BOARDGAME_TABLE_NAME)->where(self::BOARDGAME_COLUMN_ID, $data[self::BOARDGAME_COLUMN_ID])->update($data);
    }
}