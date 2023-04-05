<?php

declare(strict_types=1);

namespace App\PanDeskovekModule\Forms;

use app\model\orm\Boardgame_list;
use Nette;
use Nette\Application\UI\Form;
use Nette\Utils\ArrayHash;
use App\Model\PanDeskovekManager;
use app\model\orm\GameNight;
use app\model\orm\Model;
use Nextras\Orm\Entity\IEntity;

final class AddGameNightFormFactory
{
    use Nette\SmartObject;

    public function __construct(
        private FormFactory $factory,
        private PanDeskovekManager $panDeskovekManager,
        private Model $model,
        )
	{}

    public function create(): Form
    {
        $form = $this->factory->create();
        
        $form->addText('date', 'Datum hraní:')
            ->setHtmlType('date');
            
        $form->addSelect('idGame', 'Hra:',$this->getTemplatesAssoc());
        $form->addCheckbox('honza', 'Honza');
        $form->addCheckbox('michal', 'Michal');
        $form->addCheckbox('sevi', 'Ševi');
        $form->addCheckbox('johny', 'Johny');
        $form->addSubmit('send', 'Uložit sezení');
        $form->onSuccess[] = [$this, 'addGameNightFormSucceeded'];

        return $form;
    }
        
    public function addGameNightFormSucceeded(Form $form, $data)
    {

        $gameNight = new GameNight();
        $gameNight->date = $data->date;
        $gameNight->idGame = $data->idGame;
        $gameNight->honza = $data->honza;
        $gameNight->michal = $data->michal;
        $gameNight->sevi = $data->sevi;
        $gameNight->johny = $data->johny;


        $this->model->gameNight->persistAndFlush($gameNight);
    }

    public function getTemplatesAssoc(): array
    {
        return $this->panDeskovekManager->getBoardgames()->fetchAssoc('boardgame_id=name');
    }
}