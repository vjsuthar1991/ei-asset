<?php 
	
	function getLatestRoundDetails(){

		$ci = get_instance();

		$ci->load->model('dashboards');
		$ci->load->model('packingslips');

		//get the latest round running in current session
		$data['round_latest'] = $ci->packingslips->getLatestRound();

		//loop through the rounds selected
		foreach ($data['round_latest'] as $key => $value) {

			$date1 = '01-10-'.date('Y'); //date set to start winter round

			$date2 = date('d-m-Y'); //get current date

			//compare current date with winter round date
			if(new DateTime($date1) > new DateTime($date2)){
				//condition to select summer round
				if($value->description == 'Summer '.date('Y')){
					$round = $value->test_edition;
					$description = $value->description;
				}
			}
			else{
				//condition to select winter round
				if($value->description == 'Winter '.date('Y')){
					$round = $value->test_edition;
					$description = $value->description;
				}
			}
			
		}

		$roundDetail = array('round' => $round,'description' => $description);
		return $roundDetail;
	}	

	
	



?>