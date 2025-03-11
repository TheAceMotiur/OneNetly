<?php

use OneMigrator\Migration;

class AddParentIdToCategories extends Migration
{
    public function up(): string
    {
        return "
            ALTER TABLE categories 
            ADD COLUMN parent_id INT NULL AFTER id,
            ADD CONSTRAINT `fk_category_parent` 
            FOREIGN KEY (`parent_id`) 
            REFERENCES `categories` (`id`) 
            ON DELETE SET NULL;
        ";
    }

    public function down(): string
    {
        return "
            ALTER TABLE categories 
            DROP FOREIGN KEY `fk_category_parent`,
            DROP COLUMN IF EXISTS parent_id;
        ";
    }
}
