<?php

use Illuminate\Database\Seeder;
use App\mensagem;

class mensagemTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        mensagem::create([
            'title' => 'Mensagem 1',
            'texto' => 'asfjsdjbgksd',
            'autor' => 'autor'
        ]);
        mensagem::create([
            'title' => 'Mensagem 2',
            'texto' => 'djkfvbhksjdvbs',
            'autor' => 'autor'
        ]);
    }
}
