<?php
  require_once __DIR__ . '/../vendor/autoload.php';

  use Hexlet\Validator\Validator;
  use PHPUnit\Framework\TestCase;

  class ValidatorTest extends TestCase
  {
    public function testStringSchema(): void
    {
      $v = new Validator();
      $schema = $v->string();

      $this->assertTrue($schema->isValid(''));
      $this->assertTrue($schema->isValid(null));

      $schema->required();
      $this->assertFalse($schema->isValid(null));
      $this->assertFalse($schema->isValid(''));
      $this->assertTrue($schema->isValid('test'));

      $this->assertTrue($schema->contains('hex')->isValid('hexlet'));
      $this->assertFalse($schema->contains('nope')->isValid('hexlet'));

      $this->assertTrue($v->string()->minLength(5)->minLength(3)->isValid('abcde'));
    }
  }