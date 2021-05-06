<?php

use App\Models\Customer;
use Illuminate\Database\Seeder;


class CustomersTableSeeder extends Seeder
{

    public function run()
    {
        factory(Customer::class)->create([
            'name'=>'João',
            'email'=>'joao@gmail.com',
            'cep'=>'31150710', 
            'address'=>'Rua Iribá - de 128/129 ao fim	Santa Cruz	Belo Horizonte/MG'
        ]);

        factory(Customer::class)->create([
            'name'=>'Maria',
            'email'=>'maria@gmail.com',
            'cep'=>'31150130',
            'address'=>'Rua Tavares de Melo	Cachoeirinha	Belo Horizonte/MG'
        ]);

        factory(Customer::class)->create([
            'name'=>'Antonio',
            'email'=>'antonio@hotmail.com',
            'cep'=>'31035201',
            'address'=>'Rua Cláudio da Silva	Horto Florestal	Belo Horizonte/MG'
        ]);

        factory(Customer::class)->create([
            'name'=>'Pedro',
            'email'=>'pedro@hotmail.com',
            'cep'=>'31230120',
            'address'=>''
        ]);
    }

}