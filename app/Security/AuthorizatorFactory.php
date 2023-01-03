<?php

declare(strict_types=1);

namespace App\Security;

use Nette;

class AuthorizatorFactory
{
    public static function create(): Nette\Security\Permission
    {
        $acl = new Nette\Security\Permission;

        $acl->addRole('admin');
        $acl->addRole('guest');

        $acl->addResource('PanDeskovek:Homepage');
        $acl->addResource('PanDeskovek:Statistic');
        $acl->addResource('PanDeskovek:Base');
        $acl->addResource('PanDeskovek');

        $acl->allow('admin');
        $acl->allow('guest', 'PanDeskovek:Homepage');
        $acl->allow('guest', 'PanDeskovek:Statistic');       

        return $acl;
    }
}