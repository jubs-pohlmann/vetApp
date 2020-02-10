<?php

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('products')->insert([
        'name'=> 'Ração',
        'price'=> 10,
        'category'=> 'food',
        'description'=> 'Comida deliciosa sabor banana',
        'stock'=> 40,
        'store_id'=>1,
        'animal'=> 'cats'
      ]);

      DB::table('products')->insert([
        'name'=> 'Ração',
        'price'=> 10,
        'category'=> 'food',
        'description'=> 'Comida deliciosa sabor banana',
        'stock'=> 40,
        'store_id'=>1,
        'animal'=> 'dogs'
      ]);

      DB::table('products')->insert([
        'name'=> 'Coleira',
        'price'=> 10,
        'category'=> 'accessories',
        'description'=> 'Coleira tamanho P rosa',
        'stock'=> 5,
        'store_id'=>1,
        'animal'=> 'dogs'
      ]);

      DB::table('products')->insert([
        'name'=> 'Anti Pulga',
        'price'=> 10,
        'category'=> 'health',
        'description'=> 'Medicina e Saúde 100% indicado',
        'stock'=> 10,
        'store_id'=>2,
        'animal'=> 'cats'
      ]);

      DB::table('products')->insert([
        'name'=> 'Gaiola',
        'price'=> 10,
        'category'=> 'accessories',
        'description'=> 'Gaiola grande usada para aves de grande porte',
        'stock'=> 1,
        'store_id'=>2,
        'animal'=> 'birds'
      ]);


      DB::table('products')->insert([
        'name'=> 'Ração',
        'price'=> 10,
        'category'=> 'food',
        'description'=> 'Comida deliciosa sabor sardinha',
        'stock'=> 40,
        'store_id'=>3,
        'animal'=> 'fishes'
      ]);

      DB::table('products')->insert([
        'name'=> 'Ração',
        'price'=> 10,
        'category'=> 'accessories',
        'description'=> 'Comida deliciosa sabor banana',
        'stock'=> 40,
        'store_id'=>4,
        'animal'=> 'cats'
      ]);

      DB::table('products')->insert([
        'name'=> 'Camisa',
        'price'=> 10,
        'category'=> 'accessories',
        'description'=> 'Roupa de gato filhote',
        'stock'=> 5,
        'store_id'=>5,
        'animal'=> 'cats'
      ]);

      DB::table('products')->insert([
        'name'=> 'Cama',
        'price'=> 10,
        'category'=> 'accessories',
        'description'=> 'Cama confortável',
        'stock'=> 4,
        'store_id'=>6,
        'animal'=> 'dogs'
      ]);

      DB::table('products')->insert([
        'name'=> 'Mordedor',
        'price'=> 10,
        'category'=> 'accessories',
        'description'=> 'Mordedor flexivel',
        'stock'=> 40,
        'store_id'=>7,
        'animal'=> 'dogs'
      ]);


      DB::table('products')->insert([
        'name'=> 'Escova de dente',
        'price'=> 10,
        'category'=> 'bath',
        'description'=> 'Escova macia',
        'stock'=> 4,
        'store_id'=>8,
        'animal'=> 'dogs'
      ]);

      DB::table('products')->insert([
        'name'=> 'Sapato',
        'price'=> 10,
        'category'=> 'accessories',
        'description'=> 'Sapato tamanho 42',
        'stock'=> 10,
        'store_id'=>9,
        'animal'=> 'dogs'
      ]);

      DB::table('products')->insert([
        'name'=> 'Vitamina',
        'price'=> 10,
        'category'=> 'health',
        'description'=> 'Indicado para filhotes',
        'stock'=> 40,
        'store_id'=>10,
        'animal'=> 'cats'
      ]);

      DB::table('products')->insert([
        'name'=> 'Shampoo',
        'price'=> 10,
        'category'=> 'bath',
        'description'=> 'Cheirinho de nenem',
        'stock'=> 40,
        'store_id'=>2,
        'animal'=> 'dogs'
      ]);

      DB::table('products')->insert([
        'name'=> 'Comedouro',
        'price'=> 10,
        'category'=> 'accessories',
        'description'=> 'Cambuca para colocar a ração',
        'stock'=> 10,
        'store_id'=>10,
        'animal'=> 'dogs'
      ]);
    }
}
