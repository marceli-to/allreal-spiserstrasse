<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
  protected $viewPath = 'web.pages.';

  /**
   * Shows the project page
   * 
   * @return \Illuminate\Http\Response
   */
  public function index()
  {  
    return view($this->viewPath . 'project');
  }
}
