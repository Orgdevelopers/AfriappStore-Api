<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateReviews extends AbstractMigration
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
        $table = $this->table('reviews');

        $table->addColumn("user_id", "integer", [
            "limit" => 11,
            "null" => false
        ]);

        $table->addColumn("stars", "integer", [
            "limit" => 11,
            "null" => false
        ]);

        $table->addColumn("review", "string", [
            "limit" => 500,
            "null" => false
        ]);

        $table->addColumn("created_at", "timestamp", [
            "default" => 'CURRENT_TIMESTAMP'
        ]);

        $table->create();
    }
}
