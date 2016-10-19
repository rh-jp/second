<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Domain;
use Validator;
use Response;
use Illuminate\Support\Facades\Input;

class IndexController extends Controller
{
   public function addItem(Request $request) {
   	$rules = array (
   				'name' => 'required'
   		);
   		$validator = Validator::make ( Input::all(), $rules);
   		if ($validator->fails())
   			return Response::json ( array (

   				'errors' => $validator->getMessageBag()->toArray()
   				));
   		else {
   			$data = new Domain();
   			$data->name = $request->name;
   			$data->save();
   			return resonse()->json ($data);

   		}
   }

   public function edititem(Request $req) {
   	$data = Domain::find ( $req->id);
   	$data->name = $req->name;
   	$data->save();
   	return response ()->json ($data);
   }

   public function readItems(Request $req) {
   		$data = Domain::all();
   		// return response()->json ($data);
   		return view ('test')->withData ($data);

   }

   public function deleteItem(Request $req) {
   	Domain::find ($req->id)->delete();
   	return response ()->json ();
   }

}
