<?php

namespace Cache\Provider;

use Cache\Provider;
use Illuminate\Support\Facades\Cache;

class Laravel extends Provider {

  public function has($key) {
    return Cache::has($key);
  }

  public function get($key) {
    return Cache::get($key);
  }

  public function set($key, $value) {
    return Cache::put($key, $value, $this->ttl / 60);
  }

}