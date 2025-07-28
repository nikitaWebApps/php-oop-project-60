<?php
  namespace Hexlet\Validator\Schemas;

  class StringSchema extends BaseSchema
  {
    private int $minLength = 0;
    private string $substring = '';

    public function isValid(mixed $value): bool
    {
      if ($value === null) {
        return !$this->isRequired;
      }

      if (!is_string($value)) {
        return false;
      }

      if ($this->isRequired && $value === '') {
        return false;
      }

      if (mb_strlen($value) < $this->minLength) {
        return false;
      }

      if (!str_contains($value, $this->substring)) {
        return false;
      }

      return true;
    }

    public function minLength(int $length): static
    {
      $this->minLength = $length;
      return $this;
    }

    public function contains(string $substring): static
    {
      $this->substring = $substring;
      return $this;
    }
  }

