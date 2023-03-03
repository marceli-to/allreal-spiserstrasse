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
    $codes_12 = [
      '<g id="_12.1" data-name="12.1">
        <g id="Volumen">
          <polygon class="iso-cls-11" points="183.2 222.9 262.4 177.2 262.4 157.2 188.1 114.4 108.9 160.1 108.9 180.1 183.2 222.9"/>
        </g>
        <g id="Rechts">
          <polygon class="iso-cls-12" points="183.2 222.9 262.4 177.2 262.4 157.2 183.2 202.9 183.2 222.9"/>
        </g>
        <g id="Links">
          <polygon class="iso-cls-13" points="108.9 180.1 183.2 222.9 183.2 202.9 108.9 160.1 108.9 180.1"/>
        </g>
      </g>',
      '<g id="_12.101" data-name="12.101">
        <g id="Volumen-2">
          <polygon class="iso-cls-11" points="183.2 202.9 262.4 157.2 262.4 137.2 188.1 94.4 108.9 140.1 108.9 160.1 183.2 202.9"/>
        </g>
        <g id="Rechts-2">
          <polygon class="iso-cls-12" points="183.2 202.9 262.4 157.2 262.4 137.2 183.2 182.9 183.2 202.9"/>
        </g>
        <g id="Links-2">
          <polygon class="iso-cls-13" points="108.9 160.1 183.2 202.9 183.2 182.9 108.9 140.1 108.9 160.1"/>
        </g>
      </g>',
      '<g id="_12.103" data-name="12.103">
        <g id="Volumen-3">
          <polygon class="iso-cls-11" points="32.2 230.1 131.2 172.9 131.2 152.9 99 134.4 0 191.5 0 211.5 32.2 230.1"/>
        </g>
        <g id="Rechts-3">
          <polygon class="iso-cls-12" points="32.2 230.1 131.2 172.9 131.2 152.9 32.2 210.1 32.2 230.1"/>
        </g>
        <g id="Links-3">
          <polygon class="iso-cls-13" points="0 211.5 32.2 230.1 32.2 210.1 0 191.5 0 211.5"/>
        </g>
      </g>',
      '<g id="_12.102" data-name="12.102">
        <g id="Volumen-4">
          <polygon class="iso-cls-11" points="64.4 248.7 163.4 191.5 163.4 171.5 131.2 152.9 32.2 210.1 32.2 230.1 64.4 248.7"/>
        </g>
        <g id="Rechts-4">
          <polygon class="iso-cls-12" points="64.4 248.7 163.4 191.5 163.4 171.5 64.4 228.7 64.4 248.7"/>
        </g>
        <g id="Links-4">
          <polygon class="iso-cls-13" points="32.2 230.1 64.4 248.7 64.4 228.7 32.2 210.1 32.2 230.1"/>
        </g>
      </g>',
      '<g id="_12.201" data-name="12.201">
        <g id="Volumen-5">
          <polygon class="iso-cls-11" points="183.2 182.9 262.4 137.2 262.4 117.2 188.1 74.4 108.9 120.1 108.9 140.1 183.2 182.9"/>
        </g>
        <g id="Rechts-5">
          <polygon class="iso-cls-12" points="183.2 182.9 262.4 137.2 262.4 117.2 183.2 162.9 183.2 182.9"/>
        </g>
        <g id="Links-5">
          <polygon class="iso-cls-13" points="108.9 140.1 183.2 182.9 183.2 162.9 108.9 120.1 108.9 140.1"/>
        </g>
      </g>',
      '<g id="_12.203" data-name="12.203">
        <g id="Volumen-6">
          <polygon class="iso-cls-11" points="32.2 210.1 131.2 152.9 131.2 132.9 99 114.4 0 171.5 0 191.5 32.2 210.1"/>
        </g>
        <g id="Rechts-6">
          <polygon class="iso-cls-12" points="32.2 210.1 131.2 152.9 131.2 132.9 32.2 190.1 32.2 210.1"/>
        </g>
        <g id="Links-6">
          <polygon class="iso-cls-13" points="0 191.5 32.2 210.1 32.2 190.1 0 171.5 0 191.5"/>
        </g>
      </g>',
      '<g id="_12.202" data-name="12.202">
        <g id="Volumen-7">
          <polygon class="iso-cls-11" points="64.4 228.7 163.4 171.5 163.4 151.5 131.2 132.9 32.2 190.1 32.2 210.1 64.4 228.7"/>
        </g>
        <g id="Rechts-7">
          <polygon class="iso-cls-12" points="64.4 228.7 163.4 171.5 163.4 151.5 64.4 208.7 64.4 228.7"/>
        </g>
        <g id="Links-7">
          <polygon class="iso-cls-13" points="32.2 210.1 64.4 228.7 64.4 208.7 32.2 190.1 32.2 210.1"/>
        </g>
      </g>',
      '<g id="_12.301" data-name="12.301">
        <g id="Volumen-8">
          <polygon class="iso-cls-11" points="183.2 162.9 262.4 117.2 262.4 97.2 188.1 54.4 108.9 100.1 108.9 120.1 183.2 162.9"/>
        </g>
        <g id="Rechts-8">
          <polygon class="iso-cls-12" points="183.2 162.9 262.4 117.2 262.4 97.2 183.2 142.9 183.2 162.9"/>
        </g>
        <g id="Links-8">
          <polygon class="iso-cls-13" points="108.9 120.1 183.2 162.9 183.2 142.9 108.9 100.1 108.9 120.1"/>
        </g>
      </g>',
      '<g id="_12.303" data-name="12.303">
        <g id="Volumen-9">
          <polygon class="iso-cls-11" points="32.2 190.1 131.2 132.9 131.2 112.9 99 94.4 0 151.5 0 171.5 32.2 190.1"/>
        </g>
        <g id="Rechts-9">
          <polygon class="iso-cls-12" points="32.2 190.1 131.2 132.9 131.2 112.9 32.2 170.1 32.2 190.1"/>
        </g>
        <g id="Links-9">
          <polygon class="iso-cls-13" points="0 171.5 32.2 190.1 32.2 170.1 0 151.5 0 171.5"/>
        </g>
      </g>',
      '<g id="_12.302" data-name="12.302">
        <g id="Volumen-10">
          <polygon class="iso-cls-11" points="64.4 208.7 163.4 151.5 163.4 131.5 131.2 112.9 32.2 170.1 32.2 190.1 64.4 208.7"/>
        </g>
        <g id="Rechts-10">
          <polygon class="iso-cls-12" points="64.4 208.7 163.4 151.5 163.4 131.5 64.4 188.7 64.4 208.7"/>
        </g>
        <g id="Links-10">
          <polygon class="iso-cls-13" points="32.2 190.1 64.4 208.7 64.4 188.7 32.2 170.1 32.2 190.1"/>
        </g>
      </g>',
      '<g id="_12.401" data-name="12.401">
        <g id="Volumen-11">
          <polygon class="iso-cls-11" points="183.2 142.9 262.4 97.2 262.4 77.2 210.4 47.2 131.2 92.9 131.2 112.9 183.2 142.9"/>
        </g>
        <g id="Rechts-11">
          <polygon class="iso-cls-12" points="183.2 142.9 262.4 97.2 262.4 77.2 183.2 122.9 183.2 142.9"/>
        </g>
        <g id="Links-11">
          <polygon class="iso-cls-13" points="131.2 112.9 183.2 142.9 183.2 122.9 131.2 92.9 131.2 112.9"/>
        </g>
      </g>',
      '<g id="_12.403" data-name="12.403">
        <g id="Volumen-12">
          <polygon class="iso-cls-11" points="32.2 170.1 131.2 112.9 131.2 92.9 99 74.4 0 131.5 0 151.5 32.2 170.1"/>
        </g>
        <g id="Rechts-12">
          <polygon class="iso-cls-12" points="32.2 170.1 131.2 112.9 131.2 92.9 32.2 150.1 32.2 170.1"/>
        </g>
        <g id="Links-12">
          <polygon class="iso-cls-13" points="0 151.5 32.2 170.1 32.2 150.1 0 131.5 0 151.5"/>
        </g>
      </g>',
      '<g id="_12.402" data-name="12.402">
        <g id="Volumen-13">
          <polygon class="iso-cls-11" points="64.4 188.7 163.4 131.5 163.4 111.5 131.2 92.9 32.2 150.1 32.2 170.1 64.4 188.7"/>
        </g>
        <g id="Rechts-13">
          <polygon class="iso-cls-12" points="64.4 188.7 163.4 131.5 163.4 111.5 64.4 168.7 64.4 188.7"/>
        </g>
        <g id="Links-13">
          <polygon class="iso-cls-13" points="32.2 170.1 64.4 188.7 64.4 168.7 32.2 150.1 32.2 170.1"/>
        </g>
      </g>',
      '<g id="_12.501" data-name="12.501">
        <g id="Volumen-14">
          <polygon class="iso-cls-11" points="183.2 122.9 242.6 88.7 242.6 68.7 190.6 38.7 131.2 72.9 131.2 92.9 183.2 122.9"/>
        </g>
        <g id="Rechts-14">
          <polygon class="iso-cls-12" points="183.2 122.9 242.6 88.7 242.6 68.7 183.2 102.9 183.2 122.9"/>
        </g>
        <g id="Links-14">
          <polygon class="iso-cls-13" points="131.2 92.9 183.2 122.9 183.2 102.9 131.2 72.9 131.2 92.9"/>
        </g>
      </g>',
      '<g id="_12.503" data-name="12.503">
        <g id="Volumen-15">
          <polygon class="iso-cls-11" points="32.2 150.1 131.2 92.9 131.2 72.9 99 54.4 0 111.5 0 131.5 32.2 150.1"/>
        </g>
        <g id="Rechts-15">
          <polygon class="iso-cls-12" points="32.2 150.1 131.2 92.9 131.2 72.9 32.2 130.1 32.2 150.1"/>
        </g>
        <g id="Links-15">
          <polygon class="iso-cls-13" points="0 131.5 32.2 150.1 32.2 130.1 0 111.5 0 131.5"/>
        </g>
      </g>',
      '<g id="_12.502" data-name="12.502">
        <g id="Volumen-16">
          <polygon class="iso-cls-11" points="64.4 168.7 163.4 111.5 163.4 91.5 131.2 72.9 32.2 130.1 32.2 150.1 64.4 168.7"/>
        </g>
        <g id="Rechts-16">
          <polygon class="iso-cls-12" points="64.4 168.7 163.4 111.5 163.4 91.5 64.4 148.7 64.4 168.7"/>
        </g>
        <g id="Links-16">
          <polygon class="iso-cls-13" points="32.2 150.1 64.4 168.7 64.4 148.7 32.2 130.1 32.2 150.1"/>
        </g>
      </g>',
      '<g id="_12.601" data-name="12.601">
        <g id="Volumen-17">
          <polygon class="iso-cls-11" points="64.4 148.7 163.4 91.5 163.4 71.5 99 34.4 0 91.5 0 111.5 64.4 148.7"/>
        </g>
        <g id="Rechts-17">
          <polygon class="iso-cls-12" points="64.4 148.7 163.4 91.5 163.4 71.5 64.4 128.7 64.4 148.7"/>
        </g>
        <g id="Links-17">
          <polygon class="iso-cls-13" points="0 111.5 64.4 148.7 64.4 128.7 0 91.5 0 111.5"/>
        </g>
      </g>'
    ];

    $codes_10 = [
      '<g id="_10.1" data-name="10.1">
        <g id="Volumen-18">
          <polygon class="iso-cls-11" points="262.4 157.2 183.2 202.9 183.2 222.9 217.8 242.9 242.6 228.7 264.8 241.5 319.3 210.1 319.3 190.1 262.4 157.2"/>
        </g>
        <g id="Rechts-18">
          <polygon class="iso-cls-12" points="319.3 190.1 264.8 221.5 264.8 241.5 319.3 210.1 319.3 190.1"/>
          <polygon class="iso-cls-12" points="242.6 208.7 217.8 222.9 217.8 242.9 242.6 228.7 242.6 208.7"/>
        </g>
        <g id="Links-18">
          <polygon class="iso-cls-13" points="217.8 222.9 183.2 202.9 183.2 222.9 217.8 242.9 217.8 222.9"/>
          <polygon class="iso-cls-13" points="264.8 221.5 242.6 208.7 242.6 228.7 264.8 241.5 264.8 221.5"/>
        </g>
      </g>',
      '<g id="_10.3" data-name="10.3">
        <g id="Volumen-19">
          <polygon class="iso-cls-11" points="198 234.4 242.6 208.7 297 240.1 297 260.1 252.5 285.8 198 254.4 198 234.4"/>
        </g>
        <g id="Rechts-19">
          <polygon class="iso-cls-12" points="252.5 285.8 297 260.1 297 240.1 252.5 265.8 252.5 285.8"/>
        </g>
        <g id="Links-19">
          <polygon class="iso-cls-13" points="252.5 265.8 198 234.4 198 254.4 252.5 285.8 252.5 265.8"/>
        </g>
      </g>',
      '<g id="_10.2" data-name="10.2">
        <g id="Volumen-20">
          <polygon class="iso-cls-11" points="386.1 228.7 319.3 190.1 264.8 221.5 264.8 241.5 279.7 250.1 272.2 254.4 272.2 274.4 306.9 294.4 386.1 248.7 386.1 228.7"/>
          <polygon class="iso-cls-13" points="272.2 274.4 306.9 294.4 306.9 274.4 272.2 254.4 272.2 274.4"/>
        </g>
        <g id="Rechts-20">
          <polygon class="iso-cls-12" points="306.9 294.4 386.1 248.7 386.1 228.7 306.9 274.4 306.9 294.4"/>
        </g>
        <g id="Links-20">
          <polygon class="iso-cls-13" points="297 240.1 264.8 221.5 264.8 241.5 279.7 250.1 297 240.1"/>
        </g>
      </g>',
      '<g id="_10.101" data-name="10.101">
        <g id="Volumen-21">
          <polygon class="iso-cls-11" points="262.4 137.2 183.2 182.9 183.2 202.9 217.8 222.9 242.6 208.7 264.8 221.5 319.3 190.1 319.3 170.1 262.4 137.2"/>
        </g>
        <g id="Rechts-21">
          <polygon class="iso-cls-12" points="319.3 170.1 264.8 201.5 264.8 221.5 319.3 190.1 319.3 170.1"/>
          <polygon class="iso-cls-12" points="242.6 188.7 217.8 202.9 217.8 222.9 242.6 208.7 242.6 188.7"/>
        </g>
        <g id="Links-21">
          <polygon class="iso-cls-13" points="217.8 202.9 183.2 182.9 183.2 202.9 217.8 222.9 217.8 202.9"/>
          <polygon class="iso-cls-13" points="264.8 201.5 242.6 188.7 242.6 208.7 264.8 221.5 264.8 201.5"/>
        </g>
      </g>',
      '<g id="_10.103" data-name="10.103">
        <g id="Volumen-22">
          <polygon class="iso-cls-11" points="198 214.4 242.6 188.7 297 220.1 297 240.1 252.5 265.8 198 234.4 198 214.4"/>
        </g>
        <g id="Rechts-22">
          <polygon class="iso-cls-12" points="252.5 265.8 297 240.1 297 220.1 252.5 245.8 252.5 265.8"/>
        </g>
        <g id="Links-22">
          <polygon class="iso-cls-13" points="252.5 245.8 198 214.4 198 234.4 252.5 265.8 252.5 245.8"/>
        </g>
      </g>',
      '<g id="_10.102" data-name="10.102">
        <g id="Volumen-23">
          <polygon class="iso-cls-11" points="386.1 208.7 319.3 170.1 264.8 201.5 264.8 221.5 279.7 230.1 272.2 234.4 272.2 254.4 306.9 274.4 386.1 228.7 386.1 208.7"/>
          <polygon class="iso-cls-13" points="272.2 254.4 306.9 274.4 306.9 254.4 272.2 234.4 272.2 254.4"/>
        </g>
        <g id="Rechts-23">
          <polygon class="iso-cls-12" points="306.9 274.4 386.1 228.7 386.1 208.7 306.9 254.4 306.9 274.4"/>
        </g>
        <g id="Links-23">
          <polygon class="iso-cls-13" points="297 220.1 264.8 201.5 264.8 221.5 279.7 230.1 297 220.1"/>
        </g>
      </g>',
      '<g id="_10.201" data-name="10.201">
        <g id="Volumen-24">
          <polygon class="iso-cls-11" points="262.4 117.2 183.2 162.9 183.2 182.9 217.8 202.9 242.6 188.7 264.8 201.5 319.3 170.1 319.3 150.1 262.4 117.2"/>
        </g>
        <g id="Rechts-24">
          <polygon class="iso-cls-12" points="319.3 150.1 264.8 181.5 264.8 201.5 319.3 170.1 319.3 150.1"/>
          <polygon class="iso-cls-12" points="242.6 168.7 217.8 182.9 217.8 202.9 242.6 188.7 242.6 168.7"/>
        </g>
        <g id="Links-24">
          <polygon class="iso-cls-13" points="217.8 182.9 183.2 162.9 183.2 182.9 217.8 202.9 217.8 182.9"/>
          <polygon class="iso-cls-13" points="264.8 181.5 242.6 168.7 242.6 188.7 264.8 201.5 264.8 181.5"/>
        </g>
      </g>',
      '<g id="_10.203" data-name="10.203">
        <g id="Volumen-25">
          <polygon class="iso-cls-11" points="198 194.4 242.6 168.7 297 200.1 297 220.1 252.5 245.8 198 214.4 198 194.4"/>
        </g>
        <g id="Rechts-25">
          <polygon class="iso-cls-12" points="252.5 245.8 297 220.1 297 200.1 252.5 225.8 252.5 245.8"/>
        </g>
        <g id="Links-25">
          <polygon class="iso-cls-13" points="252.5 225.8 198 194.4 198 214.4 252.5 245.8 252.5 225.8"/>
        </g>
      </g>',
      '<g id="_10.202" data-name="10.202">
        <g id="Volumen-26">
          <polygon class="iso-cls-11" points="386.1 188.7 319.3 150.1 264.8 181.5 264.8 201.5 279.7 210.1 272.2 214.4 272.2 234.4 306.9 254.4 386.1 208.7 386.1 188.7"/>
          <polygon class="iso-cls-13" points="272.2 234.4 306.9 254.4 306.9 234.4 272.2 214.4 272.2 234.4"/>
        </g>
        <g id="Rechts-26">
          <polygon class="iso-cls-12" points="306.9 254.4 386.1 208.7 386.1 188.7 306.9 234.4 306.9 254.4"/>
        </g>
        <g id="Links-26">
          <polygon class="iso-cls-13" points="297 200.1 264.8 181.5 264.8 201.5 279.7 210.1 297 200.1"/>
        </g>
      </g>',
      '<g id="_10.301" data-name="10.301">
        <g id="Volumen-27">
          <polygon class="iso-cls-11" points="262.4 97.2 183.2 142.9 183.2 162.9 217.8 182.9 242.6 168.7 264.8 181.5 319.3 150.1 319.3 130.1 262.4 97.2"/>
        </g>
        <g id="Rechts-27">
          <polygon class="iso-cls-12" points="319.3 130.1 264.8 161.5 264.8 181.5 319.3 150.1 319.3 130.1"/>
          <polygon class="iso-cls-12" points="242.6 148.7 217.8 162.9 217.8 182.9 242.6 168.7 242.6 148.7"/>
        </g>
        <g id="Links-27">
          <polygon class="iso-cls-13" points="217.8 162.9 183.2 142.9 183.2 162.9 217.8 182.9 217.8 162.9"/>
          <polygon class="iso-cls-13" points="264.8 161.5 242.6 148.7 242.6 168.7 264.8 181.5 264.8 161.5"/>
        </g>
      </g>',
      '<g id="_10.303" data-name="10.303">
        <g id="Volumen-28">
          <polygon class="iso-cls-11" points="198 174.4 242.6 148.7 297 180.1 297 200.1 252.5 225.8 198 194.4 198 174.4"/>
        </g>
        <g id="Rechts-28">
          <polygon class="iso-cls-12" points="252.5 225.8 297 200.1 297 180.1 252.5 205.8 252.5 225.8"/>
        </g>
        <g id="Links-28">
          <polygon class="iso-cls-13" points="252.5 205.8 198 174.4 198 194.4 252.5 225.8 252.5 205.8"/>
        </g>
      </g>',
      '<g id="_10.302" data-name="10.302">
        <g id="Volumen-29">
          <polygon class="iso-cls-11" points="386.1 168.7 319.3 130.1 264.8 161.5 264.8 181.5 279.7 190.1 272.2 194.4 272.2 214.4 306.9 234.4 386.1 188.7 386.1 168.7"/>
          <polygon class="iso-cls-13" points="272.2 214.4 306.9 234.4 306.9 214.4 272.2 194.4 272.2 214.4"/>
        </g>
        <g id="Rechts-29">
          <polygon class="iso-cls-12" points="306.9 234.4 386.1 188.7 386.1 168.7 306.9 214.4 306.9 234.4"/>
        </g>
        <g id="Links-29">
          <polygon class="iso-cls-13" points="297 180.1 264.8 161.5 264.8 181.5 279.7 190.1 297 180.1"/>
        </g>
      </g>',
      '<g id="_10.401" data-name="10.401">
        <g id="Volumen-30">
          <polygon class="iso-cls-11" points="262.4 77.2 183.2 122.9 183.2 142.9 217.8 162.9 242.6 148.7 264.8 161.5 319.3 130.1 319.3 110.1 262.4 77.2"/>
        </g>
        <g id="Rechts-30">
          <polygon class="iso-cls-12" points="319.3 110.1 264.8 141.5 264.8 161.5 319.3 130.1 319.3 110.1"/>
          <polygon class="iso-cls-12" points="242.6 128.7 217.8 142.9 217.8 162.9 242.6 148.7 242.6 128.7"/>
        </g>
        <g id="Links-30">
          <polygon class="iso-cls-13" points="217.8 142.9 183.2 122.9 183.2 142.9 217.8 162.9 217.8 142.9"/>
          <polygon class="iso-cls-13" points="264.8 141.5 242.6 128.7 242.6 148.7 264.8 161.5 264.8 141.5"/>
        </g>
      </g>',
      '<g id="_10.403" data-name="10.403">
        <g id="Volumen-31">
          <polygon class="iso-cls-11" points="198 154.4 242.6 128.7 297 160.1 297 180.1 252.5 205.8 198 174.4 198 154.4"/>
        </g>
        <g id="Rechts-31">
          <polygon class="iso-cls-12" points="252.5 205.8 297 180.1 297 160.1 252.5 185.8 252.5 205.8"/>
        </g>
        <g id="Links-31">
          <polygon class="iso-cls-13" points="252.5 185.8 198 154.4 198 174.4 252.5 205.8 252.5 185.8"/>
        </g>
      </g>',
      '<g id="_10.402" data-name="10.402">
        <g id="Volumen-32">
          <polygon class="iso-cls-11" points="386.1 148.7 319.3 110.1 264.8 141.5 264.8 161.5 279.7 170.1 272.2 174.4 272.2 194.4 306.9 214.4 386.1 168.7 386.1 148.7"/>
          <polygon class="iso-cls-13" points="272.2 194.4 306.9 214.4 306.9 194.4 272.2 174.4 272.2 194.4"/>
        </g>
        <g id="Rechts-32">
          <polygon class="iso-cls-12" points="306.9 214.4 386.1 168.7 386.1 148.7 306.9 194.4 306.9 214.4"/>
        </g>
        <g id="Links-32">
          <polygon class="iso-cls-13" points="297 160.1 264.8 141.5 264.8 161.5 279.7 170.1 297 160.1"/>
        </g>
      </g>',
      '<g id="_10.501" data-name="10.501">
        <g id="Volumen-33">
          <polygon class="iso-cls-11" points="242.6 68.7 183.2 102.9 183.2 122.9 217.8 142.9 242.6 128.7 264.8 141.5 299.5 121.5 299.5 101.5 242.6 68.7"/>
        </g>
        <g id="Rechts-33">
          <polygon class="iso-cls-12" points="299.5 101.5 264.8 121.5 264.8 141.5 299.5 121.5 299.5 101.5"/>
          <polygon class="iso-cls-12" points="242.6 108.7 217.8 122.9 217.8 142.9 242.6 128.7 242.6 108.7"/>
        </g>
        <g id="Links-33">
          <polygon class="iso-cls-13" points="217.8 122.9 183.2 102.9 183.2 122.9 217.8 142.9 217.8 122.9"/>
          <polygon class="iso-cls-13" points="264.8 121.5 242.6 108.7 242.6 128.7 264.8 141.5 264.8 121.5"/>
        </g>
      </g>',
      '<g id="_10.503" data-name="10.503">
        <g id="Volumen-34">
          <polygon class="iso-cls-11" points="198 134.4 242.6 108.7 297 140.1 297 160.1 252.5 185.8 198 154.4 198 134.4"/>
        </g>
        <g id="Rechts-34">
          <polygon class="iso-cls-12" points="252.5 185.8 297 160.1 297 140.1 252.5 165.8 252.5 185.8"/>
        </g>
        <g id="Links-34">
          <polygon class="iso-cls-13" points="252.5 165.8 198 134.4 198 154.4 252.5 185.8 252.5 165.8"/>
        </g>
      </g>',
      '<g id="_10.502" data-name="10.502">
        <g id="Volumen-35">
          <polygon class="iso-cls-11" points="366.3 140.1 299.5 101.5 264.8 121.5 264.8 141.5 279.7 150.1 272.2 154.4 272.2 174.4 306.9 194.4 366.3 160.1 366.3 140.1"/>
          <polygon class="iso-cls-13" points="272.2 174.4 306.9 194.4 306.9 174.4 272.2 154.4 272.2 174.4"/>
        </g>
        <g id="Rechts-35">
          <polygon class="iso-cls-12" points="306.9 194.4 366.3 160.1 366.3 140.1 306.9 174.4 306.9 194.4"/>
        </g>
        <g id="Links-35">
          <polygon class="iso-cls-13" points="297 140.1 264.8 121.5 264.8 141.5 279.7 150.1 297 140.1"/>
        </g>
      </g>',
      '<g id="_10.601" data-name="10.601">
        <g id="Volumen-36">
          <polygon class="iso-cls-11" points="190.6 18.7 131.2 52.9 131.2 72.9 200.5 112.9 198 114.4 198 134.4 220.3 147.2 299.5 101.5 299.5 81.5 190.6 18.7"/>
        </g>
        <g id="Rechts-36">
          <polygon class="iso-cls-12" points="299.5 81.5 220.3 127.2 220.3 147.2 299.5 101.5 299.5 81.5"/>
        </g>
        <g id="Links-36">
          <polygon class="iso-cls-13" points="217.8 102.9 131.2 52.9 131.2 72.9 200.5 112.9 217.8 102.9"/>
          <polygon class="iso-cls-13" points="220.3 127.2 198 114.4 198 134.4 220.3 147.2 220.3 127.2"/>
        </g>
      </g>',
      '<g id="_10.602" data-name="10.602">
        <g id="Volumen-37">
          <polygon class="iso-cls-11" points="299.5 81.5 220.3 127.2 220.3 147.2 252.5 165.8 272.2 154.4 306.9 174.4 366.3 140.1 366.3 120.1 299.5 81.5"/>
          <polygon class="iso-cls-13" points="272.2 154.4 306.9 174.4 306.9 154.4 272.2 134.4 272.2 154.4"/>
        </g>
        <g id="Rechts-37">
          <polygon class="iso-cls-12" points="306.9 174.4 366.3 140.1 366.3 120.1 306.9 154.4 306.9 174.4"/>
        </g>
        <g id="Links-37">
          <polygon class="iso-cls-13" points="252.5 145.8 220.3 127.2 220.3 147.2 252.5 165.8 252.5 145.8"/>
          <polygon class="iso-cls-12" points="272.2 134.4 272.2 154.4 252.5 165.8 252.5 145.8 272.2 134.4"/>
        </g>
      </g>',
    ];

    $codes_8 = [
      '<g id="_8.1" data-name="8.1">
        <g id="Volumen-38">
          <polygon class="iso-cls-11" points="386.1 228.7 306.9 274.4 306.9 294.4 341.5 314.4 366.3 300.1 388.5 312.9 443 281.5 443 261.5 386.1 228.7"/>
        </g>
        <g id="Rechts-38">
          <polygon class="iso-cls-12" points="443 261.5 388.5 292.9 388.5 312.9 443 281.5 443 261.5"/>
          <polygon class="iso-cls-12" points="366.3 280.1 341.5 294.4 341.5 314.4 366.3 300.1 366.3 280.1"/>
        </g>
        <g id="Links-38">
          <polygon class="iso-cls-13" points="341.5 294.4 306.9 274.4 306.9 294.4 341.5 314.4 341.5 294.4"/>
          <polygon class="iso-cls-13" points="388.5 292.9 366.3 280.1 366.3 300.1 388.5 312.9 388.5 292.9"/>
        </g>
      </g>',
      '<g id="_8.3" data-name="8.3">
        <g id="Volumen-39">
          <polygon class="iso-cls-11" points="321.7 305.8 366.3 280.1 420.7 311.5 420.7 331.5 376.2 357.2 321.7 325.8 321.7 305.8"/>
        </g>
        <g id="Rechts-39">
          <polygon class="iso-cls-12" points="376.2 357.2 420.7 331.5 420.7 311.5 376.2 337.2 376.2 357.2"/>
        </g>
        <g id="Links-39">
          <polygon class="iso-cls-13" points="376.2 337.2 321.7 305.8 321.7 325.8 376.2 357.2 376.2 337.2"/>
        </g>
      </g>',
      '<g id="_8.2" data-name="8.2">
        <g id="Volumen-40">
          <polygon class="iso-cls-11" points="509.8 300.1 443 261.5 388.5 292.9 388.5 312.9 403.4 321.5 396 325.8 396 345.8 430.6 365.8 509.8 320.1 509.8 300.1"/>
          <polygon class="iso-cls-13" points="396 345.8 430.6 365.8 430.6 345.8 396 325.8 396 345.8"/>
        </g>
        <g id="Rechts-40">
          <polygon class="iso-cls-12" points="430.6 365.8 509.8 320.1 509.8 300.1 430.6 345.8 430.6 365.8"/>
        </g>
        <g id="Links-40">
          <polygon class="iso-cls-13" points="420.7 311.5 388.5 292.9 388.5 312.9 403.4 321.5 420.7 311.5"/>
        </g>
      </g>',
      '<g id="_8.101" data-name="8.101">
        <g id="Volumen-41">
          <polygon class="iso-cls-11" points="386.1 208.7 306.9 254.4 306.9 274.4 341.5 294.4 366.3 280.1 388.5 292.9 443 261.5 443 241.5 386.1 208.7"/>
        </g>
        <g id="Rechts-41">
          <polygon class="iso-cls-12" points="443 241.5 388.5 272.9 388.5 292.9 443 261.5 443 241.5"/>
          <polygon class="iso-cls-12" points="366.3 260.1 341.5 274.4 341.5 294.4 366.3 280.1 366.3 260.1"/>
        </g>
        <g id="Links-41">
          <polygon class="iso-cls-13" points="341.5 274.4 306.9 254.4 306.9 274.4 341.5 294.4 341.5 274.4"/>
          <polygon class="iso-cls-13" points="388.5 272.9 366.3 260.1 366.3 280.1 388.5 292.9 388.5 272.9"/>
        </g>
      </g>',
      '<g id="_8.103" data-name="8.103">
        <g id="Volumen-42">
          <polygon class="iso-cls-11" points="321.7 285.8 366.3 260.1 420.7 291.5 420.7 311.5 376.2 337.2 321.7 305.8 321.7 285.8"/>
        </g>
        <g id="Rechts-42">
          <polygon class="iso-cls-12" points="376.2 337.2 420.7 311.5 420.7 291.5 376.2 317.2 376.2 337.2"/>
        </g>
        <g id="Links-42">
          <polygon class="iso-cls-13" points="376.2 317.2 321.7 285.8 321.7 305.8 376.2 337.2 376.2 317.2"/>
        </g>
      </g>',
      '<g id="_8.102" data-name="8.102">
        <g id="Volumen-43">
          <polygon class="iso-cls-11" points="509.8 280.1 443 241.5 388.5 272.9 388.5 292.9 403.4 301.5 396 305.8 396 325.8 430.6 345.8 509.8 300.1 509.8 280.1"/>
          <polygon class="iso-cls-13" points="396 325.8 430.6 345.8 430.6 325.8 396 305.8 396 325.8"/>
        </g>
        <g id="Rechts-43">
          <polygon class="iso-cls-12" points="430.6 345.8 509.8 300.1 509.8 280.1 430.6 325.8 430.6 345.8"/>
        </g>
        <g id="Links-43">
          <polygon class="iso-cls-13" points="420.7 291.5 388.5 272.9 388.5 292.9 403.4 301.5 420.7 291.5"/>
        </g>
      </g>',
      '<g id="_8.201" data-name="8.201">
        <g id="Volumen-44">
          <polygon class="iso-cls-11" points="386.1 188.7 306.9 234.4 306.9 254.4 341.5 274.4 366.3 260.1 388.5 272.9 443 241.5 443 221.5 386.1 188.7"/>
        </g>
        <g id="Rechts-44">
          <polygon class="iso-cls-12" points="443 221.5 388.5 252.9 388.5 272.9 443 241.5 443 221.5"/>
          <polygon class="iso-cls-12" points="366.3 240.1 341.5 254.4 341.5 274.4 366.3 260.1 366.3 240.1"/>
        </g>
        <g id="Links-44">
          <polygon class="iso-cls-13" points="341.5 254.4 306.9 234.4 306.9 254.4 341.5 274.4 341.5 254.4"/>
          <polygon class="iso-cls-13" points="388.5 252.9 366.3 240.1 366.3 260.1 388.5 272.9 388.5 252.9"/>
        </g>
      </g>',
      '<g id="_8.203" data-name="8.203">
        <g id="Volumen-45">
          <polygon class="iso-cls-11" points="321.7 265.8 366.3 240.1 420.7 271.5 420.7 291.5 376.2 317.2 321.7 285.8 321.7 265.8"/>
        </g>
        <g id="Rechts-45">
          <polygon class="iso-cls-12" points="376.2 317.2 420.7 291.5 420.7 271.5 376.2 297.2 376.2 317.2"/>
        </g>
        <g id="Links-45">
          <polygon class="iso-cls-13" points="376.2 297.2 321.7 265.8 321.7 285.8 376.2 317.2 376.2 297.2"/>
        </g>
      </g>',
      '<g id="_8.202" data-name="8.202">
        <g id="Volumen-46">
          <polygon class="iso-cls-11" points="509.8 260.1 443 221.5 388.5 252.9 388.5 272.9 403.4 281.5 396 285.8 396 305.8 430.6 325.8 509.8 280.1 509.8 260.1"/>
          <polygon class="iso-cls-13" points="396 305.8 430.6 325.8 430.6 305.8 396 285.8 396 305.8"/>
        </g>
        <g id="Rechts-46">
          <polygon class="iso-cls-12" points="430.6 325.8 509.8 280.1 509.8 260.1 430.6 305.8 430.6 325.8"/>
        </g>
        <g id="Links-46">
          <polygon class="iso-cls-13" points="420.7 271.5 388.5 252.9 388.5 272.9 403.4 281.5 420.7 271.5"/>
        </g>
      </g>',
      '<g id="_8.301" data-name="8.301">
        <g id="Volumen-47">
          <polygon class="iso-cls-11" points="386.1 168.7 306.9 214.4 306.9 234.4 341.5 254.4 366.3 240.1 388.5 252.9 443 221.5 443 201.5 386.1 168.7"/>
        </g>
        <g id="Rechts-47">
          <polygon class="iso-cls-12" points="443 201.5 388.5 232.9 388.5 252.9 443 221.5 443 201.5"/>
          <polygon class="iso-cls-12" points="366.3 220.1 341.5 234.4 341.5 254.4 366.3 240.1 366.3 220.1"/>
        </g>
        <g id="Links-47">
          <polygon class="iso-cls-13" points="341.5 234.4 306.9 214.4 306.9 234.4 341.5 254.4 341.5 234.4"/>
          <polygon class="iso-cls-13" points="388.5 232.9 366.3 220.1 366.3 240.1 388.5 252.9 388.5 232.9"/>
        </g>
      </g>',
      '<g id="_8.303" data-name="8.303">
        <g id="Volumen-48">
          <polygon class="iso-cls-11" points="321.7 245.8 366.3 220.1 420.7 251.5 420.7 271.5 376.2 297.2 321.7 265.8 321.7 245.8"/>
        </g>
        <g id="Rechts-48">
          <polygon class="iso-cls-12" points="376.2 297.2 420.7 271.5 420.7 251.5 376.2 277.2 376.2 297.2"/>
        </g>
        <g id="Links-48">
          <polygon class="iso-cls-13" points="376.2 277.2 321.7 245.8 321.7 265.8 376.2 297.2 376.2 277.2"/>
        </g>
      </g>',
      '<g id="_8.302" data-name="8.302">
        <g id="Volumen-49">
          <polygon class="iso-cls-11" points="509.8 240.1 443 201.5 388.5 232.9 388.5 252.9 403.4 261.5 396 265.8 396 285.8 430.6 305.8 509.8 260.1 509.8 240.1"/>
          <polygon class="iso-cls-13" points="396 285.8 430.6 305.8 430.6 285.8 396 265.8 396 285.8"/>
        </g>
        <g id="Rechts-49">
          <polygon class="iso-cls-12" points="430.6 305.8 509.8 260.1 509.8 240.1 430.6 285.8 430.6 305.8"/>
        </g>
        <g id="Links-49">
          <polygon class="iso-cls-13" points="420.7 251.5 388.5 232.9 388.5 252.9 403.4 261.5 420.7 251.5"/>
        </g>
      </g>',
      '<g id="_8.401" data-name="8.401">
        <g id="Volumen-50">
          <polygon class="iso-cls-11" points="386.1 148.7 306.9 194.4 306.9 214.4 341.5 234.4 366.3 220.1 388.5 232.9 443 201.5 443 181.5 386.1 148.7"/>
        </g>
        <g id="Rechts-50">
          <polygon class="iso-cls-12" points="443 181.5 388.5 212.9 388.5 232.9 443 201.5 443 181.5"/>
          <polygon class="iso-cls-12" points="366.3 200.1 341.5 214.4 341.5 234.4 366.3 220.1 366.3 200.1"/>
        </g>
        <g id="Links-50">
          <polygon class="iso-cls-13" points="341.5 214.4 306.9 194.4 306.9 214.4 341.5 234.4 341.5 214.4"/>
          <polygon class="iso-cls-13" points="388.5 212.9 366.3 200.1 366.3 220.1 388.5 232.9 388.5 212.9"/>
        </g>
      </g>',
      '<g id="_8.403" data-name="8.403">
        <g id="Volumen-51">
          <polygon class="iso-cls-11" points="321.7 225.8 366.3 200.1 420.7 231.5 420.7 251.5 376.2 277.2 321.7 245.8 321.7 225.8"/>
        </g>
        <g id="Rechts-51">
          <polygon class="iso-cls-12" points="376.2 277.2 420.7 251.5 420.7 231.5 376.2 257.2 376.2 277.2"/>
        </g>
        <g id="Links-51">
          <polygon class="iso-cls-13" points="376.2 257.2 321.7 225.8 321.7 245.8 376.2 277.2 376.2 257.2"/>
        </g>
      </g>',
      '<g id="_8.402" data-name="8.402">
        <g id="Volumen-52">
          <polygon class="iso-cls-11" points="509.8 220.1 443 181.5 388.5 212.9 388.5 232.9 403.4 241.5 396 245.8 396 265.8 430.6 285.8 509.8 240.1 509.8 220.1"/>
          <polygon class="iso-cls-13" points="396 265.8 430.6 285.8 430.6 265.8 396 245.8 396 265.8"/>
        </g>
        <g id="Rechts-52">
          <polygon class="iso-cls-12" points="430.6 285.8 509.8 240.1 509.8 220.1 430.6 265.8 430.6 285.8"/>
        </g>
        <g id="Links-52">
          <polygon class="iso-cls-13" points="420.7 231.5 388.5 212.9 388.5 232.9 403.4 241.5 420.7 231.5"/>
        </g>
      </g>',
      '<g id="_8.501" data-name="8.501">
        <g id="Volumen-53">
          <polygon class="iso-cls-11" points="366.3 140.1 306.9 174.4 306.9 194.4 341.5 214.4 366.3 200.1 388.5 212.9 423.2 192.9 423.2 172.9 366.3 140.1"/>
        </g>
        <g id="Rechts-53">
          <polygon class="iso-cls-12" points="423.2 172.9 388.5 192.9 388.5 212.9 423.2 192.9 423.2 172.9"/>
          <polygon class="iso-cls-12" points="366.3 180.1 341.5 194.4 341.5 214.4 366.3 200.1 366.3 180.1"/>
        </g>
        <g id="Links-53">
          <polygon class="iso-cls-13" points="341.5 194.4 306.9 174.4 306.9 194.4 341.5 214.4 341.5 194.4"/>
          <polygon class="iso-cls-13" points="388.5 192.9 366.3 180.1 366.3 200.1 388.5 212.9 388.5 192.9"/>
        </g>
      </g>',
      '<g id="_8.503" data-name="8.503">
        <g id="Volumen-54">
          <polygon class="iso-cls-11" points="321.7 205.8 366.3 180.1 420.7 211.5 420.7 231.5 376.2 257.2 321.7 225.8 321.7 205.8"/>
        </g>
        <g id="Rechts-54">
          <polygon class="iso-cls-12" points="376.2 257.2 420.7 231.5 420.7 211.5 376.2 237.2 376.2 257.2"/>
        </g>
        <g id="Links-54">
          <polygon class="iso-cls-13" points="376.2 237.2 321.7 205.8 321.7 225.8 376.2 257.2 376.2 237.2"/>
        </g>
      </g>',
      '<g id="_8.502" data-name="8.502">
        <g id="Volumen-55">
          <polygon class="iso-cls-11" points="490 211.5 423.2 172.9 388.5 192.9 388.5 212.9 403.4 221.5 396 225.8 396 245.8 430.6 265.8 490 231.5 490 211.5"/>
          <polygon class="iso-cls-13" points="396 245.8 430.6 265.8 430.6 245.8 396 225.8 396 245.8"/>
        </g>
        <g id="Rechts-55">
          <polygon class="iso-cls-12" points="430.6 265.8 490 231.5 490 211.5 430.6 245.8 430.6 265.8"/>
        </g>
        <g id="Links-55">
          <polygon class="iso-cls-13" points="420.7 211.5 388.5 192.9 388.5 212.9 403.4 221.5 420.7 211.5"/>
        </g>
      </g>',
      '<g id="_8.601" data-name="8.601">
        <g id="Volumen-56">
          <polygon class="iso-cls-11" points="366.3 120.1 306.9 154.4 306.9 174.4 324.2 184.4 321.7 185.8 321.7 205.8 344 218.7 423.2 172.9 423.2 152.9 366.3 120.1"/>
        </g>
        <g id="Rechts-56">
          <polygon class="iso-cls-12" points="423.2 152.9 344 198.7 344 218.7 423.2 172.9 423.2 152.9"/>
        </g>
        <g id="Links-56">
          <polygon class="iso-cls-13" points="341.5 174.4 306.9 154.4 306.9 174.4 324.2 184.4 341.5 174.4"/>
          <polygon class="iso-cls-13" points="344 198.7 321.7 185.8 321.7 205.8 344 218.7 344 198.7"/>
        </g>
      </g>',
      '<g id="_8.602" data-name="8.602">
        <g id="Volumen-57">
          <polygon class="iso-cls-11" points="423.2 152.9 344 198.7 344 218.7 376.2 237.2 396 225.8 430.6 245.8 490 211.5 490 191.5 423.2 152.9"/>
          <polygon class="iso-cls-13" points="396 225.8 430.6 245.8 430.6 225.8 396 205.8 396 225.8"/>
        </g>
        <g id="Rechts-57">
          <polygon class="iso-cls-12" points="430.6 245.8 490 211.5 490 191.5 430.6 225.8 430.6 245.8"/>
        </g>
        <g id="Links-57">
          <polygon class="iso-cls-13" points="376.2 217.2 344 198.7 344 218.7 376.2 237.2 376.2 217.2"/>
          <polygon class="iso-cls-12" points="396 205.8 396 225.8 376.2 237.2 376.2 217.2 396 205.8"/>
        </g>
      </g>'
    ];

    $codes_8_town = [
      '<g id="_8_C_Atelier" data-name="8c">
        <g id="Volumen-68">
          <polygon class="iso-cls-9" points="306.9 365.8 306.9 385.8 287.1 397.2 257.4 380.1 257.4 360.1 277.2 348.7 306.9 365.8"/>
        </g>
        <g id="Rechts-66">
          <polygon class="iso-cls-10" points="287.1 397.2 287.1 377.2 306.9 365.8 306.9 385.8 287.1 397.2"/>
        </g>
        <g id="Links-66">
          <polygon class="iso-cls-8" points="287.1 397.2 287.1 377.2 257.4 360.1 257.4 380.1 287.1 397.2"/>
        </g>
      </g>',
      '<g id="_8_B_2" data-name="8b.2">
        <g id="Volumen-69">
          <polygon class="iso-cls-9" points="282.1 288.7 242.6 311.5 242.6 351.5 287.1 377.2 289.6 375.8 306.9 385.8 326.7 374.4 326.7 354.4 326.7 314.4 282.1 288.7"/>
        </g>
        <g id="Rechts-67">
          <polygon class="iso-cls-10" points="287.1 337.2 287.1 377.2 306.9 365.8 306.9 385.8 326.7 374.4 326.7 314.4 287.1 337.2"/>
        </g>
        <g id="Links-67">
          <polygon class="iso-cls-8" points="287.1 337.2 287.1 377.2 242.6 351.5 242.6 311.5 287.1 337.2"/>
          <polygon class="iso-cls-8" points="289.6 375.8 306.9 385.8 306.9 365.8 289.6 375.8"/>
        </g>
      </g>',
      '<g id="_08_D_Atelier" data-name="8d">
        <g id="Volumen-70">
          <polygon class="iso-cls-9" points="351.4 391.5 351.4 411.5 331.6 422.9 287.1 397.2 287.1 377.2 306.9 365.8 351.4 391.5"/>
        </g>
        <g id="Rechts-68">
          <polygon class="iso-cls-10" points="331.6 422.9 331.6 402.9 351.4 391.5 351.4 411.5 331.6 422.9"/>
        </g>
        <g id="Links-68">
          <polygon class="iso-cls-8" points="331.6 422.9 331.6 402.9 287.1 377.2 287.1 397.2 331.6 422.9"/>
        </g>
      </g>',
      '<g id="_08_A_1" data-name="8a.1">
        <g id="Volumen-71">
          <polygon class="iso-cls-9" points="326.7 314.4 287.1 337.2 287.1 377.2 331.6 402.9 334.1 401.5 351.4 411.5 371.2 400.1 371.2 380.1 371.2 340.1 326.7 314.4"/>
        </g>
        <g id="Rechts-69">
          <polygon class="iso-cls-10" points="331.6 362.9 331.6 402.9 351.4 391.5 351.4 411.5 371.2 400.1 371.2 340.1 331.6 362.9"/>
        </g>
        <g id="Links-69">
          <polygon class="iso-cls-8" points="331.6 362.9 331.6 402.9 287.1 377.2 287.1 337.2 331.6 362.9"/>
          <polygon class="iso-cls-8" points="334.1 401.5 351.4 411.5 351.4 391.5 334.1 401.5"/>
        </g>
      </g>',
    ];

    $codes_10_town = [
      '<g id="_10_C_Atelier" data-name="10c">
        <g id="Volumen-63">
          <polygon class="iso-cls-9" points="217.8 314.4 217.8 334.4 198 345.8 168.3 328.7 168.3 308.7 188.1 297.2 217.8 314.4"/>
        </g>
        <g id="Rechts-62">
          <polygon class="iso-cls-10" points="198 345.8 198 325.8 217.8 314.4 217.8 334.4 198 345.8"/>
        </g>
        <g id="Links-62">
          <polygon class="iso-cls-8" points="198 345.8 198 325.8 168.3 308.7 168.3 328.7 198 345.8"/>
        </g>
      </g>',
      '<g id="_10_B_2" data-name="10b.2">
        <g id="Volumen-64">
          <polygon class="iso-cls-9" points="193.1 237.2 153.5 260.1 153.5 300.1 198 325.8 200.5 324.4 217.8 334.4 237.6 322.9 237.6 302.9 237.6 262.9 193.1 237.2"/>
        </g>
        <g id="Rechts-63">
          <polygon class="iso-cls-10" points="198 285.8 198 325.8 217.8 314.4 217.8 334.4 237.6 322.9 237.6 262.9 198 285.8"/>
        </g>
        <g id="Links-63">
          <polygon class="iso-cls-8" points="198 285.8 198 325.8 153.5 300.1 153.5 260.1 198 285.8"/>
          <polygon class="iso-cls-8" points="200.5 324.4 217.8 334.4 217.8 314.4 200.5 324.4"/>
        </g>
      </g>',
      '<g id="_10_D_Atelier" data-name="10d">
        <g id="Volumen-65">
          <polygon class="iso-cls-9" points="262.4 340.1 262.4 360.1 242.6 371.5 198 345.8 198 325.8 217.8 314.4 262.4 340.1"/>
        </g>
        <g id="Rechts-64">
          <polygon class="iso-cls-10" points="242.6 371.5 242.6 351.5 262.4 340.1 262.4 360.1 242.6 371.5"/>
        </g>
        <g id="Links-64">
          <polygon class="iso-cls-8" points="242.6 371.5 242.6 351.5 198 325.8 198 345.8 242.6 371.5"/>
        </g>
      </g>',
      '<g id="_10_A_1" data-name="10a.1">
        <g id="Volumen-66">
          <polygon class="iso-cls-9" points="237.6 262.9 198 285.8 198 325.8 242.6 351.5 245 350.1 262.4 360.1 282.1 348.7 282.1 328.7 282.1 288.7 237.6 262.9"/>
        </g>
        <g id="Rechts-65">
          <polygon class="iso-cls-10" points="242.6 311.5 242.6 351.5 262.4 340.1 262.4 360.1 282.1 348.7 282.1 288.7 242.6 311.5"/>
        </g>
        <g id="Links-65">
          <polygon class="iso-cls-8" points="242.6 311.5 242.6 351.5 198 325.8 198 285.8 242.6 311.5"/>
          <polygon class="iso-cls-8" points="245 350.1 262.4 360.1 262.4 340.1 245 350.1"/>
        </g>
      </g>',
    ];

    $codes_12_town = [
      '<g id="_12_C_Atelier" data-name="12c">
        <g id="Volumen-58">
          <polygon class="iso-cls-9" points="128.7 262.9 128.7 282.9 108.9 294.4 79.2 277.2 79.2 257.2 99 245.8 128.7 262.9"/>
        </g>
        <g id="Rechts-58">
          <polygon class="iso-cls-10" points="108.9 294.4 108.9 274.4 128.7 262.9 128.7 282.9 108.9 294.4"/>
        </g>
        <g id="Links-58">
          <polygon class="iso-cls-8" points="108.9 294.4 108.9 274.4 79.2 257.2 79.2 277.2 108.9 294.4"/>
        </g>
      </g>',
      '<g id="_12_B_2" data-name="12b.2">
        <g id="Volumen-59">
          <polygon class="iso-cls-9" points="104 185.8 64.4 208.7 64.4 248.7 108.9 274.4 111.4 272.9 128.7 282.9 148.5 271.5 148.5 251.5 148.5 211.5 104 185.8"/>
        </g>
        <g id="Rechts-59">
          <polygon class="iso-cls-10" points="108.9 234.4 108.9 274.4 128.7 262.9 128.7 282.9 148.5 271.5 148.5 211.5 108.9 234.4"/>
        </g>
        <g id="Links-59">
          <polygon class="iso-cls-8" points="108.9 234.4 108.9 274.4 64.4 248.7 64.4 208.7 108.9 234.4"/>
          <polygon class="iso-cls-8" points="111.4 272.9 128.7 282.9 128.7 262.9 111.4 272.9"/>
        </g>
      </g>',
      '<g id="_12_D_Atelier" data-name="12d">
        <g id="Volumen-60">
          <polygon class="iso-cls-9" points="173.3 288.7 173.3 308.7 153.5 320.1 108.9 294.4 108.9 274.4 128.7 262.9 173.3 288.7"/>
        </g>
        <g id="Rechts-60">
          <polygon class="iso-cls-10" points="153.5 320.1 153.5 300.1 173.3 288.7 173.3 308.7 153.5 320.1"/>
        </g>
        <g id="Links-60">
          <polygon class="iso-cls-8" points="153.5 320.1 153.5 300.1 108.9 274.4 108.9 294.4 153.5 320.1"/>
        </g>
      </g>',
      '<g id="_12_A_1" data-name="12a.1">
        <g id="Volumen-61">
          <polygon class="iso-cls-9" points="148.5 211.5 108.9 234.4 108.9 274.4 153.5 300.1 156 298.7 173.3 308.7 193.1 297.2 193.1 277.2 193.1 237.2 148.5 211.5"/>
        </g>
        <g id="Rechts-61">
          <polygon class="iso-cls-10" points="153.5 260.1 153.5 300.1 173.3 288.7 173.3 308.7 193.1 297.2 193.1 237.2 153.5 260.1"/>
        </g>
        <g id="Links-61">
          <polygon class="iso-cls-8" points="153.5 260.1 153.5 300.1 108.9 274.4 108.9 234.4 153.5 260.1"/>
          <polygon class="iso-cls-8" points="156 298.7 173.3 308.7 173.3 288.7 156 298.7"/>
        </g>
      </g>'
    ];

    foreach($codes_12_town as $code)
    {
      $number = $this->extractString($code);
      $apartment = Apartment::where('number', $number)->first();

      if ($apartment)
      {
        $apartment->iso_code_view_2 = $code;
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
