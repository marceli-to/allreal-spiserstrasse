<?php
namespace App\Console\Commands;
use App\Models\Apartment;
use App\Models\ApartmentFloor;
use Illuminate\Support\Facades\Storage;
use Illuminate\Console\Command;

class ImportApartments extends Command
{
  /**
   * The name and signature of the console command.
   *
   * @var string
   */
  protected $signature = 'import:apartments';

  /**
   * The console command description.
   *
   * @var string
   */
  protected $description = 'Imports apartments from a csv file.';

  /**
   * Create a new command instance.
   *
   * @return void
   */
  public function __construct()
  {
    parent::__construct();
  }

  /**
   * Execute the console command.
   *
   * @return int
   */
  public function handle()
  {
    $file = storage_path('app/public/imports/apartments.txt');

    $handle = fopen($file, 'r');

    while (($line = fgets($handle)) !== false)
    {
      $array = explode(';', $line);
      $apartment = Apartment::create([
        'number' => $array[0],
        'location' => $array[1],
        'rooms' => $array[2],
        'type' => $array[3],
        'street' => $array[4],
        'area' => $array[5],
        'area_basement' => $array[6],
        'area_exterior' => $array[7],
        'price' => $array[8]
      ]);
      $this->info('imported apartment: ' . $array[0]);

      $af = explode(',', $array[9]);
      foreach ($af as $floor)
      {
        ApartmentFloor::create([
          'apartment_id' => $apartment->id,
          'floor_id' => $floor
        ]);
        $this->info('imported floor: ' . $floor);
      }

    }

    fclose($handle);
    $this->info('import done...');
  }
}
