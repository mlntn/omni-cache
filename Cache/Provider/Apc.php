<?php

namespace Cache\Provider;

use Cache\Provider;

class Apc extends Provider {

  public function has($key) {
    return \apc_exists($key);
  }

  public function get($key) {
    return \apc_fetch($key);
  }

  public function set($key, $value) {
    return \apc_store($key, $value, $this->ttl);
  }

}