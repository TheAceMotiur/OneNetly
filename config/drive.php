<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Trash retention period
    |--------------------------------------------------------------------------
    |
    | Files and folders moved to Trash are permanently deleted once they have
    | been trashed for this many days, via the `drive:empty-trash` scheduled
    | command.
    |
    */

    'trash_retention_days' => env('DRIVE_TRASH_RETENTION_DAYS', 30),

];
