<?php

namespace Cache\Provider;

use Cache\Provider;

class Memory extends Provider {

  private static $_cache = [];

  public function has($key) {
    return array_key_exists($key, static::$_cache);
  }

  public function get($key) {
    return $this->has($key) ? static::$_cache[$key] : null;
  }

  public function set($key, $value) {
    static::$_cache[$key] = $value;
  }

}