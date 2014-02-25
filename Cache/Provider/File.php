<?php

namespace Cache\Provider;

use Cache\Provider;

class File extends Provider {

  protected $path;

  public function __construct($path, $ttl) {
    parent::__construct($ttl);

    $this->path = $path;
  }

  public function has($key) {
    $path = $this->getFilePath($key);

    if (\file_exists($path)) {
      if (time() - filemtime($path) <= $this->ttl) {
        return true;
      }
    }

    return false;
  }

  public function get($key) {
    if ($this->has($key)) {
      return unserialize(file_get_contents($this->getFilePath($key)));
    }

    return null;
  }

  public function set($key, $value) {
    return file_put_contents($this->getFilePath($key), serialize($value));
  }

  protected function getFilePath($key) {
    return $this->path . '/' . $key;
  }

}