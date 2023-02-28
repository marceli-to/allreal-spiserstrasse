<?php
namespace App\View\Components;
use Illuminate\View\Component;

class ApartmentListLink extends Component
{
  public $apartment;

  /**
   * Create a new component instance.
   *
   * @return void
   */
  public function __construct($apartment)
  {
    $this->apartment = $apartment;
  }

  /**
   * Get the view / contents that represent the component.
   *
   * @return \Illuminate\View\View|string
   */
  public function render()
  {
    return view('components.apartments.list-link');
  }
}
