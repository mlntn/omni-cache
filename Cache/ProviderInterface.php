<?php

namespace Cache;

interface ProviderInterface {

  public function has($key);

  public function get($key);

  public function set($key, $value, $ttl);

}