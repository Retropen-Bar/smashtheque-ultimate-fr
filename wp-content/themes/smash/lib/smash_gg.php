<?php
// require_once 'HTTP/Request2.php';

// CONFIG

// ENV:
// - SMASHGG_API_TOKEN

function get_smash_gg_tournament_by_id($id) {
  $token = $_ENV['SMASHGG_API_TOKEN'];

  $body = preg_replace('/\n/', " ", '{
    "query": "query($id: ID) {
      tournament(id: $id){
        id
        slug
        name
        events {
          id
          name
        }
      }
    }",
    "variables": {
      "id": ' . $id . '
    }
  }');

  $curl = curl_init();

  curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.smash.gg/gql/alpha",
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
      "Authorization: Bearer " . $token,
      "Content-Type: application/json"
    ),
  ));

  $response = curl_exec($curl);

  curl_close($curl);
  return json_decode($response, true)['data']['tournament'];

  // $client = new httpClient;
  // $request = new httpClientRequest;
  // $request->setRequestUrl('https://api.smash.gg/gql/alpha');
  // $request->setRequestMethod('POST');
  // $body = new httpMessageBody;
  // $body->append($body);
  // $request->setBody($body);
  // $request->setOptions(array());
  // $request->setHeaders(array(
  //   'Authorization' => 'Bearer ' . $token,
  //   'Content-Type' => 'application/json'
  // ));
  // $client->enqueue($request)->send();
  // $response = $client->getResponse();
  // print_r($response);
  // return $response->getBody();

  // $request = new HTTP_Request2();
  // $request->setUrl('https://api.smash.gg/gql/alpha');
  // $request->setMethod(HTTP_Request2::METHOD_POST);
  // $request->setConfig(array(
  //   'follow_redirects' => TRUE
  // ));
  // $request->setHeader(array(
  //   'Authorization' => 'Bearer ' . $token,
  //   'Content-Type' => 'application/json'
  // ));
  // $request->setBody($body);
  // try {
  //   $response = $request->send();
  //   if ($response->getStatus() == 200) {
  //     return $response->getBody();
  //   }
  //   else {
  //     return 'Unexpected HTTP status: ' . $response->getStatus() . ' ' .
  //     $response->getReasonPhrase();
  //   }
  // }
  // catch(HTTP_Request2_Exception $e) {
  //   return 'Error: ' . $e->getMessage();
  // }
}
