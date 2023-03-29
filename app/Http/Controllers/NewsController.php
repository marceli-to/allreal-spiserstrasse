<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

class NewsController extends Controller
{
  protected $viewPath = 'web.pages.';

  /**
   * Shows the form
   * 
   * @return \Illuminate\Http\Response
   */
  public function show($slug = '')
  {  
    return view($this->viewPath . 'news.show', ['slug' => $slug]);
  }
}
