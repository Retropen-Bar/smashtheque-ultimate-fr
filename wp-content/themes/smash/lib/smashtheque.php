<?php
class Smashtheque {

  const BASE_URL = "https://www.smashtheque.fr/api/v1";

  static public function get_characters() {
    return self::get_request('/characters');
  }

  static public function get_teams() {
    return self::get_request('/teams?per=1000');
  }

  // PRIVATE

  static private function get_request($path) {
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => self::BASE_URL . $path,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "GET",
      CURLOPT_HTTPHEADER => array(
        "Accept: application/json",
        "Authorization: Bearer " . $_ENV['SMASHTHEQUE_API_TOKEN']
      ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    return json_decode($response, true);
  }

}
