<?php

use OneMigrator\Migration;

class AddDownloadLinkToBlogs extends Migration
{
    public function up(): string
    {
        return "
            ALTER TABLE blogs 
            ADD COLUMN download_link VARCHAR(255) NULL 
            AFTER demo_link;
        ";
    }

    public function down(): string
    {
        return "
            ALTER TABLE blogs 
            DROP COLUMN IF EXISTS download_link;
        ";
    }
}
