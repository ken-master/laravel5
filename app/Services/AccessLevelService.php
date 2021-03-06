<?php namespace App\Services;

use App\Repositories\AccessLevel\AccessLevelRepository;


use Illuminate\Support\Facades\Route;


//use App\Http\Requests\RegisterUserRequest;
//use Illuminate\Contracts\Hashing\Hasher as Hash;


class AccessLevelService{

	protected $accessLevel;
	

	public function __construct( AccessLevelRepository $accessLevel)
	{
		$this->accessLevel = $accessLevel;
	
	}



	public function get($id = null){
		return $this->accessLevel->get($id);
	}

	public function save(array $data)
	{
		//dd($data);
		if ( isset($data['id']) && !empty($data['id']) ) {
			$accessLevel['id'] = $data['id'];
		}
		
	
	
		$accessLevel['name'] 			= $data['name'];
		$accessLevel['description'] 	= $data['description'];
		$accessLevel['permission']		= $data['permission'];

		return $this->accessLevel->save($accessLevel);
	}

	public function delete($id)
	{
		//TO DO:
		// CRAETE FORM HELPER FOR DELETE FORM to pass 
		// HTTP DELETE Protocol
		return $this->accessLevel->delete($id);
	}

	/**
	 * Get current Listed Route Names
	 * @return Array routename => (name.action .... )
	 */
	public function getRouteList()
	{	
		$routes = Route::getRoutes();
		$routeValue = array();
		foreach( $routes as $value ){
			if( !is_null($value->getName()) ){

				$explode = explode('.', $value->getName());
						
				$routekey[] = $explode[0];
				$routeValue[] = $value->getName();
				
			}
		}
		
		$routekey = array_unique($routekey);

		foreach($routekey as $v){
			foreach ($routeValue as $key => $value) {
				
				if( strpos( $value, $v."." ) !== false ){
				 		$arr[] = $value;	 			
				}

			}
			
			$xxx[$v ] = $arr;
			unset($arr);
		}


		return $xxx;
	}

}