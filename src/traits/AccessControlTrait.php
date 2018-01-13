<?php

	namespace Bantenprov\Advancetrust\Traits;

	trait AccessControlTrait
	{
		public function checkRole()
	    {    	
	    	if($this->currentRole() != 0){
	    		return in_array($this->getMyRole()->id,$this->currentRole());
	    	}else{
	    		return true;
	    	}
	    }

	    // get my role
	    public function getMyRole()
	    {
	    	return \Auth::user()->roles->first();
	    }

	    // get curret role
	    public function currentRole()
	    {
	    	$current_route = \Request::route()->getName();
	    	$available = \App\AccessControl::where('route_name','=',$current_route)->get();
	    	
	    	if($available->count() > 0){
	    		foreach ($available as $value) {
					$availables[] = $value->role_id;
				}	
	    	}else{
	    		$availables = 0;
	    	}
			// foreach ($available as $value) {
			// 	$availables[] = $value->role_id;
			// }

			return $availables;
	    }
	}	