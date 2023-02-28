<?php
namespace App\Http\Controllers;
use App\Models\Apartment;
use App\Models\State;
use App\Http\Resources\ApartmentResource;
use Illuminate\Http\Request;

class ApartmentController extends Controller
{
  protected $viewPath = 'web.pages.';

  /**
   * Shows the apartments page
   * 
   * @return \Illuminate\Http\Response
   */
  public function index()
  {  
    return view($this->viewPath . 'apartments', ['apartments' => $this->buildData(Apartment::with('floors')->get())]);
  }

  private function buildData($apartments)
  {
    $data = [];
    foreach($apartments as $apartment)
    {
      $data[] = [
        'id' => $apartment->id,
        'number' => $apartment->number,
        'rooms' => $apartment->rooms,
        'type' => $apartment->type,
        'street' => $apartment->street,
        'location' => $apartment->location,
        'area' => $apartment->area,
        'area_basement' => $apartment->area_basement,
        'area_exterior' => $apartment->area_exterior,
        'price' => $apartment->price,
        'state' => [
          'key' => $apartment->state,
          'value' => $apartment->state == State::SOLD ? 'verkauft' : ($apartment->state == State::RESERVED ? 'reserviert' : 'frei'),
          'order' => $apartment->state == State::SOLD ? 3 : ($apartment->state == State::RESERVED ? 2 : 1),
        ],
        'floor' => collect($apartment->floors->pluck('acronym')->all())->implode(', '),
      ];
    }

    return $data;

  }
}
