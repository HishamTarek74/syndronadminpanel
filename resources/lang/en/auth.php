<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used during authentication for various
    | messages that we need to display to the user. You are free to modify
    | these language lines according to your application's requirements.
    |
    */

    'failed' => 'These credentials do not match our records.',
    'password' => 'The password you entered is incorrect.',
    'throttle' => 'Too many login attempts. Please try again in :seconds seconds.',
    'welcome'=>' Welcome',
    'login'=>'Login',
    'attributes' => [
        'code' => 'Verification Code',
        'token' => 'Verification Token',
        'email' => 'Email',
        'phone' => 'phone',
        'username' => 'Email Or Phone',
        'password' => 'Password',
        'access_token'=>'Access token',
        'firebase_id'=>'Firebase id',
        'first_name'=>'First name',
        'last_name'=>'Last name',
        'gender'=>'Gender',
        'age'=>'Age'
    ],
    'messages' => [
        'forget-password-code-sent' => 'The reset password code was sent to your E-mail address.',
    ],
    'emails' => [
        'forget-password' => [
            'subject' => 'Reset Password',
            'greeting' => 'Dear :user',
            'line' => 'Your password recovery code is :code valid for :minutes minutes',
            'footer' => 'Thank you for using our application!',
            'salutation' => 'Regards, :app',
        ],
        'reset-password' => [
            'subject' => 'Reset Password',
            'greeting' => 'Dear :user',
            'line' => 'Your password has been reset successfully.',
            'footer' => 'Thank you for using our application!',
            'salutation' => 'Regards, :app',
        ],
    ],
];
