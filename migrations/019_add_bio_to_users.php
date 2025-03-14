<?php

use OneMigrator\Migration;

class AddBioToUsers extends Migration
{
    public function up(): string
    {
        return "
            ALTER TABLE users 
            ADD COLUMN bio TEXT NULL DEFAULT NULL 
            AFTER email
        ";
    }

    public function down(): string
    {
        return "
            ALTER TABLE users 
            DROP COLUMN bio
        ";
    }
}
