<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateSliders extends AbstractMigration
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
        $table = $this->table('sliders');

        $table->addColumn("title", "string", [
            "limit" => 255,
            "null" => false
        ]);

        $table->addColumn("image", "string", [
            "limit" => 255,
            "null" => false
        ]);

        $table->addColumn("url", "string", [
            "limit" => 255,
            "null" => false
        ]);

        $table->create();
    }
}
