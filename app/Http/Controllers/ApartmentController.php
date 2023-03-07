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
    return view($this->viewPath . 'apartments', ['apartments' => $this->getApartments(Apartment::with('floors')->get())]);
  }

  /**
   * Shows a single apartment
   * 
   * @param Apartment $apartment
   * @return \Illuminate\Http\Response
   */
  public function show(Apartment $apartment, $slug = NULL)
  {
    return view($this->viewPath . 'apartment', ['apartment' => $this->getApartment($apartment)]);
  }

  private function getApartments($apartments)
  {
    $data = [];
    foreach($apartments as $apartment)
    {
      if ($apartment->type == 'Atelier')
      {
        $slug = 'atelier-' . $apartment->number;
      }
      else
      {
        $slug  = $apartment->rooms . '-zimmer-wohnung';
        $slug .= '-' . strtolower(collect($apartment->floors->pluck('acronym')->all())->implode('-'));
        $slug .= '-' . $apartment->number;
      }
      
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
        'floor' => [
          'label' => collect($apartment->floors->pluck('acronym')->all())->implode(', '),
          'order' => collect($apartment->floors->pluck('order')->all())->min(),
        ],
        'slug' => $slug,
      ];
    }
    return $data;
  }

  private function getApartment(Apartment $apartment)
  {
    if ($apartment->type == 'Atelier')
    {
      $title = 'Atelier ' . $apartment->number;
    }
    else
    {
      $title  = $apartment->rooms . ' Zimmer-Wohnung';
      $title .= ', ' . collect($apartment->floors->pluck('acronym')->all())->implode('-');
      $title .= ', ' . $apartment->number;
    }

    return [
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
      'floor' => [
        'label' => collect($apartment->floors->pluck('acronym')->all())->implode(', '),
        'order' => collect($apartment->floors->pluck('order')->all())->min(),
      ],
      'title' => $title
    ];
  }
  
}
