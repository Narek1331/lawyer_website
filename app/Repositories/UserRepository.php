<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository
{
    /**
     * Create a new user in the database.
     *
     * @param array $data
     * @return User
     */
    public function create(array $data)
    {
        return User::create($data);
    }

    /**
     * Update user's password in the database.
     *
     * @param User $user The user whose password needs to be updated
     * @param string $newPassword The new password for the user
     * @return void
     */
    public function updatePassword(User $user, $newPassword)
    {
        // Set the user's password to the bcrypt hash of the new password
        $user->password = bcrypt($newPassword);

        // Save the user model to update the password in the database
        $user->save();
    }
}
