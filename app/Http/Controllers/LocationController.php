<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

class LocationController extends Controller
{
  protected $viewPath = 'web.pages.';

  /**
   * Shows the form
   * 
   * @return \Illuminate\Http\Response
   */
  public function index()
  {  
    return view($this->viewPath . 'location');
  }
}
