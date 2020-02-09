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
        'category'=> 'Alimento',
        'description'=> 'Comida deliciosa sabor banana',
        'stock'=> 40,
        'animal'=> 'Gato'
      ]);

      DB::table('products')->insert([
        'name'=> 'Ração',
        'price'=> 10,
        'category'=> 'Alimento',
        'description'=> 'Comida deliciosa sabor banana',
        'stock'=> 40,
        'animal'=> 'Cachorro'
      ]);

      DB::table('products')->insert([
        'name'=> 'Coleira',
        'price'=> 10,
        'category'=> 'Acessório',
        'description'=> 'Coleira tamanho P rosa',
        'stock'=> 5,
        'animal'=> 'Cachorro'
      ]);

      DB::table('products')->insert([
        'name'=> 'Anti Pulga',
        'price'=> 10,
        'category'=> 'Medicina e Saúde',
        'description'=> 'Medicina e Saúde 100% indicado',
        'stock'=> 10,
        'animal'=> 'Gato'
      ]);

      DB::table('products')->insert([
        'name'=> 'Gaiola',
        'price'=> 10,
        'category'=> 'Acessório',
        'description'=> 'Gaiola grande usada para aves de grande porte',
        'stock'=> 1,
        'animal'=> 'Ave'
      ]);


      DB::table('products')->insert([
        'name'=> 'Ração',
        'price'=> 10,
        'category'=> 'Alimento',
        'description'=> 'Comida deliciosa sabor sardinha',
        'stock'=> 40,
        'animal'=> 'Peixe'
      ]);

      DB::table('products')->insert([
        'name'=> 'Ração',
        'price'=> 10,
        'category'=> 'Alimento',
        'description'=> 'Comida deliciosa sabor banana',
        'stock'=> 40,
        'animal'=> 'Gato'
      ]);

      DB::table('products')->insert([
        'name'=> 'Camisa',
        'price'=> 10,
        'category'=> 'Acessório',
        'description'=> 'Roupa de gato filhote',
        'stock'=> 5,
        'animal'=> 'Gato'
      ]);

      DB::table('products')->insert([
        'name'=> 'Cama',
        'price'=> 10,
        'category'=> 'Acessório',
        'description'=> 'Cama confortável',
        'stock'=> 4,
        'animal'=> 'Cachorro'
      ]);

      DB::table('products')->insert([
        'name'=> 'Mordedor',
        'price'=> 10,
        'category'=> 'Brinquedo',
        'description'=> 'Mordedor flexivel',
        'stock'=> 40,
        'animal'=> 'Cachorro'
      ]);


      DB::table('products')->insert([
        'name'=> 'Escova de dente',
        'price'=> 10,
        'category'=> 'Acessório',
        'description'=> 'Escova macia',
        'stock'=> 4,
        'animal'=> 'Cachorro'
      ]);

      DB::table('products')->insert([
        'name'=> 'Sapato',
        'price'=> 10,
        'category'=> 'Roupa',
        'description'=> 'Sapato tamanho 42',
        'stock'=> 10,
        'animal'=> 'Cachorro'
      ]);

      DB::table('products')->insert([
        'name'=> 'Vitamina',
        'price'=> 10,
        'category'=> 'Medicina e Saúde',
        'description'=> 'Indicado para filhotes',
        'stock'=> 40,
        'animal'=> 'Gato'
      ]);

      DB::table('products')->insert([
        'name'=> 'Shampoo',
        'price'=> 10,
        'category'=> 'Cosméticos',
        'description'=> 'Cheirinho de nenem',
        'stock'=> 40,
        'animal'=> 'Cachorro'
      ]);

      DB::table('products')->insert([
        'name'=> 'Comedouro',
        'price'=> 10,
        'category'=> 'Acessório',
        'description'=> 'Cambuca para colocar a ração',
        'stock'=> 10,
        'animal'=> 'Cachorro'
      ]);
    }
}
