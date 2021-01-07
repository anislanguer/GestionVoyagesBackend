<?php
	namespace App\Repositories\interfaces;
	
	use App\Models\Voyage;
	
	interface VoyageRepositoryInterface{
		public function all();
		public function getById(int $id);
		public function save(Voyage $voyage);
    /**
     * @param int
     * @param array
     */
		public function update($post_id, array $post_data);
		public function delete(int $id);
	}