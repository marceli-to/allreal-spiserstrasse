<?php
namespace App\View\Components;
use Illuminate\View\Component;

class Button extends Component
{
  /**
   * Name
   *
   * @var string
   */
  public $name;

  /**
   * Label
   *
   * @var string
   */
  public $label;

  /**
   * Type
   *
   * @var string
   */
  public $type;

  /**
   * Create a new component instance.
   *
   * @param $name
   * @param $label
   * @param $type
   * @return void
   */
  public function __construct($name, $label, $type = 'submit')
  {
    $this->name   = $name;
    $this->label  = $label;
    $this->type   = $type;
  }

  /**
   * Get the view / contents that represent the component.
   *
   * @return \Illuminate\View\View|string
   */
  public function render()
  {
    return view('components.form.button');
  }
}
