<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Enable or Disable Key Access
    |--------------------------------------------------------------------------
    |
    | This option allows you to globally enable or disable the key access
    | middleware. When set to true, all non-admin routes will be
    | protected and require a valid key.
    |
    */
    'enabled' => true,

    /*
    |--------------------------------------------------------------------------
    | Excluded Paths
    |--------------------------------------------------------------------------
    |
    | The following paths will be excluded from the key access check.
    | You can use wildcards (*) to exclude multiple paths.
    |
    */
    'excluded_paths' => [
        'admin*',
        'validate-key',
    ],
];
