<?php

namespace Biigle\Tests\Modules\Metrics\Http\Controllers;

use Biigle\Modules\Metrics\Enums\EventType;
use Biigle\Modules\Metrics\Event;
use Biigle\Role;
use Biigle\Tests\UserTest;
use TestCase;

class AdminControllerTest extends TestCase
{
    public function testIndexWhenNotLoggedIn()
    {
        $this->get('admin/metrics')->assertRedirect('login');
    }

    public function testIndexWhenNotAdmin()
    {
        $this->be(UserTest::create());
        $this->get('admin/metrics')->assertStatus(403);
    }

    public function testIndex()
    {
        $admin = UserTest::create();
        $admin->role()->associate(Role::admin());

        Event::factory()->count(2)->create([
            'type' => EventType::LabelBotChoseLabel1,
        ]);
        Event::factory()->create([
            'type' => EventType::LabelBotChoseLabelOther,
        ]);
        Event::factory()->create([
            'type' => EventType::LabelBotDismissed,
        ]);

        $response = $this
            ->actingAs($admin)
            ->get('admin/metrics')
            ->assertViewIs('metrics::admin')
            ->assertViewHas('labelBotEventTotal', 4)
            ->assertSeeText('LabelBOT Events')
            ->assertSeeText('Chose label 1')
            ->assertSeeText('Chose label 2')
            ->assertSeeText('Dismissed');

        $data = $response->viewData('labelBotEventData');

        $this->assertSame([
            ['name' => 'Chose label 1', 'value' => 2],
            ['name' => 'Chose label 2', 'value' => 0],
            ['name' => 'Chose label 3', 'value' => 0],
            ['name' => 'Chose other label', 'value' => 1],
            ['name' => 'Dismissed', 'value' => 1],
        ], $data);
    }
}
