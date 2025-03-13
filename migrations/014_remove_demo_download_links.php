<?php

use OneMigrator\Migration;

class RemoveDemoDownloadLinks extends Migration
{
    public function up(): string
    {
        return "
            ALTER TABLE blogs 
            DROP COLUMN IF EXISTS demo_link,
            DROP COLUMN IF EXISTS download_link;
        ";
    }

    public function down(): string
    {
        return "
            ALTER TABLE blogs 
            ADD COLUMN demo_link VARCHAR(255) NULL AFTER featured_image,
            ADD COLUMN download_link VARCHAR(255) NULL AFTER demo_link;
        ";
    }
}
