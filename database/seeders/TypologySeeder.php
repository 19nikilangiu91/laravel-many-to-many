<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// Importo il model "Typology"
use App\Models\Typology;

class TypologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    //  8) Vado a creare i dati nel DB nella tabella "Typology"
    public function run()
    {
        Typology::factory()->count(20)->create();
    }
}