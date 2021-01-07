<?php

namespace App\Http\Controllers;

use App\Models\Voyage;
use Illuminate\Http\Request;
use App\Repositories\interfaces\VoyageRepositoryInterface;
class VoyageController extends Controller
{
	var $voyageRepository;
	
	public function __construct(VoyageRepositoryInterface $voyageRepository){
		$this->voyageRepository=$voyageRepository;
	}
	
	private function validateRequest($request){

		$request->validate([

		'lieu_dep' => 'required',

		'lieu_arr' => 'required',

		'dateh_dep'=> 'required',
		
		'num_voiture'=>'required',
		
		'num_tel'=>'required',
		
		'nbr_places'=>'required',
		
		'prix'=>'required',

		]);
}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $voyages=$this->voyageRepository->all();
		return response()->json($voyages);
    }
	
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */	
    public function getVoyage($id)
    {
        $voyage=$this->voyageRepository->getById($id);
		return response()->json($voyage);
    }	
	
	
	public function save(Request $request){

	//validations...

		$validateData=$this->validateRequest($request);

		$voyage= new Voyage([

		'lieu_dep' => $request->get('lieu_dep'),

		'lieu_arr' => $request->get('lieu_arr'),

		'dateh_dep'=> $request->get('dateh_dep'),
		
		'num_voiture'=>$request->get('num_voiture'),
		
		'num_tel'=>$request->get('num_tel'),
		
		'nbr_places'=>$request->get('nbr_places'),
		
		'prix'=>$request->get('prix')

		]);

		$this->voyageRepository->save($voyage);

		return response()->json($voyage);

	}



    public function update(Request $request)
    {
        //validations...

		$validateData=$this->validateRequest($request);

		$data_array = [
			
			'lieu_dep' => $request->get('lieu_dep'),

			'lieu_arr' => $request->get('lieu_arr'),

			'dateh_dep'=> $request->get('dateh_dep'),
			
			'num_voiture'=>$request->get('num_voiture'),
			
			'num_tel'=>$request->get('num_tel'),
			
			'nbr_places'=>$request->get('nbr_places'),
			
			'prix'=>$request->get('prix')
		];

		$this->voyageRepository->update($request->get('id'),$data_array);
		return response()->json($this->voyageRepository->getById($request->get('id')));
    }
	

	public function delete($id){

		if($this->voyageRepository->delete($id)){

			return response()->json(["status" =>'suppression effectué'],200);

		}

		return response()->json(["status" =>'Erreur suppression'],500);

	}

}
