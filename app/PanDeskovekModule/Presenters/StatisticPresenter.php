<?php

declare(strict_types=1);

namespace App\PanDeskovekModule\Presenters;

use Nette;
use App\Model\PanDeskovekManager;
use App\PanDeskovekModule\Presenters\BasePresenter;
use Nette\Application\AbortException;
use Nette\Application\BadRequestException;
use Nette\Application\UI\Form;
use Nette\Database\UniqueConstraintViolationException;
use Nette\Utils\ArrayHash;

final class StatisticPresenter extends BasePresenter
{
    public function beforeRender()
    {
        $data = $this->panDeskovekManager->getGraphData();
        
        $chart_data = '';

        foreach($data as $row) {$chart_data .="{ Datum:'". $row->date->format('Y-m-d') ."', Honza:" . $row->honza_points . ", Michal:" . $row->michal_points . ", Ševi:" . $row->sevi_points . ", Johny:" . $row->johny_points . "}, ";}
        $chart_data = substr($chart_data, 0, -2);

        $this->template->chart_data = $chart_data;
    }
}