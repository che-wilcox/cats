<?php
namespace App\Http\Controllers;

use App\Model\Cat;
use App\Model\Food;

use Illuminate\Http\Request;

class CatController extends Controller
{	
	public function getCats() 
	{
		$response = Cat::all();	   
		return $response;
	}
	
	public function getCat($id) 
	{
		$result['cat'] = Cat::find($id);
		
		$result['food'] = Food::where('cat_id', $id)->orderBy('id', 'desc')->get();
		
		return response()->json($result);
	}

	
	public function createCat(Request $request) 
	{		
		$response = array();
		$parameters = $request->json()->all();

		$rules =  array(
			'name'    => 'required'
		);
		$cat_name = $parameters['name'];

		$messages = array(
			'name.required' => 'name is required.'
		);		
		
		$validator = \Validator::make(array('name' => $cat_name), $rules, $messages);
		if(!$validator->fails()) {
			
			$response = Cat::create($parameters);
			return response()->json($response);			
			
		} else {
			
			$errors = $validator->errors();			
			return response()->json($errors);			
	  }
	}

	public function updateCat(Request $request, $id) {
		$response = array();
		
		$parameters = $request->json()->all();
		$cat = Cat::find($id);
	   
		if(!empty($cat)) {
			$cat->Name = $parameters['name'];
			$cat->Id = $id;            
 
			$cat->save();
			
			return response()->json($cat);					
		   
		} else {
			return response()->json(['status' => 'ERR']);
		}
	}
		
	 public function deleteCat($id) {
		$cat = Cat::find($id);
	   
		if(!empty($cat)) {
			$res = $cat->delete();
 
			return response()->json($id);	
		   
		} else {
			return response()->json(['status' => 'ERR']);
		}
	}	
	
	
	
	public function feedCat(Request $request, $id) {
		$response = array();
		
		$parameters = $request->json()->all();
		$parameters['cat_id'] = $id;
		$parameters['feed_time'] = date('Y-m-d H:i:s');
		
		$cat = Cat::find($id);
			   
		if(!empty($cat)) {				
			
			$response = Food::create($parameters);

			return response()->json($response);				
		   
		} else {
			return response()->json(['status' => 'ERR']);
		}
	}
	
	
}