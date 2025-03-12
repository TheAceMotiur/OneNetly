<?php

use OneMigrator\Migration;

class RemoveExcerptColumn extends Migration
{
    public function up(): string
    {
        return "
            ALTER TABLE blogs 
            DROP COLUMN IF EXISTS excerpt;
        ";
    }

    public function down(): string
    {
        return "
            ALTER TABLE blogs 
            ADD COLUMN excerpt TEXT NULL AFTER title;
        ";
    }
}
