<?php
namespace App\Console\Commands;
use App\Models\Apartment;
use App\Models\ApartmentFloor;
use Illuminate\Support\Facades\Storage;
use Illuminate\Console\Command;

class UpdatePrices extends Command
{
  /**
   * The name and signature of the console command.
   *
   * @var string
   */
  protected $signature = 'update:prices';

  /**
   * The console command description.
   *
   * @var string
   */
  protected $description = 'Updates prices from a text file.';

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
    $file = storage_path('app/public/imports/preise.txt');

    $handle = fopen($file, 'r');

    while (($line = fgets($handle)) !== false)
    {
      $array = explode(';', $line);

      $number = $array[0];
      $price = str_replace(array("\r", "\n"), '', $array[1]);

      // get apartment by number
      $apartment = Apartment::where('number', $number)->first();

      // if apartment exists, update price
      if ($apartment)
      {
        $apartment->price = $price;
        $apartment->save();
        $this->info('updated price for apartment: ' . $number);
      }
      else
      {
        $this->info('apartment not found: ' . $number);
      }
    }

    fclose($handle);
    $this->info('updated done...');
  }
}
