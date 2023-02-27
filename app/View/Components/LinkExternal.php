<?php
namespace App\View\Components;
use Illuminate\View\Component;

class LinkExternal extends Component
{
  /**
   * Url
   *
   * @var string
   */
  public $url;

  /**
   * Title
   *
   * @var string
   */
  public $title;

  /**
   * Create a new component instance.
   *
   * @return void
   */
  public function __construct($url, $title = NULL)
  {
    $this->url = $url;
    $this->title = $title;
  }


  /**
   * Get the view / contents that represent the component.
   *
   * @return \Illuminate\View\View|string
   */
  public function render()
  {
    return view('components.link-external');
  }
}
