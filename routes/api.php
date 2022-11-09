<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Src\App\UseCase\User\Login\Action\LoginUserAction;
use Src\App\UseCase\User\Login\Service\UserLoginService;
use Src\App\UseCase\User\Login\Service\UserSessionLoginService;
use Src\App\UseCase\User\Registration\Action\RegisterUserAction;
use Src\App\UseCase\User\Registration\Service\UserRegistrationService;
use Src\App\UseCase\User\ResetPassword\Action\ResetPasswordUserAction;
use Src\App\UseCase\User\ResetPassword\Service\UserResetPasswordService;
use Src\App\UseCase\User\VerifyEmail\Action\VerifyEmailUserAction;
use Src\App\UseCase\User\VerifyEmail\Service\UserVerifyEmailService;
use Src\Infrastructure\Mailing\MailingConfiguration;
use Src\Infrastructure\Mailing\MailingService;
use Src\Infrastructure\Repositories\User\UserEloquentRepository;
use Src\Infrastructure\Repositories\UserAccountRecovery\UserAccountRecoveryEloquentRepository;
use Src\Infrastructure\Repositories\UserSession\UserSessionEloquentRepository;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/v1/ping', function () {
    return ['PONG'];
});

Route::post('/v1/user-access/register', function (Request $request) {
    $registerUserAction = new RegisterUserAction(
        new UserRegistrationService(
            new UserEloquentRepository(),
            new MailingService(
                new MailingConfiguration(
                    false,
                    true,
                    config('mail.mailers')['smtp']['encryption'],
                    config('mail.mailers')['smtp']['port'],
                    config('mail.mailers')['smtp']['host'],
                    config('mail.mailers')['smtp']['username'],
                    config('mail.mailers')['smtp']['password'],
                    config('mail.from')['address'],
                    config('mail.from')['name']
                )
            )
        )
    );

    return $registerUserAction($request->json())->toArray();
});

Route::post('/v1/user-access/login', function (Request $request) {
    $loginUserAction = new LoginUserAction(
        new UserLoginService(
            new UserEloquentRepository()
        ),
        new UserSessionLoginService(
            new UserSessionEloquentRepository()
        )
    );

    return $loginUserAction($request->json())->toArray();
});

Route::post('/v1/user-access/recover-password', function (Request $request) {
    $userRecoverPasswordAction = new ResetPasswordUserAction(
        new UserResetPasswordService(
            new UserEloquentRepository(),
            new UserAccountRecoveryEloquentRepository()
        ),
        new MailingService(
            new MailingConfiguration(
                false,
                true,
                config('mail.mailers')['smtp']['encryption'],
                config('mail.mailers')['smtp']['port'],
                config('mail.mailers')['smtp']['host'],
                config('mail.mailers')['smtp']['username'],
                config('mail.mailers')['smtp']['password'],
                config('mail.from')['address'],
                config('mail.from')['name']
            )
        ),
        new UserEloquentRepository()
    );

    return $userRecoverPasswordAction($request->json())->toArray();
});

Route::post('/v1/user-access/verify-email', function (Request $request) {
    $userVerifyAccount = new VerifyEmailUserAction(
        new UserVerifyEmailService(
            new UserEloquentRepository()
        )
    );

    return $userVerifyAccount($request->json())->toArray();
});
