<?php

namespace Cache;

abstract class Provider implements ProviderInterface {

  protected $ttl;

  public function __construct($ttl = null) {
    $this->ttl = $ttl;
  }

}