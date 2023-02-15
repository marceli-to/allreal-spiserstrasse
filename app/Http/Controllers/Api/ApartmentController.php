<?php
namespace App\Http\Controllers\Api;
use App\Models\Apartment;
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
   * Search Apartments
   * 
   * @return \Illuminate\Http\Response
   */
  public function search($keyword = NULL)
  {  
    $data = ApartmentResource::collection(
      Apartment::orderBy('number')
        ->where('number', 'LIKE', '%'.$keyword.'%')
        ->orWhere('location', 'LIKE', '%'.$keyword.'%')
        ->orWhere('type', 'LIKE', '%'.$keyword.'%')
        ->get()
    );
    return response()->json($data);
  }
}
