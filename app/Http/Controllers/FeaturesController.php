<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

class FeaturesController extends Controller
{
  protected $viewPath = 'web.pages.';

  /**
   * Shows the form
   * 
   * @return \Illuminate\Http\Response
   */
  public function index()
  {  
    return view($this->viewPath . 'features');
  }
}
