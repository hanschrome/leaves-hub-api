<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Src\App\RegisterUserAction;
use Src\App\UseCase\User\Login\Action\LoginUserAction;
use Src\App\UseCase\User\Login\Service\UserLoginService;
use Src\App\UseCase\User\Registration\Service\UserRegistrationService;
use Src\App\UseCase\User\VerifyEmail\Action\VerifyEmailUserAction;
use Src\App\UseCase\User\VerifyEmail\Service\UserVerifyEmailService;
use Src\Infrastructure\Mailing\MailingConfiguration;
use Src\Infrastructure\Mailing\MailingService;
use Src\Infrastructure\Repositories\User\UserEloquentRepository;

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

Route::post('/v1/user-access/register', function(Request $request) {
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

Route::post('/v1/user-access/register', function (Request $request) {
    $verifyUserAction = new VerifyEmailUserAction(
        new UserVerifyEmailService(
            new UserEloquentRepository()
        )
    );

    return $verifyUserAction($request->json())->toArray();
});

Route::post('/v1/user-access/login', function (Request $request) {
    $loginUserAction = new LoginUserAction(
        new UserLoginService(
            new UserEloquentRepository()
        )
    );

    return $loginUserAction($request->json())->toArray();
});
