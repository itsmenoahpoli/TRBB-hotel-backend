<?php

namespace App\Services;

use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\UserOtp;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class AuthService
{
    public function __construct(
        private readonly User $user,
        private readonly UserOtp $userOtp
    )
    {}

    public function authenticate($credentials)
    {
        if (Auth::attempt($credentials))
        {
            /**
             * @var App\Models\User $user
             */
            $user = Auth::user();
            $token = $user->createToken(
                'authToken', ['*'], now()->addHours(24)
            )->plainTextToken;

            return (object) array(
                'token'     => $token,
                'user'      => $user
            );
        }

        throw new HttpException(401, 'USER_NOT_FOUND');
    }

    public function unauthenticate($user, $sessionId)
    {
        $user->currentAccessToken()->delete();

        return null;
    }

    public function createOTP($email)
    {
        $user = $this->user->query()->find('email', $email)->first();

        if (!$user)
        {
            throw new NotFoundHttpException('USER_NOT_FOUND');
        }

        $this->userOtp->query()->create([
            'user_id'   => $user->id,
            'code'      => '1234',
            'is_used'   => false
        ]);

        return true;
    }

    public function verifyOTP($email, $otp)
    {
        //
    }
}
