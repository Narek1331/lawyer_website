<?php

namespace App\Services;

use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserService
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Create a new user.
     *
     * @param array $data
     * @return User
     */
    public function create(array $data)
    {
        return $this->userRepository->create($data);
    }

    /**
     * Change user's password.
     *
     * @param string $currentPassword
     * @param string $newPassword
     * @return bool
     */
    public function changePassword($currentPassword, $newPassword)
    {
        $user = Auth::user();

        // Verify current password
        if (!Hash::check($currentPassword, $user->password)) {
            return false;
        }

        // Update password
        $this->userRepository->updatePassword($user, $newPassword);
        
        return true;
    }
}
