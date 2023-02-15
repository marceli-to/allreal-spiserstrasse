<?php
namespace Database\Seeders;
use App\Models\Floor;
use Illuminate\Database\Seeder;

class FloorSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $floors = [
      [
        'acronym' => 'EG',
        'description'  => 'Erdgeschoss',
      ],
      [
        'acronym' => '1.OG',
        'description'  => '1. Obergeschoss',
      ],
      [
        'acronym' => '2.OG',
        'description'  => '2. Obergeschoss',
      ],
      [
        'acronym' => '3.OG',
        'description'  => '3. Obergeschoss',
      ],
      [
        'acronym' => '4.OG',
        'description'  => '4. Obergeschoss',
      ],
      [
        'acronym' => '5.OG',
        'description'  => '5. Obergeschoss',
      ],
      [
        'acronym' => 'Attika',
        'description'  => 'Attika',
      ],
    ];
    
    foreach($floors as $floor)
    {
      Floor::create([
        'acronym' => $floor['acronym'],
        'description'  => $floor['description'],
      ]);
    }
  }
}
