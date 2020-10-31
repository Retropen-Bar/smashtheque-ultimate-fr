<?php
class SmashGG {
  const BASE_URL = "https://api.smash.gg/gql/alpha";

  const GET_TOURNAMENT_QUERY = '
    query($id: ID) {
      tournament(id: $id){
        id
        slug
        name
        events {
          id
          name
        }
      }
    }';

  static public function getTournamentById($id) {
    return self::request(
      self::GET_TOURNAMENT_QUERY,
      array(
        "id" => $id
      )
    )['tournament'];
  }

  static private function request($query, $variables) {
    $body = '{ "query": "' . preg_replace('/\n/', " ", $query) . '", "variables": ' . json_encode($variables) . ' }';

    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => self::BASE_URL,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POST => 1,
      CURLOPT_POSTFIELDS => $body,
      CURLOPT_HTTPHEADER => array(
        "Authorization: Bearer " . $_ENV['SMASHGG_API_TOKEN'],
        "Content-Type: application/json"
      ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    return json_decode($response, true)['data'];
  }
}
