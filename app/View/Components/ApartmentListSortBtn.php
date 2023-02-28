<?php
namespace App\View\Components;
use Illuminate\View\Component;

class ApartmentListSortBtn extends Component
{
  public $sortBy;

  /**
   * Create a new component instance.
   *
   * @return void
   */
  public function __construct($sortBy)
  {
    $this->sortBy = $sortBy;
  }

  /**
   * Get the view / contents that represent the component.
   *
   * @return \Illuminate\View\View|string
   */
  public function render()
  {
    return view('components.apartments.list-sort-btn');
  }
}
