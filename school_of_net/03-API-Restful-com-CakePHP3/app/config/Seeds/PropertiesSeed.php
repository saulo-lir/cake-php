<?php
use Migrations\AbstractSeed;

/**
 * Properties seed.
 */
class PropertiesSeed extends AbstractSeed
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
                'title'=>'Casa 4 quartos - Centro ',
                'description'=>'Casa 4 quartos (1 suíte), wc social, 1 vaga na garagem',
                'value'=>'850.000',
                'type_id'=>1,
                'district_id'=>2,
            ],
            [                
                'title'=>'Casa 2 quartos - Praça ',
                'description'=>'Casa 2 quartos, wc social, 2 vagas na garagem',
                'value'=>'1000.000',
                'type_id'=>1,
                'district_id'=>1,
            ],
            [                
                'title'=>'Ap 1 quarto - Apartamento ',
                'description'=>'Ap 3 quartos (1 suíte), wc social, 5 vaga na garagem',
                'value'=>'1850.000',
                'type_id'=>2,
                'district_id'=>2,
            ],
            
        ];

        $table = $this->table('properties');
        $table->insert($data)->save();
    }
}
