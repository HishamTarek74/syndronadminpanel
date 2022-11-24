<?php

namespace Tests\Feature\Dashboard;

use App\Models\AccountReport;
use Tests\TestCase;

class AccountReportTest extends TestCase
{
    /** @test */
    public function it_can_insert_account_report(): void
    {
        AccountReport::factory()->create();
        $this->assertDatabaseCount('account_reports', 1);
    }

    /** @test */
    public function it_can_view_list_of_account_reports(): void
    {
        AccountReport::factory()->count(20)->create();
        $this->actingAsAdmin();
        $this->get(route('dashboard.account_reports.index'))
            ->assertSuccessful()
            ->assertViewHas('account_reports');
    }


    /** @test */
    public function it_can_block_user(): void
    {
        $user=AccountReport::factory()->create()->user;
        $this->actingAsAdmin();
        $this->get(route('dashboard.account_reports.block',$user))
            ->assertRedirect(route('dashboard.account_reports.index'));
        $this->assertEquals(0, (int)$user->fresh()->active);
    }


}
