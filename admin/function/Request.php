<?php
class Post
{
  public function __construct()
  {
    $this->post = json_decode(json_encode($_POST));
  }
}

class Request
{
  public function post(?string $name = null)
  {
    if ($name) {
    } else {
      return new Post;
    }
  }
}
