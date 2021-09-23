<?php
/**
 * Description of ChangeUserPasswordHandler.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Yehor Herasymchuk <yehor@dotsplatform.com>
 */

namespace App\Services\Users\Handlers;


use App\Models\User;
use App\Services\Notifications\SMS\DTOs\SmsDTO;
use App\Services\Notifications\SMS\SmsService;
use App\Services\Users\Repositories\UserRepository;
use Illuminate\Support\Facades\Hash;

class ChangeUserPasswordHandler
{

    private UserRepository $userRepository;
    private SmsService $smsService;

    public function __construct(
        UserRepository $userRepository,
        SmsService $smsService
    )
    {
        $this->userRepository = $userRepository;
        $this->smsService = $smsService;
    }

    public function handle(User $user, string $password): void
    {
        $hash = Hash::make($password);
        $this->userRepository->updateUserPassword($user, $hash);
        $this->sendSMSChangedPassword($user, $password);
    }

    private function sendSMSChangedPassword(User $user, string $password): void
    {
        $this->smsService->sendSMS(
            new SmsDTO(
                config('services.sms.from'),
                $user->phone,
                'Password changed on:' . $password,
            )
        );
    }

}
