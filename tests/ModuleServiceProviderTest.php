<?php

namespace Biigle\Tests\Modules\Metrics;

use Biigle\Modules\Metrics\ModuleServiceProvider;
use TestCase;

class ModuleServiceProviderTest extends TestCase
{
    public function testServiceProvider()
    {
        $this->assertTrue(class_exists(ModuleServiceProvider::class));
    }
}
