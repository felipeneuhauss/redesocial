<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     *
     * $ php artisan db:seed
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call('CategoryTableSeeder');

        Model::reguard();
    }
}

class CategoryTableSeeder extends Seeder {
    public function run()
    {
        DB::insert('insert into categories
        (name)
          values (?)',
          array('Alimentação'));

        DB::insert('insert into categories
        (name)
          values (?)',
            array('Assessoria de imprensa'));

        DB::insert('insert into categories
        (name)
          values (?)',
            array('Divulgação'));

        DB::insert('insert into categories
        (name)
          values (?)',
            array('Fotografia'));

        DB::insert('insert into categories
        (name)
          values (?)',
            array('Hospedagem'));

        DB::insert('insert into categories
        (name)
          values (?)',
            array('Locação de carros'));

        DB::insert('insert into categories
        (name)
          values (?)',
            array('Locação de equipamentos'));

        DB::insert('insert into categories
        (name)
          values (?)',
            array('Local para eventos'));

        DB::insert('insert into categories
        (name)
          values (?)',
            array('Manobristas'));

        DB::insert('insert into categories
        (name)
          values (?)',
            array('Médico/enfermeira'));

        DB::insert('insert into categories
        (name)
          values (?)',
            array('Mestre de cerimônias'));

        DB::insert('insert into categories
        (name)
          values (?)',
            array('Montagem de infraestrutura'));

        DB::insert('insert into categories
        (name)
          values (?)',
            array('Office boys'));

        DB::insert('insert into categories
        (name)
          values (?)',
            array('Organização de eventos'));

        DB::insert('insert into categories
        (name)
          values (?)',
            array('Passagens'));

        DB::insert('insert into categories
        (name)
          values (?)',
            array('Pessoal da manutenção'));

        DB::insert('insert into categories
        (name)
          values (?)',
            array('Programação visual'));

        DB::insert('insert into categories
        (name)
          values (?)',
            array('Recepção'));

        DB::insert('insert into categories
        (name)
          values (?)',
            array('Secretaria'));

        DB::insert('insert into categories
        (name)
          values (?)',
            array('Seguranças'));

        DB::insert('insert into categories
        (name)
          values (?)',
            array('Garçons/Copeiras'));

        DB::insert('insert into categories
        (name)
          values (?)',
            array('Serviços gerais'));

        DB::insert('insert into categories
        (name)
          values (?)',
            array('Transporte'));

        DB::insert('insert into categories
        (name)
          values (?)',
            array('Som e imagem'));

        DB::insert('insert into categories
        (name)
          values (?)',
            array('Tradutores e intérpretes'));

    }
}
