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
    // View 2
    // $view_2_house_8 = [
    //   '<g id="8.1" data-name="8.1">
    //     <g data-name="Volumen">
    //       <polygon class="iso-cls-19" points="386.1 228.7 306.9 274.4 306.9 294.4 341.5 314.4 366.3 300.1 388.5 312.9 443 281.5 443 261.5 386.1 228.7"/>
    //     </g>
    //     <g data-name="Rechts">
    //       <polygon class="iso-cls-20" points="443 261.5 388.5 292.9 388.5 312.9 443 281.5 443 261.5"/>
    //       <polygon class="iso-cls-20" points="366.3 280.1 341.5 294.4 341.5 314.4 366.3 300.1 366.3 280.1"/>
    //     </g>
    //     <g data-name="Links">
    //       <polygon class="iso-cls-21" points="341.5 294.4 306.9 274.4 306.9 294.4 341.5 314.4 341.5 294.4"/>
    //       <polygon class="iso-cls-21" points="388.5 292.9 366.3 280.1 366.3 300.1 388.5 312.9 388.5 292.9"/>
    //     </g>
    //   </g>',
    //   '<g id="8.3" data-name="8.3">
    //     <g data-name="Volumen">
    //       <polygon class="iso-cls-19" points="321.7 305.8 366.3 280.1 420.7 311.5 420.7 331.5 376.2 357.2 321.7 325.8 321.7 305.8"/>
    //     </g>
    //     <g data-name="Rechts">
    //       <polygon class="iso-cls-20" points="376.2 357.2 420.7 331.5 420.7 311.5 376.2 337.2 376.2 357.2"/>
    //     </g>
    //     <g data-name="Links">
    //       <polygon class="iso-cls-21" points="376.2 337.2 321.7 305.8 321.7 325.8 376.2 357.2 376.2 337.2"/>
    //     </g>
    //   </g>',
    //   '<g id="8.2" data-name="8.2">
    //     <g data-name="Volumen">
    //       <polygon class="iso-cls-19" points="509.8 300.1 443 261.5 388.5 292.9 388.5 312.9 403.4 321.5 396 325.8 396 345.8 430.6 365.8 509.8 320.1 509.8 300.1"/>
    //       <polygon class="iso-cls-21" points="396 345.8 430.6 365.8 430.6 345.8 396 325.8 396 345.8"/>
    //     </g>
    //     <g data-name="Rechts">
    //       <polygon class="iso-cls-20" points="430.6 365.8 509.8 320.1 509.8 300.1 430.6 345.8 430.6 365.8"/>
    //     </g>
    //     <g data-name="Links">
    //       <polygon class="iso-cls-21" points="420.7 311.5 388.5 292.9 388.5 312.9 403.4 321.5 420.7 311.5"/>
    //     </g>
    //   </g>',
    //   '<g id="8.101" data-name="8.101">
    //     <g data-name="Volumen">
    //       <polygon class="iso-cls-19" points="386.1 208.7 306.9 254.4 306.9 274.4 341.5 294.4 366.3 280.1 388.5 292.9 443 261.5 443 241.5 386.1 208.7"/>
    //     </g>
    //     <g data-name="Rechts">
    //       <polygon class="iso-cls-20" points="443 241.5 388.5 272.9 388.5 292.9 443 261.5 443 241.5"/>
    //       <polygon class="iso-cls-20" points="366.3 260.1 341.5 274.4 341.5 294.4 366.3 280.1 366.3 260.1"/>
    //     </g>
    //     <g data-name="Links">
    //       <polygon class="iso-cls-21" points="341.5 274.4 306.9 254.4 306.9 274.4 341.5 294.4 341.5 274.4"/>
    //       <polygon class="iso-cls-21" points="388.5 272.9 366.3 260.1 366.3 280.1 388.5 292.9 388.5 272.9"/>
    //     </g>
    //   </g>',
    //   '<g id="8.103" data-name="8.103">
    //     <g data-name="Volumen">
    //       <polygon class="iso-cls-19" points="321.7 285.8 366.3 260.1 420.7 291.5 420.7 311.5 376.2 337.2 321.7 305.8 321.7 285.8"/>
    //     </g>
    //     <g data-name="Rechts">
    //       <polygon class="iso-cls-20" points="376.2 337.2 420.7 311.5 420.7 291.5 376.2 317.2 376.2 337.2"/>
    //     </g>
    //     <g data-name="Links">
    //       <polygon class="iso-cls-21" points="376.2 317.2 321.7 285.8 321.7 305.8 376.2 337.2 376.2 317.2"/>
    //     </g>
    //   </g>',
    //   '<g id="8.102" data-name="8.102">
    //     <g data-name="Volumen">
    //       <polygon class="iso-cls-19" points="509.8 280.1 443 241.5 388.5 272.9 388.5 292.9 403.4 301.5 396 305.8 396 325.8 430.6 345.8 509.8 300.1 509.8 280.1"/>
    //       <polygon class="iso-cls-21" points="396 325.8 430.6 345.8 430.6 325.8 396 305.8 396 325.8"/>
    //     </g>
    //     <g data-name="Rechts">
    //       <polygon class="iso-cls-20" points="430.6 345.8 509.8 300.1 509.8 280.1 430.6 325.8 430.6 345.8"/>
    //     </g>
    //     <g data-name="Links">
    //       <polygon class="iso-cls-21" points="420.7 291.5 388.5 272.9 388.5 292.9 403.4 301.5 420.7 291.5"/>
    //     </g>
    //   </g>',
    //   '<g id="8.201" data-name="8.201">
    //     <g data-name="Volumen">
    //       <polygon class="iso-cls-19" points="386.1 188.7 306.9 234.4 306.9 254.4 341.5 274.4 366.3 260.1 388.5 272.9 443 241.5 443 221.5 386.1 188.7"/>
    //     </g>
    //     <g data-name="Rechts">
    //       <polygon class="iso-cls-20" points="443 221.5 388.5 252.9 388.5 272.9 443 241.5 443 221.5"/>
    //       <polygon class="iso-cls-20" points="366.3 240.1 341.5 254.4 341.5 274.4 366.3 260.1 366.3 240.1"/>
    //     </g>
    //     <g data-name="Links">
    //       <polygon class="iso-cls-21" points="341.5 254.4 306.9 234.4 306.9 254.4 341.5 274.4 341.5 254.4"/>
    //       <polygon class="iso-cls-21" points="388.5 252.9 366.3 240.1 366.3 260.1 388.5 272.9 388.5 252.9"/>
    //     </g>
    //   </g>',
    //   '<g id="8.203" data-name="8.203">
    //     <g data-name="Volumen">
    //       <polygon class="iso-cls-19" points="321.7 265.8 366.3 240.1 420.7 271.5 420.7 291.5 376.2 317.2 321.7 285.8 321.7 265.8"/>
    //     </g>
    //     <g data-name="Rechts">
    //       <polygon class="iso-cls-20" points="376.2 317.2 420.7 291.5 420.7 271.5 376.2 297.2 376.2 317.2"/>
    //     </g>
    //     <g data-name="Links">
    //       <polygon class="iso-cls-21" points="376.2 297.2 321.7 265.8 321.7 285.8 376.2 317.2 376.2 297.2"/>
    //     </g>
    //   </g>',
    //   '<g id="8.202" data-name="8.202">
    //     <g data-name="Volumen">
    //       <polygon class="iso-cls-19" points="509.8 260.1 443 221.5 388.5 252.9 388.5 272.9 403.4 281.5 396 285.8 396 305.8 430.6 325.8 509.8 280.1 509.8 260.1"/>
    //       <polygon class="iso-cls-21" points="396 305.8 430.6 325.8 430.6 305.8 396 285.8 396 305.8"/>
    //     </g>
    //     <g data-name="Rechts">
    //       <polygon class="iso-cls-20" points="430.6 325.8 509.8 280.1 509.8 260.1 430.6 305.8 430.6 325.8"/>
    //     </g>
    //     <g data-name="Links">
    //       <polygon class="iso-cls-21" points="420.7 271.5 388.5 252.9 388.5 272.9 403.4 281.5 420.7 271.5"/>
    //     </g>
    //   </g>',
    //   '<g id="8.301" data-name="8.301">
    //     <g data-name="Volumen">
    //       <polygon class="iso-cls-19" points="386.1 168.7 306.9 214.4 306.9 234.4 341.5 254.4 366.3 240.1 388.5 252.9 443 221.5 443 201.5 386.1 168.7"/>
    //     </g>
    //     <g data-name="Rechts">
    //       <polygon class="iso-cls-20" points="443 201.5 388.5 232.9 388.5 252.9 443 221.5 443 201.5"/>
    //       <polygon class="iso-cls-20" points="366.3 220.1 341.5 234.4 341.5 254.4 366.3 240.1 366.3 220.1"/>
    //     </g>
    //     <g data-name="Links">
    //       <polygon class="iso-cls-21" points="341.5 234.4 306.9 214.4 306.9 234.4 341.5 254.4 341.5 234.4"/>
    //       <polygon class="iso-cls-21" points="388.5 232.9 366.3 220.1 366.3 240.1 388.5 252.9 388.5 232.9"/>
    //     </g>
    //   </g>',
    //   '<g id="8.303" data-name="8.303">
    //     <g data-name="Volumen">
    //       <polygon class="iso-cls-19" points="321.7 245.8 366.3 220.1 420.7 251.5 420.7 271.5 376.2 297.2 321.7 265.8 321.7 245.8"/>
    //     </g>
    //     <g data-name="Rechts">
    //       <polygon class="iso-cls-20" points="376.2 297.2 420.7 271.5 420.7 251.5 376.2 277.2 376.2 297.2"/>
    //     </g>
    //     <g data-name="Links">
    //       <polygon class="iso-cls-21" points="376.2 277.2 321.7 245.8 321.7 265.8 376.2 297.2 376.2 277.2"/>
    //     </g>
    //   </g>',
    //   '<g id="8.302" data-name="8.302">
    //     <g data-name="Volumen">
    //       <polygon class="iso-cls-19" points="509.8 240.1 443 201.5 388.5 232.9 388.5 252.9 403.4 261.5 396 265.8 396 285.8 430.6 305.8 509.8 260.1 509.8 240.1"/>
    //       <polygon class="iso-cls-21" points="396 285.8 430.6 305.8 430.6 285.8 396 265.8 396 285.8"/>
    //     </g>
    //     <g data-name="Rechts">
    //       <polygon class="iso-cls-20" points="430.6 305.8 509.8 260.1 509.8 240.1 430.6 285.8 430.6 305.8"/>
    //     </g>
    //     <g data-name="Links">
    //       <polygon class="iso-cls-21" points="420.7 251.5 388.5 232.9 388.5 252.9 403.4 261.5 420.7 251.5"/>
    //     </g>
    //   </g>',
    //   '<g id="8.401" data-name="8.401">
    //     <g data-name="Volumen">
    //       <polygon class="iso-cls-19" points="386.1 148.7 306.9 194.4 306.9 214.4 341.5 234.4 366.3 220.1 388.5 232.9 443 201.5 443 181.5 386.1 148.7"/>
    //     </g>
    //     <g data-name="Rechts">
    //       <polygon class="iso-cls-20" points="443 181.5 388.5 212.9 388.5 232.9 443 201.5 443 181.5"/>
    //       <polygon class="iso-cls-20" points="366.3 200.1 341.5 214.4 341.5 234.4 366.3 220.1 366.3 200.1"/>
    //     </g>
    //     <g data-name="Links">
    //       <polygon class="iso-cls-21" points="341.5 214.4 306.9 194.4 306.9 214.4 341.5 234.4 341.5 214.4"/>
    //       <polygon class="iso-cls-21" points="388.5 212.9 366.3 200.1 366.3 220.1 388.5 232.9 388.5 212.9"/>
    //     </g>
    //   </g>',
    //   '<g id="8.403" data-name="8.403">
    //     <g data-name="Volumen">
    //       <polygon class="iso-cls-19" points="321.7 225.8 366.3 200.1 420.7 231.5 420.7 251.5 376.2 277.2 321.7 245.8 321.7 225.8"/>
    //     </g>
    //     <g data-name="Rechts">
    //       <polygon class="iso-cls-20" points="376.2 277.2 420.7 251.5 420.7 231.5 376.2 257.2 376.2 277.2"/>
    //     </g>
    //     <g data-name="Links">
    //       <polygon class="iso-cls-21" points="376.2 257.2 321.7 225.8 321.7 245.8 376.2 277.2 376.2 257.2"/>
    //     </g>
    //   </g>',
    //   '<g id="8.402" data-name="8.402">
    //     <g data-name="Volumen">
    //       <polygon class="iso-cls-19" points="509.8 220.1 443 181.5 388.5 212.9 388.5 232.9 403.4 241.5 396 245.8 396 265.8 430.6 285.8 509.8 240.1 509.8 220.1"/>
    //       <polygon class="iso-cls-21" points="396 265.8 430.6 285.8 430.6 265.8 396 245.8 396 265.8"/>
    //     </g>
    //     <g data-name="Rechts">
    //       <polygon class="iso-cls-20" points="430.6 285.8 509.8 240.1 509.8 220.1 430.6 265.8 430.6 285.8"/>
    //     </g>
    //     <g data-name="Links">
    //       <polygon class="iso-cls-21" points="420.7 231.5 388.5 212.9 388.5 232.9 403.4 241.5 420.7 231.5"/>
    //     </g>
    //   </g>',
    //   '<g id="8.501" data-name="8.501">
    //     <g data-name="Volumen">
    //       <polygon class="iso-cls-19" points="366.3 140.1 306.9 174.4 306.9 194.4 341.5 214.4 366.3 200.1 388.5 212.9 423.2 192.9 423.2 172.9 366.3 140.1"/>
    //     </g>
    //     <g data-name="Rechts">
    //       <polygon class="iso-cls-20" points="423.2 172.9 388.5 192.9 388.5 212.9 423.2 192.9 423.2 172.9"/>
    //       <polygon class="iso-cls-20" points="366.3 180.1 341.5 194.4 341.5 214.4 366.3 200.1 366.3 180.1"/>
    //     </g>
    //     <g data-name="Links">
    //       <polygon class="iso-cls-21" points="341.5 194.4 306.9 174.4 306.9 194.4 341.5 214.4 341.5 194.4"/>
    //       <polygon class="iso-cls-21" points="388.5 192.9 366.3 180.1 366.3 200.1 388.5 212.9 388.5 192.9"/>
    //     </g>
    //   </g>',
    //   '<g id="8.503" data-name="8.503">
    //     <g data-name="Volumen">
    //       <polygon class="iso-cls-19" points="321.7 205.8 366.3 180.1 420.7 211.5 420.7 231.5 376.2 257.2 321.7 225.8 321.7 205.8"/>
    //     </g>
    //     <g data-name="Rechts">
    //       <polygon class="iso-cls-20" points="376.2 257.2 420.7 231.5 420.7 211.5 376.2 237.2 376.2 257.2"/>
    //     </g>
    //     <g data-name="Links">
    //       <polygon class="iso-cls-21" points="376.2 237.2 321.7 205.8 321.7 225.8 376.2 257.2 376.2 237.2"/>
    //     </g>
    //   </g>',
    //   '<g id="8.502" data-name="8.502">
    //     <g data-name="Volumen">
    //       <polygon class="iso-cls-19" points="490 211.5 423.2 172.9 388.5 192.9 388.5 212.9 403.4 221.5 396 225.8 396 245.8 430.6 265.8 490 231.5 490 211.5"/>
    //       <polygon class="iso-cls-21" points="396 245.8 430.6 265.8 430.6 245.8 396 225.8 396 245.8"/>
    //     </g>
    //     <g data-name="Rechts">
    //       <polygon class="iso-cls-20" points="430.6 265.8 490 231.5 490 211.5 430.6 245.8 430.6 265.8"/>
    //     </g>
    //     <g data-name="Links">
    //       <polygon class="iso-cls-21" points="420.7 211.5 388.5 192.9 388.5 212.9 403.4 221.5 420.7 211.5"/>
    //     </g>
    //   </g>',
    //   '<g id="8.601" data-name="8.601">
    //     <g data-name="Volumen">
    //       <polygon class="iso-cls-19" points="366.3 120.1 306.9 154.4 306.9 174.4 324.2 184.4 321.7 185.8 321.7 205.8 344 218.7 423.2 172.9 423.2 152.9 366.3 120.1"/>
    //     </g>
    //     <g data-name="Rechts">
    //       <polygon class="iso-cls-20" points="423.2 152.9 344 198.7 344 218.7 423.2 172.9 423.2 152.9"/>
    //     </g>
    //     <g data-name="Links">
    //       <polygon class="iso-cls-21" points="341.5 174.4 306.9 154.4 306.9 174.4 324.2 184.4 341.5 174.4"/>
    //       <polygon class="iso-cls-21" points="344 198.7 321.7 185.8 321.7 205.8 344 218.7 344 198.7"/>
    //     </g>
    //   </g>',
    //   '<g id="8.602" data-name="8.602">
    //     <g data-name="Volumen">
    //       <polygon class="iso-cls-19" points="423.2 152.9 344 198.7 344 218.7 376.2 237.2 396 225.8 430.6 245.8 490 211.5 490 191.5 423.2 152.9"/>
    //       <polygon class="iso-cls-21" points="396 225.8 430.6 245.8 430.6 225.8 396 205.8 396 225.8"/>
    //     </g>
    //     <g data-name="Rechts">
    //       <polygon class="iso-cls-20" points="430.6 245.8 490 211.5 490 191.5 430.6 225.8 430.6 245.8"/>
    //     </g>
    //     <g data-name="Links">
    //       <polygon class="iso-cls-21" points="376.2 217.2 344 198.7 344 218.7 376.2 237.2 376.2 217.2"/>
    //       <polygon class="iso-cls-20" points="396 205.8 396 225.8 376.2 237.2 376.2 217.2 396 205.8"/>
    //     </g>
    //   </g>'
    // ];
    // $view_2_house_10 = [
    //   '<g id="10.1" data-name="10.1">
    //     <g data-name="Volumen">
    //       <polygon class="iso-cls-19" points="262.4 157.2 183.2 202.9 183.2 222.9 217.8 242.9 242.6 228.7 264.8 241.5 319.3 210.1 319.3 190.1 262.4 157.2"/>
    //     </g>
    //     <g data-name="Rechts">
    //       <polygon class="iso-cls-20" points="319.3 190.1 264.8 221.5 264.8 241.5 319.3 210.1 319.3 190.1"/>
    //       <polygon class="iso-cls-20" points="242.6 208.7 217.8 222.9 217.8 242.9 242.6 228.7 242.6 208.7"/>
    //     </g>
    //     <g data-name="Links">
    //       <polygon class="iso-cls-21" points="217.8 222.9 183.2 202.9 183.2 222.9 217.8 242.9 217.8 222.9"/>
    //       <polygon class="iso-cls-21" points="264.8 221.5 242.6 208.7 242.6 228.7 264.8 241.5 264.8 221.5"/>
    //     </g>
    //   </g>',
    //   '<g id="10.3" data-name="10.3">
    //     <g data-name="Volumen">
    //       <polygon class="iso-cls-19" points="198 234.4 242.6 208.7 297 240.1 297 260.1 252.5 285.8 198 254.4 198 234.4"/>
    //     </g>
    //     <g data-name="Rechts">
    //       <polygon class="iso-cls-20" points="252.5 285.8 297 260.1 297 240.1 252.5 265.8 252.5 285.8"/>
    //     </g>
    //     <g data-name="Links">
    //       <polygon class="iso-cls-21" points="252.5 265.8 198 234.4 198 254.4 252.5 285.8 252.5 265.8"/>
    //     </g>
    //   </g>',
    //   '<g id="10.2" data-name="10.2">
    //     <g data-name="Volumen">
    //       <polygon class="iso-cls-19" points="386.1 228.7 319.3 190.1 264.8 221.5 264.8 241.5 279.7 250.1 272.2 254.4 272.2 274.4 306.9 294.4 386.1 248.7 386.1 228.7"/>
    //       <polygon class="iso-cls-21" points="272.2 274.4 306.9 294.4 306.9 274.4 272.2 254.4 272.2 274.4"/>
    //     </g>
    //     <g data-name="Rechts">
    //       <polygon class="iso-cls-20" points="306.9 294.4 386.1 248.7 386.1 228.7 306.9 274.4 306.9 294.4"/>
    //     </g>
    //     <g data-name="Links">
    //       <polygon class="iso-cls-21" points="297 240.1 264.8 221.5 264.8 241.5 279.7 250.1 297 240.1"/>
    //     </g>
    //   </g>',
    //   '<g id="10.101" data-name="10.101">
    //     <g data-name="Volumen">
    //       <polygon class="iso-cls-19" points="262.4 137.2 183.2 182.9 183.2 202.9 217.8 222.9 242.6 208.7 264.8 221.5 319.3 190.1 319.3 170.1 262.4 137.2"/>
    //     </g>
    //     <g data-name="Rechts">
    //       <polygon class="iso-cls-20" points="319.3 170.1 264.8 201.5 264.8 221.5 319.3 190.1 319.3 170.1"/>
    //       <polygon class="iso-cls-20" points="242.6 188.7 217.8 202.9 217.8 222.9 242.6 208.7 242.6 188.7"/>
    //     </g>
    //     <g data-name="Links">
    //       <polygon class="iso-cls-21" points="217.8 202.9 183.2 182.9 183.2 202.9 217.8 222.9 217.8 202.9"/>
    //       <polygon class="iso-cls-21" points="264.8 201.5 242.6 188.7 242.6 208.7 264.8 221.5 264.8 201.5"/>
    //     </g>
    //   </g>',
    //   '<g id="10.103" data-name="10.103">
    //     <g data-name="Volumen">
    //       <polygon class="iso-cls-19" points="198 214.4 242.6 188.7 297 220.1 297 240.1 252.5 265.8 198 234.4 198 214.4"/>
    //     </g>
    //     <g data-name="Rechts">
    //       <polygon class="iso-cls-20" points="252.5 265.8 297 240.1 297 220.1 252.5 245.8 252.5 265.8"/>
    //     </g>
    //     <g data-name="Links">
    //       <polygon class="iso-cls-21" points="252.5 245.8 198 214.4 198 234.4 252.5 265.8 252.5 245.8"/>
    //     </g>
    //   </g>',
    //   '<g id="10.102" data-name="10.102">
    //     <g data-name="Volumen">
    //       <polygon class="iso-cls-19" points="386.1 208.7 319.3 170.1 264.8 201.5 264.8 221.5 279.7 230.1 272.2 234.4 272.2 254.4 306.9 274.4 386.1 228.7 386.1 208.7"/>
    //       <polygon class="iso-cls-21" points="272.2 254.4 306.9 274.4 306.9 254.4 272.2 234.4 272.2 254.4"/>
    //     </g>
    //     <g data-name="Rechts">
    //       <polygon class="iso-cls-20" points="306.9 274.4 386.1 228.7 386.1 208.7 306.9 254.4 306.9 274.4"/>
    //     </g>
    //     <g data-name="Links">
    //       <polygon class="iso-cls-21" points="297 220.1 264.8 201.5 264.8 221.5 279.7 230.1 297 220.1"/>
    //     </g>
    //   </g>',
    //   '<g id="10.201" data-name="10.201">
    //     <g data-name="Volumen">
    //       <polygon class="iso-cls-19" points="262.4 117.2 183.2 162.9 183.2 182.9 217.8 202.9 242.6 188.7 264.8 201.5 319.3 170.1 319.3 150.1 262.4 117.2"/>
    //     </g>
    //     <g data-name="Rechts">
    //       <polygon class="iso-cls-20" points="319.3 150.1 264.8 181.5 264.8 201.5 319.3 170.1 319.3 150.1"/>
    //       <polygon class="iso-cls-20" points="242.6 168.7 217.8 182.9 217.8 202.9 242.6 188.7 242.6 168.7"/>
    //     </g>
    //     <g data-name="Links">
    //       <polygon class="iso-cls-21" points="217.8 182.9 183.2 162.9 183.2 182.9 217.8 202.9 217.8 182.9"/>
    //       <polygon class="iso-cls-21" points="264.8 181.5 242.6 168.7 242.6 188.7 264.8 201.5 264.8 181.5"/>
    //     </g>
    //   </g>',
    //   '<g id="10.203" data-name="10.203">
    //     <g data-name="Volumen">
    //       <polygon class="iso-cls-19" points="198 194.4 242.6 168.7 297 200.1 297 220.1 252.5 245.8 198 214.4 198 194.4"/>
    //     </g>
    //     <g data-name="Rechts">
    //       <polygon class="iso-cls-20" points="252.5 245.8 297 220.1 297 200.1 252.5 225.8 252.5 245.8"/>
    //     </g>
    //     <g data-name="Links">
    //       <polygon class="iso-cls-21" points="252.5 225.8 198 194.4 198 214.4 252.5 245.8 252.5 225.8"/>
    //     </g>
    //   </g>',
    //   '<g id="10.202" data-name="10.202">
    //     <g data-name="Volumen">
    //       <polygon class="iso-cls-19" points="386.1 188.7 319.3 150.1 264.8 181.5 264.8 201.5 279.7 210.1 272.2 214.4 272.2 234.4 306.9 254.4 386.1 208.7 386.1 188.7"/>
    //       <polygon class="iso-cls-21" points="272.2 234.4 306.9 254.4 306.9 234.4 272.2 214.4 272.2 234.4"/>
    //     </g>
    //     <g data-name="Rechts">
    //       <polygon class="iso-cls-20" points="306.9 254.4 386.1 208.7 386.1 188.7 306.9 234.4 306.9 254.4"/>
    //     </g>
    //     <g data-name="Links">
    //       <polygon class="iso-cls-21" points="297 200.1 264.8 181.5 264.8 201.5 279.7 210.1 297 200.1"/>
    //     </g>
    //   </g>',
    //   '<g id="10.301" data-name="10.301">
    //     <g data-name="Volumen">
    //       <polygon class="iso-cls-19" points="262.4 97.2 183.2 142.9 183.2 162.9 217.8 182.9 242.6 168.7 264.8 181.5 319.3 150.1 319.3 130.1 262.4 97.2"/>
    //     </g>
    //     <g data-name="Rechts">
    //       <polygon class="iso-cls-20" points="319.3 130.1 264.8 161.5 264.8 181.5 319.3 150.1 319.3 130.1"/>
    //       <polygon class="iso-cls-20" points="242.6 148.7 217.8 162.9 217.8 182.9 242.6 168.7 242.6 148.7"/>
    //     </g>
    //     <g data-name="Links">
    //       <polygon class="iso-cls-21" points="217.8 162.9 183.2 142.9 183.2 162.9 217.8 182.9 217.8 162.9"/>
    //       <polygon class="iso-cls-21" points="264.8 161.5 242.6 148.7 242.6 168.7 264.8 181.5 264.8 161.5"/>
    //     </g>
    //   </g>',
    //   '<g id="10.303" data-name="10.303">
    //     <g data-name="Volumen">
    //       <polygon class="iso-cls-19" points="198 174.4 242.6 148.7 297 180.1 297 200.1 252.5 225.8 198 194.4 198 174.4"/>
    //     </g>
    //     <g data-name="Rechts">
    //       <polygon class="iso-cls-20" points="252.5 225.8 297 200.1 297 180.1 252.5 205.8 252.5 225.8"/>
    //     </g>
    //     <g data-name="Links">
    //       <polygon class="iso-cls-21" points="252.5 205.8 198 174.4 198 194.4 252.5 225.8 252.5 205.8"/>
    //     </g>
    //   </g>',
    //   '<g id="10.302" data-name="10.302">
    //     <g data-name="Volumen">
    //       <polygon class="iso-cls-19" points="386.1 168.7 319.3 130.1 264.8 161.5 264.8 181.5 279.7 190.1 272.2 194.4 272.2 214.4 306.9 234.4 386.1 188.7 386.1 168.7"/>
    //       <polygon class="iso-cls-21" points="272.2 214.4 306.9 234.4 306.9 214.4 272.2 194.4 272.2 214.4"/>
    //     </g>
    //     <g data-name="Rechts">
    //       <polygon class="iso-cls-20" points="306.9 234.4 386.1 188.7 386.1 168.7 306.9 214.4 306.9 234.4"/>
    //     </g>
    //     <g data-name="Links">
    //       <polygon class="iso-cls-21" points="297 180.1 264.8 161.5 264.8 181.5 279.7 190.1 297 180.1"/>
    //     </g>
    //   </g>',
    //   '<g id="10.401" data-name="10.401">
    //     <g data-name="Volumen">
    //       <polygon class="iso-cls-19" points="262.4 77.2 183.2 122.9 183.2 142.9 217.8 162.9 242.6 148.7 264.8 161.5 319.3 130.1 319.3 110.1 262.4 77.2"/>
    //     </g>
    //     <g data-name="Rechts">
    //       <polygon class="iso-cls-20" points="319.3 110.1 264.8 141.5 264.8 161.5 319.3 130.1 319.3 110.1"/>
    //       <polygon class="iso-cls-20" points="242.6 128.7 217.8 142.9 217.8 162.9 242.6 148.7 242.6 128.7"/>
    //     </g>
    //     <g data-name="Links">
    //       <polygon class="iso-cls-21" points="217.8 142.9 183.2 122.9 183.2 142.9 217.8 162.9 217.8 142.9"/>
    //       <polygon class="iso-cls-21" points="264.8 141.5 242.6 128.7 242.6 148.7 264.8 161.5 264.8 141.5"/>
    //     </g>
    //   </g>',
    //   '<g id="10.403" data-name="10.403">
    //     <g data-name="Volumen">
    //       <polygon class="iso-cls-19" points="198 154.4 242.6 128.7 297 160.1 297 180.1 252.5 205.8 198 174.4 198 154.4"/>
    //     </g>
    //     <g data-name="Rechts">
    //       <polygon class="iso-cls-20" points="252.5 205.8 297 180.1 297 160.1 252.5 185.8 252.5 205.8"/>
    //     </g>
    //     <g data-name="Links">
    //       <polygon class="iso-cls-21" points="252.5 185.8 198 154.4 198 174.4 252.5 205.8 252.5 185.8"/>
    //     </g>
    //   </g>',
    //   '<g id="10.402" data-name="10.402">
    //     <g data-name="Volumen">
    //       <polygon class="iso-cls-19" points="386.1 148.7 319.3 110.1 264.8 141.5 264.8 161.5 279.7 170.1 272.2 174.4 272.2 194.4 306.9 214.4 386.1 168.7 386.1 148.7"/>
    //       <polygon class="iso-cls-21" points="272.2 194.4 306.9 214.4 306.9 194.4 272.2 174.4 272.2 194.4"/>
    //     </g>
    //     <g data-name="Rechts">
    //       <polygon class="iso-cls-20" points="306.9 214.4 386.1 168.7 386.1 148.7 306.9 194.4 306.9 214.4"/>
    //     </g>
    //     <g data-name="Links">
    //       <polygon class="iso-cls-21" points="297 160.1 264.8 141.5 264.8 161.5 279.7 170.1 297 160.1"/>
    //     </g>
    //   </g>',
    //   '<g id="10.501" data-name="10.501">
    //     <g data-name="Volumen">
    //       <polygon class="iso-cls-19" points="242.6 68.7 183.2 102.9 183.2 122.9 217.8 142.9 242.6 128.7 264.8 141.5 299.5 121.5 299.5 101.5 242.6 68.7"/>
    //     </g>
    //     <g data-name="Rechts">
    //       <polygon class="iso-cls-20" points="299.5 101.5 264.8 121.5 264.8 141.5 299.5 121.5 299.5 101.5"/>
    //       <polygon class="iso-cls-20" points="242.6 108.7 217.8 122.9 217.8 142.9 242.6 128.7 242.6 108.7"/>
    //     </g>
    //     <g data-name="Links">
    //       <polygon class="iso-cls-21" points="217.8 122.9 183.2 102.9 183.2 122.9 217.8 142.9 217.8 122.9"/>
    //       <polygon class="iso-cls-21" points="264.8 121.5 242.6 108.7 242.6 128.7 264.8 141.5 264.8 121.5"/>
    //     </g>
    //   </g>',
    //   '<g id="10.503" data-name="10.503">
    //     <g data-name="Volumen">
    //       <polygon class="iso-cls-19" points="198 134.4 242.6 108.7 297 140.1 297 160.1 252.5 185.8 198 154.4 198 134.4"/>
    //     </g>
    //     <g data-name="Rechts">
    //       <polygon class="iso-cls-20" points="252.5 185.8 297 160.1 297 140.1 252.5 165.8 252.5 185.8"/>
    //     </g>
    //     <g data-name="Links">
    //       <polygon class="iso-cls-21" points="252.5 165.8 198 134.4 198 154.4 252.5 185.8 252.5 165.8"/>
    //     </g>
    //   </g>',
    //   '<g id="10.502" data-name="10.502">
    //     <g data-name="Volumen">
    //       <polygon class="iso-cls-19" points="366.3 140.1 299.5 101.5 264.8 121.5 264.8 141.5 279.7 150.1 272.2 154.4 272.2 174.4 306.9 194.4 366.3 160.1 366.3 140.1"/>
    //       <polygon class="iso-cls-21" points="272.2 174.4 306.9 194.4 306.9 174.4 272.2 154.4 272.2 174.4"/>
    //     </g>
    //     <g data-name="Rechts">
    //       <polygon class="iso-cls-20" points="306.9 194.4 366.3 160.1 366.3 140.1 306.9 174.4 306.9 194.4"/>
    //     </g>
    //     <g data-name="Links">
    //       <polygon class="iso-cls-21" points="297 140.1 264.8 121.5 264.8 141.5 279.7 150.1 297 140.1"/>
    //     </g>
    //   </g>',
    //   '<g id="10.601" data-name="10.601">
    //     <g data-name="Volumen">
    //       <polygon class="iso-cls-19" points="190.6 18.7 131.2 52.9 131.2 72.9 200.5 112.9 198 114.4 198 134.4 220.3 147.2 299.5 101.5 299.5 81.5 190.6 18.7"/>
    //     </g>
    //     <g data-name="Rechts">
    //       <polygon class="iso-cls-20" points="299.5 81.5 220.3 127.2 220.3 147.2 299.5 101.5 299.5 81.5"/>
    //     </g>
    //     <g data-name="Links">
    //       <polygon class="iso-cls-21" points="217.8 102.9 131.2 52.9 131.2 72.9 200.5 112.9 217.8 102.9"/>
    //       <polygon class="iso-cls-21" points="220.3 127.2 198 114.4 198 134.4 220.3 147.2 220.3 127.2"/>
    //     </g>
    //   </g>',
    //   '<g id="10.602" data-name="10.602">
    //     <g data-name="Volumen">
    //       <polygon class="iso-cls-19" points="299.5 81.5 220.3 127.2 220.3 147.2 252.5 165.8 272.2 154.4 306.9 174.4 366.3 140.1 366.3 120.1 299.5 81.5"/>
    //       <polygon class="iso-cls-21" points="272.2 154.4 306.9 174.4 306.9 154.4 272.2 134.4 272.2 154.4"/>
    //     </g>
    //     <g data-name="Rechts">
    //       <polygon class="iso-cls-20" points="306.9 174.4 366.3 140.1 366.3 120.1 306.9 154.4 306.9 174.4"/>
    //     </g>
    //     <g data-name="Links">
    //       <polygon class="iso-cls-21" points="252.5 145.8 220.3 127.2 220.3 147.2 252.5 165.8 252.5 145.8"/>
    //       <polygon class="iso-cls-20" points="272.2 134.4 272.2 154.4 252.5 165.8 252.5 145.8 272.2 134.4"/>
    //     </g>
    //   </g>',
    // ];
    // $view_2_house_12 = [
    //   '<g id="12.1" data-name="12.1">
    //     <g data-name="Volumen">
    //       <polygon class="iso-cls-19" points="183.2 222.9 262.4 177.2 262.4 157.2 188.1 114.4 108.9 160.1 108.9 180.1 183.2 222.9"/>
    //     </g>
    //     <g data-name="Rechts">
    //       <polygon class="iso-cls-20" points="183.2 222.9 262.4 177.2 262.4 157.2 183.2 202.9 183.2 222.9"/>
    //     </g>
    //     <g data-name="Links">
    //       <polygon class="iso-cls-21" points="108.9 180.1 183.2 222.9 183.2 202.9 108.9 160.1 108.9 180.1"/>
    //     </g>
    //   </g>',
    //   '<g id="12.101" data-name="12.101">
    //     <g data-name="Volumen">
    //       <polygon class="iso-cls-19" points="183.2 202.9 262.4 157.2 262.4 137.2 188.1 94.4 108.9 140.1 108.9 160.1 183.2 202.9"/>
    //     </g>
    //     <g data-name="Rechts">
    //       <polygon class="iso-cls-20" points="183.2 202.9 262.4 157.2 262.4 137.2 183.2 182.9 183.2 202.9"/>
    //     </g>
    //     <g data-name="Links">
    //       <polygon class="iso-cls-21" points="108.9 160.1 183.2 202.9 183.2 182.9 108.9 140.1 108.9 160.1"/>
    //     </g>
    //   </g>',
    //   '<g id="12.103" data-name="12.103">
    //     <g data-name="Volumen">
    //       <polygon class="iso-cls-19" points="32.2 230.1 131.2 172.9 131.2 152.9 99 134.4 0 191.5 0 211.5 32.2 230.1"/>
    //     </g>
    //     <g data-name="Rechts">
    //       <polygon class="iso-cls-20" points="32.2 230.1 131.2 172.9 131.2 152.9 32.2 210.1 32.2 230.1"/>
    //     </g>
    //     <g data-name="Links">
    //       <polygon class="iso-cls-21" points="0 211.5 32.2 230.1 32.2 210.1 0 191.5 0 211.5"/>
    //     </g>
    //   </g>',
    //   '<g id="12.102" data-name="12.102">
    //     <g data-name="Volumen">
    //       <polygon class="iso-cls-19" points="64.4 248.7 163.4 191.5 163.4 171.5 131.2 152.9 32.2 210.1 32.2 230.1 64.4 248.7"/>
    //     </g>
    //     <g data-name="Rechts">
    //       <polygon class="iso-cls-20" points="64.4 248.7 163.4 191.5 163.4 171.5 64.4 228.7 64.4 248.7"/>
    //     </g>
    //     <g data-name="Links">
    //       <polygon class="iso-cls-21" points="32.2 230.1 64.4 248.7 64.4 228.7 32.2 210.1 32.2 230.1"/>
    //     </g>
    //   </g>',
    //   '<g id="12.201" data-name="12.201">
    //     <g data-name="Volumen">
    //       <polygon class="iso-cls-19" points="183.2 182.9 262.4 137.2 262.4 117.2 188.1 74.4 108.9 120.1 108.9 140.1 183.2 182.9"/>
    //     </g>
    //     <g data-name="Rechts">
    //       <polygon class="iso-cls-20" points="183.2 182.9 262.4 137.2 262.4 117.2 183.2 162.9 183.2 182.9"/>
    //     </g>
    //     <g data-name="Links">
    //       <polygon class="iso-cls-21" points="108.9 140.1 183.2 182.9 183.2 162.9 108.9 120.1 108.9 140.1"/>
    //     </g>
    //   </g>',
    //   '<g id="12.203" data-name="12.203">
    //     <g data-name="Volumen">
    //       <polygon class="iso-cls-19" points="32.2 210.1 131.2 152.9 131.2 132.9 99 114.4 0 171.5 0 191.5 32.2 210.1"/>
    //     </g>
    //     <g data-name="Rechts">
    //       <polygon class="iso-cls-20" points="32.2 210.1 131.2 152.9 131.2 132.9 32.2 190.1 32.2 210.1"/>
    //     </g>
    //     <g data-name="Links">
    //       <polygon class="iso-cls-21" points="0 191.5 32.2 210.1 32.2 190.1 0 171.5 0 191.5"/>
    //     </g>
    //   </g>',
    //   '<g id="12.202" data-name="12.202">
    //     <g data-name="Volumen">
    //       <polygon class="iso-cls-19" points="64.4 228.7 163.4 171.5 163.4 151.5 131.2 132.9 32.2 190.1 32.2 210.1 64.4 228.7"/>
    //     </g>
    //     <g data-name="Rechts">
    //       <polygon class="iso-cls-20" points="64.4 228.7 163.4 171.5 163.4 151.5 64.4 208.7 64.4 228.7"/>
    //     </g>
    //     <g data-name="Links">
    //       <polygon class="iso-cls-21" points="32.2 210.1 64.4 228.7 64.4 208.7 32.2 190.1 32.2 210.1"/>
    //     </g>
    //   </g>',
    //   '<g id="12.301" data-name="12.301">
    //     <g data-name="Volumen">
    //       <polygon class="iso-cls-19" points="183.2 162.9 262.4 117.2 262.4 97.2 188.1 54.4 108.9 100.1 108.9 120.1 183.2 162.9"/>
    //     </g>
    //     <g data-name="Rechts">
    //       <polygon class="iso-cls-20" points="183.2 162.9 262.4 117.2 262.4 97.2 183.2 142.9 183.2 162.9"/>
    //     </g>
    //     <g data-name="Links">
    //       <polygon class="iso-cls-21" points="108.9 120.1 183.2 162.9 183.2 142.9 108.9 100.1 108.9 120.1"/>
    //     </g>
    //   </g>',
    //   '<g id="12.303" data-name="12.303">
    //     <g data-name="Volumen">
    //       <polygon class="iso-cls-19" points="32.2 190.1 131.2 132.9 131.2 112.9 99 94.4 0 151.5 0 171.5 32.2 190.1"/>
    //     </g>
    //     <g data-name="Rechts">
    //       <polygon class="iso-cls-20" points="32.2 190.1 131.2 132.9 131.2 112.9 32.2 170.1 32.2 190.1"/>
    //     </g>
    //     <g data-name="Links">
    //       <polygon class="iso-cls-21" points="0 171.5 32.2 190.1 32.2 170.1 0 151.5 0 171.5"/>
    //     </g>
    //   </g>',
    //   '<g id="12.302" data-name="12.302">
    //     <g data-name="Volumen">
    //       <polygon class="iso-cls-19" points="64.4 208.7 163.4 151.5 163.4 131.5 131.2 112.9 32.2 170.1 32.2 190.1 64.4 208.7"/>
    //     </g>
    //     <g data-name="Rechts">
    //       <polygon class="iso-cls-20" points="64.4 208.7 163.4 151.5 163.4 131.5 64.4 188.7 64.4 208.7"/>
    //     </g>
    //     <g data-name="Links">
    //       <polygon class="iso-cls-21" points="32.2 190.1 64.4 208.7 64.4 188.7 32.2 170.1 32.2 190.1"/>
    //     </g>
    //   </g>',
    //   '<g id="12.401" data-name="12.401">
    //     <g data-name="Volumen">
    //       <polygon class="iso-cls-19" points="183.2 142.9 262.4 97.2 262.4 77.2 210.4 47.2 131.2 92.9 131.2 112.9 183.2 142.9"/>
    //     </g>
    //     <g data-name="Rechts">
    //       <polygon class="iso-cls-20" points="183.2 142.9 262.4 97.2 262.4 77.2 183.2 122.9 183.2 142.9"/>
    //     </g>
    //     <g data-name="Links">
    //       <polygon class="iso-cls-21" points="131.2 112.9 183.2 142.9 183.2 122.9 131.2 92.9 131.2 112.9"/>
    //     </g>
    //   </g>',
    //   '<g id="12.403" data-name="12.403">
    //     <g data-name="Volumen">
    //       <polygon class="iso-cls-19" points="32.2 170.1 131.2 112.9 131.2 92.9 99 74.4 0 131.5 0 151.5 32.2 170.1"/>
    //     </g>
    //     <g data-name="Rechts">
    //       <polygon class="iso-cls-20" points="32.2 170.1 131.2 112.9 131.2 92.9 32.2 150.1 32.2 170.1"/>
    //     </g>
    //     <g data-name="Links">
    //       <polygon class="iso-cls-21" points="0 151.5 32.2 170.1 32.2 150.1 0 131.5 0 151.5"/>
    //     </g>
    //   </g>',
    //   '<g id="12.402" data-name="12.402">
    //     <g data-name="Volumen">
    //       <polygon class="iso-cls-19" points="64.4 188.7 163.4 131.5 163.4 111.5 131.2 92.9 32.2 150.1 32.2 170.1 64.4 188.7"/>
    //     </g>
    //     <g data-name="Rechts">
    //       <polygon class="iso-cls-20" points="64.4 188.7 163.4 131.5 163.4 111.5 64.4 168.7 64.4 188.7"/>
    //     </g>
    //     <g data-name="Links">
    //       <polygon class="iso-cls-21" points="32.2 170.1 64.4 188.7 64.4 168.7 32.2 150.1 32.2 170.1"/>
    //     </g>
    //   </g>',
    //   '<g id="12.501" data-name="12.501">
    //     <g data-name="Volumen">
    //       <polygon class="iso-cls-19" points="183.2 122.9 242.6 88.7 242.6 68.7 190.6 38.7 131.2 72.9 131.2 92.9 183.2 122.9"/>
    //     </g>
    //     <g data-name="Rechts">
    //       <polygon class="iso-cls-20" points="183.2 122.9 242.6 88.7 242.6 68.7 183.2 102.9 183.2 122.9"/>
    //     </g>
    //     <g data-name="Links">
    //       <polygon class="iso-cls-21" points="131.2 92.9 183.2 122.9 183.2 102.9 131.2 72.9 131.2 92.9"/>
    //     </g>
    //   </g>',
    //   '<g id="12.503" data-name="12.503">
    //     <g data-name="Volumen">
    //       <polygon class="iso-cls-19" points="32.2 150.1 131.2 92.9 131.2 72.9 99 54.4 0 111.5 0 131.5 32.2 150.1"/>
    //     </g>
    //     <g data-name="Rechts">
    //       <polygon class="iso-cls-20" points="32.2 150.1 131.2 92.9 131.2 72.9 32.2 130.1 32.2 150.1"/>
    //     </g>
    //     <g data-name="Links">
    //       <polygon class="iso-cls-21" points="0 131.5 32.2 150.1 32.2 130.1 0 111.5 0 131.5"/>
    //     </g>
    //   </g>',
    //   '<g id="12.502" data-name="12.502">
    //     <g data-name="Volumen">
    //       <polygon class="iso-cls-19" points="64.4 168.7 163.4 111.5 163.4 91.5 131.2 72.9 32.2 130.1 32.2 150.1 64.4 168.7"/>
    //     </g>
    //     <g data-name="Rechts">
    //       <polygon class="iso-cls-20" points="64.4 168.7 163.4 111.5 163.4 91.5 64.4 148.7 64.4 168.7"/>
    //     </g>
    //     <g data-name="Links">
    //       <polygon class="iso-cls-21" points="32.2 150.1 64.4 168.7 64.4 148.7 32.2 130.1 32.2 150.1"/>
    //     </g>
    //   </g>',
    //   '<g id="12.601" data-name="12.601">
    //     <g data-name="Volumen">
    //       <polygon class="iso-cls-19" points="64.4 148.7 163.4 91.5 163.4 71.5 99 34.4 0 91.5 0 111.5 64.4 148.7"/>
    //     </g>
    //     <g data-name="Rechts">
    //       <polygon class="iso-cls-20" points="64.4 148.7 163.4 91.5 163.4 71.5 64.4 128.7 64.4 148.7"/>
    //     </g>
    //     <g data-name="Links">
    //       <polygon class="iso-cls-21" points="0 111.5 64.4 148.7 64.4 128.7 0 91.5 0 111.5"/>
    //     </g>
    //   </g>',
    // ];
    // $view_2_townhouse_8 = [
    //   '<g data-name="8c">
    //     <g data-name="Volumen">
    //       <polygon class="iso-cls-16" points="306.9 365.8 306.9 385.8 287.1 397.2 257.4 380.1 257.4 360.1 277.2 348.7 306.9 365.8"/>
    //     </g>
    //     <g data-name="Rechts">
    //       <polygon class="iso-cls-17" points="287.1 397.2 287.1 377.2 306.9 365.8 306.9 385.8 287.1 397.2"/>
    //     </g>
    //     <g data-name="Links">
    //       <polygon class="iso-cls-15" points="287.1 397.2 287.1 377.2 257.4 360.1 257.4 380.1 287.1 397.2"/>
    //     </g>
    //   </g>',
    //   '<g data-name="8b.2">
    //     <g data-name="Volumen">
    //       <polygon class="iso-cls-16" points="282.1 288.7 242.6 311.5 242.6 351.5 287.1 377.2 289.6 375.8 306.9 385.8 326.7 374.4 326.7 354.4 326.7 314.4 282.1 288.7"/>
    //     </g>
    //     <g data-name="Rechts">
    //       <polygon class="iso-cls-17" points="287.1 337.2 287.1 377.2 306.9 365.8 306.9 385.8 326.7 374.4 326.7 314.4 287.1 337.2"/>
    //     </g>
    //     <g data-name="Links">
    //       <polygon class="iso-cls-15" points="287.1 337.2 287.1 377.2 242.6 351.5 242.6 311.5 287.1 337.2"/>
    //       <polygon class="iso-cls-15" points="289.6 375.8 306.9 385.8 306.9 365.8 289.6 375.8"/>
    //     </g>
    //   </g>',
    //   '<g data-name="8d">
    //     <g data-name="Volumen">
    //       <polygon class="iso-cls-16" points="351.4 391.5 351.4 411.5 331.6 422.9 287.1 397.2 287.1 377.2 306.9 365.8 351.4 391.5"/>
    //     </g>
    //     <g data-name="Rechts">
    //       <polygon class="iso-cls-17" points="331.6 422.9 331.6 402.9 351.4 391.5 351.4 411.5 331.6 422.9"/>
    //     </g>
    //     <g data-name="Links">
    //       <polygon class="iso-cls-15" points="331.6 422.9 331.6 402.9 287.1 377.2 287.1 397.2 331.6 422.9"/>
    //     </g>
    //   </g>',
    //   '<g data-name="8a.1">
    //     <g data-name="Volumen">
    //       <polygon class="iso-cls-16" points="326.7 314.4 287.1 337.2 287.1 377.2 331.6 402.9 334.1 401.5 351.4 411.5 371.2 400.1 371.2 380.1 371.2 340.1 326.7 314.4"/>
    //     </g>
    //     <g data-name="Rechts">
    //       <polygon class="iso-cls-17" points="331.6 362.9 331.6 402.9 351.4 391.5 351.4 411.5 371.2 400.1 371.2 340.1 331.6 362.9"/>
    //     </g>
    //     <g data-name="Links">
    //       <polygon class="iso-cls-15" points="331.6 362.9 331.6 402.9 287.1 377.2 287.1 337.2 331.6 362.9"/>
    //       <polygon class="iso-cls-15" points="334.1 401.5 351.4 411.5 351.4 391.5 334.1 401.5"/>
    //     </g>
    //   </g>',
    // ];
    // $view_2_townhouse_10 = [
    //   '<g data-name="10c">
    //     <g data-name="Volumen">
    //       <polygon class="iso-cls-16" points="217.8 314.4 217.8 334.4 198 345.8 168.3 328.7 168.3 308.7 188.1 297.2 217.8 314.4"/>
    //     </g>
    //     <g data-name="Rechts">
    //       <polygon class="iso-cls-17" points="198 345.8 198 325.8 217.8 314.4 217.8 334.4 198 345.8"/>
    //     </g>
    //     <g data-name="Links">
    //       <polygon class="iso-cls-15" points="198 345.8 198 325.8 168.3 308.7 168.3 328.7 198 345.8"/>
    //     </g>
    //   </g>',
    //   '<g data-name="10b.2">
    //     <g data-name="Volumen">
    //       <polygon class="iso-cls-16" points="193.1 237.2 153.5 260.1 153.5 300.1 198 325.8 200.5 324.4 217.8 334.4 237.6 322.9 237.6 302.9 237.6 262.9 193.1 237.2"/>
    //     </g>
    //     <g data-name="Rechts">
    //       <polygon class="iso-cls-17" points="198 285.8 198 325.8 217.8 314.4 217.8 334.4 237.6 322.9 237.6 262.9 198 285.8"/>
    //     </g>
    //     <g data-name="Links">
    //       <polygon class="iso-cls-15" points="198 285.8 198 325.8 153.5 300.1 153.5 260.1 198 285.8"/>
    //       <polygon class="iso-cls-15" points="200.5 324.4 217.8 334.4 217.8 314.4 200.5 324.4"/>
    //     </g>
    //   </g>',
    //   '<g data-name="10d">
    //     <g data-name="Volumen">
    //       <polygon class="iso-cls-16" points="262.4 340.1 262.4 360.1 242.6 371.5 198 345.8 198 325.8 217.8 314.4 262.4 340.1"/>
    //     </g>
    //     <g data-name="Rechts">
    //       <polygon class="iso-cls-17" points="242.6 371.5 242.6 351.5 262.4 340.1 262.4 360.1 242.6 371.5"/>
    //     </g>
    //     <g data-name="Links">
    //       <polygon class="iso-cls-15" points="242.6 371.5 242.6 351.5 198 325.8 198 345.8 242.6 371.5"/>
    //     </g>
    //   </g>',
    //   '<g data-name="10a.1">
    //     <g data-name="Volumen">
    //       <polygon class="iso-cls-16" points="237.6 262.9 198 285.8 198 325.8 242.6 351.5 245 350.1 262.4 360.1 282.1 348.7 282.1 328.7 282.1 288.7 237.6 262.9"/>
    //     </g>
    //     <g data-name="Rechts">
    //       <polygon class="iso-cls-17" points="242.6 311.5 242.6 351.5 262.4 340.1 262.4 360.1 282.1 348.7 282.1 288.7 242.6 311.5"/>
    //     </g>
    //     <g data-name="Links">
    //       <polygon class="iso-cls-15" points="242.6 311.5 242.6 351.5 198 325.8 198 285.8 242.6 311.5"/>
    //       <polygon class="iso-cls-15" points="245 350.1 262.4 360.1 262.4 340.1 245 350.1"/>
    //     </g>
    //   </g>',
    // ];
    // $view_2_townhouse_12 = [
    //   '<g data-name="12c">
    //     <g data-name="Volumen">
    //       <polygon class="iso-cls-16" points="128.7 262.9 128.7 282.9 108.9 294.4 79.2 277.2 79.2 257.2 99 245.8 128.7 262.9"/>
    //     </g>
    //     <g data-name="Rechts">
    //       <polygon class="iso-cls-17" points="108.9 294.4 108.9 274.4 128.7 262.9 128.7 282.9 108.9 294.4"/>
    //     </g>
    //     <g data-name="Links">
    //       <polygon class="iso-cls-15" points="108.9 294.4 108.9 274.4 79.2 257.2 79.2 277.2 108.9 294.4"/>
    //     </g>
    //   </g>',
    //   '<g data-name="12b.2">
    //     <g data-name="Volumen">
    //       <polygon class="iso-cls-16" points="104 185.8 64.4 208.7 64.4 248.7 108.9 274.4 111.4 272.9 128.7 282.9 148.5 271.5 148.5 251.5 148.5 211.5 104 185.8"/>
    //     </g>
    //     <g data-name="Rechts">
    //       <polygon class="iso-cls-17" points="108.9 234.4 108.9 274.4 128.7 262.9 128.7 282.9 148.5 271.5 148.5 211.5 108.9 234.4"/>
    //     </g>
    //     <g data-name="Links">
    //       <polygon class="iso-cls-15" points="108.9 234.4 108.9 274.4 64.4 248.7 64.4 208.7 108.9 234.4"/>
    //       <polygon class="iso-cls-15" points="111.4 272.9 128.7 282.9 128.7 262.9 111.4 272.9"/>
    //     </g>
    //   </g>',
    //   '<g data-name="12d">
    //     <g data-name="Volumen">
    //       <polygon class="iso-cls-16" points="173.3 288.7 173.3 308.7 153.5 320.1 108.9 294.4 108.9 274.4 128.7 262.9 173.3 288.7"/>
    //     </g>
    //     <g data-name="Rechts">
    //       <polygon class="iso-cls-17" points="153.5 320.1 153.5 300.1 173.3 288.7 173.3 308.7 153.5 320.1"/>
    //     </g>
    //     <g data-name="Links">
    //       <polygon class="iso-cls-15" points="153.5 320.1 153.5 300.1 108.9 274.4 108.9 294.4 153.5 320.1"/>
    //     </g>
    //   </g>',
    //   '<g data-name="12a.1">
    //     <g data-name="Volumen">
    //       <polygon class="iso-cls-16" points="148.5 211.5 108.9 234.4 108.9 274.4 153.5 300.1 156 298.7 173.3 308.7 193.1 297.2 193.1 277.2 193.1 237.2 148.5 211.5"/>
    //     </g>
    //     <g data-name="Rechts">
    //       <polygon class="iso-cls-17" points="153.5 260.1 153.5 300.1 173.3 288.7 173.3 308.7 193.1 297.2 193.1 237.2 153.5 260.1"/>
    //     </g>
    //     <g data-name="Links">
    //       <polygon class="iso-cls-15" points="153.5 260.1 153.5 300.1 108.9 274.4 108.9 234.4 153.5 260.1"/>
    //       <polygon class="iso-cls-15" points="156 298.7 173.3 308.7 173.3 288.7 156 298.7"/>
    //     </g>
    //   </g>',
    // ];

    // View 4
    // $view_4_house_8 = [
    //   '<g id="8.3" data-name="8.3">
    //     <g data-name="Volumen">
    //       <polygon class="iso-cls-19" points="351.4 351.5 396 325.8 450.4 357.2 450.4 377.2 405.9 402.9 351.4 371.5 351.4 351.5"/>
    //     </g>
    //     <g data-name="Rechts">
    //       <polygon class="iso-cls-20" points="405.9 402.9 450.4 377.2 450.4 357.2 405.9 382.9 405.9 402.9"/>
    //     </g>
    //     <g data-name="Links">
    //       <polygon class="iso-cls-21" points="405.9 382.9 351.4 351.5 351.4 371.5 405.9 402.9 405.9 382.9"/>
    //     </g>
    //   </g>',
    //   '<g id="8.2" data-name="8.2">
    //     <g data-name="Volumen">
    //       <polygon class="iso-cls-19" points="383.6 370.1 368.7 361.5 376.2 357.2 376.2 337.2 341.5 317.2 262.4 362.9 262.4 382.9 329.2 421.5 383.6 390.1 383.6 370.1"/>
    //     </g>
    //     <g data-name="Rechts">
    //       <polygon class="iso-cls-20" points="368.7 361.5 376.2 357.2 376.2 337.2 351.4 351.5 368.7 361.5"/>
    //       <polygon class="iso-cls-20" points="329.2 401.5 383.6 370.1 383.6 390.1 329.2 421.5 329.2 401.5"/>
    //     </g>
    //     <g data-name="Links">
    //       <polygon class="iso-cls-21" points="329.2 421.5 262.4 382.9 262.4 362.9 329.2 401.5 329.2 421.5"/>
    //     </g>
    //   </g>',
    //   '<g id="8.1" data-name="8.1">
    //     <g data-name="Volumen">
    //       <polygon class="iso-cls-16" points="465.2 388.7 430.6 368.7 405.9 382.9 383.6 370.1 329.2 401.5 329.2 421.5 386.1 454.4 465.2 408.7 465.2 388.7"/>
    //     </g>
    //     <g data-name="Rechts">
    //       <polygon class="iso-cls-17" points="465.2 408.7 386.1 454.4 386.1 434.4 465.2 388.7 465.2 408.7"/>
    //     </g>
    //     <g data-name="Links">
    //       <polygon class="iso-cls-15" points="386.1 454.4 329.2 421.5 329.2 401.5 386.1 434.4 386.1 454.4"/>
    //     </g>
    //   </g>',
    //   '<g id="8.103" data-name="8.103">
    //     <g data-name="Volumen">
    //       <polygon class="iso-cls-19" points="351.4 331.5 396 305.8 450.4 337.2 450.4 357.2 405.9 382.9 351.4 351.5 351.4 331.5"/>
    //     </g>
    //     <g data-name="Rechts">
    //       <polygon class="iso-cls-20" points="405.9 382.9 450.4 357.2 450.4 337.2 405.9 362.9 405.9 382.9"/>
    //     </g>
    //     <g data-name="Links">
    //       <polygon class="iso-cls-21" points="405.9 362.9 351.4 331.5 351.4 351.5 405.9 382.9 405.9 362.9"/>
    //     </g>
    //   </g>',
    //   '<g id="8.102" data-name="8.102">
    //     <g data-name="Volumen">
    //       <polygon class="iso-cls-19" points="383.6 350.1 368.7 341.5 376.2 337.2 376.2 317.2 341.5 297.2 262.4 342.9 262.4 362.9 329.2 401.5 383.6 370.1 383.6 350.1"/>
    //     </g>
    //     <g data-name="Rechts">
    //       <polygon class="iso-cls-20" points="368.7 341.5 376.2 337.2 376.2 317.2 351.4 331.5 368.7 341.5"/>
    //       <polygon class="iso-cls-20" points="329.2 381.5 383.6 350.1 383.6 370.1 329.2 401.5 329.2 381.5"/>
    //     </g>
    //     <g data-name="Links">
    //       <polygon class="iso-cls-21" points="329.2 401.5 262.4 362.9 262.4 342.9 329.2 381.5 329.2 401.5"/>
    //     </g>
    //   </g>',
    //   '<g id="8.101" data-name="8.101">
    //     <g data-name="Volumen">
    //       <polygon class="iso-cls-16" points="465.2 368.7 430.6 348.7 405.9 362.9 383.6 350.1 329.2 381.5 329.2 401.5 386.1 434.4 465.2 388.7 465.2 368.7"/>
    //     </g>
    //     <g data-name="Rechts">
    //       <polygon class="iso-cls-17" points="465.2 388.7 386.1 434.4 386.1 414.4 465.2 368.7 465.2 388.7"/>
    //     </g>
    //     <g data-name="Links">
    //       <polygon class="iso-cls-15" points="386.1 434.4 329.2 401.5 329.2 381.5 386.1 414.4 386.1 434.4"/>
    //     </g>
    //   </g>',
    //   '<g id="8.203" data-name="8.203">
    //     <g data-name="Volumen">
    //       <polygon class="iso-cls-19" points="351.4 311.5 396 285.8 450.4 317.2 450.4 337.2 405.9 362.9 351.4 331.5 351.4 311.5"/>
    //     </g>
    //     <g data-name="Rechts">
    //       <polygon class="iso-cls-20" points="405.9 362.9 450.4 337.2 450.4 317.2 405.9 342.9 405.9 362.9"/>
    //     </g>
    //     <g data-name="Links">
    //       <polygon class="iso-cls-21" points="405.9 342.9 351.4 311.5 351.4 331.5 405.9 362.9 405.9 342.9"/>
    //     </g>
    //   </g>',
    //   '<g id="8.202" data-name="8.202">
    //     <g data-name="Volumen">
    //       <polygon class="iso-cls-19" points="383.6 330.1 368.7 321.5 376.2 317.2 376.2 297.2 341.5 277.2 262.4 322.9 262.4 342.9 329.2 381.5 383.6 350.1 383.6 330.1"/>
    //     </g>
    //     <g data-name="Rechts">
    //       <polygon class="iso-cls-20" points="368.7 321.5 376.2 317.2 376.2 297.2 351.4 311.5 368.7 321.5"/>
    //       <polygon class="iso-cls-20" points="329.2 361.5 383.6 330.1 383.6 350.1 329.2 381.5 329.2 361.5"/>
    //     </g>
    //     <g data-name="Links">
    //       <polygon class="iso-cls-21" points="329.2 381.5 262.4 342.9 262.4 322.9 329.2 361.5 329.2 381.5"/>
    //     </g>
    //   </g>',
    //   '<g id="8.201" data-name="8.201">
    //     <g data-name="Volumen">
    //       <polygon class="iso-cls-16" points="465.2 348.7 430.6 328.7 405.9 342.9 383.6 330.1 329.2 361.5 329.2 381.5 386.1 414.4 465.2 368.7 465.2 348.7"/>
    //     </g>
    //     <g data-name="Rechts">
    //       <polygon class="iso-cls-17" points="465.2 368.7 386.1 414.4 386.1 394.4 465.2 348.7 465.2 368.7"/>
    //     </g>
    //     <g data-name="Links">
    //       <polygon class="iso-cls-15" points="386.1 414.4 329.2 381.5 329.2 361.5 386.1 394.4 386.1 414.4"/>
    //     </g>
    //   </g>',
    //   '<g id="8.303" data-name="8.303">
    //     <g data-name="Volumen">
    //       <polygon class="iso-cls-19" points="351.4 291.5 396 265.8 450.4 297.2 450.4 317.2 405.9 342.9 351.4 311.5 351.4 291.5"/>
    //     </g>
    //     <g data-name="Rechts">
    //       <polygon class="iso-cls-20" points="405.9 342.9 450.4 317.2 450.4 297.2 405.9 322.9 405.9 342.9"/>
    //     </g>
    //     <g data-name="Links">
    //       <polygon class="iso-cls-21" points="405.9 322.9 351.4 291.5 351.4 311.5 405.9 342.9 405.9 322.9"/>
    //     </g>
    //   </g>',
    //   '<g id="8.302" data-name="8.302">
    //     <g data-name="Volumen">
    //       <polygon class="iso-cls-19" points="383.6 310.1 368.7 301.5 376.2 297.2 376.2 277.2 341.5 257.2 262.4 302.9 262.4 322.9 329.2 361.5 383.6 330.1 383.6 310.1"/>
    //     </g>
    //     <g data-name="Rechts">
    //       <polygon class="iso-cls-20" points="368.7 301.5 376.2 297.2 376.2 277.2 351.4 291.5 368.7 301.5"/>
    //       <polygon class="iso-cls-20" points="329.2 341.5 383.6 310.1 383.6 330.1 329.2 361.5 329.2 341.5"/>
    //     </g>
    //     <g data-name="Links">
    //       <polygon class="iso-cls-21" points="329.2 361.5 262.4 322.9 262.4 302.9 329.2 341.5 329.2 361.5"/>
    //     </g>
    //   </g>',
    //   '<g id="8.301" data-name="8.301">
    //     <g data-name="Volumen">
    //       <polygon class="iso-cls-16" points="465.2 328.7 430.6 308.7 405.9 322.9 383.6 310.1 329.2 341.5 329.2 361.5 386.1 394.4 465.2 348.7 465.2 328.7"/>
    //     </g>
    //     <g data-name="Rechts">
    //       <polygon class="iso-cls-17" points="465.2 348.7 386.1 394.4 386.1 374.4 465.2 328.7 465.2 348.7"/>
    //     </g>
    //     <g data-name="Links">
    //       <polygon class="iso-cls-15" points="386.1 394.4 329.2 361.5 329.2 341.5 386.1 374.4 386.1 394.4"/>
    //     </g>
    //   </g>',
    //   '<g id="8.403" data-name="8.403">
    //     <g data-name="Volumen">
    //       <polygon class="iso-cls-19" points="351.4 271.5 396 245.8 450.4 277.2 450.4 297.2 405.9 322.9 351.4 291.5 351.4 271.5"/>
    //     </g>
    //     <g data-name="Rechts">
    //       <polygon class="iso-cls-20" points="405.9 322.9 450.4 297.2 450.4 277.2 405.9 302.9 405.9 322.9"/>
    //     </g>
    //     <g data-name="Links">
    //       <polygon class="iso-cls-21" points="405.9 302.9 351.4 271.5 351.4 291.5 405.9 322.9 405.9 302.9"/>
    //     </g>
    //   </g>',
    //   '<g id="8.402" data-name="8.402">
    //     <g data-name="Volumen">
    //       <polygon class="iso-cls-19" points="383.6 290.1 368.7 281.5 376.2 277.2 376.2 257.2 341.5 237.2 262.4 282.9 262.4 302.9 329.2 341.5 383.6 310.1 383.6 290.1"/>
    //     </g>
    //     <g data-name="Rechts">
    //       <polygon class="iso-cls-20" points="368.7 281.5 376.2 277.2 376.2 257.2 351.4 271.5 368.7 281.5"/>
    //       <polygon class="iso-cls-20" points="329.2 321.5 383.6 290.1 383.6 310.1 329.2 341.5 329.2 321.5"/>
    //     </g>
    //     <g data-name="Links">
    //       <polygon class="iso-cls-21" points="329.2 341.5 262.4 302.9 262.4 282.9 329.2 321.5 329.2 341.5"/>
    //     </g>
    //   </g>',
    //   '<g id="8.401" data-name="8.401">
    //     <g data-name="Volumen">
    //       <polygon class="iso-cls-16" points="465.2 308.7 430.6 288.7 405.9 302.9 383.6 290.1 329.2 321.5 329.2 341.5 386.1 374.4 465.2 328.7 465.2 308.7"/>
    //     </g>
    //     <g data-name="Rechts">
    //       <polygon class="iso-cls-17" points="465.2 328.7 386.1 374.4 386.1 354.4 465.2 308.7 465.2 328.7"/>
    //     </g>
    //     <g data-name="Links">
    //       <polygon class="iso-cls-15" points="386.1 374.4 329.2 341.5 329.2 321.5 386.1 354.4 386.1 374.4"/>
    //     </g>
    //   </g>',
    //   '<g id="8.503" data-name="8.503">
    //     <g data-name="Volumen">
    //       <polygon class="iso-cls-19" points="351.4 251.5 396 225.8 450.4 257.2 450.4 277.2 405.9 302.9 351.4 271.5 351.4 251.5"/>
    //     </g>
    //     <g data-name="Rechts">
    //       <polygon class="iso-cls-20" points="405.9 302.9 450.4 277.2 450.4 257.2 405.9 282.9 405.9 302.9"/>
    //     </g>
    //     <g data-name="Links">
    //       <polygon class="iso-cls-21" points="405.9 282.9 351.4 251.5 351.4 271.5 405.9 302.9 405.9 282.9"/>
    //     </g>
    //   </g>',
    //   '<g id="8.502" data-name="8.502">
    //     <g data-name="Volumen">
    //       <polygon class="iso-cls-19" points="383.6 270.1 368.7 261.5 376.2 257.2 376.2 237.2 341.5 217.2 282.1 251.5 282.1 271.5 349 310.1 383.6 290.1 383.6 270.1"/>
    //     </g>
    //     <g data-name="Rechts">
    //       <polygon class="iso-cls-20" points="368.7 261.5 376.2 257.2 376.2 237.2 351.4 251.5 368.7 261.5"/>
    //       <polygon class="iso-cls-20" points="349 290.1 383.6 270.1 383.6 290.1 349 310.1 349 290.1"/>
    //     </g>
    //     <g data-name="Links">
    //       <polygon class="iso-cls-21" points="349 310.1 282.1 271.5 282.1 251.5 349 290.1 349 310.1"/>
    //     </g>
    //   </g>',
    //   '<g id="8.501" data-name="8.501">
    //     <g data-name="Volumen">
    //       <polygon class="iso-cls-16" points="465.2 288.7 430.6 268.7 405.9 282.9 383.6 270.1 349 290.1 349 310.1 405.9 342.9 465.2 308.7 465.2 288.7"/>
    //     </g>
    //     <g data-name="Rechts">
    //       <polygon class="iso-cls-17" points="465.2 308.7 405.9 342.9 405.9 322.9 465.2 288.7 465.2 308.7"/>
    //     </g>
    //     <g data-name="Links">
    //       <polygon class="iso-cls-15" points="405.9 342.9 349 310.1 349 290.1 405.9 322.9 405.9 342.9"/>
    //     </g>
    //   </g>',
    //   '<g id="8.602" data-name="8.602">
    //     <g data-name="Volumen">
    //       <polygon class="iso-cls-19" points="428.1 224.4 396 205.8 376.2 217.2 341.5 197.2 282.1 231.5 282.1 251.5 349 290.1 428.1 244.4 428.1 224.4"/>
    //     </g>
    //     <g data-name="Rechts">
    //       <polygon class="iso-cls-20" points="349 270.1 428.1 224.4 428.1 244.4 349 290.1 349 270.1"/>
    //     </g>
    //     <g data-name="Links">
    //       <polygon class="iso-cls-21" points="349 290.1 282.1 251.5 282.1 231.5 349 270.1 349 290.1"/>
    //     </g>
    //   </g>',
    //   '<g id="8.601" data-name="8.601">
    //     <g data-name="Volumen">
    //       <polygon class="iso-cls-16" points="447.9 258.7 450.4 257.2 450.4 237.2 428.1 224.4 349 270.1 349 290.1 405.9 322.9 465.2 288.7 465.2 268.7 447.9 258.7"/>
    //     </g>
    //     <g data-name="Rechts">
    //       <polygon class="iso-cls-17" points="465.2 288.7 405.9 322.9 405.9 302.9 465.2 268.7 465.2 288.7"/>
    //       <polygon class="iso-cls-17" points="450.4 237.2 430.6 248.7 447.9 258.7 450.4 257.2 450.4 237.2"/>
    //     </g>
    //     <g data-name="Links">
    //       <polygon class="iso-cls-15" points="405.9 322.9 349 290.1 349 270.1 405.9 302.9 405.9 322.9"/>
    //     </g>
    //   </g>',
    // ];
    // $view_4_house_10 = [
    //   '<g id="10.3" data-name="10.3">
    //     <g data-name="Volumen">
    //       <polygon class="iso-cls-19" points="475.1 422.9 519.7 397.2 574.1 428.6 574.1 448.6 529.6 474.4 475.1 442.9 475.1 422.9"/>
    //     </g>
    //     <g data-name="Rechts">
    //       <polygon class="iso-cls-20" points="529.6 474.4 574.1 448.6 574.1 428.6 529.6 454.4 529.6 474.4"/>
    //     </g>
    //     <g data-name="Links">
    //       <polygon class="iso-cls-21" points="529.6 454.4 475.1 422.9 475.1 442.9 529.6 474.4 529.6 454.4"/>
    //     </g>
    //   </g>',
    //   '<g id="10.2" data-name="10.2">
    //     <g data-name="Volumen">
    //       <polygon class="iso-cls-19" points="507.3 441.5 492.5 432.9 499.9 428.6 499.9 408.7 465.2 388.7 386.1 434.4 386.1 454.4 452.9 492.9 507.3 461.5 507.3 441.5"/>
    //     </g>
    //     <g data-name="Rechts">
    //       <polygon class="iso-cls-20" points="492.5 432.9 499.9 428.6 499.9 408.7 475.1 422.9 492.5 432.9"/>
    //       <polygon class="iso-cls-20" points="452.9 472.9 507.3 441.5 507.3 461.5 452.9 492.9 452.9 472.9"/>
    //     </g>
    //     <g data-name="Links">
    //       <polygon class="iso-cls-21" points="452.9 492.9 386.1 454.4 386.1 434.4 452.9 472.9 452.9 492.9"/>
    //     </g>
    //   </g>',
    //   '<g id="10.1" data-name="10.1">
    //     <g data-name="Volumen">
    //       <polygon class="iso-cls-16" points="589 460.1 554.3 440.1 529.6 454.4 507.3 441.5 452.9 472.9 452.9 492.9 509.8 525.8 589 480.1 589 460.1"/>
    //     </g>
    //     <g data-name="Rechts">
    //       <polygon class="iso-cls-17" points="589 480.1 509.8 525.8 509.8 505.8 589 460.1 589 480.1"/>
    //     </g>
    //     <g data-name="Links">
    //       <polygon class="iso-cls-15" points="509.8 525.8 452.9 492.9 452.9 472.9 509.8 505.8 509.8 525.8"/>
    //     </g>
    //   </g>',
    //   '<g id="10.103" data-name="10.103">
    //     <g data-name="Volumen">
    //       <polygon class="iso-cls-19" points="475.1 402.9 519.7 377.2 574.1 408.7 574.1 428.6 529.6 454.4 475.1 422.9 475.1 402.9"/>
    //     </g>
    //     <g data-name="Rechts">
    //       <polygon class="iso-cls-20" points="529.6 454.4 574.1 428.6 574.1 408.7 529.6 434.4 529.6 454.4"/>
    //     </g>
    //     <g data-name="Links">
    //       <polygon class="iso-cls-21" points="529.6 434.4 475.1 402.9 475.1 422.9 529.6 454.4 529.6 434.4"/>
    //     </g>
    //   </g>',
    //   '<g id="10.102" data-name="10.102">
    //     <g data-name="Volumen">
    //       <polygon class="iso-cls-19" points="507.3 421.5 492.5 412.9 499.9 408.7 499.9 388.7 465.2 368.7 386.1 414.4 386.1 434.4 452.9 472.9 507.3 441.5 507.3 421.5"/>
    //     </g>
    //     <g data-name="Rechts">
    //       <polygon class="iso-cls-20" points="492.5 412.9 499.9 408.7 499.9 388.7 475.1 402.9 492.5 412.9"/>
    //       <polygon class="iso-cls-20" points="452.9 452.9 507.3 421.5 507.3 441.5 452.9 472.9 452.9 452.9"/>
    //     </g>
    //     <g data-name="Links">
    //       <polygon class="iso-cls-21" points="452.9 472.9 386.1 434.4 386.1 414.4 452.9 452.9 452.9 472.9"/>
    //     </g>
    //   </g>',
    //   '<g id="10.101" data-name="10.101">
    //     <g data-name="Volumen">
    //       <polygon class="iso-cls-16" points="589 440.1 554.3 420.1 529.6 434.4 507.3 421.5 452.9 452.9 452.9 472.9 509.8 505.8 589 460.1 589 440.1"/>
    //     </g>
    //     <g data-name="Rechts">
    //       <polygon class="iso-cls-17" points="589 460.1 509.8 505.8 509.8 485.8 589 440.1 589 460.1"/>
    //     </g>
    //     <g data-name="Links">
    //       <polygon class="iso-cls-15" points="509.8 505.8 452.9 472.9 452.9 452.9 509.8 485.8 509.8 505.8"/>
    //     </g>
    //   </g>',
    //   '<g id="10.203" data-name="10.203">
    //     <g data-name="Volumen">
    //       <polygon class="iso-cls-19" points="475.1 382.9 519.7 357.2 574.1 388.7 574.1 408.7 529.6 434.4 475.1 402.9 475.1 382.9"/>
    //     </g>
    //     <g data-name="Rechts">
    //       <polygon class="iso-cls-20" points="529.6 434.4 574.1 408.7 574.1 388.7 529.6 414.4 529.6 434.4"/>
    //     </g>
    //     <g data-name="Links">
    //       <polygon class="iso-cls-21" points="529.6 414.4 475.1 382.9 475.1 402.9 529.6 434.4 529.6 414.4"/>
    //     </g>
    //   </g>',
    //   '<g id="10.202" data-name="10.202">
    //     <g data-name="Volumen">
    //       <polygon class="iso-cls-19" points="507.3 401.5 492.5 392.9 499.9 388.7 499.9 368.7 465.2 348.7 386.1 394.4 386.1 414.4 452.9 452.9 507.3 421.5 507.3 401.5"/>
    //     </g>
    //     <g data-name="Rechts">
    //       <polygon class="iso-cls-20" points="492.5 392.9 499.9 388.7 499.9 368.7 475.1 382.9 492.5 392.9"/>
    //       <polygon class="iso-cls-20" points="452.9 432.9 507.3 401.5 507.3 421.5 452.9 452.9 452.9 432.9"/>
    //     </g>
    //     <g data-name="Links">
    //       <polygon class="iso-cls-21" points="452.9 452.9 386.1 414.4 386.1 394.4 452.9 432.9 452.9 452.9"/>
    //     </g>
    //   </g>',
    //   '<g id="10.201" data-name="10.201">
    //     <g data-name="Volumen">
    //       <polygon class="iso-cls-16" points="589 420.1 554.3 400.1 529.6 414.4 507.3 401.5 452.9 432.9 452.9 452.9 509.8 485.8 589 440.1 589 420.1"/>
    //     </g>
    //     <g data-name="Rechts">
    //       <polygon class="iso-cls-17" points="589 440.1 509.8 485.8 509.8 465.8 589 420.1 589 440.1"/>
    //     </g>
    //     <g data-name="Links">
    //       <polygon class="iso-cls-15" points="509.8 485.8 452.9 452.9 452.9 432.9 509.8 465.8 509.8 485.8"/>
    //     </g>
    //   </g>',
    //   '<g id="10.303" data-name="10.303">
    //     <g data-name="Volumen">
    //       <polygon class="iso-cls-19" points="475.1 362.9 519.7 337.2 574.1 368.7 574.1 388.7 529.6 414.4 475.1 382.9 475.1 362.9"/>
    //     </g>
    //     <g data-name="Rechts">
    //       <polygon class="iso-cls-20" points="529.6 414.4 574.1 388.7 574.1 368.7 529.6 394.4 529.6 414.4"/>
    //     </g>
    //     <g data-name="Links">
    //       <polygon class="iso-cls-21" points="529.6 394.4 475.1 362.9 475.1 382.9 529.6 414.4 529.6 394.4"/>
    //     </g>
    //   </g>',
    //   '<g id="10.302" data-name="10.302">
    //     <g data-name="Volumen">
    //       <polygon class="iso-cls-19" points="507.3 381.5 492.5 372.9 499.9 368.7 499.9 348.7 465.2 328.7 386.1 374.4 386.1 394.4 452.9 432.9 507.3 401.5 507.3 381.5"/>
    //     </g>
    //     <g data-name="Rechts">
    //       <polygon class="iso-cls-20" points="492.5 372.9 499.9 368.7 499.9 348.7 475.1 362.9 492.5 372.9"/>
    //       <polygon class="iso-cls-20" points="452.9 412.9 507.3 381.5 507.3 401.5 452.9 432.9 452.9 412.9"/>
    //     </g>
    //     <g data-name="Links">
    //       <polygon class="iso-cls-21" points="452.9 432.9 386.1 394.4 386.1 374.4 452.9 412.9 452.9 432.9"/>
    //     </g>
    //   </g>',
    //   '<g id="10.301" data-name="10.301">
    //     <g data-name="Volumen">
    //       <polygon class="iso-cls-16" points="589 400.1 554.3 380.1 529.6 394.4 507.3 381.5 452.9 412.9 452.9 432.9 509.8 465.8 589 420.1 589 400.1"/>
    //     </g>
    //     <g data-name="Rechts">
    //       <polygon class="iso-cls-17" points="589 420.1 509.8 465.8 509.8 445.8 589 400.1 589 420.1"/>
    //     </g>
    //     <g data-name="Links">
    //       <polygon class="iso-cls-15" points="509.8 465.8 452.9 432.9 452.9 412.9 509.8 445.8 509.8 465.8"/>
    //     </g>
    //   </g>',
    //   '<g id="10.403" data-name="10.403">
    //     <g data-name="Volumen">
    //       <polygon class="iso-cls-19" points="475.1 342.9 519.7 317.2 574.1 348.7 574.1 368.7 529.6 394.4 475.1 362.9 475.1 342.9"/>
    //     </g>
    //     <g data-name="Rechts">
    //       <polygon class="iso-cls-20" points="529.6 394.4 574.1 368.7 574.1 348.7 529.6 374.4 529.6 394.4"/>
    //     </g>
    //     <g data-name="Links">
    //       <polygon class="iso-cls-21" points="529.6 374.4 475.1 342.9 475.1 362.9 529.6 394.4 529.6 374.4"/>
    //     </g>
    //   </g>',
    //   '<g id="10.402" data-name="10.402">
    //     <g data-name="Volumen">
    //       <polygon class="iso-cls-19" points="507.3 361.5 492.5 352.9 499.9 348.7 499.9 328.7 465.2 308.7 386.1 354.4 386.1 374.4 452.9 412.9 507.3 381.5 507.3 361.5"/>
    //     </g>
    //     <g data-name="Rechts">
    //       <polygon class="iso-cls-20" points="492.5 352.9 499.9 348.7 499.9 328.7 475.1 342.9 492.5 352.9"/>
    //       <polygon class="iso-cls-20" points="452.9 392.9 507.3 361.5 507.3 381.5 452.9 412.9 452.9 392.9"/>
    //     </g>
    //     <g data-name="Links">
    //       <polygon class="iso-cls-21" points="452.9 412.9 386.1 374.4 386.1 354.4 452.9 392.9 452.9 412.9"/>
    //     </g>
    //   </g>',
    //   '<g id="10.401" data-name="10.401">
    //     <g data-name="Volumen">
    //       <polygon class="iso-cls-16" points="589 380.1 554.3 360.1 529.6 374.4 507.3 361.5 452.9 392.9 452.9 412.9 509.8 445.8 589 400.1 589 380.1"/>
    //     </g>
    //     <g data-name="Rechts">
    //       <polygon class="iso-cls-17" points="589 400.1 509.8 445.8 509.8 425.8 589 380.1 589 400.1"/>
    //     </g>
    //     <g data-name="Links">
    //       <polygon class="iso-cls-15" points="509.8 445.8 452.9 412.9 452.9 392.9 509.8 425.8 509.8 445.8"/>
    //     </g>
    //   </g>',
    //   '<g id="10.503" data-name="10.503">
    //     <g data-name="Volumen">
    //       <polygon class="iso-cls-19" points="475.1 322.9 519.7 297.2 574.1 328.7 574.1 348.7 529.6 374.4 475.1 342.9 475.1 322.9"/>
    //     </g>
    //     <g data-name="Rechts">
    //       <polygon class="iso-cls-20" points="529.6 374.4 574.1 348.7 574.1 328.7 529.6 354.4 529.6 374.4"/>
    //     </g>
    //     <g data-name="Links">
    //       <polygon class="iso-cls-21" points="529.6 354.4 475.1 322.9 475.1 342.9 529.6 374.4 529.6 354.4"/>
    //     </g>
    //   </g>',
    //   '<g id="10.502" data-name="10.502">
    //     <g data-name="Volumen">
    //       <polygon class="iso-cls-19" points="507.3 341.5 492.5 332.9 499.9 328.7 499.9 308.7 465.2 288.7 405.9 322.9 405.9 342.9 472.7 381.5 507.3 361.5 507.3 341.5"/>
    //     </g>
    //     <g data-name="Rechts">
    //       <polygon class="iso-cls-20" points="492.5 332.9 499.9 328.7 499.9 308.7 475.1 322.9 492.5 332.9"/>
    //       <polygon class="iso-cls-20" points="472.7 361.5 507.3 341.5 507.3 361.5 472.7 381.5 472.7 361.5"/>
    //     </g>
    //     <g data-name="Links">
    //       <polygon class="iso-cls-21" points="472.7 381.5 405.9 342.9 405.9 322.9 472.7 361.5 472.7 381.5"/>
    //     </g>
    //   </g>',
    //   '<g id="10.501" data-name="10.501">
    //     <g data-name="Volumen">
    //       <polygon class="iso-cls-16" points="589 360.1 554.3 340.1 529.6 354.4 507.3 341.5 472.7 361.5 472.7 381.5 529.6 414.4 589 380.1 589 360.1"/>
    //     </g>
    //     <g data-name="Rechts">
    //       <polygon class="iso-cls-17" points="589 380.1 529.6 414.4 529.6 394.4 589 360.1 589 380.1"/>
    //     </g>
    //     <g data-name="Links">
    //       <polygon class="iso-cls-15" points="529.6 414.4 472.7 381.5 472.7 361.5 529.6 394.4 529.6 414.4"/>
    //     </g>
    //   </g>',
    //   '<g id="10.602" data-name="10.602">
    //     <g data-name="Volumen">
    //       <polygon class="iso-cls-19" points="551.8 295.8 519.7 277.2 499.9 288.7 465.2 268.7 405.9 302.9 405.9 322.9 472.7 361.5 551.8 315.8 551.8 295.8"/>
    //     </g>
    //     <g data-name="Rechts">
    //       <polygon class="iso-cls-20" points="472.7 341.5 551.8 295.8 551.8 315.8 472.7 361.5 472.7 341.5"/>
    //     </g>
    //     <g data-name="Links">
    //       <polygon class="iso-cls-21" points="472.7 361.5 405.9 322.9 405.9 302.9 472.7 341.5 472.7 361.5"/>
    //     </g>
    //   </g>',
    //   '<g id="10.601" data-name="10.601">
    //     <g data-name="Volumen">
    //       <polygon class="iso-cls-16" points="571.6 330.1 574.1 328.7 574.1 308.7 551.8 295.8 472.7 341.5 472.7 361.5 581.5 424.4 640.9 390.1 640.9 370.1 571.6 330.1"/>
    //     </g>
    //     <g data-name="Rechts">
    //       <polygon class="iso-cls-17" points="640.9 390.1 581.5 424.4 581.5 404.4 640.9 370.1 640.9 390.1"/>
    //       <polygon class="iso-cls-17" points="574.1 308.7 554.3 320.1 571.6 330.1 574.1 328.7 574.1 308.7"/>
    //     </g>
    //     <g data-name="Links">
    //       <polygon class="iso-cls-15" points="529.6 394.4 472.7 361.5 472.7 341.5 529.6 374.4 529.6 394.4"/>
    //     </g>
    //   </g>',
    // ];
    // $view_4_house_12 = [
    //   '<g id="12.1" data-name="12.1">
    //     <g data-name="Volumen">
    //       <polygon class="iso-cls-19" points="589 460.1 509.8 505.8 509.8 525.8 584 568.6 663.2 522.9 663.2 502.9 589 460.1"/>
    //     </g>
    //     <g data-name="Rechts">
    //       <polygon class="iso-cls-20" points="584 548.6 663.2 502.9 663.2 522.9 584 568.6 584 548.6"/>
    //     </g>
    //     <g data-name="Links">
    //       <polygon class="iso-cls-21" points="584 568.6 509.8 525.8 509.8 505.8 584 548.6 584 568.6"/>
    //     </g>
    //   </g>',
    //   '<g id="12.103" data-name="12.103">
    //     <g data-name="Volumen">
    //       <polygon class="iso-cls-19" points="640.9 490.1 739.9 432.9 739.9 412.9 707.7 394.4 608.8 451.5 608.8 471.5 640.9 490.1"/>
    //     </g>
    //     <g data-name="Rechts">
    //       <polygon class="iso-cls-20" points="640.9 490.1 739.9 432.9 739.9 412.9 640.9 470.1 640.9 490.1"/>
    //     </g>
    //     <g data-name="Links">
    //       <polygon class="iso-cls-21" points="608.8 471.5 640.9 490.1 640.9 470.1 608.8 451.5 608.8 471.5"/>
    //     </g>
    //   </g>',
    //   '<g id="12.102" data-name="12.102">
    //     <g data-name="Volumen">
    //       <polygon class="iso-cls-19" points="673.1 508.6 772.1 451.5 772.1 431.5 739.9 412.9 640.9 470.1 640.9 490.1 673.1 508.6"/>
    //     </g>
    //     <g data-name="Rechts">
    //       <polygon class="iso-cls-20" points="673.1 508.6 772.1 451.5 772.1 431.5 673.1 488.6 673.1 508.6"/>
    //     </g>
    //     <g data-name="Links">
    //       <polygon class="iso-cls-21" points="640.9 490.1 673.1 508.6 673.1 488.6 640.9 470.1 640.9 490.1"/>
    //     </g>
    //   </g>',
    //   '<g id="12.101" data-name="12.101">
    //     <g data-name="Volumen">
    //       <polygon class="iso-cls-19" points="589 440.1 509.8 485.8 509.8 505.8 584 548.6 663.2 502.9 663.2 482.9 589 440.1"/>
    //     </g>
    //     <g data-name="Rechts">
    //       <polygon class="iso-cls-20" points="584 528.6 663.2 482.9 663.2 502.9 584 548.6 584 528.6"/>
    //     </g>
    //     <g data-name="Links">
    //       <polygon class="iso-cls-21" points="584 548.6 509.8 505.8 509.8 485.8 584 528.6 584 548.6"/>
    //     </g>
    //   </g>',
    //   '<g id="12.203" data-name="12.203">
    //     <g data-name="Volumen">
    //       <polygon class="iso-cls-19" points="640.9 470.1 739.9 412.9 739.9 392.9 707.7 374.4 608.8 431.5 608.8 451.5 640.9 470.1"/>
    //     </g>
    //     <g data-name="Rechts">
    //       <polygon class="iso-cls-20" points="640.9 470.1 739.9 412.9 739.9 392.9 640.9 450.1 640.9 470.1"/>
    //     </g>
    //     <g data-name="Links">
    //       <polygon class="iso-cls-21" points="608.8 451.5 640.9 470.1 640.9 450.1 608.8 431.5 608.8 451.5"/>
    //     </g>
    //   </g>',
    //   '<g id="12.202" data-name="12.202">
    //     <g data-name="Volumen">
    //       <polygon class="iso-cls-19" points="673.1 488.6 772.1 431.5 772.1 411.5 739.9 392.9 640.9 450.1 640.9 470.1 673.1 488.6"/>
    //     </g>
    //     <g data-name="Rechts">
    //       <polygon class="iso-cls-20" points="673.1 488.6 772.1 431.5 772.1 411.5 673.1 468.6 673.1 488.6"/>
    //     </g>
    //     <g data-name="Links">
    //       <polygon class="iso-cls-21" points="640.9 470.1 673.1 488.6 673.1 468.6 640.9 450.1 640.9 470.1"/>
    //     </g>
    //   </g>',
    //   '<g id="12.201" data-name="12.201">
    //     <g data-name="Volumen">
    //       <polygon class="iso-cls-19" points="589 420.1 509.8 465.8 509.8 485.8 584 528.6 663.2 482.9 663.2 462.9 589 420.1"/>
    //     </g>
    //     <g data-name="Rechts">
    //       <polygon class="iso-cls-20" points="584 508.6 663.2 462.9 663.2 482.9 584 528.6 584 508.6"/>
    //     </g>
    //     <g data-name="Links">
    //       <polygon class="iso-cls-21" points="584 528.6 509.8 485.8 509.8 465.8 584 508.6 584 528.6"/>
    //     </g>
    //   </g>',
    //   '<g id="12.303" data-name="12.303">
    //     <g data-name="Volumen">
    //       <polygon class="iso-cls-19" points="640.9 450.1 739.9 392.9 739.9 372.9 707.7 354.4 608.8 411.5 608.8 431.5 640.9 450.1"/>
    //     </g>
    //     <g data-name="Rechts">
    //       <polygon class="iso-cls-20" points="640.9 450.1 739.9 392.9 739.9 372.9 640.9 430.1 640.9 450.1"/>
    //     </g>
    //     <g data-name="Links">
    //       <polygon class="iso-cls-21" points="608.8 431.5 640.9 450.1 640.9 430.1 608.8 411.5 608.8 431.5"/>
    //     </g>
    //   </g>',
    //   '<g id="12.302" data-name="12.302">
    //     <g data-name="Volumen">
    //       <polygon class="iso-cls-19" points="673.1 468.6 772.1 411.5 772.1 391.5 739.9 372.9 640.9 430.1 640.9 450.1 673.1 468.6"/>
    //     </g>
    //     <g data-name="Rechts">
    //       <polygon class="iso-cls-20" points="673.1 468.6 772.1 411.5 772.1 391.5 673.1 448.7 673.1 468.6"/>
    //     </g>
    //     <g data-name="Links">
    //       <polygon class="iso-cls-21" points="640.9 450.1 673.1 468.6 673.1 448.7 640.9 430.1 640.9 450.1"/>
    //     </g>
    //   </g>',
    //   '<g id="12.301" data-name="12.301">
    //     <g data-name="Volumen">
    //       <polygon class="iso-cls-19" points="589 400.1 509.8 445.8 509.8 465.8 584 508.6 663.2 462.9 663.2 442.9 589 400.1"/>
    //     </g>
    //     <g data-name="Rechts">
    //       <polygon class="iso-cls-20" points="584 488.6 663.2 442.9 663.2 462.9 584 508.6 584 488.6"/>
    //     </g>
    //     <g data-name="Links">
    //       <polygon class="iso-cls-21" points="584 508.6 509.8 465.8 509.8 445.8 584 488.6 584 508.6"/>
    //     </g>
    //   </g>',
    //   '<g id="12.403" data-name="12.403">
    //     <g data-name="Volumen">
    //       <polygon class="iso-cls-19" points="640.9 430.1 739.9 372.9 739.9 352.9 707.7 334.4 608.8 391.5 608.8 411.5 640.9 430.1"/>
    //     </g>
    //     <g data-name="Rechts">
    //       <polygon class="iso-cls-20" points="640.9 430.1 739.9 372.9 739.9 352.9 640.9 410.1 640.9 430.1"/>
    //     </g>
    //     <g data-name="Links">
    //       <polygon class="iso-cls-21" points="608.8 411.5 640.9 430.1 640.9 410.1 608.8 391.5 608.8 411.5"/>
    //     </g>
    //   </g>',
    //   '<g id="12.402" data-name="12.402">
    //     <g data-name="Volumen">
    //       <polygon class="iso-cls-19" points="673.1 448.6 772.1 391.5 772.1 371.5 739.9 352.9 640.9 410.1 640.9 430.1 673.1 448.6"/>
    //     </g>
    //     <g data-name="Rechts">
    //       <polygon class="iso-cls-20" points="673.1 448.7 772.1 391.5 772.1 371.5 673.1 428.7 673.1 448.7"/>
    //     </g>
    //     <g data-name="Links">
    //       <polygon class="iso-cls-21" points="640.9 430.1 673.1 448.7 673.1 428.7 640.9 410.1 640.9 430.1"/>
    //     </g>
    //   </g>',
    //   '<g id="12.401" data-name="12.401">
    //     <g data-name="Volumen">
    //       <polygon class="iso-cls-19" points="589 380.1 509.8 425.8 509.8 445.8 561.7 475.8 640.9 430.1 640.9 410.1 589 380.1"/>
    //     </g>
    //     <g data-name="Rechts">
    //       <polygon class="iso-cls-20" points="561.7 455.8 640.9 410.1 640.9 430.1 561.7 475.8 561.7 455.8"/>
    //     </g>
    //     <g data-name="Links">
    //       <polygon class="iso-cls-21" points="561.7 475.8 509.8 445.8 509.8 425.8 561.7 455.8 561.7 475.8"/>
    //     </g>
    //   </g>',
    //   '<g id="12.503" data-name="12.503">
    //     <g data-name="Volumen">
    //       <polygon class="iso-cls-19" points="640.9 410.1 739.9 352.9 739.9 332.9 707.7 314.4 608.8 371.5 608.8 391.5 640.9 410.1"/>
    //     </g>
    //     <g data-name="Rechts">
    //       <polygon class="iso-cls-20" points="640.9 410.1 739.9 352.9 739.9 332.9 640.9 390.1 640.9 410.1"/>
    //     </g>
    //     <g data-name="Links">
    //       <polygon class="iso-cls-21" points="608.8 391.5 640.9 410.1 640.9 390.1 608.8 371.5 608.8 391.5"/>
    //     </g>
    //   </g>',
    //   '<g id="12.502" data-name="12.502">
    //     <g data-name="Volumen">
    //       <polygon class="iso-cls-19" points="673.1 428.7 772.1 371.5 772.1 351.5 739.9 332.9 640.9 390.1 640.9 410.1 673.1 428.7"/>
    //     </g>
    //     <g data-name="Rechts">
    //       <polygon class="iso-cls-20" points="673.1 428.7 772.1 371.5 772.1 351.5 673.1 408.7 673.1 428.7"/>
    //     </g>
    //     <g data-name="Links">
    //       <polygon class="iso-cls-21" points="640.9 410.1 673.1 428.7 673.1 408.7 640.9 390.1 640.9 410.1"/>
    //     </g>
    //   </g>',
    //   '<g id="12.501" data-name="12.501">
    //     <g data-name="Volumen">
    //       <polygon class="iso-cls-19" points="589 360.1 529.6 394.4 529.6 414.4 581.5 444.4 640.9 410.1 640.9 390.1 589 360.1"/>
    //     </g>
    //     <g data-name="Rechts">
    //       <polygon class="iso-cls-20" points="581.5 424.4 640.9 390.1 640.9 410.1 581.5 444.4 581.5 424.4"/>
    //     </g>
    //     <g data-name="Links">
    //       <polygon class="iso-cls-21" points="581.5 444.4 529.6 414.4 529.6 394.4 581.5 424.4 581.5 444.4"/>
    //     </g>
    //   </g>',
    //   '<g id="12.601" data-name="12.601">
    //     <g data-name="Volumen">
    //       <polygon class="iso-cls-19" points="673.1 408.7 772.1 351.5 772.1 331.5 707.7 294.4 608.8 351.5 608.8 371.5 673.1 408.7"/>
    //     </g>
    //     <g data-name="Rechts">
    //       <polygon class="iso-cls-20" points="673.1 408.7 772.1 351.5 772.1 331.5 673.1 388.7 673.1 408.7"/>
    //     </g>
    //     <g data-name="Links">
    //       <polygon class="iso-cls-21" points="608.8 371.5 673.1 408.7 673.1 388.7 608.8 351.5 608.8 371.5"/>
    //     </g>
    //   </g>',
    // ];
    // $view_4_townhouse_8 = [
    //   '<g data-name="8d">
    //     <g data-name="Volumen">
    //       <polygon class="iso-cls-16" points="485 285.8 485 305.8 465.2 317.2 420.7 291.5 420.7 271.5 440.5 260.1 485 285.8"/>
    //     </g>
    //     <g data-name="Rechts">
    //       <polygon class="iso-cls-17" points="465.2 317.2 465.2 297.2 485 285.8 485 305.8 465.2 317.2"/>
    //     </g>
    //     <g data-name="Links">
    //       <polygon class="iso-cls-15" points="465.2 317.2 465.2 297.2 420.7 271.5 420.7 291.5 465.2 317.2"/>
    //     </g>
    //   </g>',
    //   '<g data-name="8c">
    //     <g data-name="Volumen">
    //       <polygon class="iso-cls-16" points="514.7 302.9 514.7 322.9 494.9 334.4 465.2 317.2 465.2 297.2 485 285.8 514.7 302.9"/>
    //     </g>
    //     <g data-name="Rechts">
    //       <polygon class="iso-cls-17" points="494.9 334.4 494.9 314.4 514.7 302.9 514.7 322.9 494.9 334.4"/>
    //     </g>
    //     <g data-name="Links">
    //       <polygon class="iso-cls-15" points="494.9 334.4 494.9 314.4 465.2 297.2 465.2 317.2 494.9 334.4"/>
    //     </g>
    //   </g>',
    //   '<g data-name="8a.1">
    //     <g data-name="Volumen">
    //       <polygon class="iso-cls-16" points="440.5 220.1 400.9 242.9 400.9 302.9 445.5 328.7 465.2 317.2 465.2 297.2 485 285.8 485 245.8 440.5 220.1"/>
    //     </g>
    //     <g data-name="Rechts">
    //       <polygon class="iso-cls-17" points="465.2 317.2 465.2 297.2 485 285.8 485 245.8 445.5 268.7 445.5 328.7 465.2 317.2"/>
    //     </g>
    //     <g data-name="Links">
    //       <polygon class="iso-cls-15" points="445.5 268.7 445.5 328.7 400.9 302.9 400.9 242.9 445.5 268.7"/>
    //     </g>
    //   </g>',
    //   '<g data-name="8b.2">
    //     <g data-name="Volumen">
    //       <polygon class="iso-cls-16" points="485 245.8 445.5 268.7 445.5 328.7 475.1 345.8 494.9 334.4 494.9 331.5 529.6 311.5 529.6 271.5 485 245.8"/>
    //     </g>
    //     <g data-name="Rechts">
    //       <polygon class="iso-cls-17" points="529.6 311.5 529.6 271.5 490 294.4 490 334.4 529.6 311.5"/>
    //       <polygon class="iso-cls-17" points="494.9 334.4 475.1 345.8 475.1 325.8 490 334.4 494.9 331.5 494.9 334.4"/>
    //     </g>
    //     <g data-name="Links">
    //       <polygon class="iso-cls-15" points="445.5 268.7 445.5 328.7 475.1 345.8 475.1 325.8 490 334.4 490 294.4 445.5 268.7"/>
    //     </g>
    //   </g>',
    // ];
    // $view_4_townhouse_10 = [
    //   '<g data-name="10d">
    //     <g data-name="Volumen">
    //       <polygon class="iso-cls-16" points="574.1 337.2 574.1 357.2 554.3 368.7 509.8 342.9 509.8 322.9 529.6 311.5 574.1 337.2"/>
    //     </g>
    //     <g data-name="Rechts">
    //       <polygon class="iso-cls-17" points="554.3 368.7 554.3 348.7 574.1 337.2 574.1 357.2 554.3 368.7"/>
    //     </g>
    //     <g data-name="Links">
    //       <polygon class="iso-cls-15" points="554.3 368.7 554.3 348.7 509.8 322.9 509.8 342.9 554.3 368.7"/>
    //     </g>
    //   </g>',
    //   '<g data-name="10c">
    //     <g data-name="Volumen">
    //       <polygon class="iso-cls-16" points="603.8 354.4 603.8 374.4 584 385.8 554.3 368.7 554.3 348.7 574.1 337.2 603.8 354.4"/>
    //     </g>
    //     <g data-name="Rechts">
    //       <polygon class="iso-cls-17" points="584 385.8 584 365.8 603.8 354.4 603.8 374.4 584 385.8"/>
    //     </g>
    //     <g data-name="Links">
    //       <polygon class="iso-cls-15" points="584 385.8 584 365.8 554.3 348.7 554.3 368.7 584 385.8"/>
    //     </g>
    //   </g>',
    //   '<g data-name="10a.1">
    //     <g data-name="Volumen">
    //       <polygon class="iso-cls-16" points="529.6 271.5 490 294.4 490 354.4 534.5 380.1 554.3 368.7 554.3 348.7 574.1 337.2 574.1 297.2 529.6 271.5"/>
    //     </g>
    //     <g data-name="Rechts">
    //       <polygon class="iso-cls-17" points="554.3 368.7 554.3 348.7 574.1 337.2 574.1 297.2 534.5 320.1 534.5 380.1 554.3 368.7"/>
    //     </g>
    //     <g data-name="Links">
    //       <polygon class="iso-cls-15" points="534.5 320.1 534.5 380.1 490 354.4 490 294.4 534.5 320.1"/>
    //     </g>
    //   </g>',
    //   '<g data-name="10b.2">
    //     <g data-name="Volumen">
    //       <polygon class="iso-cls-16" points="574.1 297.2 534.5 320.1 534.5 380.1 564.2 397.2 584 385.8 584 382.9 618.7 362.9 618.7 322.9 574.1 297.2"/>
    //     </g>
    //     <g data-name="Rechts">
    //       <polygon class="iso-cls-17" points="618.7 362.9 618.7 322.9 579.1 345.8 579.1 385.8 618.7 362.9"/>
    //       <polygon class="iso-cls-17" points="584 385.8 564.2 397.2 564.2 377.2 579.1 385.8 584 382.9 584 385.8"/>
    //     </g>
    //     <g data-name="Links">
    //       <polygon class="iso-cls-15" points="534.5 320.1 534.5 380.1 564.2 397.2 564.2 377.2 579.1 385.8 579.1 345.8 534.5 320.1"/>
    //     </g>
    //   </g>',
    // ];
    // $view_4_townhouse_12 = [
    //   '<g data-name="12d">
    //     <g data-name="Volumen">
    //       <polygon class="iso-cls-16" points="663.2 388.7 663.2 408.7 643.4 420.1 598.9 394.4 598.9 374.4 618.7 362.9 663.2 388.7"/>
    //     </g>
    //     <g data-name="Rechts">
    //       <polygon class="iso-cls-17" points="643.4 420.1 643.4 400.1 663.2 388.7 663.2 408.7 643.4 420.1"/>
    //     </g>
    //     <g data-name="Links">
    //       <polygon class="iso-cls-15" points="643.4 420.1 643.4 400.1 598.9 374.4 598.9 394.4 643.4 420.1"/>
    //     </g>
    //   </g>',
    //   '<g data-name="12c">
    //     <g data-name="Volumen">
    //       <polygon class="iso-cls-16" points="692.9 405.8 692.9 425.8 673.1 437.2 643.4 420.1 643.4 400.1 663.2 388.7 692.9 405.8"/>
    //     </g>
    //     <g data-name="Rechts">
    //       <polygon class="iso-cls-17" points="673.1 437.2 673.1 417.2 692.9 405.8 692.9 425.8 673.1 437.2"/>
    //     </g>
    //     <g data-name="Links">
    //       <polygon class="iso-cls-15" points="673.1 437.2 673.1 417.2 643.4 400.1 643.4 420.1 673.1 437.2"/>
    //     </g>
    //   </g>',
    //   '<g data-name="12a.1">
    //     <g data-name="Volumen">
    //       <polygon class="iso-cls-16" points="618.7 322.9 579.1 345.8 579.1 405.8 623.6 431.5 643.4 420.1 643.4 400.1 663.2 388.7 663.2 348.7 618.7 322.9"/>
    //     </g>
    //     <g data-name="Rechts">
    //       <polygon class="iso-cls-17" points="643.4 420.1 643.4 400.1 663.2 388.7 663.2 348.7 623.6 371.5 623.6 431.5 643.4 420.1"/>
    //     </g>
    //     <g data-name="Links">
    //       <polygon class="iso-cls-15" points="623.6 371.5 623.6 431.5 579.1 405.8 579.1 345.8 623.6 371.5"/>
    //     </g>
    //   </g>',
    //   '<g data-name="12b.2">
    //     <g data-name="Volumen">
    //       <polygon class="iso-cls-16" points="663.2 348.7 623.6 371.5 623.6 431.5 653.3 448.6 673.1 437.2 673.1 434.4 707.7 414.4 707.7 374.4 663.2 348.7"/>
    //     </g>
    //     <g data-name="Rechts">
    //       <polygon class="iso-cls-17" points="707.7 414.4 707.7 374.4 668.1 397.2 668.1 437.2 707.7 414.4"/>
    //       <polygon class="iso-cls-17" points="673.1 437.2 653.3 448.6 653.3 428.6 668.1 437.2 673.1 434.4 673.1 437.2"/>
    //     </g>
    //     <g data-name="Links">
    //       <polygon class="iso-cls-15" points="623.6 371.5 623.6 431.5 653.3 448.6 653.3 428.6 668.1 437.2 668.1 397.2 623.6 371.5"/>
    //     </g>
    //   </g>',
    // ];

    // View 3
    // $view_3_house_8 = [
    //   '<g id="8.3" data-name="8.3">
    //   <g data-name="Volumen">
    //   <polygon class="iso-cls-19" points="475.1 331.5 430.6 305.8 376.2 337.2 376.2 357.2 420.7 382.9 475.1 351.5 475.1 331.5"/>
    //   </g>
    //   <g data-name="Rechts">
    //   <polygon class="iso-cls-20" points="420.7 362.9 475.1 331.5 475.1 351.5 420.7 382.9 420.7 362.9"/>
    //   </g>
    //   <g data-name="Links">
    //   <polygon class="iso-cls-21" points="420.7 382.9 376.2 357.2 376.2 337.2 420.7 362.9 420.7 382.9"/>
    //   </g>
    //   </g>',
    //   '<g id="8.1" data-name="8.1">
    //   <g data-name="Volumen">
    //   <polygon class="iso-cls-19" points="452.9 344.4 457.8 341.5 450.4 337.2 450.4 317.2 485 297.2 564.2 342.9 564.2 362.9 507.3 395.8 452.9 364.4 452.9 344.4"/>
    //   </g>
    //   <g data-name="Rechts">
    //   <polygon class="iso-cls-20" points="507.3 395.8 564.2 362.9 564.2 342.9 507.3 375.8 507.3 395.8"/>
    //   </g>
    //   <g data-name="Links">
    //   <polygon class="iso-cls-21" points="457.8 341.5 450.4 337.2 450.4 317.2 475.1 331.5 457.8 341.5"/>
    //   <polygon class="iso-cls-21" points="507.3 375.8 452.9 344.4 452.9 364.4 507.3 395.8 507.3 375.8"/>
    //   </g>
    //   </g>',
    //   '<g id="8.2" data-name="8.2">
    //   <g data-name="Volumen">
    //   <polygon class="iso-cls-16" points="507.3 375.8 452.9 344.4 420.7 362.9 396 348.7 361.3 368.7 361.3 388.7 440.5 434.4 507.3 395.8 507.3 375.8"/>
    //   </g>
    //   <g data-name="Rechts">
    //   <polygon class="iso-cls-17" points="507.3 395.8 440.5 434.4 440.5 414.4 507.3 375.8 507.3 395.8"/>
    //   </g>
    //   <g data-name="Links">
    //   <polygon class="iso-cls-15" points="440.5 434.4 361.3 388.7 361.3 368.7 440.5 414.4 440.5 434.4"/>
    //   </g>
    //   </g>',
    //   '<g id="8.103" data-name="8.103">
    //   <g data-name="Volumen">
    //   <polygon class="iso-cls-19" points="475.1 311.5 430.6 285.8 376.2 317.2 376.2 337.2 420.7 362.9 475.1 331.5 475.1 311.5"/>
    //   </g>
    //   <g data-name="Rechts">
    //   <polygon class="iso-cls-20" points="420.7 342.9 475.1 311.5 475.1 331.5 420.7 362.9 420.7 342.9"/>
    //   </g>
    //   <g data-name="Links">
    //   <polygon class="iso-cls-21" points="420.7 362.9 376.2 337.2 376.2 317.2 420.7 342.9 420.7 362.9"/>
    //   </g>
    //   </g>',
    //   '<g id="8.101" data-name="8.101">
    //   <g data-name="Volumen">
    //   <polygon class="iso-cls-19" points="452.9 324.4 457.8 321.5 450.4 317.2 450.4 297.2 485 277.2 564.2 322.9 564.2 342.9 507.3 375.8 452.9 344.4 452.9 324.4"/>
    //   </g>
    //   <g data-name="Rechts">
    //   <polygon class="iso-cls-20" points="507.3 375.8 564.2 342.9 564.2 322.9 507.3 355.8 507.3 375.8"/>
    //   </g>
    //   <g data-name="Links">
    //   <polygon class="iso-cls-21" points="457.8 321.5 450.4 317.2 450.4 297.2 475.1 311.5 457.8 321.5"/>
    //   <polygon class="iso-cls-21" points="507.3 355.8 452.9 324.4 452.9 344.4 507.3 375.8 507.3 355.8"/>
    //   </g>
    //   </g>',
    //   '<g id="8.102" data-name="8.102">
    //   <g data-name="Volumen">
    //   <polygon class="iso-cls-16" points="507.3 355.8 452.9 324.4 420.7 342.9 396 328.7 361.3 348.7 361.3 368.7 440.5 414.4 507.3 375.8 507.3 355.8"/>
    //   </g>
    //   <g data-name="Rechts">
    //   <polygon class="iso-cls-17" points="507.3 375.8 440.5 414.4 440.5 394.4 507.3 355.8 507.3 375.8"/>
    //   </g>
    //   <g data-name="Links">
    //   <polygon class="iso-cls-15" points="440.5 414.4 361.3 368.7 361.3 348.7 440.5 394.4 440.5 414.4"/>
    //   </g>
    //   </g>',
    //   '<g id="8.203" data-name="8.203">
    //   <g data-name="Volumen">
    //   <polygon class="iso-cls-19" points="475.1 291.5 430.6 265.8 376.2 297.2 376.2 317.2 420.7 342.9 475.1 311.5 475.1 291.5"/>
    //   </g>
    //   <g data-name="Rechts">
    //   <polygon class="iso-cls-20" points="420.7 322.9 475.1 291.5 475.1 311.5 420.7 342.9 420.7 322.9"/>
    //   </g>
    //   <g data-name="Links">
    //   <polygon class="iso-cls-21" points="420.7 342.9 376.2 317.2 376.2 297.2 420.7 322.9 420.7 342.9"/>
    //   </g>
    //   </g>',
    //   '<g id="8.201" data-name="8.201">
    //   <g data-name="Volumen">
    //   <polygon class="iso-cls-19" points="452.9 304.4 457.8 301.5 450.4 297.2 450.4 277.2 485 257.2 564.2 302.9 564.2 322.9 507.3 355.8 452.9 324.4 452.9 304.4"/>
    //   </g>
    //   <g data-name="Rechts">
    //   <polygon class="iso-cls-20" points="507.3 355.8 564.2 322.9 564.2 302.9 507.3 335.8 507.3 355.8"/>
    //   </g>
    //   <g data-name="Links">
    //   <polygon class="iso-cls-21" points="457.8 301.5 450.4 297.2 450.4 277.2 475.1 291.5 457.8 301.5"/>
    //   <polygon class="iso-cls-21" points="507.3 335.8 452.9 304.4 452.9 324.4 507.3 355.8 507.3 335.8"/>
    //   </g>
    //   </g>',
    //   '<g id="8.202" data-name="8.202">
    //   <g data-name="Volumen">
    //   <polygon class="iso-cls-16" points="507.3 335.8 452.9 304.4 420.7 322.9 396 308.7 361.3 328.7 361.3 348.7 440.5 394.4 507.3 355.8 507.3 335.8"/>
    //   </g>
    //   <g data-name="Rechts">
    //   <polygon class="iso-cls-17" points="507.3 355.8 440.5 394.4 440.5 374.4 507.3 335.8 507.3 355.8"/>
    //   </g>
    //   <g data-name="Links">
    //   <polygon class="iso-cls-15" points="440.5 394.4 361.3 348.7 361.3 328.7 440.5 374.4 440.5 394.4"/>
    //   </g>
    //   </g>',
    //   '<g id="8.303" data-name="8.303">
    //   <g data-name="Volumen">
    //   <polygon class="iso-cls-19" points="475.1 271.5 430.6 245.8 376.2 277.2 376.2 297.2 420.7 322.9 475.1 291.5 475.1 271.5"/>
    //   </g>
    //   <g data-name="Rechts">
    //   <polygon class="iso-cls-20" points="420.7 302.9 475.1 271.5 475.1 291.5 420.7 322.9 420.7 302.9"/>
    //   </g>
    //   <g data-name="Links">
    //   <polygon class="iso-cls-21" points="420.7 322.9 376.2 297.2 376.2 277.2 420.7 302.9 420.7 322.9"/>
    //   </g>
    //   </g>',
    //   '<g id="8.301" data-name="8.301">
    //   <g data-name="Volumen">
    //   <polygon class="iso-cls-19" points="452.9 284.4 457.8 281.5 450.4 277.2 450.4 257.2 485 237.2 564.2 282.9 564.2 302.9 507.3 335.8 452.9 304.4 452.9 284.4"/>
    //   </g>
    //   <g data-name="Rechts">
    //   <polygon class="iso-cls-20" points="507.3 335.8 564.2 302.9 564.2 282.9 507.3 315.8 507.3 335.8"/>
    //   </g>
    //   <g data-name="Links">
    //   <polygon class="iso-cls-21" points="457.8 281.5 450.4 277.2 450.4 257.2 475.1 271.5 457.8 281.5"/>
    //   <polygon class="iso-cls-21" points="507.3 315.8 452.9 284.4 452.9 304.4 507.3 335.8 507.3 315.8"/>
    //   </g>
    //   </g>',
    //   '<g id="8.302" data-name="8.302">
    //   <g data-name="Volumen">
    //   <polygon class="iso-cls-16" points="507.3 315.8 452.9 284.4 420.7 302.9 396 288.7 361.3 308.7 361.3 328.7 440.5 374.4 507.3 335.8 507.3 315.8"/>
    //   </g>
    //   <g data-name="Rechts">
    //   <polygon class="iso-cls-17" points="507.3 335.8 440.5 374.4 440.5 354.4 507.3 315.8 507.3 335.8"/>
    //   </g>
    //   <g data-name="Links">
    //   <polygon class="iso-cls-15" points="440.5 374.4 361.3 328.7 361.3 308.7 440.5 354.4 440.5 374.4"/>
    //   </g>
    //   </g>',
    //   '<g id="8.403" data-name="8.403">
    //   <g data-name="Volumen">
    //   <polygon class="iso-cls-19" points="475.1 251.5 430.6 225.8 376.2 257.2 376.2 277.2 420.7 302.9 475.1 271.5 475.1 251.5"/>
    //   </g>
    //   <g data-name="Rechts">
    //   <polygon class="iso-cls-20" points="420.7 282.9 475.1 251.5 475.1 271.5 420.7 302.9 420.7 282.9"/>
    //   </g>
    //   <g data-name="Links">
    //   <polygon class="iso-cls-21" points="420.7 302.9 376.2 277.2 376.2 257.2 420.7 282.9 420.7 302.9"/>
    //   </g>
    //   </g>',
    //   '<g id="8.401" data-name="8.401">
    //   <g data-name="Volumen">
    //   <polygon class="iso-cls-19" points="452.9 264.4 457.8 261.5 450.4 257.2 450.4 237.2 485 217.2 564.2 262.9 564.2 282.9 507.3 315.8 452.9 284.4 452.9 264.4"/>
    //   </g>
    //   <g data-name="Rechts">
    //   <polygon class="iso-cls-20" points="507.3 315.8 564.2 282.9 564.2 262.9 507.3 295.8 507.3 315.8"/>
    //   </g>
    //   <g data-name="Links">
    //   <polygon class="iso-cls-21" points="457.8 261.5 450.4 257.2 450.4 237.2 475.1 251.5 457.8 261.5"/>
    //   <polygon class="iso-cls-21" points="507.3 295.8 452.9 264.4 452.9 284.4 507.3 315.8 507.3 295.8"/>
    //   </g>
    //   </g>',
    //   '<g id="8.402" data-name="8.402">
    //   <g data-name="Volumen">
    //   <polygon class="iso-cls-16" points="507.3 295.8 452.9 264.4 420.7 282.9 396 268.7 361.3 288.7 361.3 308.7 440.5 354.4 507.3 315.8 507.3 295.8"/>
    //   </g>
    //   <g data-name="Rechts">
    //   <polygon class="iso-cls-17" points="507.3 315.8 440.5 354.4 440.5 334.4 507.3 295.8 507.3 315.8"/>
    //   </g>
    //   <g data-name="Links">
    //   <polygon class="iso-cls-15" points="440.5 354.4 361.3 308.7 361.3 288.7 440.5 334.4 440.5 354.4"/>
    //   </g>
    //   </g>',
    //   '<g id="8.503" data-name="8.503">
    //   <g data-name="Volumen">
    //   <polygon class="iso-cls-19" points="475.1 231.5 430.6 205.8 376.2 237.2 376.2 257.2 420.7 282.9 475.1 251.5 475.1 231.5"/>
    //   </g>
    //   <g data-name="Rechts">
    //   <polygon class="iso-cls-20" points="420.7 262.9 475.1 231.5 475.1 251.5 420.7 282.9 420.7 262.9"/>
    //   </g>
    //   <g data-name="Links">
    //   <polygon class="iso-cls-21" points="420.7 282.9 376.2 257.2 376.2 237.2 420.7 262.9 420.7 282.9"/>
    //   </g>
    //   </g>',
    //   '<g id="8.501" data-name="8.501">
    //   <g data-name="Volumen">
    //   <polygon class="iso-cls-19" points="452.9 244.4 457.8 241.5 450.4 237.2 450.4 217.2 485 197.2 544.4 231.5 544.4 251.5 487.5 284.4 452.9 264.4 452.9 244.4"/>
    //   </g>
    //   <g data-name="Rechts">
    //   <polygon class="iso-cls-20" points="487.5 284.4 544.4 251.5 544.4 231.5 487.5 264.4 487.5 284.4"/>
    //   </g>
    //   <g data-name="Links">
    //   <polygon class="iso-cls-21" points="457.8 241.5 450.4 237.2 450.4 217.2 475.1 231.5 457.8 241.5"/>
    //   <polygon class="iso-cls-21" points="487.5 264.4 452.9 244.4 452.9 264.4 487.5 284.4 487.5 264.4"/>
    //   </g>
    //   </g>',
    //   '<g id="8.502" data-name="8.502">
    //   <g data-name="Volumen">
    //   <polygon class="iso-cls-16" points="487.5 264.4 452.9 244.4 420.7 262.9 396 248.7 361.3 268.7 361.3 288.7 420.7 322.9 487.5 284.4 487.5 264.4"/>
    //   </g>
    //   <g data-name="Rechts">
    //   <polygon class="iso-cls-17" points="487.5 284.4 420.7 322.9 420.7 302.9 487.5 264.4 487.5 284.4"/>
    //   </g>
    //   <g data-name="Links">
    //   <polygon class="iso-cls-15" points="420.7 322.9 361.3 288.7 361.3 268.7 420.7 302.9 420.7 322.9"/>
    //   </g>
    //   </g>',
    //   '<g id="8.601" data-name="8.601">
    //   <g data-name="Volumen">
    //   <polygon class="iso-cls-19" points="408.3 198.7 430.6 185.8 450.4 197.2 485 177.2 544.4 211.5 544.4 231.5 487.5 264.4 408.3 218.7 408.3 198.7"/>
    //   </g>
    //   <g data-name="Rechts">
    //   <polygon class="iso-cls-20" points="487.5 264.4 544.4 231.5 544.4 211.5 487.5 244.4 487.5 264.4"/>
    //   </g>
    //   <g data-name="Links">
    //   <polygon class="iso-cls-21" points="487.5 244.4 408.3 198.7 408.3 218.7 487.5 264.4 487.5 244.4"/>
    //   </g>
    //   </g>',
    //   '<g id="8.602" data-name="8.602">
    //   <g data-name="Volumen">
    //   <polygon class="iso-cls-16" points="408.3 198.7 376.2 217.2 376.2 237.2 378.6 238.7 361.3 248.7 361.3 268.7 420.7 302.9 487.5 264.4 487.5 244.4 408.3 198.7"/>
    //   </g>
    //   <g data-name="Rechts">
    //   <polygon class="iso-cls-17" points="487.5 264.4 420.7 302.9 420.7 282.9 487.5 244.4 487.5 264.4"/>
    //   </g>
    //   <g data-name="Links">
    //   <polygon class="iso-cls-15" points="420.7 302.9 361.3 268.7 361.3 248.7 420.7 282.9 420.7 302.9"/>
    //   <polygon class="iso-cls-15" points="378.6 238.7 376.2 237.2 376.2 217.2 396 228.7 378.6 238.7"/>
    //   </g>
    //   </g>',
    // ];
    // $view_3_house_10 = [
    //   '<g id="10.3" data-name="10.3">
    //   <g data-name="Volumen">
    //   <polygon class="iso-cls-19" points="598.9 260.1 554.3 234.4 499.9 265.8 499.9 285.8 544.4 311.5 598.9 280.1 598.9 260.1"/>
    //   </g>
    //   <g data-name="Rechts">
    //   <polygon class="iso-cls-20" points="544.4 291.5 598.9 260.1 598.9 280.1 544.4 311.5 544.4 291.5"/>
    //   </g>
    //   <g data-name="Links">
    //   <polygon class="iso-cls-21" points="544.4 311.5 499.9 285.8 499.9 265.8 544.4 291.5 544.4 311.5"/>
    //   </g>
    //   </g>',
    //   '<g id="10.1" data-name="10.1">
    //   <g data-name="Volumen">
    //   <polygon class="iso-cls-19" points="576.6 272.9 581.5 270.1 574.1 265.8 574.1 245.8 608.8 225.8 687.9 271.5 687.9 291.5 631 324.4 576.6 292.9 576.6 272.9"/>
    //   </g>
    //   <g data-name="Rechts">
    //   <polygon class="iso-cls-20" points="631 324.4 687.9 291.5 687.9 271.5 631 304.4 631 324.4"/>
    //   </g>
    //   <g data-name="Links">
    //   <polygon class="iso-cls-21" points="581.5 270.1 574.1 265.8 574.1 245.8 598.9 260.1 581.5 270.1"/>
    //   <polygon class="iso-cls-21" points="631 304.4 576.6 272.9 576.6 292.9 631 324.4 631 304.4"/>
    //   </g>
    //   </g>',
    //   '<g id="10.2" data-name="10.2">
    //   <g data-name="Volumen">
    //   <polygon class="iso-cls-16" points="631 304.4 576.6 272.9 544.4 291.5 519.7 277.2 485 297.2 485 317.2 564.2 362.9 631 324.4 631 304.4"/>
    //   </g>
    //   <g data-name="Rechts">
    //   <polygon class="iso-cls-17" points="631 324.4 564.2 362.9 564.2 342.9 631 304.4 631 324.4"/>
    //   </g>
    //   <g data-name="Links">
    //   <polygon class="iso-cls-15" points="564.2 362.9 485 317.2 485 297.2 564.2 342.9 564.2 362.9"/>
    //   </g>
    //   </g>',
    //   '<g id="10.103" data-name="10.103">
    //   <g data-name="Volumen">
    //   <polygon class="iso-cls-19" points="598.9 240.1 554.3 214.4 499.9 245.8 499.9 265.8 544.4 291.5 598.9 260.1 598.9 240.1"/>
    //   </g>
    //   <g data-name="Rechts">
    //   <polygon class="iso-cls-20" points="544.4 271.5 598.9 240.1 598.9 260.1 544.4 291.5 544.4 271.5"/>
    //   </g>
    //   <g data-name="Links">
    //   <polygon class="iso-cls-21" points="544.4 291.5 499.9 265.8 499.9 245.8 544.4 271.5 544.4 291.5"/>
    //   </g>
    //   </g>',
    //   '<g id="10.101" data-name="10.101">
    //   <g data-name="Volumen">
    //   <polygon class="iso-cls-19" points="576.6 252.9 581.5 250.1 574.1 245.8 574.1 225.8 608.8 205.8 687.9 251.5 687.9 271.5 631 304.4 576.6 272.9 576.6 252.9"/>
    //   </g>
    //   <g data-name="Rechts">
    //   <polygon class="iso-cls-20" points="631 304.4 687.9 271.5 687.9 251.5 631 284.4 631 304.4"/>
    //   </g>
    //   <g data-name="Links">
    //   <polygon class="iso-cls-21" points="581.5 250.1 574.1 245.8 574.1 225.8 598.9 240.1 581.5 250.1"/>
    //   <polygon class="iso-cls-21" points="631 284.4 576.6 252.9 576.6 272.9 631 304.4 631 284.4"/>
    //   </g>
    //   </g>',
    //   '<g id="10.102" data-name="10.102">
    //   <g data-name="Volumen">
    //   <polygon class="iso-cls-16" points="631 284.4 576.6 252.9 544.4 271.5 519.7 257.2 485 277.2 485 297.2 564.2 342.9 631 304.4 631 284.4"/>
    //   </g>
    //   <g data-name="Rechts">
    //   <polygon class="iso-cls-17" points="631 304.4 564.2 342.9 564.2 322.9 631 284.4 631 304.4"/>
    //   </g>
    //   <g data-name="Links">
    //   <polygon class="iso-cls-15" points="564.2 342.9 485 297.2 485 277.2 564.2 322.9 564.2 342.9"/>
    //   </g>
    //   </g>',
    //   '<g id="10.203" data-name="10.203">
    //   <g data-name="Volumen">
    //   <polygon class="iso-cls-19" points="598.9 220.1 554.3 194.4 499.9 225.8 499.9 245.8 544.4 271.5 598.9 240.1 598.9 220.1"/>
    //   </g>
    //   <g data-name="Rechts">
    //   <polygon class="iso-cls-20" points="544.4 251.5 598.9 220.1 598.9 240.1 544.4 271.5 544.4 251.5"/>
    //   </g>
    //   <g data-name="Links">
    //   <polygon class="iso-cls-21" points="544.4 271.5 499.9 245.8 499.9 225.8 544.4 251.5 544.4 271.5"/>
    //   </g>
    //   </g>',
    //   '<g id="10.201" data-name="10.201">
    //   <g data-name="Volumen">
    //   <polygon class="iso-cls-19" points="576.6 232.9 581.5 230.1 574.1 225.8 574.1 205.8 608.8 185.8 687.9 231.5 687.9 251.5 631 284.4 576.6 252.9 576.6 232.9"/>
    //   </g>
    //   <g data-name="Rechts">
    //   <polygon class="iso-cls-20" points="631 284.4 687.9 251.5 687.9 231.5 631 264.4 631 284.4"/>
    //   </g>
    //   <g data-name="Links">
    //   <polygon class="iso-cls-21" points="581.5 230.1 574.1 225.8 574.1 205.8 598.9 220.1 581.5 230.1"/>
    //   <polygon class="iso-cls-21" points="631 264.4 576.6 232.9 576.6 252.9 631 284.4 631 264.4"/>
    //   </g>
    //   </g>',
    //   '<g id="10.202" data-name="10.202">
    //   <g data-name="Volumen">
    //   <polygon class="iso-cls-16" points="631 264.4 576.6 232.9 544.4 251.5 519.7 237.2 485 257.2 485 277.2 564.2 322.9 631 284.4 631 264.4"/>
    //   </g>
    //   <g data-name="Rechts">
    //   <polygon class="iso-cls-17" points="631 284.4 564.2 322.9 564.2 302.9 631 264.4 631 284.4"/>
    //   </g>
    //   <g data-name="Links">
    //   <polygon class="iso-cls-15" points="564.2 322.9 485 277.2 485 257.2 564.2 302.9 564.2 322.9"/>
    //   </g>
    //   </g>',
    //   '<g id="10.303" data-name="10.303">
    //   <g data-name="Volumen">
    //   <polygon class="iso-cls-19" points="598.9 200.1 554.3 174.4 499.9 205.8 499.9 225.8 544.4 251.5 598.9 220.1 598.9 200.1"/>
    //   </g>
    //   <g data-name="Rechts">
    //   <polygon class="iso-cls-20" points="544.4 231.5 598.9 200.1 598.9 220.1 544.4 251.5 544.4 231.5"/>
    //   </g>
    //   <g data-name="Links">
    //   <polygon class="iso-cls-21" points="544.4 251.5 499.9 225.8 499.9 205.8 544.4 231.5 544.4 251.5"/>
    //   </g>
    //   </g>',
    //   '<g id="10.301" data-name="10.301">
    //   <g data-name="Volumen">
    //   <polygon class="iso-cls-19" points="576.6 212.9 581.5 210.1 574.1 205.8 574.1 185.8 608.8 165.8 687.9 211.5 687.9 231.5 631 264.4 576.6 232.9 576.6 212.9"/>
    //   </g>
    //   <g data-name="Rechts">
    //   <polygon class="iso-cls-20" points="631 264.4 687.9 231.5 687.9 211.5 631 244.4 631 264.4"/>
    //   </g>
    //   <g data-name="Links">
    //   <polygon class="iso-cls-21" points="581.5 210.1 574.1 205.8 574.1 185.8 598.9 200.1 581.5 210.1"/>
    //   <polygon class="iso-cls-21" points="631 244.4 576.6 212.9 576.6 232.9 631 264.4 631 244.4"/>
    //   </g>
    //   </g>',
    //   '<g id="10.302" data-name="10.302">
    //   <g data-name="Volumen">
    //   <polygon class="iso-cls-16" points="631 244.4 576.6 212.9 544.4 231.5 519.7 217.2 485 237.2 485 257.2 564.2 302.9 631 264.4 631 244.4"/>
    //   </g>
    //   <g data-name="Rechts">
    //   <polygon class="iso-cls-17" points="631 264.4 564.2 302.9 564.2 282.9 631 244.4 631 264.4"/>
    //   </g>
    //   <g data-name="Links">
    //   <polygon class="iso-cls-15" points="564.2 302.9 485 257.2 485 237.2 564.2 282.9 564.2 302.9"/>
    //   </g>
    //   </g>',
    //   '<g id="10.403" data-name="10.403">
    //   <g data-name="Volumen">
    //   <polygon class="iso-cls-19" points="598.9 180.1 554.3 154.4 499.9 185.8 499.9 205.8 544.4 231.5 598.9 200.1 598.9 180.1"/>
    //   </g>
    //   <g data-name="Rechts">
    //   <polygon class="iso-cls-20" points="544.4 211.5 598.9 180.1 598.9 200.1 544.4 231.5 544.4 211.5"/>
    //   </g>
    //   <g data-name="Links">
    //   <polygon class="iso-cls-21" points="544.4 231.5 499.9 205.8 499.9 185.8 544.4 211.5 544.4 231.5"/>
    //   </g>
    //   </g>',
    //   '<g id="10.401" data-name="10.401">
    //   <g data-name="Volumen">
    //   <polygon class="iso-cls-19" points="576.6 192.9 581.5 190.1 574.1 185.8 574.1 165.8 608.8 145.8 687.9 191.5 687.9 211.5 631 244.4 576.6 212.9 576.6 192.9"/>
    //   </g>
    //   <g data-name="Rechts">
    //   <polygon class="iso-cls-20" points="631 244.4 687.9 211.5 687.9 191.5 631 224.4 631 244.4"/>
    //   </g>
    //   <g data-name="Links">
    //   <polygon class="iso-cls-21" points="581.5 190.1 574.1 185.8 574.1 165.8 598.9 180.1 581.5 190.1"/>
    //   <polygon class="iso-cls-21" points="631 224.4 576.6 192.9 576.6 212.9 631 244.4 631 224.4"/>
    //   </g>
    //   </g>',
    //   '<g id="10.402" data-name="10.402">
    //   <g data-name="Volumen">
    //   <polygon class="iso-cls-16" points="631 224.4 576.6 192.9 544.4 211.5 519.7 197.2 485 217.2 485 237.2 564.2 282.9 631 244.4 631 224.4"/>
    //   </g>
    //   <g data-name="Rechts">
    //   <polygon class="iso-cls-17" points="631 244.4 564.2 282.9 564.2 262.9 631 224.4 631 244.4"/>
    //   </g>
    //   <g data-name="Links">
    //   <polygon class="iso-cls-15" points="564.2 282.9 485 237.2 485 217.2 564.2 262.9 564.2 282.9"/>
    //   </g>
    //   </g>',
    //   '<g id="10.503" data-name="10.503">
    //   <g data-name="Volumen">
    //   <polygon class="iso-cls-19" points="598.9 160.1 554.3 134.4 499.9 165.8 499.9 185.8 544.4 211.5 598.9 180.1 598.9 160.1"/>
    //   </g>
    //   <g data-name="Rechts">
    //   <polygon class="iso-cls-20" points="544.4 191.5 598.9 160.1 598.9 180.1 544.4 211.5 544.4 191.5"/>
    //   </g>
    //   <g data-name="Links">
    //   <polygon class="iso-cls-21" points="544.4 211.5 499.9 185.8 499.9 165.8 544.4 191.5 544.4 211.5"/>
    //   </g>
    //   </g>',
    //   '<g id="10.501" data-name="10.501">
    //   <g data-name="Volumen">
    //   <polygon class="iso-cls-19" points="576.6 172.9 581.5 170.1 574.1 165.8 574.1 145.8 608.8 125.8 668.1 160.1 668.1 180.1 611.2 212.9 576.6 192.9 576.6 172.9"/>
    //   </g>
    //   <g data-name="Rechts">
    //   <polygon class="iso-cls-20" points="611.2 212.9 668.1 180.1 668.1 160.1 611.2 192.9 611.2 212.9"/>
    //   </g>
    //   <g data-name="Links">
    //   <polygon class="iso-cls-21" points="581.5 170.1 574.1 165.8 574.1 145.8 598.9 160.1 581.5 170.1"/>
    //   <polygon class="iso-cls-21" points="611.2 192.9 576.6 172.9 576.6 192.9 611.2 212.9 611.2 192.9"/>
    //   </g>
    //   </g>',
    //   '<g id="10.502" data-name="10.502">
    //   <g data-name="Volumen">
    //   <polygon class="iso-cls-16" points="611.2 192.9 576.6 172.9 544.4 191.5 519.7 177.2 485 197.2 485 217.2 544.4 251.5 611.2 212.9 611.2 192.9"/>
    //   </g>
    //   <g data-name="Rechts">
    //   <polygon class="iso-cls-17" points="611.2 212.9 544.4 251.5 544.4 231.5 611.2 192.9 611.2 212.9"/>
    //   </g>
    //   <g data-name="Links">
    //   <polygon class="iso-cls-15" points="544.4 251.5 485 217.2 485 197.2 544.4 231.5 544.4 251.5"/>
    //   </g>
    //   </g>',
    //   '<g id="10.601" data-name="10.601">
    //   <g data-name="Volumen">
    //   <polygon class="iso-cls-19" points="532.1 127.2 554.3 114.4 574.1 125.8 660.7 75.8 720.1 110.1 720.1 130.1 611.2 192.9 532.1 147.2 532.1 127.2"/>
    //   </g>
    //   <g data-name="Rechts">
    //   <polygon class="iso-cls-20" points="611.2 192.9 720.1 130.1 720.1 110.1 611.2 172.9 611.2 192.9"/>
    //   </g>
    //   <g data-name="Links">
    //   <polygon class="iso-cls-21" points="611.2 172.9 532.1 127.2 532.1 147.2 611.2 192.9 611.2 172.9"/>
    //   </g>
    //   </g>',
    //   '<g id="10.602" data-name="10.602">
    //   <g data-name="Volumen">
    //   <polygon class="iso-cls-16" points="532.1 127.2 499.9 145.8 499.9 165.8 502.4 167.2 485 177.2 485 197.2 544.4 231.5 611.2 192.9 611.2 172.9 532.1 127.2"/>
    //   </g>
    //   <g data-name="Rechts">
    //   <polygon class="iso-cls-17" points="611.2 192.9 544.4 231.5 544.4 211.5 611.2 172.9 611.2 192.9"/>
    //   </g>
    //   <g data-name="Links">
    //   <polygon class="iso-cls-15" points="544.4 231.5 485 197.2 485 177.2 544.4 211.5 544.4 231.5"/>
    //   <polygon class="iso-cls-15" points="502.4 167.2 499.9 165.8 499.9 145.8 519.7 157.2 502.4 167.2"/>
    //   </g>
    //   </g>',
    // ];
    // $view_3_house_12 = [
    //   '<g id="12.1" data-name="12.1">
    //   <g data-name="Volumen">
    //   <polygon class="iso-cls-16" points="608.8 225.8 608.8 245.8 687.9 291.5 762.2 248.7 762.2 228.7 683 182.9 608.8 225.8"/>
    //   </g>
    //   <g data-name="Rechts">
    //   <polygon class="iso-cls-17" points="762.2 248.7 687.9 291.5 687.9 271.5 762.2 228.7 762.2 248.7"/>
    //   </g>
    //   <g data-name="Links">
    //   <polygon class="iso-cls-15" points="687.9 291.5 608.8 245.8 608.8 225.8 687.9 271.5 687.9 291.5"/>
    //   </g>
    //   </g>',
    //   '<g id="12.102" data-name="12.102">
    //   <g data-name="Volumen">
    //   <polygon class="iso-cls-19" points="692.9 177.2 692.9 157.2 593.9 100.1 566.7 115.8 566.7 135.8 665.7 192.9 692.9 177.2"/>
    //   </g>
    //   <g data-name="Rechts">
    //   <polygon class="iso-cls-20" points="692.9 177.2 665.7 192.9 665.7 172.9 692.9 157.2 692.9 177.2"/>
    //   </g>
    //   <g data-name="Links">
    //   <polygon class="iso-cls-21" points="566.7 115.8 665.7 172.9 665.7 192.9 566.7 135.8 566.7 115.8"/>
    //   </g>
    //   </g>',
    //   '<g id="12.103" data-name="12.103">
    //   <g data-name="Volumen">
    //   <polygon class="iso-cls-19" points="665.7 192.9 665.7 172.9 566.7 115.8 529.6 137.2 529.6 157.2 628.6 214.4 665.7 192.9"/>
    //   </g>
    //   <g data-name="Rechts">
    //   <polygon class="iso-cls-20" points="665.7 192.9 628.6 214.4 628.6 194.4 665.7 172.9 665.7 192.9"/>
    //   </g>
    //   <g data-name="Links">
    //   <polygon class="iso-cls-21" points="529.6 137.2 628.6 194.4 628.6 214.4 529.6 157.2 529.6 137.2"/>
    //   </g>
    //   </g>',
    //   '<g id="12.101" data-name="12.101">
    //   <g data-name="Volumen">
    //   <polygon class="iso-cls-16" points="608.8 205.8 608.8 225.8 687.9 271.5 762.2 228.7 762.2 208.7 683 162.9 608.8 205.8"/>
    //   </g>
    //   <g data-name="Rechts">
    //   <polygon class="iso-cls-17" points="762.2 228.7 687.9 271.5 687.9 251.5 762.2 208.7 762.2 228.7"/>
    //   </g>
    //   <g data-name="Links">
    //   <polygon class="iso-cls-15" points="687.9 271.5 608.8 225.8 608.8 205.8 687.9 251.5 687.9 271.5"/>
    //   </g>
    //   </g>',
    //   '<g id="12.202" data-name="12.202">
    //   <g data-name="Volumen">
    //   <polygon class="iso-cls-19" points="692.9 157.2 692.9 137.2 593.9 80.1 566.7 95.8 566.7 115.8 665.7 172.9 692.9 157.2"/>
    //   </g>
    //   <g data-name="Rechts">
    //   <polygon class="iso-cls-20" points="692.9 157.2 665.7 172.9 665.7 152.9 692.9 137.2 692.9 157.2"/>
    //   </g>
    //   <g data-name="Links">
    //   <polygon class="iso-cls-21" points="566.7 95.8 665.7 152.9 665.7 172.9 566.7 115.8 566.7 95.8"/>
    //   </g>
    //   </g>',
    //   '<g id="12.203" data-name="12.203">
    //   <g data-name="Volumen">
    //   <polygon class="iso-cls-19" points="665.7 172.9 665.7 152.9 566.7 95.8 529.6 117.2 529.6 137.2 628.6 194.4 665.7 172.9"/>
    //   </g>
    //   <g data-name="Rechts">
    //   <polygon class="iso-cls-20" points="665.7 172.9 628.6 194.4 628.6 174.4 665.7 152.9 665.7 172.9"/>
    //   </g>
    //   <g data-name="Links">
    //   <polygon class="iso-cls-21" points="529.6 117.2 628.6 174.4 628.6 194.4 529.6 137.2 529.6 117.2"/>
    //   </g>
    //   </g>',
    //   '<g id="12.201" data-name="12.201">
    //   <g data-name="Volumen">
    //   <polygon class="iso-cls-16" points="608.8 185.8 608.8 205.8 687.9 251.5 762.2 208.7 762.2 188.7 683 142.9 608.8 185.8"/>
    //   </g>
    //   <g data-name="Rechts">
    //   <polygon class="iso-cls-17" points="762.2 208.7 687.9 251.5 687.9 231.5 762.2 188.7 762.2 208.7"/>
    //   </g>
    //   <g data-name="Links">
    //   <polygon class="iso-cls-15" points="687.9 251.5 608.8 205.8 608.8 185.8 687.9 231.5 687.9 251.5"/>
    //   </g>
    //   </g>',
    //   '<g id="12.302" data-name="12.302">
    //   <g data-name="Volumen">
    //   <polygon class="iso-cls-19" points="692.9 137.2 692.9 117.2 593.9 60.1 566.7 75.8 566.7 95.8 665.7 152.9 692.9 137.2"/>
    //   </g>
    //   <g data-name="Rechts">
    //   <polygon class="iso-cls-20" points="692.9 137.2 665.7 152.9 665.7 132.9 692.9 117.2 692.9 137.2"/>
    //   </g>
    //   <g data-name="Links">
    //   <polygon class="iso-cls-21" points="566.7 75.8 665.7 132.9 665.7 152.9 566.7 95.8 566.7 75.8"/>
    //   </g>
    //   </g>',
    //   '<g id="12.303" data-name="12.303">
    //   <g data-name="Volumen">
    //   <polygon class="iso-cls-19" points="665.7 152.9 665.7 132.9 566.7 75.8 529.6 97.2 529.6 117.2 628.6 174.4 665.7 152.9"/>
    //   </g>
    //   <g data-name="Rechts">
    //   <polygon class="iso-cls-20" points="665.7 152.9 628.6 174.4 628.6 154.4 665.7 132.9 665.7 152.9"/>
    //   </g>
    //   <g data-name="Links">
    //   <polygon class="iso-cls-21" points="529.6 97.2 628.6 154.4 628.6 174.4 529.6 117.2 529.6 97.2"/>
    //   </g>
    //   </g>',
    //   '<g id="12.301" data-name="12.301">
    //   <g data-name="Volumen">
    //   <polygon class="iso-cls-16" points="608.8 165.8 608.8 185.8 687.9 231.5 762.2 188.7 762.2 168.7 683 122.9 608.8 165.8"/>
    //   </g>
    //   <g data-name="Rechts">
    //   <polygon class="iso-cls-17" points="762.2 188.7 687.9 231.5 687.9 211.5 762.2 168.7 762.2 188.7"/>
    //   </g>
    //   <g data-name="Links">
    //   <polygon class="iso-cls-15" points="687.9 231.5 608.8 185.8 608.8 165.8 687.9 211.5 687.9 231.5"/>
    //   </g>
    //   </g>',
    //   '<g id="12.402" data-name="12.402">
    //   <g data-name="Volumen">
    //   <polygon class="iso-cls-19" points="692.9 117.2 692.9 97.2 593.9 40.1 566.7 55.8 566.7 75.8 665.7 132.9 692.9 117.2"/>
    //   </g>
    //   <g data-name="Rechts">
    //   <polygon class="iso-cls-20" points="692.9 117.2 665.7 132.9 665.7 112.9 692.9 97.2 692.9 117.2"/>
    //   </g>
    //   <g data-name="Links">
    //   <polygon class="iso-cls-21" points="566.7 55.8 665.7 112.9 665.7 132.9 566.7 75.8 566.7 55.8"/>
    //   </g>
    //   </g>',
    //   '<g id="12.403" data-name="12.403">
    //   <g data-name="Volumen">
    //   <polygon class="iso-cls-19" points="665.7 132.9 665.7 112.9 566.7 55.8 529.6 77.2 529.6 97.2 628.6 154.4 665.7 132.9"/>
    //   </g>
    //   <g data-name="Rechts">
    //   <polygon class="iso-cls-20" points="665.7 132.9 628.6 154.4 628.6 134.4 665.7 112.9 665.7 132.9"/>
    //   </g>
    //   <g data-name="Links">
    //   <polygon class="iso-cls-21" points="529.6 77.2 628.6 134.4 628.6 154.4 529.6 97.2 529.6 77.2"/>
    //   </g>
    //   </g>',
    //   '<g id="12.401" data-name="12.401">
    //   <g data-name="Volumen">
    //   <polygon class="iso-cls-16" points="608.8 145.8 608.8 165.8 687.9 211.5 739.9 181.5 739.9 161.5 660.7 115.8 608.8 145.8"/>
    //   </g>
    //   <g data-name="Rechts">
    //   <polygon class="iso-cls-17" points="739.9 181.5 687.9 211.5 687.9 191.5 739.9 161.5 739.9 181.5"/>
    //   </g>
    //   <g data-name="Links">
    //   <polygon class="iso-cls-15" points="687.9 211.5 608.8 165.8 608.8 145.8 687.9 191.5 687.9 211.5"/>
    //   </g>
    //   </g>',
    //   '<g id="12.502" data-name="12.502">
    //   <g data-name="Volumen">
    //   <polygon class="iso-cls-19" points="692.9 97.2 692.9 77.2 593.9 20.1 566.7 35.8 566.7 55.8 665.7 112.9 692.9 97.2"/>
    //   </g>
    //   <g data-name="Rechts">
    //   <polygon class="iso-cls-20" points="692.9 97.2 665.7 112.9 665.7 92.9 692.9 77.2 692.9 97.2"/>
    //   </g>
    //   <g data-name="Links">
    //   <polygon class="iso-cls-21" points="566.7 35.8 665.7 92.9 665.7 112.9 566.7 55.8 566.7 35.8"/>
    //   </g>
    //   </g>',
    //   '<g id="12.503" data-name="12.503">
    //   <g data-name="Volumen">
    //   <polygon class="iso-cls-19" points="665.7 112.9 665.7 92.9 566.7 35.8 529.6 57.2 529.6 77.2 628.6 134.4 665.7 112.9"/>
    //   </g>
    //   <g data-name="Rechts">
    //   <polygon class="iso-cls-20" points="665.7 112.9 628.6 134.4 628.6 114.4 665.7 92.9 665.7 112.9"/>
    //   </g>
    //   <g data-name="Links">
    //   <polygon class="iso-cls-21" points="529.6 57.2 628.6 114.4 628.6 134.4 529.6 77.2 529.6 57.2"/>
    //   </g>
    //   </g>',
    //   '<g id="12.501" data-name="12.501">
    //   <g data-name="Volumen">
    //   <polygon class="iso-cls-16" points="608.8 125.8 608.8 145.8 668.1 180.1 720.1 150.1 720.1 130.1 660.7 95.8 608.8 125.8"/>
    //   </g>
    //   <g data-name="Rechts">
    //   <polygon class="iso-cls-17" points="720.1 150.1 668.1 180.1 668.1 160.1 720.1 130.1 720.1 150.1"/>
    //   </g>
    //   <g data-name="Links">
    //   <polygon class="iso-cls-15" points="668.1 180.1 608.8 145.8 608.8 125.8 668.1 160.1 668.1 180.1"/>
    //   </g>
    //   </g>',
    //   '<g id="12.601" data-name="12.601">
    //   <g data-name="Volumen">
    //   <polygon class="iso-cls-19" points="692.9 77.2 692.9 57.2 593.9 0 529.6 37.2 529.6 57.2 628.6 114.4 692.9 77.2"/>
    //   <line class="iso-cls-19" x1="593.9" y1="0" x2="529.6" y2="37.2"/>
    //   </g>
    //   <g data-name="Rechts">
    //   <polygon class="iso-cls-20" points="692.9 77.2 628.6 114.4 628.6 94.4 692.9 57.2 692.9 77.2"/>
    //   </g>
    //   <g data-name="Links">
    //   <polygon class="iso-cls-21" points="529.6 37.2 628.6 94.4 628.6 114.4 529.6 57.2 529.6 37.2"/>
    //   </g>
    //   </g>',
    // ];
    // $view_3_townhouse_8 = [
    //   '<g data-name="8d">
    //   <g data-name="Volumen">
    //   <polygon class="iso-cls-16" points="262.4 311.5 262.4 331.5 282.1 342.9 326.7 317.2 326.7 297.2 306.9 285.8 262.4 311.5"/>
    //   </g>
    //   <g data-name="Rechts">
    //   <polygon class="iso-cls-17" points="282.1 342.9 282.1 322.9 326.7 297.2 326.7 317.2 282.1 342.9"/>
    //   </g>
    //   <g data-name="Links">
    //   <polygon class="iso-cls-15" points="282.1 342.9 282.1 322.9 262.4 311.5 262.4 331.5 282.1 342.9"/>
    //   </g>
    //   </g>',
    //   '<g data-name="8c">
    //   <g data-name="Volumen">
    //   <polygon class="iso-cls-16" points="306.9 285.8 306.9 305.8 326.7 317.2 356.4 300.1 356.4 280.1 336.6 268.7 306.9 285.8"/>
    //   </g>
    //   <g data-name="Rechts">
    //   <polygon class="iso-cls-17" points="326.7 317.2 326.7 297.2 356.4 280.1 356.4 300.1 326.7 317.2"/>
    //   </g>
    //   <g data-name="Links">
    //   <polygon class="iso-cls-15" points="326.7 317.2 326.7 297.2 306.9 285.8 306.9 305.8 326.7 317.2"/>
    //   </g>
    //   </g>',
    //   '<g data-name="8b.2">
    //   <g data-name="Rechts">
    //   <polygon class="iso-cls-17" points="346.5 268.7 391 242.9 391 282.9 376.2 291.5 376.2 311.5 346.5 328.7 346.5 268.7"/>
    //   </g>
    //   <g data-name="Links">
    //   <polygon class="iso-cls-16" points="351.4 220.1 306.9 245.8 306.9 285.8 326.7 297.2 326.7 317.2 346.5 328.7 376.2 311.5 376.2 291.5 391 282.9 391 242.9 351.4 220.1"/>
    //   <polygon class="iso-cls-15" points="346.5 268.7 306.9 245.8 306.9 285.8 326.7 297.2 326.7 317.2 346.5 328.7 346.5 268.7"/>
    //   </g>
    //   </g>',
    //   '<g data-name="8a.1">
    //   <g data-name="Volumen">
    //   <polygon class="iso-cls-16" points="346.5 268.7 306.9 245.8 262.4 271.5 262.4 311.5 282.1 322.9 282.1 342.9 301.9 354.4 346.5 328.7 346.5 268.7"/>
    //   </g>
    //   <g data-name="Rechts">
    //   <polygon class="iso-cls-17" points="301.9 294.4 346.5 268.7 346.5 328.7 301.9 354.4 301.9 294.4"/>
    //   </g>
    //   <g data-name="Links">
    //   <polygon class="iso-cls-15" points="262.4 271.5 262.4 311.5 282.1 322.9 282.1 342.9 301.9 354.4 301.9 294.4 262.4 271.5"/>
    //   </g>
    //   </g>',
    // ];
    // $view_3_townhouse_10 = [
    //   '<g data-name="10d">
    //   <g data-name="Volumen">
    //   <polygon class="iso-cls-16" points="351.4 260.1 351.4 280.1 371.2 291.5 415.8 265.8 415.8 245.8 396 234.4 351.4 260.1"/>
    //   </g>
    //   <g data-name="Rechts">
    //   <polygon class="iso-cls-17" points="371.2 291.5 371.2 271.5 415.8 245.8 415.8 265.8 371.2 291.5"/>
    //   </g>
    //   <g data-name="Links">
    //   <polygon class="iso-cls-15" points="371.2 291.5 371.2 271.5 351.4 260.1 351.4 280.1 371.2 291.5"/>
    //   </g>
    //   </g>',
    //   '<g data-name="10c">
    //   <g data-name="Volumen">
    //   <polygon class="iso-cls-16" points="396 234.4 396 254.4 415.8 265.8 445.5 248.7 445.5 228.7 425.7 217.2 396 234.4"/>
    //   </g>
    //   <g data-name="Rechts">
    //   <polygon class="iso-cls-17" points="415.8 265.8 415.8 245.8 445.5 228.7 445.5 248.7 415.8 265.8"/>
    //   </g>
    //   <g data-name="Links">
    //   <polygon class="iso-cls-15" points="415.8 265.8 415.8 245.8 396 234.4 396 254.4 415.8 265.8"/>
    //   </g>
    //   </g>',
    //   '<g data-name="10b.2">
    //   <g data-name="Rechts">
    //   <polygon class="iso-cls-17" points="435.6 217.2 480.1 191.5 480.1 231.5 465.2 240.1 465.2 260.1 435.6 277.2 435.6 217.2"/>
    //   </g>
    //   <g data-name="Links">
    //   <polygon class="iso-cls-16" points="440.5 168.7 396 194.4 396 234.4 415.8 245.8 415.8 265.8 435.6 277.2 465.2 260.1 465.2 240.1 480.1 231.5 480.1 191.5 440.5 168.7"/>
    //   <polygon class="iso-cls-15" points="435.6 217.2 396 194.4 396 234.4 415.8 245.8 415.8 265.8 435.6 277.2 435.6 217.2"/>
    //   </g>
    //   </g>',
    //   '<g data-name="10a.1">
    //   <g data-name="Volumen">
    //   <polygon class="iso-cls-16" points="435.6 217.2 396 194.4 351.4 220.1 351.4 260.1 371.2 271.5 371.2 291.5 391 302.9 435.6 277.2 435.6 217.2"/>
    //   </g>
    //   <g data-name="Rechts">
    //   <polygon class="iso-cls-17" points="391 242.9 435.6 217.2 435.6 277.2 391 302.9 391 242.9"/>
    //   </g>
    //   <g data-name="Links">
    //   <polygon class="iso-cls-15" points="351.4 220.1 351.4 260.1 371.2 271.5 371.2 291.5 391 302.9 391 242.9 351.4 220.1"/>
    //   </g>
    //   </g>',
    // ];
    // $view_3_townhouse_12 = [
    //   '<g data-name="12d">
    //   <g data-name="Volumen">
    //   <polygon class="iso-cls-16" points="440.5 208.7 440.5 228.7 460.3 240.1 504.8 214.4 504.8 194.4 485 182.9 440.5 208.7"/>
    //   </g>
    //   <g data-name="Rechts">
    //   <polygon class="iso-cls-17" points="460.3 240.1 460.3 220.1 504.8 194.4 504.8 214.4 460.3 240.1"/>
    //   </g>
    //   <g data-name="Links">
    //   <polygon class="iso-cls-15" points="460.3 240.1 460.3 220.1 440.5 208.7 440.5 228.7 460.3 240.1"/>
    //   </g>
    //   </g>',
    //   '<g data-name="12c">
    //   <g data-name="Volumen">
    //   <polygon class="iso-cls-16" points="485 182.9 485 202.9 504.8 214.4 534.5 197.2 534.5 177.2 514.7 165.8 485 182.9"/>
    //   </g>
    //   <g data-name="Rechts">
    //   <polygon class="iso-cls-17" points="504.8 214.4 504.8 194.4 534.5 177.2 534.5 197.2 504.8 214.4"/>
    //   </g>
    //   <g data-name="Links">
    //   <polygon class="iso-cls-15" points="504.8 214.4 504.8 194.4 485 182.9 485 202.9 504.8 214.4"/>
    //   </g>
    //   </g>',
    //   '<g data-name="12b.2">
    //   <g data-name="Rechts">
    //   <polygon class="iso-cls-17" points="524.6 165.8 569.2 140.1 569.2 180.1 554.3 188.7 554.3 208.7 524.6 225.8 524.6 165.8"/>
    //   </g>
    //   <g data-name="Links">
    //   <polygon class="iso-cls-16" points="529.6 117.2 485 142.9 485 182.9 504.8 194.4 504.8 214.4 524.6 225.8 554.3 208.7 554.3 188.7 569.2 180.1 569.2 140.1 529.6 117.2"/>
    //   <polygon class="iso-cls-15" points="524.6 165.8 485 142.9 485 182.9 504.8 194.4 504.8 214.4 524.6 225.8 524.6 165.8"/>
    //   </g>
    //   </g>',
    //   '<g data-name="12a.1">
    //   <g data-name="Volumen">
    //   <polygon class="iso-cls-16" points="524.6 165.8 485 142.9 440.5 168.7 440.5 208.7 460.3 220.1 460.3 240.1 480.1 251.5 524.6 225.8 524.6 165.8"/>
    //   </g>
    //   <g data-name="Rechts">
    //   <polygon class="iso-cls-17" points="480.1 191.5 524.6 165.8 524.6 225.8 480.1 251.5 480.1 191.5"/>
    //   </g>
    //   <g data-name="Links">
    //   <polygon class="iso-cls-15" points="440.5 168.7 440.5 208.7 460.3 220.1 460.3 240.1 480.1 251.5 480.1 191.5 440.5 168.7"/>
    //   </g>
    //   </g>',
    // ];

    // View 1
    $view_1_house_12 = [
      '<g id="12.1" data-name="12.1">
        <g data-name="Volumen">
          <polygon class="iso-cls-19" points="153.5 485.8 153.5 465.8 74.3 420.1 0 462.9 0 482.9 79.2 528.6 153.5 485.8"/>
        </g>
        <g data-name="Rechts">
          <polygon class="iso-cls-20" points="153.5 485.8 79.2 528.6 79.2 508.6 153.5 465.8 153.5 485.8"/>
        </g>
        <g data-name="Links">
          <polygon class="iso-cls-21" points="0 462.9 79.2 508.6 79.2 528.6 0 482.9 0 462.9"/>
        </g>
      </g>',
      '<g id="12.101" data-name="12.101">
        <g data-name="Volumen">
          <polygon class="iso-cls-19" points="153.5 465.8 153.5 445.8 74.3 400.1 0 442.9 0 462.9 79.2 508.6 153.5 465.8"/>
        </g>
        <g data-name="Rechts">
          <polygon class="iso-cls-20" points="153.5 465.8 79.2 508.6 79.2 488.6 153.5 445.8 153.5 465.8"/>
        </g>
        <g data-name="Links">
          <polygon class="iso-cls-21" points="0 442.9 79.2 488.6 79.2 508.6 0 462.9 0 442.9"/>
        </g>
      </g>',
      '<g id="12.102" data-name="12.102">
        <g data-name="Volumen">
          <polygon class="iso-cls-19" points="232.7 534.4 232.7 514.4 133.7 457.2 101.5 475.8 101.5 495.8 200.5 552.9 232.7 534.4"/>
        </g>
        <g data-name="Rechts">
          <polygon class="iso-cls-20" points="232.7 534.4 200.5 552.9 200.5 532.9 232.7 514.4 232.7 534.4"/>
        </g>
        <g data-name="Links">
          <polygon class="iso-cls-21" points="101.5 475.8 200.5 532.9 200.5 552.9 101.5 495.8 101.5 475.8"/>
        </g>
      </g>',
      '<g id="12.103" data-name="12.103">
        <g data-name="Volumen">
          <polygon class="iso-cls-19" points="200.5 552.9 200.5 532.9 101.5 475.8 69.4 494.4 69.4 514.4 168.3 571.5 200.5 552.9"/>
        </g>
        <g data-name="Rechts">
          <polygon class="iso-cls-20" points="200.5 552.9 168.3 571.5 168.3 551.5 200.5 532.9 200.5 552.9"/>
        </g>
      </g>',
      '<g id="12.201" data-name="12.201">
        <g data-name="Volumen">
          <polygon class="iso-cls-19" points="153.5 445.8 153.5 425.8 74.3 380.1 0 422.9 0 442.9 79.2 488.6 153.5 445.8"/>
        </g>
        <g data-name="Rechts">
          <polygon class="iso-cls-20" points="153.5 445.8 79.2 488.6 79.2 468.6 153.5 425.8 153.5 445.8"/>
        </g>
        <g data-name="Links">
          <polygon class="iso-cls-21" points="0 422.9 79.2 468.6 79.2 488.6 0 442.9 0 422.9"/>
        </g>
      </g>',
      '<g id="12.202" data-name="12.202">
        <g data-name="Volumen">
          <polygon class="iso-cls-19" points="232.7 514.4 232.7 494.4 133.7 437.2 101.5 455.8 101.5 475.8 200.5 532.9 232.7 514.4"/>
        </g>
        <g data-name="Rechts">
          <polygon class="iso-cls-20" points="232.7 514.4 200.5 532.9 200.5 512.9 232.7 494.4 232.7 514.4"/>
        </g>
        <g data-name="Links">
          <polygon class="iso-cls-21" points="101.5 455.8 200.5 512.9 200.5 532.9 101.5 475.8 101.5 455.8"/>
        </g>
      </g>',
      '<g id="12.203" data-name="12.203">
        <g data-name="Volumen">
          <polygon class="iso-cls-19" points="200.5 532.9 200.5 512.9 101.5 455.8 69.4 474.4 69.4 494.4 168.3 551.5 200.5 532.9"/>
        </g>
        <g data-name="Rechts">
          <polygon class="iso-cls-20" points="200.5 532.9 168.3 551.5 168.3 531.5 200.5 512.9 200.5 532.9"/>
        </g>
        <g data-name="Links">
          <polygon class="iso-cls-21" points="69.4 474.4 168.3 531.5 168.3 551.5 69.4 494.4 69.4 474.4"/>
        </g>
      </g>',
      '<g id="12.301" data-name="12.301">
        <g data-name="Volumen">
          <polygon class="iso-cls-19" points="153.5 425.8 153.5 405.8 74.3 360.1 0 402.9 0 422.9 79.2 468.6 153.5 425.8"/>
        </g>
        <g data-name="Rechts">
          <polygon class="iso-cls-20" points="153.5 425.8 79.2 468.6 79.2 448.6 153.5 405.8 153.5 425.8"/>
        </g>
        <g data-name="Links">
          <polygon class="iso-cls-21" points="0 402.9 79.2 448.6 79.2 468.6 0 422.9 0 402.9"/>
        </g>
      </g>',
      '<g id="12.302" data-name="12.302">
        <g data-name="Volumen">
          <polygon class="iso-cls-19" points="232.7 494.4 232.7 474.4 133.7 417.2 101.5 435.8 101.5 455.8 200.5 512.9 232.7 494.4"/>
        </g>
        <g data-name="Rechts">
          <polygon class="iso-cls-20" points="232.7 494.4 200.5 512.9 200.5 492.9 232.7 474.4 232.7 494.4"/>
        </g>
        <g data-name="Links">
          <polygon class="iso-cls-21" points="101.5 435.8 200.5 492.9 200.5 512.9 101.5 455.8 101.5 435.8"/>
        </g>
      </g>',
      '<g id="12.303" data-name="12.303">
        <g data-name="Volumen">
          <polygon class="iso-cls-19" points="200.5 512.9 200.5 492.9 101.5 435.8 69.4 454.4 69.4 474.4 168.3 531.5 200.5 512.9"/>
        </g>
        <g data-name="Rechts">
          <polygon class="iso-cls-20" points="200.5 512.9 168.3 531.5 168.3 511.5 200.5 492.9 200.5 512.9"/>
        </g>
        <g data-name="Links">
          <polygon class="iso-cls-21" points="69.4 454.4 168.3 511.5 168.3 531.5 69.4 474.4 69.4 454.4"/>
        </g>
      </g>',
      '<g id="12.401" data-name="12.401">
        <g data-name="Volumen">
          <polygon class="iso-cls-19" points="153.5 405.8 153.5 385.8 74.3 340.1 22.3 370.1 22.3 390.1 101.5 435.8 153.5 405.8"/>
        </g>
        <g data-name="Rechts">
          <polygon class="iso-cls-20" points="153.5 405.8 101.5 435.8 101.5 415.8 153.5 385.8 153.5 405.8"/>
        </g>
        <g data-name="Links">
          <polygon class="iso-cls-21" points="22.3 370.1 101.5 415.8 101.5 435.8 22.3 390.1 22.3 370.1"/>
        </g>
      </g>',
      '<g id="12.402" data-name="12.402">
        <g data-name="Volumen">
          <polygon class="iso-cls-19" points="232.7 474.4 232.7 454.4 133.7 397.2 101.5 415.8 101.5 435.8 200.5 492.9 232.7 474.4"/>
        </g>
        <g data-name="Rechts">
          <polygon class="iso-cls-20" points="232.7 474.4 200.5 492.9 200.5 472.9 232.7 454.4 232.7 474.4"/>
        </g>
        <g data-name="Links">
          <polygon class="iso-cls-21" points="101.5 415.8 200.5 472.9 200.5 492.9 101.5 435.8 101.5 415.8"/>
        </g>
      </g>',
      '<g id="12.403" data-name="12.403">
        <g data-name="Volumen">
          <polygon class="iso-cls-19" points="200.5 492.9 200.5 472.9 101.5 415.8 69.4 434.4 69.4 454.4 168.3 511.5 200.5 492.9"/>
        </g>
        <g data-name="Rechts">
          <polygon class="iso-cls-20" points="200.5 492.9 168.3 511.5 168.3 491.5 200.5 472.9 200.5 492.9"/>
        </g>
        <g data-name="Links">
          <polygon class="iso-cls-21" points="69.4 434.4 168.3 491.5 168.3 511.5 69.4 454.4 69.4 434.4"/>
        </g>
      </g>',
      '<g id="12.501" data-name="12.501">
        <g data-name="Volumen">
          <polygon class="iso-cls-19" points="153.5 385.8 153.5 365.8 94.1 331.5 42.1 361.5 42.1 381.5 101.5 415.8 153.5 385.8"/>
        </g>
        <g data-name="Rechts">
          <polygon class="iso-cls-20" points="153.5 385.8 101.5 415.8 101.5 395.8 153.5 365.8 153.5 385.8"/>
        </g>
        <g data-name="Links">
          <polygon class="iso-cls-21" points="42.1 361.5 101.5 395.8 101.5 415.8 42.1 381.5 42.1 361.5"/>
        </g>
      </g>',
      '<g id="12.502" data-name="12.502">
        <g data-name="Volumen">
          <polygon class="iso-cls-19" points="232.7 454.4 232.7 434.4 133.7 377.2 101.5 395.8 101.5 415.8 200.5 472.9 232.7 454.4"/>
        </g>
        <g data-name="Rechts">
          <polygon class="iso-cls-20" points="232.7 454.4 200.5 472.9 200.5 452.9 232.7 434.4 232.7 454.4"/>
        </g>
        <g data-name="Links">
          <polygon class="iso-cls-21" points="101.5 395.8 200.5 452.9 200.5 472.9 101.5 415.8 101.5 395.8"/>
        </g>
      </g>',
      '<g id="12.503" data-name="12.503">
        <g data-name="Volumen">
          <polygon class="iso-cls-19" points="200.5 472.9 200.5 452.9 101.5 395.8 69.4 414.4 69.4 434.4 168.3 491.5 200.5 472.9"/>
        </g>
        <g data-name="Rechts">
          <polygon class="iso-cls-20" points="200.5 472.9 168.3 491.5 168.3 471.5 200.5 452.9 200.5 472.9"/>
        </g>
        <g data-name="Links">
          <polygon class="iso-cls-21" points="69.4 414.4 168.3 471.5 168.3 491.5 69.4 434.4 69.4 414.4"/>
        </g>
      </g>',
      '<g id="12.601" data-name="12.601">
        <g data-name="Volumen">
          <polygon class="iso-cls-19" points="232.7 434.4 232.7 414.4 133.7 357.2 69.4 394.4 69.4 414.4 168.3 471.5 232.7 434.4"/>
        </g>
        <g data-name="Rechts">
          <polygon class="iso-cls-20" points="232.7 434.4 168.3 471.5 168.3 451.5 232.7 414.4 232.7 434.4"/>
        </g>
        <g data-name="Links">
          <polygon class="iso-cls-21" points="69.4 394.4 168.3 451.5 168.3 471.5 69.4 414.4 69.4 394.4"/>
        </g>
      </g>',
    ];
    $view_1_house_10 = [
      '<g id="10.2" data-name="10.2">
        <g data-name="Volumen">
          <polygon class="iso-cls-19" points="217.8 420.1 242.6 434.4 277.2 414.4 277.2 394.4 198 348.7 131.2 387.2 131.2 407.2 185.6 438.6 217.8 420.1"/>
        </g>
        <g data-name="Rechts">
          <polygon class="iso-cls-20" points="277.2 414.4 242.6 434.4 242.6 414.4 277.2 394.4 277.2 414.4"/>
          <polygon class="iso-cls-20" points="217.8 420.1 185.6 438.6 185.6 418.6 217.8 400.1 217.8 420.1"/>
        </g>
        <g data-name="Links">
          <polygon class="iso-cls-21" points="131.2 387.2 185.6 418.6 185.6 438.6 131.2 407.2 131.2 387.2"/>
          <polygon class="iso-cls-21" points="242.6 434.4 217.8 420.1 217.8 400.1 242.6 414.4 242.6 434.4"/>
        </g>
      </g>',
      '<g id="10.3" data-name="10.3">
        <g data-name="Volumen">
          <polygon class="iso-cls-19" points="262.4 425.8 217.8 400.1 163.4 431.5 163.4 451.5 207.9 477.2 262.4 445.8 262.4 425.8"/>
        </g>
        <g data-name="Rechts">
          <polygon class="iso-cls-20" points="207.9 457.2 262.4 425.8 262.4 445.8 207.9 477.2 207.9 457.2"/>
        </g>
        <g data-name="Links">
          <polygon class="iso-cls-21" points="207.9 477.2 163.4 451.5 163.4 431.5 207.9 457.2 207.9 477.2"/>
        </g>
      </g>',
      '<g id="10.1" data-name="10.1">
        <g data-name="Volumen">
          <polygon class="iso-cls-19" points="188.1 445.8 180.7 441.5 185.6 438.6 185.6 418.7 131.2 387.2 74.3 420.1 74.3 440.1 153.5 485.8 188.1 465.8 188.1 445.8"/>
          <polygon class="iso-cls-20" points="153.5 465.8 188.1 445.8 188.1 465.8 153.5 485.8 153.5 465.8"/>
        </g>
        <g data-name="Rechts">
          <polygon class="iso-cls-20" points="180.7 441.5 185.6 438.6 185.6 418.7 163.4 431.5 180.7 441.5"/>
        </g>
        <g data-name="Links">
          <polygon class="iso-cls-21" points="153.5 485.8 74.3 440.1 74.3 420.1 153.5 465.8 153.5 485.8"/>
        </g>
      </g>',
      '<g id="10.102" data-name="10.102">
        <g data-name="Volumen">
          <polygon class="iso-cls-19" points="217.8 400.1 242.6 414.4 277.2 394.4 277.2 374.4 198 328.7 131.2 367.2 131.2 387.2 185.6 418.6 217.8 400.1"/>
        </g>
        <g data-name="Rechts">
          <polygon class="iso-cls-20" points="277.2 394.4 242.6 414.4 242.6 394.4 277.2 374.4 277.2 394.4"/>
          <polygon class="iso-cls-20" points="217.8 400.1 185.6 418.6 185.6 398.7 217.8 380.1 217.8 400.1"/>
        </g>
        <g data-name="Links">
          <polygon class="iso-cls-21" points="131.2 367.2 185.6 398.7 185.6 418.6 131.2 387.2 131.2 367.2"/>
          <polygon class="iso-cls-21" points="242.6 414.4 217.8 400.1 217.8 380.1 242.6 394.4 242.6 414.4"/>
        </g>
      </g>',
      '<g id="10.103" data-name="10.103">
        <g data-name="Volumen">
          <polygon class="iso-cls-19" points="262.4 405.8 217.8 380.1 163.4 411.5 163.4 431.5 207.9 457.2 262.4 425.8 262.4 405.8"/>
        </g>
        <g data-name="Rechts">
          <polygon class="iso-cls-20" points="207.9 437.2 262.4 405.8 262.4 425.8 207.9 457.2 207.9 437.2"/>
        </g>
        <g data-name="Links">
          <polygon class="iso-cls-21" points="207.9 457.2 163.4 431.5 163.4 411.5 207.9 437.2 207.9 457.2"/>
        </g>
      </g>',
      '<g id="10.101" data-name="10.101">
        <g data-name="Volumen">
          <polygon class="iso-cls-19" points="188.1 425.8 180.7 421.5 185.6 418.7 185.6 398.7 131.2 367.2 74.3 400.1 74.3 420.1 153.5 465.8 188.1 445.8 188.1 425.8"/>
          <polygon class="iso-cls-20" points="153.5 445.8 188.1 425.8 188.1 445.8 153.5 465.8 153.5 445.8"/>
        </g>
        <g data-name="Rechts">
          <polygon class="iso-cls-20" points="180.7 421.5 185.6 418.7 185.6 398.7 163.4 411.5 180.7 421.5"/>
        </g>
        <g data-name="Links">
          <polygon class="iso-cls-21" points="153.5 465.8 74.3 420.1 74.3 400.1 153.5 445.8 153.5 465.8"/>
        </g>
      </g>',
      '<g id="10.202" data-name="10.202">
        <g data-name="Volumen">
          <polygon class="iso-cls-19" points="217.8 380.1 242.6 394.4 277.2 374.4 277.2 354.4 198 308.7 131.2 347.2 131.2 367.2 185.6 398.7 217.8 380.1"/>
        </g>
        <g data-name="Rechts">
          <polygon class="iso-cls-20" points="277.2 374.4 242.6 394.4 242.6 374.4 277.2 354.4 277.2 374.4"/>
          <polygon class="iso-cls-20" points="217.8 380.1 185.6 398.7 185.6 378.7 217.8 360.1 217.8 380.1"/>
        </g>
        <g data-name="Links">
          <polygon class="iso-cls-21" points="131.2 347.2 185.6 378.7 185.6 398.7 131.2 367.2 131.2 347.2"/>
          <polygon class="iso-cls-21" points="242.6 394.4 217.8 380.1 217.8 360.1 242.6 374.4 242.6 394.4"/>
        </g>
      </g>',
      '<g id="10.203" data-name="10.203">
        <g data-name="Volumen">
          <polygon class="iso-cls-19" points="262.4 385.8 217.8 360.1 163.4 391.5 163.4 411.5 207.9 437.2 262.4 405.8 262.4 385.8"/>
        </g>
        <g data-name="Rechts">
          <polygon class="iso-cls-20" points="207.9 417.2 262.4 385.8 262.4 405.8 207.9 437.2 207.9 417.2"/>
        </g>
        <g data-name="Links">
          <polygon class="iso-cls-21" points="207.9 437.2 163.4 411.5 163.4 391.5 207.9 417.2 207.9 437.2"/>
        </g>
      </g>',
      '<g id="10.201" data-name="10.201">
        <g data-name="Volumen">
          <polygon class="iso-cls-19" points="188.1 405.8 180.7 401.5 185.6 398.7 185.6 378.7 131.2 347.2 74.3 380.1 74.3 400.1 153.5 445.8 188.1 425.8 188.1 405.8"/>
          <polygon class="iso-cls-20" points="153.5 425.8 188.1 405.8 188.1 425.8 153.5 445.8 153.5 425.8"/>
        </g>
        <g data-name="Rechts">
          <polygon class="iso-cls-20" points="180.7 401.5 185.6 398.7 185.6 378.7 163.4 391.5 180.7 401.5"/>
        </g>
        <g data-name="Links">
          <polygon class="iso-cls-21" points="153.5 445.8 74.3 400.1 74.3 380.1 153.5 425.8 153.5 445.8"/>
        </g>
      </g>',
      '<g id="10.302" data-name="10.302">
        <g data-name="Volumen">
          <polygon class="iso-cls-19" points="217.8 360.1 242.6 374.4 277.2 354.4 277.2 334.4 198 288.7 131.2 327.2 131.2 347.2 185.6 378.7 217.8 360.1"/>
        </g>
        <g data-name="Rechts">
          <polygon class="iso-cls-20" points="277.2 354.4 242.6 374.4 242.6 354.4 277.2 334.4 277.2 354.4"/>
          <polygon class="iso-cls-20" points="217.8 360.1 185.6 378.7 185.6 358.7 217.8 340.1 217.8 360.1"/>
        </g>
        <g data-name="Links">
          <polygon class="iso-cls-21" points="131.2 327.2 185.6 358.7 185.6 378.7 131.2 347.2 131.2 327.2"/>
          <polygon class="iso-cls-21" points="242.6 374.4 217.8 360.1 217.8 340.1 242.6 354.4 242.6 374.4"/>
        </g>
      </g>',
      '<g id="10.303" data-name="10.303">
        <g data-name="Volumen">
          <polygon class="iso-cls-19" points="262.4 365.8 217.8 340.1 163.4 371.5 163.4 391.5 207.9 417.2 262.4 385.8 262.4 365.8"/>
        </g>
        <g data-name="Rechts">
          <polygon class="iso-cls-20" points="207.9 397.2 262.4 365.8 262.4 385.8 207.9 417.2 207.9 397.2"/>
        </g>
        <g data-name="Links">
          <polygon class="iso-cls-21" points="207.9 417.2 163.4 391.5 163.4 371.5 207.9 397.2 207.9 417.2"/>
        </g>
      </g>',
      '<g id="10.301" data-name="10.301">
        <g data-name="Volumen">
          <polygon class="iso-cls-19" points="188.1 385.8 180.7 381.5 185.6 378.7 185.6 358.7 131.2 327.2 74.3 360.1 74.3 380.1 153.5 425.8 188.1 405.8 188.1 385.8"/>
          <polygon class="iso-cls-20" points="153.5 405.8 188.1 385.8 188.1 405.8 153.5 425.8 153.5 405.8"/>
        </g>
        <g data-name="Rechts">
          <polygon class="iso-cls-20" points="180.7 381.5 185.6 378.7 185.6 358.7 163.4 371.5 180.7 381.5"/>
        </g>
        <g data-name="Links">
          <polygon class="iso-cls-21" points="153.5 425.8 74.3 380.1 74.3 360.1 153.5 405.8 153.5 425.8"/>
        </g>
      </g>',
      '<g id="10.402" data-name="10.402">
        <g data-name="Volumen">
          <polygon class="iso-cls-19" points="217.8 340.1 242.6 354.4 277.2 334.4 277.2 314.4 198 268.7 131.2 307.2 131.2 327.2 185.6 358.7 217.8 340.1"/>
        </g>
        <g data-name="Rechts">
          <polygon class="iso-cls-20" points="277.2 334.4 242.6 354.4 242.6 334.4 277.2 314.4 277.2 334.4"/>
          <polygon class="iso-cls-20" points="217.8 340.1 185.6 358.7 185.6 338.7 217.8 320.1 217.8 340.1"/>
        </g>
        <g data-name="Links">
          <polygon class="iso-cls-21" points="131.2 307.2 185.6 338.7 185.6 358.7 131.2 327.2 131.2 307.2"/>
          <polygon class="iso-cls-21" points="242.6 354.4 217.8 340.1 217.8 320.1 242.6 334.4 242.6 354.4"/>
        </g>
      </g>',
      '<g id="10.403" data-name="10.403">
        <g data-name="Volumen">
          <polygon class="iso-cls-19" points="262.4 345.8 217.8 320.1 163.4 351.5 163.4 371.5 207.9 397.2 262.4 365.8 262.4 345.8"/>
        </g>
        <g data-name="Rechts">
          <polygon class="iso-cls-20" points="207.9 377.2 262.4 345.8 262.4 365.8 207.9 397.2 207.9 377.2"/>
        </g>
        <g data-name="Links">
          <polygon class="iso-cls-21" points="207.9 397.2 163.4 371.5 163.4 351.5 207.9 377.2 207.9 397.2"/>
        </g>
      </g>',
      '<g id="10.401" data-name="10.401">
        <g data-name="Volumen">
          <polygon class="iso-cls-19" points="188.1 365.8 180.7 361.5 185.6 358.7 185.6 338.7 131.2 307.2 74.3 340.1 74.3 360.1 153.5 405.8 188.1 385.8 188.1 365.8"/>
          <polygon class="iso-cls-20" points="153.5 385.8 188.1 365.8 188.1 385.8 153.5 405.8 153.5 385.8"/>
        </g>
        <g data-name="Rechts">
          <polygon class="iso-cls-20" points="180.7 361.5 185.6 358.7 185.6 338.7 163.4 351.5 180.7 361.5"/>
        </g>
        <g data-name="Links">
          <polygon class="iso-cls-21" points="153.5 405.8 74.3 360.1 74.3 340.1 153.5 385.8 153.5 405.8"/>
        </g>
      </g>',
      '<g id="10.502" data-name="10.502">
        <g data-name="Volumen">
          <polygon class="iso-cls-19" points="217.8 320.1 242.6 334.4 277.2 314.4 277.2 294.4 217.8 260.1 151 298.7 151 318.7 185.6 338.7 217.8 320.1"/>
        </g>
        <g data-name="Rechts">
          <polygon class="iso-cls-20" points="277.2 314.4 242.6 334.4 242.6 314.4 277.2 294.4 277.2 314.4"/>
          <polygon class="iso-cls-20" points="217.8 320.1 185.6 338.7 185.6 318.7 217.8 300.1 217.8 320.1"/>
        </g>
        <g data-name="Links">
          <polygon class="iso-cls-21" points="151 298.7 185.6 318.7 185.6 338.7 151 318.7 151 298.7"/>
          <polygon class="iso-cls-21" points="242.6 334.4 217.8 320.1 217.8 300.1 242.6 314.4 242.6 334.4"/>
        </g>
      </g>',
      '<g id="10.503" data-name="10.503">
        <g data-name="Volumen">
          <polygon class="iso-cls-19" points="262.4 325.8 217.8 300.1 163.4 331.5 163.4 351.5 207.9 377.2 262.4 345.8 262.4 325.8"/>
        </g>
        <g data-name="Rechts">
          <polygon class="iso-cls-20" points="207.9 357.2 262.4 325.8 262.4 345.8 207.9 377.2 207.9 357.2"/>
        </g>
        <g data-name="Links">
          <polygon class="iso-cls-21" points="207.9 377.2 163.4 351.5 163.4 331.5 207.9 357.2 207.9 377.2"/>
        </g>
      </g>',
      '<g id="10.501" data-name="10.501">
        <g data-name="Volumen">
          <polygon class="iso-cls-19" points="188.1 345.8 180.7 341.5 185.6 338.7 185.6 318.7 151 298.7 94.1 331.5 94.1 351.5 153.5 385.8 188.1 365.8 188.1 345.8"/>
          <polygon class="iso-cls-20" points="153.5 365.8 188.1 345.8 188.1 365.8 153.5 385.8 153.5 365.8"/>
        </g>
        <g data-name="Rechts">
          <polygon class="iso-cls-20" points="180.7 341.5 185.6 338.7 185.6 318.7 163.4 331.5 180.7 341.5"/>
        </g>
        <g data-name="Links">
          <polygon class="iso-cls-21" points="153.5 385.8 94.1 351.5 94.1 331.5 153.5 365.8 153.5 385.8"/>
        </g>
      </g>',
      '<g id="10.602" data-name="10.602">
        <g data-name="Volumen">
          <polygon class="iso-cls-19" points="262.4 305.8 259.9 304.4 277.2 294.4 277.2 274.4 217.8 240.1 151 278.7 151 298.7 230.2 344.4 262.4 325.8 262.4 305.8"/>
        </g>
        <g data-name="Rechts">
          <polygon class="iso-cls-20" points="230.2 324.4 262.4 305.8 262.4 325.8 230.2 344.4 230.2 324.4"/>
          <polygon class="iso-cls-20" points="259.9 304.4 277.2 294.4 277.2 274.4 242.6 294.4 259.9 304.4"/>
        </g>
        <g data-name="Links">
          <polygon class="iso-cls-21" points="230.2 344.4 151 298.7 151 278.7 230.2 324.4 230.2 344.4"/>
        </g>
      </g>',
      '<g id="10.601" data-name="10.601">
        <g data-name="Volumen">
          <polygon class="iso-cls-19" points="188.1 345.8 207.9 357.2 230.2 344.4 230.2 324.4 151 278.7 42.1 341.5 42.1 361.5 101.5 395.8 188.1 345.8"/>
        </g>
        <g data-name="Rechts">
          <polygon class="iso-cls-20" points="230.2 344.4 207.9 357.2 207.9 337.2 230.2 324.4 230.2 344.4"/>
          <polygon class="iso-cls-20" points="188.1 345.8 101.5 395.8 101.5 375.8 188.1 325.8 188.1 345.8"/>
        </g>
        <g data-name="Links">
          <polygon class="iso-cls-21" points="42.1 341.5 101.5 375.8 101.5 395.8 42.1 361.5 42.1 341.5"/>
          <polygon class="iso-cls-21" points="207.9 357.2 188.1 345.8 188.1 325.8 207.9 337.2 207.9 357.2"/>
        </g>
      </g>',
    ];
    $view_1_house_8 = [
      '<g id="8.2" data-name="8.2">
        <g data-name="Volumen">
          <polygon class="iso-cls-19" points="341.5 348.7 366.3 362.9 400.9 342.9 400.9 322.9 321.7 277.2 254.9 315.8 254.9 335.8 309.4 367.2 341.5 348.7"/>
        </g>
        <g data-name="Rechts">
          <polygon class="iso-cls-20" points="400.9 342.9 366.3 362.9 366.3 342.9 400.9 322.9 400.9 342.9"/>
          <polygon class="iso-cls-20" points="341.5 348.7 309.4 367.2 309.4 347.2 341.5 328.7 341.5 348.7"/>
        </g>
        <g data-name="Links">
          <polygon class="iso-cls-21" points="254.9 315.8 309.4 347.2 309.4 367.2 254.9 335.8 254.9 315.8"/>
          <polygon class="iso-cls-21" points="366.3 362.9 341.5 348.7 341.5 328.7 366.3 342.9 366.3 362.9"/>
        </g>
      </g>',
      '<g id="8.3" data-name="8.3">
        <g data-name="Volumen">
          <polygon class="iso-cls-19" points="386.1 354.4 341.5 328.7 287.1 360.1 287.1 380.1 331.6 405.8 386.1 374.4 386.1 354.4"/>
        </g>
        <g data-name="Rechts">
          <polygon class="iso-cls-20" points="331.6 385.8 386.1 354.4 386.1 374.4 331.6 405.8 331.6 385.8"/>
        </g>
        <g data-name="Links">
          <polygon class="iso-cls-21" points="331.6 405.8 287.1 380.1 287.1 360.1 331.6 385.8 331.6 405.8"/>
        </g>
      </g>',
      '<g id="8.1" data-name="8.1">
        <g data-name="Volumen">
          <polygon class="iso-cls-19" points="311.8 374.4 304.4 370.1 309.4 367.2 309.4 347.2 254.9 315.8 198 348.7 198 368.7 277.2 414.4 311.8 394.4 311.8 374.4"/>
          <polygon class="iso-cls-20" points="277.2 394.4 311.8 374.4 311.8 394.4 277.2 414.4 277.2 394.4"/>
        </g>
        <g data-name="Rechts">
          <polygon class="iso-cls-20" points="304.4 370.1 309.4 367.2 309.4 347.2 287.1 360.1 304.4 370.1"/>
        </g>
        <g data-name="Links">
          <polygon class="iso-cls-21" points="277.2 414.4 198 368.7 198 348.7 277.2 394.4 277.2 414.4"/>
        </g>
      </g>',
      '<g id="8.102" data-name="8.102">
        <g data-name="Volumen">
          <polygon class="iso-cls-19" points="341.5 328.7 366.3 342.9 400.9 322.9 400.9 302.9 321.7 257.2 254.9 295.8 254.9 315.8 309.4 347.2 341.5 328.7"/>
        </g>
        <g data-name="Rechts">
          <polygon class="iso-cls-20" points="400.9 322.9 366.3 342.9 366.3 322.9 400.9 302.9 400.9 322.9"/>
          <polygon class="iso-cls-20" points="341.5 328.7 309.4 347.2 309.4 327.2 341.5 308.7 341.5 328.7"/>
        </g>
        <g data-name="Links">
          <polygon class="iso-cls-21" points="254.9 295.8 309.4 327.2 309.4 347.2 254.9 315.8 254.9 295.8"/>
          <polygon class="iso-cls-21" points="366.3 342.9 341.5 328.7 341.5 308.7 366.3 322.9 366.3 342.9"/>
        </g>
      </g>',
      '<g id="8.103" data-name="8.103">
        <g data-name="Volumen">
          <polygon class="iso-cls-19" points="386.1 334.4 341.5 308.7 287.1 340.1 287.1 360.1 331.6 385.8 386.1 354.4 386.1 334.4"/>
        </g>
        <g data-name="Rechts">
          <polygon class="iso-cls-20" points="331.6 365.8 386.1 334.4 386.1 354.4 331.6 385.8 331.6 365.8"/>
        </g>
        <g data-name="Links">
          <polygon class="iso-cls-21" points="331.6 385.8 287.1 360.1 287.1 340.1 331.6 365.8 331.6 385.8"/>
        </g>
      </g>',
      '<g id="8.101" data-name="8.101">
        <g data-name="Volumen">
          <polygon class="iso-cls-19" points="311.8 354.4 304.4 350.1 309.4 347.2 309.4 327.2 254.9 295.8 198 328.7 198 348.7 277.2 394.4 311.8 374.4 311.8 354.4"/>
          <polygon class="iso-cls-20" points="277.2 374.4 311.8 354.4 311.8 374.4 277.2 394.4 277.2 374.4"/>
        </g>
        <g data-name="Rechts">
          <polygon class="iso-cls-20" points="304.4 350.1 309.4 347.2 309.4 327.2 287.1 340.1 304.4 350.1"/>
        </g>
        <g data-name="Links">
          <polygon class="iso-cls-21" points="277.2 394.4 198 348.7 198 328.7 277.2 374.4 277.2 394.4"/>
        </g>
      </g>',
      '<g id="8.202" data-name="8.202">
        <g data-name="Volumen">
          <polygon class="iso-cls-19" points="341.5 308.7 366.3 322.9 400.9 302.9 400.9 282.9 321.7 237.2 254.9 275.8 254.9 295.8 309.4 327.2 341.5 308.7"/>
        </g>
        <g data-name="Rechts">
          <polygon class="iso-cls-20" points="400.9 302.9 366.3 322.9 366.3 302.9 400.9 282.9 400.9 302.9"/>
          <polygon class="iso-cls-20" points="341.5 308.7 309.4 327.2 309.4 307.2 341.5 288.7 341.5 308.7"/>
        </g>
        <g data-name="Links">
          <polygon class="iso-cls-21" points="254.9 275.8 309.4 307.2 309.4 327.2 254.9 295.8 254.9 275.8"/>
          <polygon class="iso-cls-21" points="366.3 322.9 341.5 308.7 341.5 288.7 366.3 302.9 366.3 322.9"/>
        </g>
      </g>',
      '<g id="8.203" data-name="8.203">
        <g data-name="Volumen">
          <polygon class="iso-cls-19" points="386.1 314.4 341.5 288.7 287.1 320.1 287.1 340.1 331.6 365.8 386.1 334.4 386.1 314.4"/>
        </g>
        <g data-name="Rechts">
          <polygon class="iso-cls-20" points="331.6 345.8 386.1 314.4 386.1 334.4 331.6 365.8 331.6 345.8"/>
        </g>
        <g data-name="Links">
          <polygon class="iso-cls-21" points="331.6 365.8 287.1 340.1 287.1 320.1 331.6 345.8 331.6 365.8"/>
        </g>
      </g>',
      '<g id="8.201" data-name="8.201">
        <g data-name="Volumen">
          <polygon class="iso-cls-19" points="311.8 334.4 304.4 330.1 309.4 327.2 309.4 307.2 254.9 275.8 198 308.7 198 328.7 277.2 374.4 311.8 354.4 311.8 334.4"/>
          <polygon class="iso-cls-20" points="277.2 354.4 311.8 334.4 311.8 354.4 277.2 374.4 277.2 354.4"/>
        </g>
        <g data-name="Rechts">
          <polygon class="iso-cls-20" points="304.4 330.1 309.4 327.2 309.4 307.2 287.1 320.1 304.4 330.1"/>
        </g>
        <g data-name="Links">
          <polygon class="iso-cls-21" points="277.2 374.4 198 328.7 198 308.7 277.2 354.4 277.2 374.4"/>
        </g>
      </g>',
      '<g id="8.302" data-name="8.302">
        <g data-name="Volumen">
          <polygon class="iso-cls-19" points="341.5 288.7 366.3 302.9 400.9 282.9 400.9 262.9 321.7 217.2 254.9 255.8 254.9 275.8 309.4 307.2 341.5 288.7"/>
        </g>
        <g data-name="Rechts">
          <polygon class="iso-cls-20" points="400.9 282.9 366.3 302.9 366.3 282.9 400.9 262.9 400.9 282.9"/>
          <polygon class="iso-cls-20" points="341.5 288.7 309.4 307.2 309.4 287.2 341.5 268.7 341.5 288.7"/>
        </g>
        <g data-name="Links">
          <polygon class="iso-cls-21" points="254.9 255.8 309.4 287.2 309.4 307.2 254.9 275.8 254.9 255.8"/>
          <polygon class="iso-cls-21" points="366.3 302.9 341.5 288.7 341.5 268.7 366.3 282.9 366.3 302.9"/>
        </g>
      </g>',
      '<g id="8.303" data-name="8.303">
        <g data-name="Volumen">
          <polygon class="iso-cls-19" points="386.1 294.4 341.5 268.7 287.1 300.1 287.1 320.1 331.6 345.8 386.1 314.4 386.1 294.4"/>
        </g>
        <g data-name="Rechts">
          <polygon class="iso-cls-20" points="331.6 325.8 386.1 294.4 386.1 314.4 331.6 345.8 331.6 325.8"/>
        </g>
        <g data-name="Links">
          <polygon class="iso-cls-21" points="331.6 345.8 287.1 320.1 287.1 300.1 331.6 325.8 331.6 345.8"/>
        </g>
      </g>',
      '<g id="8.301" data-name="8.301">
        <g data-name="Volumen">
          <polygon class="iso-cls-19" points="311.8 314.4 304.4 310.1 309.4 307.2 309.4 287.2 254.9 255.8 198 288.7 198 308.7 277.2 354.4 311.8 334.4 311.8 314.4"/>
          <polygon class="iso-cls-20" points="277.2 334.4 311.8 314.4 311.8 334.4 277.2 354.4 277.2 334.4"/>
        </g>
        <g data-name="Rechts">
          <polygon class="iso-cls-20" points="304.4 310.1 309.4 307.2 309.4 287.2 287.1 300.1 304.4 310.1"/>
        </g>
        <g data-name="Links">
          <polygon class="iso-cls-21" points="277.2 354.4 198 308.7 198 288.7 277.2 334.4 277.2 354.4"/>
        </g>
      </g>',
      '<g id="8.402" data-name="8.402">
        <g data-name="Volumen">
          <polygon class="iso-cls-19" points="341.5 268.7 366.3 282.9 400.9 262.9 400.9 242.9 321.7 197.2 254.9 235.8 254.9 255.8 309.4 287.2 341.5 268.7"/>
        </g>
        <g data-name="Rechts">
          <polygon class="iso-cls-20" points="400.9 262.9 366.3 282.9 366.3 262.9 400.9 242.9 400.9 262.9"/>
          <polygon class="iso-cls-20" points="341.5 268.7 309.4 287.2 309.4 267.2 341.5 248.7 341.5 268.7"/>
        </g>
        <g data-name="Links">
          <polygon class="iso-cls-21" points="254.9 235.8 309.4 267.2 309.4 287.2 254.9 255.8 254.9 235.8"/>
          <polygon class="iso-cls-21" points="366.3 282.9 341.5 268.7 341.5 248.7 366.3 262.9 366.3 282.9"/>
        </g>
      </g>',
      '<g id="8.403" data-name="8.403">
        <g data-name="Volumen">
          <polygon class="iso-cls-19" points="386.1 274.4 341.5 248.7 287.1 280.1 287.1 300.1 331.6 325.8 386.1 294.4 386.1 274.4"/>
        </g>
        <g data-name="Rechts">
          <polygon class="iso-cls-20" points="331.6 305.8 386.1 274.4 386.1 294.4 331.6 325.8 331.6 305.8"/>
        </g>
        <g data-name="Links">
          <polygon class="iso-cls-21" points="331.6 325.8 287.1 300.1 287.1 280.1 331.6 305.8 331.6 325.8"/>
        </g>
      </g>',
      '<g id="8.401" data-name="8.401">
        <g data-name="Volumen">
          <polygon class="iso-cls-19" points="311.8 294.4 304.4 290.1 309.4 287.2 309.4 267.2 254.9 235.8 198 268.7 198 288.7 277.2 334.4 311.8 314.4 311.8 294.4"/>
          <polygon class="iso-cls-20" points="277.2 314.4 311.8 294.4 311.8 314.4 277.2 334.4 277.2 314.4"/>
        </g>
        <g data-name="Rechts">
          <polygon class="iso-cls-20" points="304.4 290.1 309.4 287.2 309.4 267.2 287.1 280.1 304.4 290.1"/>
        </g>
        <g data-name="Links">
          <polygon class="iso-cls-21" points="277.2 334.4 198 288.7 198 268.7 277.2 314.4 277.2 334.4"/>
        </g>
      </g>',
      '<g id="8.502" data-name="8.502">
        <g data-name="Volumen">
          <polygon class="iso-cls-19" points="341.5 248.7 366.3 262.9 400.9 242.9 400.9 222.9 341.5 188.7 274.7 227.2 274.7 247.2 309.4 267.2 341.5 248.7"/>
        </g>
        <g data-name="Rechts">
          <polygon class="iso-cls-20" points="400.9 242.9 366.3 262.9 366.3 242.9 400.9 222.9 400.9 242.9"/>
          <polygon class="iso-cls-20" points="341.5 248.7 309.4 267.2 309.4 247.2 341.5 228.7 341.5 248.7"/>
        </g>
        <g data-name="Links">
          <polygon class="iso-cls-21" points="274.7 227.2 309.4 247.2 309.4 267.2 274.7 247.2 274.7 227.2"/>
          <polygon class="iso-cls-21" points="366.3 262.9 341.5 248.7 341.5 228.7 366.3 242.9 366.3 262.9"/>
        </g>
      </g>',
      '<g id="8.503" data-name="8.503">
        <g data-name="Volumen">
          <polygon class="iso-cls-19" points="386.1 254.4 341.5 228.7 287.1 260.1 287.1 280.1 331.6 305.8 386.1 274.4 386.1 254.4"/>
        </g>
        <g data-name="Rechts">
          <polygon class="iso-cls-20" points="331.6 285.8 386.1 254.4 386.1 274.4 331.6 305.8 331.6 285.8"/>
        </g>
        <g data-name="Links">
          <polygon class="iso-cls-21" points="331.6 305.8 287.1 280.1 287.1 260.1 331.6 285.8 331.6 305.8"/>
        </g>
      </g>',
      '<g id="8.501" data-name="8.501">
        <g data-name="Volumen">
          <polygon class="iso-cls-19" points="311.8 274.4 304.4 270.1 309.4 267.2 309.4 247.2 274.7 227.2 217.8 260.1 217.8 280.1 277.2 314.4 311.8 294.4 311.8 274.4"/>
          <polygon class="iso-cls-20" points="277.2 294.4 311.8 274.4 311.8 294.4 277.2 314.4 277.2 294.4"/>
        </g>
        <g data-name="Rechts">
          <polygon class="iso-cls-20" points="304.4 270.1 309.4 267.2 309.4 247.2 287.1 260.1 304.4 270.1"/>
        </g>
        <g data-name="Links">
          <polygon class="iso-cls-21" points="277.2 314.4 217.8 280.1 217.8 260.1 277.2 294.4 277.2 314.4"/>
        </g>
      </g>',
      '<g id="8.602" data-name="8.602">
        <g data-name="Volumen">
          <polygon class="iso-cls-19" points="386.1 234.4 383.6 232.9 400.9 222.9 400.9 202.9 341.5 168.7 274.7 207.2 274.7 227.2 353.9 272.9 386.1 254.4 386.1 234.4"/>
        </g>
        <g data-name="Rechts">
          <polygon class="iso-cls-20" points="353.9 252.9 386.1 234.4 386.1 254.4 353.9 272.9 353.9 252.9"/>
          <polygon class="iso-cls-20" points="383.6 232.9 400.9 222.9 400.9 202.9 366.3 222.9 383.6 232.9"/>
        </g>
        <g data-name="Links">
          <polygon class="iso-cls-21" points="353.9 272.9 274.7 227.2 274.7 207.2 353.9 252.9 353.9 272.9"/>
        </g>
      </g>',
      '<g id="8.601" data-name="8.601">
        <g data-name="Volumen">
          <polygon class="iso-cls-19" points="311.8 274.4 331.6 285.8 353.9 272.9 353.9 252.9 274.7 207.2 217.8 240.1 217.8 260.1 277.2 294.4 311.8 274.4"/>
        </g>
        <g data-name="Rechts">
          <polygon class="iso-cls-20" points="353.9 272.9 331.6 285.8 331.6 265.8 353.9 252.9 353.9 272.9"/>
          <polygon class="iso-cls-20" points="311.8 274.4 277.2 294.4 277.2 274.4 311.8 254.4 311.8 274.4"/>
        </g>
        <g data-name="Links">
          <polygon class="iso-cls-21" points="217.8 240.1 277.2 274.4 277.2 294.4 217.8 260.1 217.8 240.1"/>
          <polygon class="iso-cls-21" points="331.6 285.8 311.8 274.4 311.8 254.4 331.6 265.8 331.6 285.8"/>
        </g>
      </g>',
    ];
    $view_1_townhouse_8 = [
      '<g data-name="8d">
        <g data-name="Volumen">
          <polygon class="iso-cls-16" points="435.6 394.4 435.6 414.4 455.3 425.8 499.9 400.1 499.9 380.1 480.1 368.7 435.6 394.4"/>
        </g>
        <g data-name="Rechts">
          <polygon class="iso-cls-17" points="455.3 425.8 455.3 405.8 499.9 380.1 499.9 400.1 455.3 425.8"/>
        </g>
        <g data-name="Links">
          <polygon class="iso-cls-15" points="455.3 425.8 455.3 405.8 435.6 394.4 435.6 414.4 455.3 425.8"/>
        </g>
      </g>',
      '<g data-name="8c">
        <g data-name="Volumen">
          <polygon class="iso-cls-16" points="405.9 411.5 405.9 431.5 425.7 442.9 455.4 425.8 455.4 405.8 435.6 394.4 405.9 411.5"/>
        </g>
        <g data-name="Rechts">
          <polygon class="iso-cls-17" points="425.7 442.9 425.7 422.9 455.4 405.8 455.4 425.8 425.7 442.9"/>
        </g>
        <g data-name="Links">
          <polygon class="iso-cls-15" points="425.7 442.9 425.7 422.9 405.9 411.5 405.9 431.5 425.7 442.9"/>
        </g>
      </g>',
      '<g data-name="8a.1">
        <g data-name="Volumen">
          <polygon class="iso-cls-16" points="460.3 317.2 415.8 342.9 415.8 402.9 435.6 414.4 452.9 404.4 455.3 405.8 499.9 380.1 499.9 340.1 460.3 317.2"/>
        </g>
        <g data-name="Rechts">
          <polygon class="iso-cls-17" points="455.3 365.8 455.3 405.8 499.9 380.1 499.9 340.1 455.3 365.8"/>
          <polygon class="iso-cls-17" points="435.6 394.4 435.6 414.4 452.9 404.4 435.6 394.4"/>
        </g>
        <g data-name="Links">
          <polygon class="iso-cls-15" points="415.8 402.9 434.7 413.9 435.6 414.4 435.6 394.4 455.3 405.8 455.3 365.8 415.8 342.9 415.8 342.9 415.8 402.9"/>
        </g>
      </g>',
      '<g data-name="8b.2">
        <g data-name="Volumen">
          <polygon class="iso-cls-16" points="415.8 342.9 371.2 368.7 371.2 408.7 386.1 417.2 386.1 420.1 405.9 431.5 405.9 431.5 408.3 430.1 410.8 431.5 455.3 405.8 455.3 365.8 415.8 342.9"/>
        </g>
        <g data-name="Rechts">
          <polygon class="iso-cls-17" points="405.9 431.5 405.9 428.6 408.3 430.1 405.9 431.5"/>
        </g>
        <g data-name="Links">
          <polygon class="iso-cls-15" points="371.2 408.7 371.2 368.7 410.8 391.5 410.8 431.5 371.2 408.7"/>
          <polygon class="iso-cls-17" points="410.8 391.5 410.8 431.5 455.3 405.8 455.3 365.8 410.8 391.5"/>
          <polygon class="iso-cls-15" points="386.1 420.1 386.1 417.2 405.9 428.7 405.9 431.5 386.1 420.1"/>
        </g>
      </g>',
    ];
    $view_1_townhouse_10 = [
      '<g data-name="10d">
        <g data-name="Volumen">
          <polygon class="iso-cls-16" points="346.5 445.8 346.5 465.8 366.3 477.2 410.8 451.5 410.8 431.5 391 420.1 346.5 445.8"/>
        </g>
        <g data-name="Rechts">
          <polygon class="iso-cls-17" points="366.3 477.2 366.3 457.2 410.8 431.5 410.8 451.5 366.3 477.2"/>
        </g>
        <g data-name="Links">
          <polygon class="iso-cls-15" points="366.3 477.2 366.3 457.2 346.5 445.8 346.5 465.8 366.3 477.2"/>
        </g>
      </g>',
      '<g data-name="10c">
        <g data-name="Volumen">
          <polygon class="iso-cls-16" points="316.8 462.9 316.8 482.9 336.6 494.4 366.3 477.2 366.3 457.2 346.5 445.8 316.8 462.9"/>
        </g>
        <g data-name="Rechts">
          <polygon class="iso-cls-17" points="336.6 494.4 336.6 474.4 366.3 457.2 366.3 477.2 336.6 494.4"/>
        </g>
        <g data-name="Links">
          <polygon class="iso-cls-15" points="336.6 494.4 336.6 474.4 316.8 462.9 316.8 482.9 336.6 494.4"/>
        </g>
      </g>',
      '<g data-name="10a.1">
        <g data-name="Volumen">
          <polygon class="iso-cls-16" points="371.2 368.7 326.7 394.4 326.7 454.4 346.5 465.8 363.8 455.8 366.3 457.2 410.8 431.5 410.8 391.5 371.2 368.7"/>
        </g>
        <g data-name="Rechts">
          <polygon class="iso-cls-17" points="366.3 417.2 366.3 457.2 410.8 431.5 410.8 391.5 366.3 417.2"/>
          <polygon class="iso-cls-17" points="346.5 445.8 346.5 465.8 363.8 455.8 346.5 445.8"/>
        </g>
        <g data-name="Links">
          <polygon class="iso-cls-15" points="326.7 454.4 345.7 465.3 346.5 465.8 346.5 445.8 366.3 457.2 366.3 417.2 326.7 394.4 326.7 394.4 326.7 454.4"/>
        </g>
      </g>',
      '<g data-name="10b.2">
        <g data-name="Volumen">
          <polygon class="iso-cls-16" points="326.7 394.4 282.1 420.1 282.1 460.1 297 468.7 297 471.5 316.8 482.9 316.8 482.9 319.3 481.5 321.7 482.9 366.3 457.2 366.3 417.2 326.7 394.4"/>
        </g>
        <g data-name="Rechts">
          <polygon class="iso-cls-17" points="316.8 482.9 316.8 480.1 319.3 481.5 316.8 482.9"/>
        </g>
        <g data-name="Links">
          <polygon class="iso-cls-15" points="282.1 460.1 282.1 420.1 321.7 442.9 321.7 482.9 282.1 460.1"/>
          <polygon class="iso-cls-17" points="321.7 442.9 321.7 482.9 366.3 457.2 366.3 417.2 321.7 442.9"/>
          <polygon class="iso-cls-15" points="297 471.5 297 468.6 316.8 480.1 316.8 482.9 297 471.5"/>
        </g>
      </g>',
    ];
    $view_1_townhouse_12 = [
      '<g data-name="12d">
        <g data-name="Volumen">
          <polygon class="iso-cls-16" points="257.4 497.2 257.4 517.2 277.2 528.6 321.7 502.9 321.7 482.9 301.9 471.5 257.4 497.2"/>
        </g>
        <g data-name="Rechts">
          <polygon class="iso-cls-17" points="277.2 528.6 277.2 508.6 321.7 482.9 321.7 502.9 277.2 528.6"/>
        </g>
        <g data-name="Links">
          <polygon class="iso-cls-15" points="277.2 528.6 277.2 508.6 257.4 497.2 257.4 517.2 277.2 528.6"/>
        </g>
      </g>',
      '<g data-name="12c">
        <g data-name="Volumen">
          <polygon class="iso-cls-16" points="227.7 514.4 227.7 534.4 247.5 545.8 277.2 528.6 277.2 508.6 257.4 497.2 227.7 514.4"/>
        </g>
        <g data-name="Rechts">
          <polygon class="iso-cls-17" points="247.5 545.8 247.5 525.8 277.2 508.6 277.2 528.6 247.5 545.8"/>
        </g>
        <g data-name="Links">
          <polygon class="iso-cls-15" points="247.5 545.8 247.5 525.8 227.7 514.4 227.7 534.4 247.5 545.8"/>
        </g>
      </g>',
      '<g data-name="12a.1">
        <g data-name="Volumen">
          <polygon class="iso-cls-16" points="282.1 420.1 237.6 445.8 237.6 505.8 257.4 517.2 274.7 507.2 277.2 508.6 321.7 482.9 321.7 442.9 282.1 420.1"/>
        </g>
        <g data-name="Rechts">
          <polygon class="iso-cls-17" points="277.2 468.6 277.2 508.6 321.7 482.9 321.7 442.9 277.2 468.6"/>
          <polygon class="iso-cls-17" points="257.4 497.2 257.4 517.2 274.7 507.2 257.4 497.2"/>
        </g>
        <g data-name="Links">
          <polygon class="iso-cls-15" points="237.6 505.8 256.6 516.8 257.4 517.2 257.4 497.2 277.2 508.6 277.2 468.6 237.6 445.8 237.6 445.8 237.6 505.8"/>
        </g>
      </g>',
      '<g data-name="12b.2">
        <g data-name="Volumen">
          <polygon class="iso-cls-16" points="237.6 445.8 193.1 471.5 193.1 511.5 207.9 520.1 207.9 522.9 227.7 534.4 227.7 534.4 230.2 532.9 232.7 534.4 277.2 508.6 277.2 468.6 237.6 445.8"/>
        </g>
        <g data-name="Rechts">
          <polygon class="iso-cls-17" points="227.7 534.4 227.7 531.5 230.2 532.9 227.7 534.4"/>
        </g>
        <g data-name="Links">
          <polygon class="iso-cls-15" points="193.1 511.5 193.1 471.5 232.7 494.4 232.7 534.4 193.1 511.5"/>
          <polygon class="iso-cls-17" points="232.7 494.4 232.7 534.4 277.2 508.6 277.2 468.6 232.7 494.4"/>
          <polygon class="iso-cls-15" points="207.9 522.9 207.9 520.1 227.7 531.5 227.7 534.4 207.9 522.9"/>
        </g>
      </g>',
    ];

    foreach($view_1_townhouse_12 as $code)
    {
      $number = $this->extractString($code);
      $apartment = Apartment::where('number', $number)->first();
      if ($apartment)
      {
        $apartment->iso_code_view_1 = $code;
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
