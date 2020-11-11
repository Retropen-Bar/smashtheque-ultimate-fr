<?php
class SmashthequeRecord {

  public function __construct($value = array()) {
    if(!empty($value))
        $this->hydrate($value);
  }

  public function hydrate($data) {
    foreach ($data as $attribute => $value) {
      $this->$attribute = $value;
    }
  }

}

class SmashthequeCharacter extends SmashthequeRecord {

  public $id;
  public $icon;
  public $name;
  public $emoji;
  public $background_color;
  public $background_image;
  public $background_size;

  public function emoji_image_url() {
    return "https://cdn.discordapp.com/emojis/" . $this->emoji . ".png";
  }

  public function emoji_image_tag() {
    if(empty($this->emoji)) {
      return null;
    }
    return "<img src=\"" . $this->emoji_image_url() . "\" class=\"emoji\"/>";
  }

  public function background_image_data_url() {
    if(empty($this->background_image)) {
      return null;
    }
    return "data:image/svg+xml;base64," . base64_encode($this->background_image);
  }

}

class Smashtheque {

  const BASE_URL = "https://www.smashtheque.fr/api/v1";

  static public function get_characters() {
    return array_map(
      function($data){
        return new SmashthequeCharacter($data);
      },
      self::get_request('/characters')
    );
  }

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
