<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreatApps extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     * @return void
     */
    public function change(): void
    {
        $table = $this->table('apps');

        //
        $table->addColumn("app_name", "string", [
            "limit" => 100,
            "null" => false
        ]);

        $table->addColumn("app_icon", "string", [
            "limit" => 255,
            "null" => false
        ]);

        $table->addColumn("version", "string", [
            "limit" => 50,
            "null" => false
        ]);

        $table->addColumn("description", "string", [
            "limit" => 2000,
            "null" => false
        ]);

        $table->addColumn("size", "string", [
            "limit" => 50,
            "null" => false
        ]);

        $table->addColumn("downloads", "integer", [
            "limit" => 11,
            "null" => false
        ]);

        $table->addColumn("download_link", "string", [
            "limit" => 255,
            "null" => false
        ]);

        $table->addColumn("tags", "string", [
            "limit" => 255,
            "null" => false
        ]);

        $table->addColumn("rating", "string", [
            "limit" => 100,
            "null" => false
        ]);

        $table->addColumn("package_name", "string", [
            "limit" => 255,
            "null" => false
        ]);

        $table->addColumn("status", "string", [
            "limit" => 100,
            "null" => false
        ]);

        $table->addColumn("owner_id", "integer", [
            "limit" => 11,
            "null" => false
        ]);


        $table->addColumn("created_at", "timestamp", [
            "default" => 'CURRENT_TIMESTAMP'
        ]);

        $table->create();

    }
}
