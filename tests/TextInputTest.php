<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

/**
 * Run this command
 * ./vendor/bin/phpunit --bootstrap vendor/autoload.php --testdox tests
 */
final class TextInputTest extends TestCase
{
    public function testPathWithCd(): void
    {
      $input = new NumericInput();
      $input->add('1');
      $input->add('a');
      $input->add('0');
      echo $input->getValue();
    }
}
