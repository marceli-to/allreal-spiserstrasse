<?php
namespace App\View\Components;
use Illuminate\View\Component;

class ApartmentFilterLinkItem extends Component
{
  public $type;
  public $value;
  public $label;

  /**
   * Create a new component instance.
   *
   * @return void
   */
  public function __construct($type, $value, $label)
  {
    $this->type = $type;
    $this->value = $value;
    $this->label = $label;
  }

  /**
   * Get the view / contents that represent the component.
   *
   * @return \Illuminate\View\View|string
   */
  public function render()
  {
    return view('components.apartments.filter-link-item');
  }
}
