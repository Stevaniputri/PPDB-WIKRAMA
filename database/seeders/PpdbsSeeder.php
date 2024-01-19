<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Ppdbs;


class PpdbsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ppdbs::create([
            'nisn' => '123123',
            'name' => 'Steven Jovanca',
            'school' => 'SMP Negeri 10 Bogor',
            'gender' => 'Laki-Laki',
            'email' => 'steven@gmail.com',
            'major' => 'PPLG',
        ]);

        Ppdbs::create([
            'nisn' => '124124',
            'name' => 'Stevani Putri',
            'school' => 'SMP Negeri 17 Bogor',
            'gender' => 'Perempuan',
            'email' => 'stevani@gmail.com',
            'major' => 'PPLG',
        ]);

        Ppdbs::create([
            'nisn' => '125125',
            'name' => 'Anneu',
            'school' => 'SMP Negeri 3 Bogor',
            'gender' => 'Perempuan',
            'email' => 'anne@gmail.com',
            'major' => 'PPLG',
        ]);

        Ppdbs::create([
            'nisn' => '126126',
            'name' => 'Aretta',
            'school' => 'SMP Negeri 2 Bogor',
            'gender' => 'Perempuan',
            'email' => 'aretta@gmail.com',
            'major' => 'PPLG',
        ]);

        Ppdbs::create([
            'nisn' => '127127',
            'name' => 'Airin',
            'school' => 'SMP Negeri 1 Bogor',
            'gender' => 'Perempuan',
            'email' => 'airin@gmail.com',
            'major' => 'PPLG',
        ]);
    }
}
