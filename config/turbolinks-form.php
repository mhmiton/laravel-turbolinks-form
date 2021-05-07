<?php

return [

    /*
    |--------------------------------------------------------------------------
    | TurbolinksForm settings
    |--------------------------------------------------------------------------
    | TurbolinksForm is enabled by default.
    | You can override the value by setting enable to true or false.
    |
    */

    'enabled' => env('TURBOLINKS_FORM', true),

    /*
    |--------------------------------------------------------------------------
    | TurbolinksForm selector
    |--------------------------------------------------------------------------
    | TurbolinksForm used form selector by default.
    | You can use any DOM selector for the form.
    |
    */

    'selector' => 'form'
];