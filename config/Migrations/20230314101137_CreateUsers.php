<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateUsers extends AbstractMigration
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
        $table = $this->table('users');

        //
        $table->addColumn("first_name", "string", [
            "limit" => 50,
            "null" => false
        ]);

        $table->addColumn("last_name", "string", [
            "limit" => 50,
            "null" => false
        ]);

        $table->addColumn("email", "string", [
            "limit" => 50,
            "null" => false
        ]);

        $table->addColumn("phone", "string", [
            "limit" => 50,
            "null" => false
        ]);


        $table->addColumn("profile_pic", "string", [
            "limit" => 255,
            "null" => false
        ]);

        $table->addColumn("type", "string", [
            "limit" => 50,
            "null" => false
        ]);

        $table->addColumn("auth_id", "string", [
            "limit" => 255,
            "null" => false
        ]);

        $table->addColumn("verified", "string", [
            "limit" => 50,
            "null" => false
        ]);

        $table->addColumn("created_at", "timestamp", [
            "default" => 'CURRENT_TIMESTAMP'
        ]);

        $table->create();
    }
}
