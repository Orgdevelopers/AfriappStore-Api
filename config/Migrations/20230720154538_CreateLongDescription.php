<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateLongDescription extends AbstractMigration
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
        $table = $this->table('long_description');

        $table->addColumn("app_id", "integer", [
            "limit" => 11,
            "null" => false
        ]);

        $table->addColumn("description", "string", [
            "limit" => 2000,
            "null" => false
        ]);

        $table->create();
    }
}
