<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

/**
 * Run this command
 * ./vendor/bin/phpunit --bootstrap vendor/autoload.php --testdox tests
 */
final class PathTest extends TestCase
{
    public function testPathWithCd(): void
    {
      $path = new Path('/a/b/c/d');
      $path->cd('../x');
      $this->assertEquals($path->currentPath, '/a/b/c/x');
    }

    public function testPathWithoutCd(): void
    {
      $path = new Path('/a/b/c/d');
      $this->assertEquals($path->currentPath, '/a/b/c/d');
    }

    public function testPathWithLongDirnames(): void
    {
      $path = new Path('/etc/nginx/sites-available');
      $path->cd('../../../var/log/nginx');
      $this->assertEquals($path->currentPath, '/var/log/nginx');
    }

    public function testMultipleCds(): void
    {
      $path = new Path('/');
      $path->cd('var');
      $path->cd('log');
      $path->cd('nginx');
      $path->cd('..');
      $this->assertEquals($path->currentPath, '/var/log');
    }
}
