<?php
namespace App\View\Components;
use App\Models\Apartment;
use App\Models\State;
use Illuminate\View\Component;

class ApartmentIsoCode extends Component
{
  public $apartment;
  public $number;
  public $view;
  public $code;

  /**
   * Create a new component instance.
   *
   * @return void
   */
  public function __construct($number, $view)
  {
    $apartment = Apartment::with('floors')->where('number', $number)->first();
    $code = null;

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

    $state = $apartment->state == State::SOLD ? 3 : ($apartment->state == State::RESERVED ? 2 : 1);
    $floor = collect($apartment->floors->pluck('order')->all())->min();

    $this->code = str_replace(
      'data-name="'.$number.'"', 
      'data-name="'.$number.'" 
       data-number="'.$number.'" 
       data-filterable 
       data-hoverable 
       data-iso-item 
       data-url="'.route('page.apartment', ['slug' => $apartment->slug, 'apartment' => $apartment->id]).'"
       data-rooms="'.$apartment->rooms.'" 
       data-floor="'.$floor.'" 
       data-area="'.$apartment->area.'" 
       data-price="'.$apartment->price.'" 
       data-state="'.$state.'"', 
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
