<?php
namespace App\View\Components;
use Illuminate\View\Component;

class Notification extends Component
{

  /**
   * Style
   *
   * @var string
   */
  public $style;

  /**
   * Message
   *
   * @var string
   */
  public $message;

  /**
   * Create a new component instance.
   *
   * @return void
   */
  public function __construct($style = NULL, $message = NULL)
  {
    $this->style = $style;
    $this->message = $message;
  }

  /**
   * Get the view / contents that represent the component.
   *
   * @return \Illuminate\View\View|string
   */
  public function render()
  {
    return view('components.notification');
  }
}
