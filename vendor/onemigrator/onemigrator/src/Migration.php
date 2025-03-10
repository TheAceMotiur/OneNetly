<?php
namespace OneMigrator;

abstract class Migration
{
    /**
     * Run the migrations.
     *
     * @return string SQL statement to execute
     */
    abstract public function up(): string;

    /**
     * Reverse the migrations.
     *
     * @return string SQL statement to execute
     */
    abstract public function down(): string;
}
