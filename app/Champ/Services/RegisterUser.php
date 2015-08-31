<?php

namespace Champ\Services;

use Champ\Account\Repositories\UserRepository;
use Champ\Account\User;

class RegisterUser {

    protected $users;

    public function __construct(UserRepository $users)
    {
        $this->users = $users;
    }

    /**
     * Find or creates a new User
     *
     * @param  Object $object
     * @return User
     */
    private function getOrCreateUser(Object $object)
    {
        if (! $user = $this->findUser($object)) {
            $user = $this->registerUser($object);
        }

        $this->saveIdentificationToUser($user, $object->identification, $object->birthdate);

        return $user;
    }

    /**
     * Find a user by its email
     *
     * @param  Object $object
     * @return mixed
     */
    private function findUser($object)
    {
        return $this->users->getByEmail($object->email);
    }

    /**
     * Register a new User
     *
     * @param  Object $object
     * @return User
     */
    private function registerUser($object)
    {
        $model = App::make(User::class);

        // first nick he encounter
        $nick  = reset($object->nicks)[0];

        if (! $nick) $nick = $object->name;

        $user = $model->register([
            'name' => $object->name,
            'username' => $nick,
            'email' => $object->email,
            'profile' => 'images/defaultUser.jpg',
        ]);

        $this->users->save($user);

        $this->dispatchEventsFor($user);

        return $user;
    }


    /**
     * Save identification data to the user
     *
     * @param  User $user
     * @param  string $identification
     * @param  string $birthdate
     * @return void
     */
    private function saveIdentificationToUser($user, $identification, $birthdate)
    {
        $user->identification = $identification;
        $user->birthdate      = $birthdate;
        $user->save();
    }

}