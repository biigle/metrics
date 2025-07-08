<?php

namespace Biigle\Tests\Modules\Metrics;

use Biigle\Modules\Metrics\MetricsServiceProvider;
use TestCase;

class MetricsServiceProviderTest extends TestCase
{
    public function testServiceProvider()
    {
        $this->assertTrue(class_exists(MetricsServiceProvider::class));
    }
}
