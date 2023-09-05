<?php

class User {
	public function getParams($url) {
		$cURL = curl_init($url);
		curl_setopt($cURL, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($cURL);
		curl_close($cURL);
		$json = json_decode($response, true);
		if ($json === null) {
			echo 'Ошибка';
		} else {
			foreach($json as $key=>$value) {
				if (!is_array($value)) {
					echo "$key:$value <br>";
				}
				else {
					foreach($value as $skey=>$svalue) {
						if(!is_array($svalue)) {
							echo "$skey: $svalue <br>";
						}
						else {
							foreach($svalue as $sskey=>$ssvalue) {
								echo "$sskey: $ssvalue";
							}
						}
					}
				}
			}
		}
	}
	public function getUser($id) {
		$url = "https://jsonplaceholder.typicode.com/users/$id";
		$this->getParams($url);
	}
	public function getPosts($id) {
		$url = "https://jsonplaceholder.typicode.com/users/$id/posts";
		$this->getParams($url);
	}
	public function getTasks($id) {
		$url = "https://jsonplaceholder.typicode.com/users/$id/todos";
		$this->getParams($url);
	}
}
class Post extends User {
	public function addPost(string $title, string $body, int $id) {
		$url = "https://jsonplaceholder.typicode.com/users/$id/posts";
		$postData = [
			'title' => "$title",
			'body' => "$body",
			'userId' => "$id"
		];
		$jsonData = json_encode($postData);
		$cURL = curl_init($url);
		curl_setopt($cURL, CURLOPT_POST, 1);
		curl_setopt($cURL, CURLOPT_POSTFIELDS, $jsonData);
		curl_setopt($cURL, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($cURL, CURLOPT_HTTPHEADER, [
			'Content-Type: application/json; charset=UTF-8'
		]);
		$response = curl_exec($cURL);
		curl_close($cURL);
		$json = json_decode($response, true);
		if ($json === null) {
			echo 'Ошибка';
		} else {
			foreach($json as $key=>$value) {
				echo "$key:$value <br>";
			}
		}

	}
}
?>