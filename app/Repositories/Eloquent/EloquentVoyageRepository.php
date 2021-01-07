<?php

	namespace App\Repositories\Eloquent;

	use App\Models\Voyage;

	use App\Repositories\interfaces\VoyageRepositoryInterface;
	class EloquentVoyageRepository implements VoyageRepositoryInterface{

	public function all(){
		return Voyage::all();
	}
	public function getById(int $id){
		return Voyage::where('id',$id)->first();
	}
	public function save(Voyage $Voyage){
		return $Voyage->save();
	}
    /**
     * Updates a voyage.
     *
     * @param int
     * @param array
     */
    public function update($voyage_id, array $voyage_data)
    {
        Voyage::find($voyage_id)->update($voyage_data);
    }
	public function delete(int $id){
		return Voyage::where('id',$id)->delete();
	}
}