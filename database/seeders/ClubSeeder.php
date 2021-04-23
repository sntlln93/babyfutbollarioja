<?php

namespace Database\Seeders;

use App\Models\Club;
use App\Models\Image;
use Illuminate\Database\Seeder;
use Illuminate\Http\UploadedFile;
use App\Services\CreateImageService;
use App\Services\CreatePhoneService;
use App\Services\CreateTeamsFromClubService;

class ClubSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $club = Club::create([
            'name' => 'Andino',
            'field_description' => 'TIERRA 80X80',
        ]);

        Image::create([
            'path' => asset('Barcelona_FC_logo.svg'),
            'imageable_id' => $club->id,
            'imageable_type' => get_class($club)
        ]);

        (new CreateTeamsFromClubService)->create($club->id);
        (new CreatePhoneService)->create($club, Club::class, '351', '7891608');
    }
}
