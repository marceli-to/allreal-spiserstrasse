<?php
namespace App\Http\Controllers;
use App\Models\Apartment;
use App\Models\State;
use App\Http\Resources\ApartmentResource;
use Illuminate\Http\Request;

class ApartmentController extends Controller
{
  protected $viewPath = 'web.pages.';

  /**
   * Shows a list of apartments
   * 
   * @return \Illuminate\Http\Response
   */
  public function index()
  {  
    return view($this->viewPath . 'apartments', ['apartments' => Apartment::with('floors')->get()]);
  }

  /**
   * Shows a single apartment
   * 
   * @param Apartment $apartment
   * @return \Illuminate\Http\Response
   */
  public function show(Apartment $apartment, $slug = NULL)
  {
    return view($this->viewPath . 'apartment', ['apartment' => $apartment]);
  }
  
}
