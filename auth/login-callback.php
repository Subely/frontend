<?php
// var_dump(setcookie("TestCookie", 'sss'));
setcookie("TestCookie", 'sssss', time()+3600, "/", "localhost:8080");

use Kunnu\Dropbox\Dropbox;
use Kunnu\Dropbox\DropboxApp;


require_once 'header.php';


if (isset($_GET['code']) && isset($_GET['state'])) {
    //Bad practice! No input sanitization!
    $code = $_GET['code'];
    $state = $_GET['state'];

    //Fetch the AccessToken
    $accessToken = $authHelper->getAccessToken($code, $state, $callbackUrl);

    $freshtoken = $accessToken->getToken();


// ---------------------   delete the rest and do with js ------- //

		//Configure Dropbox Application
		$user = new DropboxApp("3naerq00ohhrfbb", "fs91lwfc09ed1of", $freshtoken);

		//Configure Dropbox service
		$dbx = new Dropbox($user);

		$account = $dbx->getCurrentAccount();

		$email = $account->getEmail();
		// checks if user exsists
		//-----------------
		$url = 'http://api.subely.dev/dbxusers/verify/' . $email;
		$handle = curl_init($url);
		curl_setopt($handle,  CURLOPT_RETURNTRANSFER, TRUE);

		/* Get the HTML or whatever is linked in $url. */
		$resp = curl_exec($handle);

		/* Check for 404 (file not found). */
		$httpCode = curl_getinfo($handle, CURLINFO_HTTP_CODE);

		if($httpCode == 404) {
			/* Handle 404 here. */

			$token = (exec("~/Desktop/getToken"));

			$data = array(
			"access_token" => $token,
			"dbid" => $account->getAccountId(),
			"email" => $email,
			"display_name" => $account->getDisplayName(),
			"firstName" => $account->getNameDetails()['given_name'],
			"lastName" => $account->getNameDetails()['surname'],
			"profile_pic_url" => $account->getProfilePhotoUrl(),
			"verified" => $account->emailIsVerified(),
			"country" => $account->getCountry(),
			"language" => $account->getLocale(),
			"remember_token" => $freshtoken
			);

			$url ="http://api.subely.dev/dbxusers";

			$options = array(
				'http' => array(
					'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
					'method'  => 'POST',
					'content' => http_build_query($data)
				)
			);

			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

			// execute!
			$response = curl_exec($ch);

			// close the connection, release resources used
			curl_close($ch);

			// do anything you want with your response
			var_dump($response);

		}

    $token = (exec("~/Desktop/getToken"));

    echo $httpCode;
		$redirUrl = '../?view=dbxlogin&dbxtoken=' . $freshtoken . '&apitoken=' . $token;
		redirect($redirUrl);

		curl_close($handle);


}

?>
