


<?php
// API access key from Google API's Console
define( 'API_ACCESS_KEY', 'AIzaSyAOVr2FetmQHZFrOEEbX2MUMRCBxPthgAg' );
$registrationIds = array('cOcMVDVO_sI:APA91bFZ1gklDXnpU7ojlUbCIu5E0dPekPWB1kRBBj0O6wKxSPbfUA0yTuoMw_tyB4Ec7vR93iJ7VMVQ_1cLu9SA-ot7cWk6_J_rkSXgyQhaLyHD6NV2d0ZmU78fCEyyA-zkTf6EESFB');
// prep the bundle
$msg = array
(
	'message' 	=> 'here is a message. message',
	'title'		=> 'This is a title. title',
	'subtitle'	=> 'This is a subtitle. subtitle',
	'tickerText'	=> 'Ticker text here...Ticker text here...Ticker text here',
	'vibrate'	=> 1,
	'sound'		=> 1,
	'largeIcon'	=> 'large_icon',
	'smallIcon'	=> 'small_icon'
);
$fields = array
(
	'registration_ids' 	=> $registrationIds,
	'data'			=> $msg
);
 
$headers = array
(
	'Authorization: key=' . API_ACCESS_KEY,
	'Content-Type: application/json'
);
 
$ch = curl_init();
curl_setopt( $ch,CURLOPT_URL, 'https://android.googleapis.com/gcm/send' );
curl_setopt( $ch,CURLOPT_POST, true );
curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
$result = curl_exec($ch );
curl_close( $ch );
echo $result;