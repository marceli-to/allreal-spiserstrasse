<?php
namespace App\Console\Commands;
use App\Models\Apartment;
use Illuminate\Support\Facades\Storage;
use Illuminate\Console\Command;

class ImportIso extends Command
{
  /**
   * The name and signature of the console command.
   *
   * @var string
   */
  protected $signature = 'import:iso';

  /**
   * The console command description.
   *
   * @var string
   */
  protected $description = 'Imports svg codes for isometrie.';

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
    $view_4_townhouse_12 = [
      '<g data-name="12d">
        <g data-name="Volumen">
          <polygon class="iso-cls-19" points="663.2 388.7 663.2 408.7 643.4 420.1 598.9 394.4 598.9 374.4 618.7 362.9 663.2 388.7"/>
        </g>
        <g data-name="Rechts">
          <polygon class="iso-cls-20" points="643.4 420.1 643.4 400.1 663.2 388.7 663.2 408.7 643.4 420.1"/>
        </g>
        <g data-name="Links">
          <polygon class="iso-cls-21" points="643.4 420.1 643.4 400.1 598.9 374.4 598.9 394.4 643.4 420.1"/>
        </g>
      </g>',
      '<g data-name="12c">
        <g data-name="Volumen">
          <polygon class="iso-cls-19" points="692.9 405.8 692.9 425.8 673.1 437.2 643.4 420.1 643.4 400.1 663.2 388.7 692.9 405.8"/>
        </g>
        <g data-name="Rechts">
          <polygon class="iso-cls-20" points="673.1 437.2 673.1 417.2 692.9 405.8 692.9 425.8 673.1 437.2"/>
        </g>
        <g data-name="Links">
          <polygon class="iso-cls-21" points="673.1 437.2 673.1 417.2 643.4 400.1 643.4 420.1 673.1 437.2"/>
        </g>
      </g>',
      '<g data-name="12a.1">
        <g data-name="Volumen">
          <polygon class="iso-cls-19" points="618.7 322.9 579.1 345.8 579.1 405.8 623.6 431.5 643.4 420.1 643.4 400.1 663.2 388.7 663.2 348.7 618.7 322.9"/>
        </g>
        <g data-name="Rechts">
          <polygon class="iso-cls-20" points="643.4 420.1 643.4 400.1 663.2 388.7 663.2 348.7 623.6 371.5 623.6 431.5 643.4 420.1"/>
        </g>
        <g data-name="Links">
          <polygon class="iso-cls-21" points="623.6 371.5 623.6 431.5 579.1 405.8 579.1 345.8 623.6 371.5"/>
        </g>
      </g>',
      '<g data-name="12b.2">
        <g data-name="Volumen">
          <polygon class="iso-cls-19" points="663.2 348.7 623.6 371.5 623.6 431.5 653.3 448.6 673.1 437.2 673.1 434.4 707.7 414.4 707.7 374.4 663.2 348.7"/>
        </g>
        <g data-name="Rechts">
          <polygon class="iso-cls-20" points="707.7 414.4 707.7 374.4 668.1 397.2 668.1 437.2 707.7 414.4"/>
          <polygon class="iso-cls-20" points="673.1 437.2 653.3 448.6 653.3 428.6 668.1 437.2 673.1 434.4 673.1 437.2"/>
        </g>
        <g data-name="Links">
          <polygon class="iso-cls-21" points="623.6 371.5 623.6 431.5 653.3 448.6 653.3 428.6 668.1 437.2 668.1 397.2 623.6 371.5"/>
        </g>
      </g>',
      ];
    foreach($view_4_townhouse_12 as $code)
    {
      $number = $this->extractString($code);
      $apartment = Apartment::where('number', $number)->first();
      if ($apartment)
      {
        $apartment->iso_code_view_4 = $code;
        $apartment->save();
      }
    }
    $this->info('import done...');
  }

  public function extractString($str)
  {
    $start = strpos($str, 'data-name="') + strlen('data-name="');
    $end = strpos($str, '"', $start);
    return substr($str, $start, $end - $start);
  }
}
