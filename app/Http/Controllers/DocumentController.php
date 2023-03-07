<?php
namespace App\Http\Controllers;
use App\Models\Apartment;
use App\Services\Pdf\Pdf;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
  protected $headers = [
    'Content-Type: application/pdf',
    'Cache-Control: no-store, no-cache, must-revalidate',
    'Expires: Sun, 01 Jan 2014 00:00:00 GMT',
    'Pragma: no-cache'
  ];

  /**
   * Generate and download a price list as pdf
   * 
   * @return \Illuminate\Http\Response
   */
  public function pricelist()
  { 
    $apartments = Apartment::with('floors')->get();
    $pdf = (new Pdf())->create([
      'data' => $apartments,
      'view' => 'pricelist',
      'name' => 'preisliste'
    ]);
    return response()->download($pdf['path'], $pdf['name'], $this->headers);
  }
}
