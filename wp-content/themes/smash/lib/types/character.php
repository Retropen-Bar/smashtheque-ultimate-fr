<?php
class Character extends Model {

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

  static public function from_smashtheque($data) {
    return new Character($data);
  }

  static public function fetch_from_smashtheque() {
    return array_map(array(self, 'from_smashtheque'), Smashtheque::get_characters());
  }

  static public function fetch_all() {
    // return self::fetch_from_wordpress();
    return self::fetch_from_smashtheque();
  }

}
