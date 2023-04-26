<?php

declare(strict_types=1);

namespace App\PanDeskovekModule\Presenters;

use App\UI\TEmptyLayoutView;
use app\model\orm\Boardgame_listRepository;
use Ublaboo\DataGrid\DataGrid;

class DatagridPresenter extends BasePresenter
{


    /** @var Boardgame_listRepository @inject */
    public $boardgame_listRepository;

    public function createComponentSimpleGrid($name)
    {
        $grid = new DataGrid($this, $name);

        $grid->setDataSource($this->boardgame_listRepository->findAll()->orderBy('id'));
        $grid->addColumnText('id', 'ID');
        $grid->addColumnText('name', 'Game')
            ->setFilterText();

        return $grid;
    }



}