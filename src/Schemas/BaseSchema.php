<?php

  namespace Hexlet\Validator\Schemas;

  abstract class BaseSchema
  {
    protected bool $isRequired = false;

    public function required(): static
    {
      $this->isRequired = true;
      return $this;
    }

    abstract public function isValid(mixed $value): bool;
  }