<?php
namespace App\Http\Controllers\Api;
use App\Models\FormData;
use App\Http\Requests\FormDataStoreRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FormDataController extends Controller
{
  /**
   * Store submited form data
   *
   * @param  \Illuminate\Http\Request $request
   * @return \Illuminate\Http\Response
   */
  public function store(FormDataStoreRequest $request)
  {
    dd($request->all());
    return response()->json('successfully updated');
  }
}
