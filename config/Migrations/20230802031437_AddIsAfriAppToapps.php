<?php
declare(strict_types=1);

use Migrations\AbstractMigration;
use PHP_CodeSniffer\Tokenizers\Comment;

class AddIsAfriAppToapps extends AbstractMigration
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

        $table->addColumn('is_afri_app', 'integer', [
            'default' => 0,
            'limit' => 11,
            'null' => false,
        ]);
        $table->update();
    }
}
