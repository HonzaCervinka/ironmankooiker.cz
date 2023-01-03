<?php
declare(strict_types=1);

namespace App\Model;

use Nette;
use Nette\Security\SimpleIdentity;

class MyAuthenticator implements Nette\Security\Authenticator
{

    public function __construct(
        private Nette\Database\Explorer $database,
        private Nette\Security\Passwords $passwords,
    ){}

    public function authenticate(string $username, string $password): SimpleIdentity
    {
        $user = $this->database->table('user')
            ->where('username', $username)
            ->fetch();

        if ($user === null)
            throw new Nette\Security\AuthenticationException('Uživatel nenalezen');
 
        if ($this->passwords->verify($password, $user->password) === false)
            throw new Nette\Security\AuthenticationException('Špatné heslo');

        return new SimpleIdentity(
            $user->id, 
            $user->role, 
            ['username' => $user->username]);
    }
    
    /**
     * zaregistruje uzivatele
     *
     * @param  mixed $username
     * @param  mixed $password
     * @param  mixed $role
     * @return void
     */
    public function registering(string $username, string $password, string $role ): void
    {
        $this->database->table('user')->insert([
            'username' => $username,
            'password' => $this->passwords->hash($password),
            'role' => $role,
        ]);
    }
}