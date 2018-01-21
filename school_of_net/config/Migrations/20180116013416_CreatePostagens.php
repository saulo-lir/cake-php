<?php
use Migrations\AbstractMigration;

class CreatePostagens extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        // Criar a tabela

        $table = $this->table('postagens');

        $table->addColumn('titulo', 'string');
        $table->addColumn('descricao', 'string',[
            'limit' => 200
        ]);
        $table->addColumn('created', 'timestamp', [
            'default' => 'CURRENT_TIMESTAMP'
        ]);
        $table->addColumn('modified', 'datetime',[
            'default' => null,
            'null' => true
        ]);

        $table->create();

    }
}
