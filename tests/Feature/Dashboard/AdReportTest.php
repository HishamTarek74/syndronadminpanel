<?php

namespace Tests\Feature\Dashboard;

use App\Models\AdReport;
use Tests\TestCase;

class AdReportTest extends TestCase
{
    /** @test */
    public function it_can_insert_ad_report(): void
    {
        $ad_report=AdReport::factory()->create();
        $this->assertTrue(isset($ad_report));
    }

    /** @test */
    public function it_can_view_list_of_ads_reports(): void
    {
        $this->actingAsAdmin();
        $this->get(route('dashboard.ad_reports.index'))
            ->assertSuccessful()
            ->assertViewHas('ad_reports');
    }

    /** @test */
    public function it_can_delete_ad_report(): void
    {
        $this->actingAsAdmin();
        $ad_report=AdReport::factory()->create();
        $this->delete(route('dashboard.ad_reports.destroy',$ad_report->id))
            ->assertRedirect(route('dashboard.ad_reports.index'));
        $this->assertDeleted('ad_reports', $ad_report->toArray());
    }


}
