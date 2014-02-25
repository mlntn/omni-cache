<?php

namespace Cache\Provider;

use Cache\Provider;

class Memcache extends Provider {

  protected $instance;

  public function __construct(\Memcache $memcache, $default_ttl) {
    parent::__construct($default_ttl);

    $this->instance = $memcache;
  }

  public function has($key) {
    return !empty($this->get($key));
  }

  public function get($key) {
    return $this->instance->get($key);
  }

  public function set($key, $value) {
    return $this->instance->set($key, $value, 0, $this->ttl);
  }

}