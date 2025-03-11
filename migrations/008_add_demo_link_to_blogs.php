<?php

use OneMigrator\Migration;

class AddDemoLinkToBlogs extends Migration
{
    public function up(): string
    {
        return "
            ALTER TABLE blogs 
            ADD COLUMN demo_link VARCHAR(255) NULL 
            AFTER featured_image;
        ";
    }

    public function down(): string
    {
        return "
            ALTER TABLE blogs 
            DROP COLUMN IF EXISTS demo_link;
        ";
    }
}
