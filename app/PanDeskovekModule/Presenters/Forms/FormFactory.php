<?php

declare(strict_types=1);

namespace App\PanDeskovekModule\Forms;

use Nette;
use Nette\Application\UI\Form;

/**
 * Tovarna na vytvoreni formulare
 */
final class FormFactory
{
    use Nette\SmartObject;
    
    /**
     * Vytvori a nasledne vrati vychozi formular
     * @return Form vychozi formular
     */
    public function create(): Form
    {
        $form = new Form;
        return $form;
    }
}