<?php namespace Paperstreetmedia\Ajax;

use Illuminate\Database\Capsule\Manager as DB;

class Ratings implements AjaxInterface{
	
	public function post($data = array()){

		 DB::table('ratings')->insert(
			array(
				'name' => $data['username'], 
				'rating' => round($data['rating'], 2),
				'girlid' => $data['girlid'],
			)
		);
		
		return 'Your ratings has been successfully sent!';
	}
	
	public function get($data = array()){
	
		$ratinglist = new \stdClass;
		
		try {
			$ratings = DB::table('ratings')
			//->where('name', $data['username']) /* AND clause */
			->where('girlid', $data['girlid'])
			->get();
			if($ratings){
				$ratingcount = 0;
				foreach($ratings as $rating){
					$allrating[] = $rating->rating;
					$username = $rating->name;
					$girlid = $rating->girlid;
					$ratingcount++;
				}
				$ratinglist->percentage = round((array_sum($allrating) / $ratingcount), 1);
			}else{
				$ratinglist->percentage = 0.0;
			}
			
			
			
			
		}catch(\Exception $e){
		
			echo 'something went wrong';
			
		}
		
		return $ratinglist;
		
	}
	
	static public function delete($data = array()){
		
		return 'delete';
	}
	
}