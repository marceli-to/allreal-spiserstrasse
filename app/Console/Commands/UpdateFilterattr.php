<?php
namespace App\Console\Commands;
use App\Models\Apartment;
use Illuminate\Console\Command;

class UpdateFilterattr extends Command
{
  /**
   * The name and signature of the console command.
   *
   * @var string
   */
  protected $signature = 'update:filterattr';

  /**
   * The console command description.
   *
   * @var string
   */
  protected $description = 'Updates filter attributes';

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
    $apartments = Apartment::all();

    foreach($apartments as $a)
    {
      // if the area is less than 75, add <75 to filter_area
      if ($a->area < 75)
      {
        $a->filter_area = 'lt75';
      }
      // if the area is between 75 and 100, add 75-100 to filter_area
      if ($a->area >= 75 && $a->area <= 100)
      {
        $a->filter_area = '75-100';
      }
      // if the area is between 100 and 125, add 100-125 to filter_area
      if ($a->area >= 100 && $a->area <= 125)
      {
        $a->filter_area = '100-125';
      }
      // if the area is larger than 125, add >125 to filter_area
      if ($a->area > 125)
      {
        $a->filter_area = 'gt125';
      }

      // if the price is less than 1000000, add <1M to filter_price
      if ($a->price < 1000000)
      {
        $a->filter_price = 'lt1m';
      }
      // if the price is between 1000000 and 1500000, add 1m-1.5m to filter_price
      if ($a->price >= 1000000 && $a->price <= 1500000)
      {
        $a->filter_price = '1m-1.5m';
      }
      // if the price is between 1500000 and 2000000, add 1.5m-2m to filter_price
      if ($a->price >= 1500000 && $a->price <= 2000000)
      {
        $a->filter_price = '1.5m-2m';
      }
      // if the price is between 2000000 and 2500000, add 2m-2.5m to filter_price
      if ($a->price >= 2000000 && $a->price <= 2500000)
      {
        $a->filter_price = '2m-2.5m';
      }

      // if the price is higher than 2500000, add >2.5m to filter_price
      if ($a->price > 2500000)
      {
        $a->filter_price = 'gt2.5m';
      }
      $a->save();
    }

    $this->info('updated done...');
  }
}
