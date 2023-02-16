<?php
namespace App\Http\Controllers\Api;
use App\Models\Apartment;
use App\Models\State;
use App\Http\Resources\ApartmentResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApartmentController extends Controller
{
  /**
   * Get all Apartments
   * 
   * @return \Illuminate\Http\Response
   */
  public function get()
  {  
    $data = ApartmentResource::collection(
      Apartment::with('floors')->get()
    );
    return response()->json($data);
  }

  /**
   * Find an apartment
   * @param Apartment $apartment
   * @return \Illuminate\Http\Response
   */
  public function find(Apartment $apartment)
  {  
    $data = ApartmentResource::make(
      Apartment::with('floors')->find($apartment->id)
    );
    return response()->json($data);
  }

  /**
   * Search Apartments
   * 
   * @return \Illuminate\Http\Response
   */
  public function search($keyword = NULL)
  {  
    if (str_starts_with($keyword, 'fre'))
    {
      $data = ApartmentResource::collection(
        Apartment::flagged(State::AVAILABLE)->get()
      );
      return response()->json($data);
    }

    if (str_starts_with($keyword, 'res'))
    {
      $data = ApartmentResource::collection(
        Apartment::flagged(State::RESERVED)->get()
      );
      return response()->json($data);
    }

    if (str_starts_with($keyword, 'ver'))
    {
      $data = ApartmentResource::collection(
        Apartment::flagged(State::SOLD)->get()
      );
      return response()->json($data);
    }
    
    $data = ApartmentResource::collection(
      Apartment::where('number', 'LIKE', '%'.$keyword.'%')
        ->orWhere('location', 'LIKE', '%'.$keyword.'%')
        ->orWhere('type', 'LIKE', '%'.$keyword.'%')
        ->orWhere('rooms', 'LIKE', '%'.$keyword.'%')
        ->get()
    );
    return response()->json($data);
  }

  /**
   * Update an apartment
   *
   * @param Apartment $apartment
   * @param  \Illuminate\Http\Request $request
   * @return \Illuminate\Http\Response
   */
  public function update(Apartment $apartment, Request $request)
  {
    $apartment->price = $request->input('price');
    $apartment->save();
    $apartment->flags()->delete();
    $apartment->flag(
      $request->input('state')
    );
    return response()->json('successfully updated');
  }
}
