<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateAppImages extends AbstractMigration
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
        $table = $this->table('app_images');

        $table->addColumn("app_id", "integer", [
            "limit" => 11,
            "null" => false
        ]);

        $table->addColumn("url", "string", [
            "limit" => 255,
            "null" => false
        ]);

        $table->create();
    }
}
