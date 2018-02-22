<?php
use Migrations\AbstractSeed;

/**
 * PropertiesType seed.
 */
class PropertiesTypeSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     *
     * @return void
     */
    public function run()
    {
        $data = [
             [
                'id'=>1,
                'title'=>'aluguel',
            ],
            [
                'id'=>2,
                'title'=>'venda',
            ]
        ];

        $table = $this->table('properties_types');
        $table->insert($data)->save();
    }
}
