<?php

use Illuminate\Database\Seeder;

class ServicoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
        $service1 = new \App\Servico();
        $service1->nome = 'Enfermagem';
        $service1->save();
       
       
        $service2 = new \App\Servico();
        $service2->nome = 'Colheitas';
        $service2->save();
      

        $service3 = new \App\Servico();
        $service3->nome = 'Gastro';
        $service3->save();
        
    }
}
