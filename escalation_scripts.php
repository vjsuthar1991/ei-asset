<?php
$round = $_GET['round'];

date_default_timezone_set('Asia/Kolkata');

require_once '../connect.php';

if(isset($round) && $round != ''){

	function sendEmail($toEmails,$ccEmails,$table){
		// Pear Mail Library
			require_once "Mail-1.4.1/Mail.php";

			$from = '<Jignasha.mistry@ei-india.com>';
			$to = '<'.$toEmails.'>';
			$cc = '<'.$ccEmails.'>';
			$recepients = $to.', '.$cc;
			$subject = 'Pending Dispatch And Delivery Alert';
			$body = $table;

			$headers = array(
				'MIME-Version' => '1.0rn',
	        	'Content-Type' => "text/html; charset=ISO-8859-1rn",
			    'From' => $from,
			    'Reply-To' => $from,
			    'To' => $to,
			    'Cc' => $cc,
			    'Subject' => $subject
			);

			$smtp = Mail::factory('smtp', array(
			        'host' => 'ssl://smtp.gmail.com',
			        'port' => '465',
			        'auth' => true,
			        'username' => 'billingdesk@ei-india.com',
			        'password' => 'billing123',
			    ));

			$mail = $smtp->send($recepients, $headers, $body);

			if (PEAR::isError($mail)) {
			    echo('<p>' . $mail->getMessage() . '</p>');
			} else {
			    echo('<p>Message successfully sent!</p>');
			}	
	}

	$roundDescription = mysql_fetch_array(mysql_query("select description from test_edition_details 
		where test_edition = '$round'"));


	$vendorsQuery = mysql_query('select * from vendors where vendor_status = 1');

	if(mysql_num_rows($vendorsQuery) > 0){
		
		while($vendorDetail = mysql_fetch_array($vendorsQuery)){

			$vendorID = $vendorDetail['vendor_id'];
			$priority1VendorName = $vendorDetail['vendor_contact_person_1_name'];
			//$priority1EIMail = 'rahul@ei-india.com';
			$priority1EIMail = 'Jignasha.mistry@ei-india.com,Mitul.patel@ei-india.com';
			//$priority1VendorMail = 'vijay.suthar@ei-india.com';
			$priority1VendorMail = $vendorDetail['vendor_contact_person_1_email'];

			$priority2VendorName = $vendorDetail['vendor_coo_name'];
			$priority2EIMail = 'brahma.sharma@ei-india.com';
			$priority2VendorMail = $vendorDetail['vendor_coo_email'];

			$priority3VendorName = $vendorDetail['vendor_ceo_name'];
			$priority3EIMail = 'sudhir@ei-india.com';
			$priority3VendorMail = $vendorDetail['vendor_ceo_email'];


			$queryStringDispatch = 'select t1.school_code,t1.test_edition,t2.lot_no,t2.vendor_id,REPLACE(t3.schoolname,"^","'."'".'") as schoolname,t3.city,t3.region,DATE_FORMAT(t1.pack_label_date,"%d-%m-%Y") as pack_label_date
			from school_status as t1
			LEFT JOIN school_process_tracking as t2 ON t1.school_code = t2.school_code AND t2.test_edition = "'.$round.'"
			JOIN schools as t3 ON t1.school_code = t3.schoolno
			where t1.test_edition = "'.$round.'"
			and t1.status != "cancelled"
			and t1.dynamic_flag != 1
			and t1.pack_label_date != 0000-00-00
			and t2.qb_despatch_date = 0000-00-00
			and t2.vendor_id = '.$vendorID.'
			and CURDATE() > DATE_ADD(t1.pack_label_date, INTERVAL 3 DAY)';
			

			$query = mysql_query($queryStringDispatch);

			$table = '<p> Dear '.$priority1VendorName.', <br><br> We have noticed that the dispatching of ASSET test papers of below school for the round '.$roundDescription['description'].' is pending from your end, which was to be done within 3 Days from the date given for packing.</p>';
			$table .= '<br><br>';
			$tableMailFlag = 1;

			if(mysql_num_rows($query) > 0){

			$table .= '<table cellpadding="5" cellspacing="0" style="border-right:1px solid black;border-bottom:1px solid black;" >';
			$table .= '<tr><th style="border-left:1px solid black;border-top:1px solid black;">S.No.</th>';
			$table .= '<th style="border-left:1px solid black;border-top:1px solid black;">School Code</th>';
			$table .= '<th style="border-left:1px solid black;border-top:1px solid black;">School Name</th>';
			$table .= '<th style="border-left:1px solid black;border-top:1px solid black;">City</th>';
			$table .= '<th style="border-left:1px solid black;border-top:1px solid black;">Pack Label Date</th>';
			$table .= '<th style="border-left:1px solid black;border-top:1px solid black;">Lot No.</th>';
			$table .= '<th style="border-left:1px solid black;border-top:1px solid black;">Escalation Type</th>';
			$table .= '</tr>';

			$i = 1;
			
			while($line = mysql_fetch_array($query)){
				
				
				$getLog = mysql_num_rows(mysql_query('select escalation_id from escalation_mail_log where school_code = '.$line['school_code'].' and test_edition = "'.$line['test_edition'].'" and escalation_type = "Dispatch"'));


				if($getLog > 0){

					// $updateLog = mysql_query('update escalation_mail_log set priority1_flag = 1, mail_sent_date = "'.date('Y-m-d H:i:s').'" where test_edition = "'.$line['test_edition'].'" and school_code = '.$line['school_code'].' and escalation_type = "Packing" ');
					

				}
				else {
					
					$insertLog = mysql_query('insert into escalation_mail_log set school_code = '.$line['school_code'].',test_edition = "'.$line['test_edition'].'", mail_sent_date = "'.date('Y-m-d H:i:s').'",mail_to = "'.$priority1EIMail.','.$priority1VendorMail.'",escalation_type = "Dispatch",priority_flag = 1');

					$table .= '<tr><td style="border-left:1px solid black;border-top:1px solid black;">'.$i.'</td>';
					$table .= '<td style="border-left:1px solid black;border-top:1px solid black;">'.$line['school_code'].'</td>';
					$table .= '<td style="border-left:1px solid black;border-top:1px solid black;">'.$line['schoolname'].'</td>';
					$table .= '<td style="border-left:1px solid black;border-top:1px solid black;">'.$line['city'].'</td>';
					$table .= '<td style="border-left:1px solid black;border-top:1px solid black;">'.$line['pack_label_date'].'</td>';
					$table .= '<td style="border-left:1px solid black;border-top:1px solid black;">'.$line['lot_no'].'</td>';
					$table .= '<td style="border-left:1px solid black;border-top:1px solid black;">Dispatch</td>';
					$table .= '</tr>';

					$tableMailFlag = 0;
					$i++;


				}


			}

				$table .= '</table><br>';
				$table .= 'Kindly ensure that the task is closed within 2/3 days from today.<br>';
				$table .= '<br>Thank You,<br><br>Team ASSET<br><br>';
			}
			

			if($tableMailFlag == 0){

				sendEmail($priority1VendorMail,$priority1EIMail,$table);

			}

			$query = mysql_query($queryStringDispatch);

			$table = '<p> Dear '.$priority2VendorName.', <br><br> Below school for the round '.$roundDescription['description'].' needs your immediate attention! <br><br>Please note that the task of dispatching ASSET test papers has not yet been closed by your team and hence there is a delay in delivery to the school.</p>';
			$table .= '<br><br>';
			
			$tableMailFlag = 1;

			if(mysql_num_rows($query) > 0){

			$table .= '<table cellpadding="5" cellspacing="0" style="border-right:1px solid black;border-bottom:1px solid black;" >';
			$table .= '<tr><th style="border-left:1px solid black;border-top:1px solid black;">S.No.</th>';
			$table .= '<th style="border-left:1px solid black;border-top:1px solid black;">School Code</th>';
			$table .= '<th style="border-left:1px solid black;border-top:1px solid black;">School Name</th>';
			$table .= '<th style="border-left:1px solid black;border-top:1px solid black;">City</th>';
			$table .= '<th style="border-left:1px solid black;border-top:1px solid black;">Pack Label Date</th>';
			$table .= '<th style="border-left:1px solid black;border-top:1px solid black;">Lot No.</th>';
			$table .= '<th style="border-left:1px solid black;border-top:1px solid black;">Escalation Type</th>';
			$table .= '<th style="border-left:1px solid black;border-top:1px solid black;">Previous Reminder Date</th></tr>';

			$i = 1;
			
			
			while($line = mysql_fetch_array($query)){


				$getLog = mysql_query('select *,DATE_FORMAT(mail_sent_date,"%d-%m-%Y") as mail_sent_date from escalation_mail_log where school_code = '.$line['school_code'].' and test_edition = "'.$line['test_edition'].'" and escalation_type = "Dispatch" and priority_flag = 1 and CURDATE() > DATE_ADD(mail_sent_date, INTERVAL 3 DAY)');
				

				if(mysql_num_rows($getLog) > 0){

					$gpLQuery = mysql_query('select escalation_id from escalation_mail_log where school_code = '.$line['school_code'].' and test_edition = "'.$line['test_edition'].'" and escalation_type = "Dispatch" and priority_flag = 2');
					
					

					if(mysql_num_rows($gpLQuery) == 0){

					$getPreviousLog = mysql_fetch_array($getLog);

						$insertLog = mysql_query('insert into escalation_mail_log set school_code = '.$line['school_code'].',test_edition = "'.$line['test_edition'].'",	mail_sent_date = "'.date('Y-m-d H:i:s').'",mail_to = "'.$priority2EIMail.','.$priority2VendorMail.'",escalation_type = "Dispatch",priority_flag = 2');

							$table .= '<tr><td style="border-left:1px solid black;border-top:1px solid black;">'.$i.'</td>';
							$table .= '<td style="border-left:1px solid black;border-top:1px solid black;">'.$line['school_code'].'</td>';
							$table .= '<td style="border-left:1px solid black;border-top:1px solid black;">'.$line['schoolname'].'</td>';
							$table .= '<td style="border-left:1px solid black;border-top:1px solid black;">'.$line['city'].'</td>';
							$table .= '<td style="border-left:1px solid black;border-top:1px solid black;">'.$line['pack_label_date'].'</td>';
							$table .= '<td style="border-left:1px solid black;border-top:1px solid black;">'.$line['lot_no'].'</td>';
							$table .= '<td style="border-left:1px solid black;border-top:1px solid black;">Dispatch</td>';
							$table .= '<td style="border-left:1px solid black;border-top:1px solid black;">'.$getPreviousLog['mail_sent_date'].'</td></tr>';
							$tableMailFlag = 0;
							$i++;

					}

					
				}
				


			}

				$table .= '</table><br>';
				$table .= 'As timely service is of paramount importance for our customers, please ensure the dispatch and inform us within 48 hours of receipt of this mail.<br>';
				$table .= '<br>Thank You,<br><br>Team ASSET<br><br>';
			}
			

			if($tableMailFlag == 0){

				sendEmail($priority2VendorMail,$priority2EIMail,$table);

			}

			$query = mysql_query($queryStringDispatch);

			$table = '<p> Dear '.$priority3VendorName.', <br><br> Below school for the round '.$roundDescription['description'].' needs your immediate attention! <br><br>Please note that the task of dispatching ASSET test papers has not yet been closed by your team and hence there is a delay in delivery to the school.</p>';
			$table .= '<br><br>';
			
			$tableMailFlag = 1;



			if(mysql_num_rows($query) > 0){


			$table .= '<table cellpadding="5" cellspacing="0" style="border-right:1px solid black;border-bottom:1px solid black;" >';
			$table .= '<tr><th style="border-left:1px solid black;border-top:1px solid black;">S.No.</th>';
			$table .= '<th style="border-left:1px solid black;border-top:1px solid black;">School Code</th>';
			$table .= '<th style="border-left:1px solid black;border-top:1px solid black;">School Name</th>';
			$table .= '<th style="border-left:1px solid black;border-top:1px solid black;">City</th>';
			$table .= '<th style="border-left:1px solid black;border-top:1px solid black;">Pack Label Date</th>';
			$table .= '<th style="border-left:1px solid black;border-top:1px solid black;">Lot No.</th>';
			$table .= '<th style="border-left:1px solid black;border-top:1px solid black;">Escalation Type</th>';
			$table .= '<th style="border-left:1px solid black;border-top:1px solid black;">Previous Reminder Date</th></tr>';

			$i = 1;
			
			while($line = mysql_fetch_array($query)){
				
				$getLog = mysql_query('select *,DATE_FORMAT(mail_sent_date,"%d-%m-%Y") as mail_sent_date from escalation_mail_log where school_code = '.$line['school_code'].' and test_edition = "'.$line['test_edition'].'" and escalation_type = "Dispatch" and priority_flag = 2 and CURDATE() > DATE_ADD(mail_sent_date, INTERVAL 3 DAY)');
				

				if(mysql_num_rows($getLog) > 0){
					
					$gplQuery = mysql_query('select escalation_id from escalation_mail_log where school_code = '.$line['school_code'].' and test_edition = "'.$line['test_edition'].'" and escalation_type = "Dispatch" and priority_flag = 3');

					

					if(mysql_num_rows($gplQuery) == 0){

						$getPreviousLog = mysql_fetch_array($getLog);

						$insertLog = mysql_query('insert into escalation_mail_log set school_code = '.$line['school_code'].',test_edition = "'.$line['test_edition'].'", mail_sent_date = "'.date('Y-m-d H:i:s').'",mail_to = "'.$priority3EIMail.','.$priority3VendorMail.'",escalation_type = "Dispatch",priority_flag = 3');

							$table .= '<tr><td style="border-left:1px solid black;border-top:1px solid black;">'.$i.'</td>';
							$table .= '<td style="border-left:1px solid black;border-top:1px solid black;">'.$line['school_code'].'</td>';
							$table .= '<td style="border-left:1px solid black;border-top:1px solid black;">'.$line['schoolname'].'</td>';
							$table .= '<td style="border-left:1px solid black;border-top:1px solid black;">'.$line['city'].'</td>';
							$table .= '<td style="border-left:1px solid black;border-top:1px solid black;">'.$line['pack_label_date'].'</td>';
							$table .= '<td style="border-left:1px solid black;border-top:1px solid black;">'.$line['lot_no'].'</td>';
							$table .= '<td style="border-left:1px solid black;border-top:1px solid black;">Dispatch</td>';
							$table .= '<td style="border-left:1px solid black;border-top:1px solid black;">'.$getPreviousLog['mail_sent_date'].'</td></tr>';
							$tableMailFlag = 0;
							$i++;

					}
					

				}
				


			}

				$table .= '</table><br>';
				$table .= 'As timely service is of paramount importance for our customers, please ensure the dispatch and inform us within 48 hours of receipt of this mail.<br>';
				$table .= '<br>Thank You,<br><br>Team ASSET<br><br>';
			}
			

			if($tableMailFlag == 0){

				sendEmail($priority3VendorMail,$priority3EIMail,$table);

			}


			$queryStringDelivery = 'select t1.school_code,t1.test_edition,t3.city,t3.region,REPLACE(t3.schoolname,"^","'."'".'") as schoolname,DATE_FORMAT(t2.qb_despatch_date,"%d-%m-%Y") as qb_despatch_date
			from school_status as t1
			LEFT JOIN school_process_tracking as t2 ON t1.school_code = t2.school_code AND t2.test_edition = "'.$round.'"
			JOIN schools as t3 ON t1.school_code = t3.schoolno
			where t1.test_edition = "'.$round.'"
			and t1.status != "cancelled"
			and t1.dynamic_flag != 1
			and t1.pack_label_date != 0000-00-00
			and t2.qb_despatch_date != 0000-00-00
			and t2.vendor_id = '.$vendorID.'
			and CURDATE() > DATE_ADD(t2.qb_despatch_date, INTERVAL 10 DAY)';

			$query = mysql_query($queryStringDelivery);
			
			$table = '<p> Dear '.$priority1VendorName.', <br><br> We have noticed that the ASSET test papers of below school for the round '.$roundDescription['description'].' is not delivered, which was to be done withing 10 Days from the dispatch date given.</p>';
			$table .= '<br><br>';

			$tableMailFlag = 1;

			if(mysql_num_rows($query) > 0){

			$table .= '<table cellpadding="5" cellspacing="0" style="border-right:1px solid black;border-bottom:1px solid black;" >';
			$table .= '<tr><th style="border-left:1px solid black;border-top:1px solid black;">S.No.</th>';
			$table .= '<th style="border-left:1px solid black;border-top:1px solid black;">School Code</th>';
			$table .= '<th style="border-left:1px solid black;border-top:1px solid black;">School Name</th>';
			$table .= '<th style="border-left:1px solid black;border-top:1px solid black;">City</th>';
			$table .= '<th style="border-left:1px solid black;border-top:1px solid black;">Escalation Type</th>';
			$table .= '<th style="border-left:1px solid black;border-top:1px solid black;">Dispatch Date</th></tr>';

			$i = 1;
			
			while($line = mysql_fetch_array($query)){
				
				
				$gplQuery = mysql_query('select escalation_id from escalation_mail_log where school_code = '.$line['school_code'].' and test_edition = "'.$line['test_edition'].'" and escalation_type = "Delivery" and priority_flag = 1');

					if(mysql_num_rows($gplQuery) == 0){

						$insertLog = mysql_query('insert into escalation_mail_log set school_code = '.$line['school_code'].',test_edition = "'.$line['test_edition'].'",	mail_sent_date = "'.date('Y-m-d H:i:s').'",mail_to = "'.$priority1EIMail.','.$priority1VendorMail.'",escalation_type = "Delivery",priority_flag = 1');

							$table .= '<tr><td style="border-left:1px solid black;border-top:1px solid black;">'.$i.'</td>';
							$table .= '<td style="border-left:1px solid black;border-top:1px solid black;">'.$line['school_code'].'</td>';
							$table .= '<td style="border-left:1px solid black;border-top:1px solid black;">'.$line['schoolname'].'</td>';
							$table .= '<td style="border-left:1px solid black;border-top:1px solid black;">'.$line['city'].'</td>';
							$table .= '<td style="border-left:1px solid black;border-top:1px solid black;">Delivery</td>';
							$table .= '<td style="border-left:1px solid black;border-top:1px solid black;">'.$line['qb_despatch_date'].'</td></tr>';
							$tableMailFlag = 0;
							$i++;

					}
					

			}

				$table .= '</table><br>';
				$table .= 'Kindly ensure that the task is closed within 2/3 days from today.<br>';
				$table .= '<br>Thank You,<br><br>Team ASSET<br><br>';
			}
			

			if($tableMailFlag == 0){

				sendEmail($priority1VendorMail,$priority1EIMail,$table);	

			}


			$query = mysql_query($queryStringDelivery);
			

			$table = '<p> Dear '.$priority2VendorName.', <br><br> Below school for the round '.$roundDescription['description'].' needs your immediate attention! <br><br>Please note that the ASSET test papers of below school for the round '.$roundDescription['description'].' is not delivered.</p>';
			$table .= '<br><br>';
			
			$tableMailFlag = 1;

			if(mysql_num_rows($query) > 0){

			$table .= '<table cellpadding="5" cellspacing="0" style="border-right:1px solid black;border-bottom:1px solid black;" >';
			$table .= '<tr><th style="border-left:1px solid black;border-top:1px solid black;">S.No.</th>';
			$table .= '<th style="border-left:1px solid black;border-top:1px solid black;">School Code</th>';
			$table .= '<th style="border-left:1px solid black;border-top:1px solid black;">School Name</th>';
			$table .= '<th style="border-left:1px solid black;border-top:1px solid black;">City</th>';
			$table .= '<th style="border-left:1px solid black;border-top:1px solid black;">Escalation Type</th>';
			$table .= '<th style="border-left:1px solid black;border-top:1px solid black;">Dispatch Date</th>';
			$table .= '<th style="border-left:1px solid black;border-top:1px solid black;">Previous Reminder Date</th></tr>';

			$i = 1;
			
			while($line = mysql_fetch_array($query)){
				
				$getLog = mysql_query('select *,DATE_FORMAT(mail_sent_date,"%d-%m-%Y") as mail_sent_date from escalation_mail_log where school_code = '.$line['school_code'].' and test_edition = "'.$line['test_edition'].'" and escalation_type = "Delivery" and priority_flag = 1 and CURDATE() > DATE_ADD(mail_sent_date, INTERVAL 3 DAY)');
				

				if(mysql_num_rows($getLog) > 0){
					
					$gplQuery = mysql_query('select escalation_id from escalation_mail_log where school_code = '.$line['school_code'].' and test_edition = "'.$line['test_edition'].'" and escalation_type = "Delivery" and priority_flag = 2');

					

					if(mysql_num_rows($gplQuery) == 0){

						$getPreviousLog = mysql_fetch_array($getLog);

						$insertLog = mysql_query('insert into escalation_mail_log set school_code = '.$line['school_code'].',test_edition = "'.$line['test_edition'].'",	mail_sent_date = "'.date('Y-m-d H:i:s').'",mail_to = "'.$priority2EIMail.','.$priority2VendorMail.'",escalation_type = "Delivery",priority_flag = 2');

							$table .= '<tr><td style="border-left:1px solid black;border-top:1px solid black;">'.$i.'</td>';
							$table .= '<td style="border-left:1px solid black;border-top:1px solid black;">'.$line['school_code'].'</td>';
							$table .= '<td style="border-left:1px solid black;border-top:1px solid black;">'.$line['schoolname'].'</td>';
							$table .= '<td style="border-left:1px solid black;border-top:1px solid black;">'.$line['city'].'</td>';
							$table .= '<td style="border-left:1px solid black;border-top:1px solid black;">Delivery</td>';
							$table .= '<td style="border-left:1px solid black;border-top:1px solid black;">'.$line['qb_despatch_date'].'</td>';
							$table .= '<td style="border-left:1px solid black;border-top:1px solid black;">'.$getPreviousLog['mail_sent_date'].'</td></tr>';
							$tableMailFlag = 0;
							$i++;

					}
					

				}
				


			}

				$table .= '</table><br>';
				$table .= 'As timely service is of paramount importance for our customers, please ensure the delivery is done and inform us within 48 hours of receipt of this mail.<br>';
				$table .= '<br>Thank You,<br><br>Team ASSET<br><br>';
			}
			

			if($tableMailFlag == 0){

				sendEmail($priority2VendorMail,$priority2EIMail,$table);

			}

			$query = mysql_query($queryStringDelivery);
			

			$table = '<p> Dear '.$priority3VendorName.', <br><br> Below school for the round '.$roundDescription['description'].' needs your immediate attention! <br><br>Please note that the ASSET test papers of below school for the round '.$roundDescription['description'].' is not delivered.</p>';
			$table .= '<br><br>';

			$tableMailFlag = 1;

			if(mysql_num_rows($query) > 0){

			$table .= '<table cellpadding="5" cellspacing="0" style="border-right:1px solid black;border-bottom:1px solid black;" >';
			$table .= '<tr><th style="border-left:1px solid black;border-top:1px solid black;">S.No.</th>';
			$table .= '<th style="border-left:1px solid black;border-top:1px solid black;">School Code</th>';
			$table .= '<th style="border-left:1px solid black;border-top:1px solid black;">School Name</th>';
			$table .= '<th style="border-left:1px solid black;border-top:1px solid black;">City</th>';
			$table .= '<th style="border-left:1px solid black;border-top:1px solid black;">Escalation Type</th>';
			$table .= '<th style="border-left:1px solid black;border-top:1px solid black;">Dispatch Date</th>';
			$table .= '<th style="border-left:1px solid black;border-top:1px solid black;">Previous Reminder Date</th></tr>';

			$i = 1;
			
			while($line = mysql_fetch_array($query)){
				
				$getLog = mysql_query('select *,DATE_FORMAT(mail_sent_date,"%d-%m-%Y") as mail_sent_date from escalation_mail_log where school_code = '.$line['school_code'].' and test_edition = "'.$line['test_edition'].'" and escalation_type = "Delivery" and priority_flag = 2 and CURDATE() > DATE_ADD(mail_sent_date, INTERVAL 3 DAY)');
				

				if(mysql_num_rows($getLog) > 0){
					
					$gplQuery = mysql_query('select escalation_id from escalation_mail_log where school_code = '.$line['school_code'].' and test_edition = "'.$line['test_edition'].'" and escalation_type = "Delivery" and priority_flag = 3');

					if(mysql_num_rows($gplQuery) == 0){

						$getPreviousLog = mysql_fetch_array($getLog);

						$insertLog = mysql_query('insert into escalation_mail_log set school_code = '.$line['school_code'].',test_edition = "'.$line['test_edition'].'",	mail_sent_date = "'.date('Y-m-d H:i:s').'",mail_to = "'.$priority3EIMail.','.$priority3VendorMail.'",escalation_type = "Delivery",priority_flag = 3');

							$table .= '<tr><td style="border-left:1px solid black;border-top:1px solid black;">'.$i.'</td>';
							$table .= '<td style="border-left:1px solid black;border-top:1px solid black;">'.$line['school_code'].'</td>';
							$table .= '<td style="border-left:1px solid black;border-top:1px solid black;">'.$line['schoolname'].'</td>';
							$table .= '<td style="border-left:1px solid black;border-top:1px solid black;">'.$line['city'].'</td>';
							$table .= '<td style="border-left:1px solid black;border-top:1px solid black;">Delivery</td>';
							$table .= '<td style="border-left:1px solid black;border-top:1px solid black;">'.$line['qb_despatch_date'].'</td>';
							$table .= '<td style="border-left:1px solid black;border-top:1px solid black;">'.$getPreviousLog['mail_sent_date'].'</td></tr>';
							$tableMailFlag = 0;
							$i++;

					}
					

				}
				


			}

				$table .= '</table><br>';
				$table .= 'As timely service is of paramount importance for our customers, please ensure the delivery is done and inform us within 48 hours of receipt of this mail.<br>';
				$table .= '<br>Thank You,<br><br>Team ASSET<br><br>';
			}
			

			if($tableMailFlag == 0){

				sendEmail($priority3VendorMail,$priority3EIMail,$table);

			}

		}

	}
}

?>