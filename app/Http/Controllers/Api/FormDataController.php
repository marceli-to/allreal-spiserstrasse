<?php
namespace App\Http\Controllers\Api;
use App\Models\FormData;
use App\Notifications\FormSubmit;
use App\Http\Requests\FormDataStoreRequest;
use App\Http\Resources\FormDataResource;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Notification;
use Illuminate\Http\Request;

class FormDataController extends Controller
{
  /**
   * Get all form data
   * 
   * @return \Illuminate\Http\Response
   */
  public function get()
  {
    $data = FormData::all();
    return response()->json($data);
  }

  /**
   * Store submited form data
   *
   * @param  \Illuminate\Http\Request $request
   * @return \Illuminate\Http\Response
   */
  public function store(FormDataStoreRequest $request)
  {
    $data = FormData::create($request->except('_token'));
    Notification::route('mail', 'm@marceli.to')->notify(new FormSubmit($data));
    
    return response()->json('successfully updated');
  }

  /**
   * Search Apartments
   * 
   * @return \Illuminate\Http\Response
   */
  public function search($keyword = NULL)
  {  
    $data = FormDataResource::collection(
      FormData::where('name', 'LIKE', '%'.$keyword.'%')
        ->orWhere('firstname', 'LIKE', '%'.$keyword.'%')
        ->orWhere('email', 'LIKE', '%'.$keyword.'%')
        ->orWhere('phone', 'LIKE', '%'.$keyword.'%')
        ->orWhere('street', 'LIKE', '%'.$keyword.'%')
        ->orWhere('city', 'LIKE', '%'.$keyword.'%')
        ->get()
    );
    return response()->json($data);
  }

  /**
   * Delete form data
   * @param  \App\Models\FormData $formData
   * @return \Illuminate\Http\Response
   */

  public function destroy(FormData $formData)
  {
    $formData->delete();
    return response()->json('successfully deleted');
  }
}
