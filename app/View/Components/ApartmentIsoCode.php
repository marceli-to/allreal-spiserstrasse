<?php
namespace App\View\Components;
use App\Models\Apartment;
use App\Models\State;
use Illuminate\View\Component;

class ApartmentIsoCode extends Component
{
  public $apartment;
  public $view;
  public $code;

  /**
   * Create a new component instance.
   *
   * @return void
   */
  public function __construct($apartment, $view)
  {
    switch($view)
    {
      case 1:
        $code = $apartment->iso_code_view_1;
      break;
      case 2:
        $code = $apartment->iso_code_view_2;
      break;
      case 3:
        $code = $apartment->iso_code_view_3;
      break;
      case 4:
        $code = $apartment->iso_code_view_4;
      break;
    }

    $floor = collect($apartment->floors->pluck('order')->all())->min();

    $this->code = str_replace(
      'data-name="'.$apartment->number.'"', 
      'data-name="'.$apartment->number.'" 
       data-number="'.$apartment->number.'" 
       data-filterable 
       data-hoverable 
       data-iso-item 
       data-url="'.route('page.apartment', ['slug' => $apartment->slug, 'apartment' => $apartment->id]).'"
       data-rooms="'.$apartment->rooms.'" 
       data-floor="'.$floor.'" 
       data-type="'.$apartment->type->id.'" 
       data-area="'.$apartment->area.'" 
       data-areaRange="'.$apartment->filter_area.'" 
       data-price="'.$apartment->price.'" 
       data-priceRange="'.$apartment->filter_price.'" 
       data-state="'.$apartment->state.'"', 
      $code
    );
   }

  /**
   * Get the view / contents that represent the component.
   *
   * @return \Illuminate\View\View|string
   */
  public function render()
  {
    return view('components.apartments.iso-code');
  }
}
