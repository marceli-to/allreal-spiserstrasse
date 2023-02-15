<?php
namespace App\View\Components;
use Illuminate\View\Component;

class Form extends Component
{

  /**
   * Method
   *
   * @var string
   */
  public $method;

  /**
   * Action
   *
   * @var string
   */
  public $action;

  /**
   * Create a new component instance.
   *
   * @return void
   */
  public function __construct($method = 'POST', $action = NULL)
  {
    $this->method = strtoupper($method);
    $this->action = $action;
  }

  /**
   * Get the view / contents that represent the component.
   *
   * @return \Illuminate\View\View|string
   */
  public function render()
  {
    return view('components.form.form');
  }
}
