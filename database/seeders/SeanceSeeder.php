<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Seance;
use App\Models\Film;
use App\Models\Salle;
use Illuminate\Support\Carbon;

class SeanceSeeder extends Seeder
{
    public function run(): void
    {
        $films = Film::all();
        $salles = Salle::all();

        if ($films->isEmpty() || $salles->isEmpty()) {
            $this->command->warn("Aucun film ou salle trouvé. Assurez-vous de remplir les tables 'films' et 'salles' avant.");
            return;
        }

        // Génère 20 séances aléatoires
        for ($i = 0; $i < 10; $i++) {
            $film = $films->random();
            $salle = $salles->random();

            Seance::create([
                'film_id' => $film->id,
                'salle_id' => $salle->id,
                'date_heure' => Carbon::now()->addDays(rand(0, 10))->setTime(rand(10, 22), [0, 30][rand(0, 1)]),
                'places_disponibles' => $salle->nb_places,
            ]);
        }

        $this->command->info("20 séances ont été générées avec succès.");
    }
}
