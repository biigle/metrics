<?php

namespace Biigle\Tests\Modules\Metrics;

use Biigle\Facades\Modules;
use Biigle\Modules\Metrics\MetricsServiceProvider;
use TestCase;

class MetricsServiceProviderTest extends TestCase
{
    public function testServiceProvider()
    {
        $this->assertTrue(class_exists(MetricsServiceProvider::class));
    }

    public function testViewMixin()
    {
        // The event listeners are loaded on every page that has a navbar, as events are
        // reported from the annotation tool as well as from the Ask BIIGLE chat.
        $this->assertArrayHasKey('metrics', Modules::getViewMixins('navbarMenuItem'));
    }
}
