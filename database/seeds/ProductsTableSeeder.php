<?php

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{

    public function run()
    {
        factory(Product::class)->create([
            'name'=>'Tênis',
            'description'=>'Tênis de corrida Nike',
            'price'=>'181.86',
            'store'=>'7',
        ]);

        factory(Product::class)->create([
            'name'=>'Tênis',
            'description'=>'Tênis de corrida Mizuno',
            'price'=>'399.86',
            'store'=>'20',
        ]);

        factory(Product::class)->create([
            'name'=>'Tênis',
            'description'=>'Tênis de corrida Adidas',
            'price'=>'299.99',
            'store'=>'15',
        ]);
        
        factory(Product::class)->create([
            'name'=>'Bota',
            'description'=>'Bota Catterpilar Waterproof' ,
            'price'=>'199.86',
            'store'=>'13',
        ]);

        factory(Product::class)->create([
            'name'=>'Bota',
            'description'=>'Bota Adventure Masculina',
            'price'=>'109.89',
            'store'=>'12',
        ]);
        
        factory(Product::class)->create([
            'name'=>'Bota',
            'description'=>'Bota Adventure Couro Bull Terrier',
            'price'=>'161.49',
            'store'=>'18',
        ]);
        
    }
}