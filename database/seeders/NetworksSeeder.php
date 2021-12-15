<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Network;

class NetworksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Network1 = new Network();
        $Network1->name = "Crianças";
        $Network1->save();

        $Network2 = new Network();
        $Network2->name = "Juniores";
        $Network2->save();

        $Network3 = new Network();
        $Network3->name = "Adolescentes";
        $Network3->save();

        $Network4 = new Network();
        $Network4->name = "Jovens";
        $Network4->save();
    }
}
