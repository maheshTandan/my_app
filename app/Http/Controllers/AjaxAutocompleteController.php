<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

	class AjaxAutocompleteController extends Controller
	{
        public function index(){        
            return view('autocomplete');
        }
        public function searchResponse(Request $request){
            $query = $request->get('term','');
            $countries=\DB::table('products');
            if($request->type=='countryname')
            {
                $countries->where('suggestion_items','LIKE','%'.$query.'%');
            }
               $countries=$countries->get();        
            $data=array();
            foreach ($countries as $country) {
                    $data[]=array('name'=>$country->suggestion_items);
            }
            if(count($data))
                 return $data;
        }
    }