<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Lang;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        ResetPassword::toMailUsing(function ($notifiable, $token){
            return(new MailMessage)->view('admin.email.reset-password-form', ['token'=>$token, 'email'=>$notifiable->getEmailForPasswordReset(), 'name'=>$notifiable->name, 'count' => config('auth.passwords.users.expire')]);
//                ->subject(Lang::get('Mesaj Personalizat pentru resetare email'))
//                ->line(Lang::get('You are receiving this email because we received a password reset request for your account.'))
//                ->action(Lang::get('Reset Password'), url(config('app.url').route('password.reset', $token, false)))
//                ->line(Lang::get('This password reset link will expire in :count minutes.', ['count' => config('auth.passwords.users.expire')]))
//                ->line(Lang::get('If you did not request a password reset, no further action is required.'));
        });
    }
}
