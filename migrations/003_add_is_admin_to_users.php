<?php

use OneMigrator\Migration;

class AddIsAdminToUsers extends Migration
{
    public function up(): string
    {
        return "ALTER TABLE users ADD COLUMN is_admin TINYINT(1) NOT NULL DEFAULT 0";
    }

    public function down(): string
    {
        return "ALTER TABLE users DROP COLUMN is_admin";
    }
}
