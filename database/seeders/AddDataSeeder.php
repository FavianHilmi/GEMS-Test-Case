<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Project;
use App\Models\WorkPackage;
use App\Models\Boq;
use App\Models\ProgressEntry;
use Illuminate\Database\Seeder;


class AddDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $project = Project::create([
            'project_code' => 'P-001',
            'project_name' => 'Infrastructure Development',
        ]);

        $wp1 = WorkPackage::create([
            'project_id' => $project->id,
            'wp_code' => 'WP-CIV-001',
            'wp_name' => 'Civil Works',
            'discipline_code' => 'Civil',
        ]);

        $boq1 = Boq::create([
            'work_package_id' => $wp1->id,
            'boq_code' => 'BOQ-001',
            'description' => 'Excavation',
            'uom' => 'm3',
            'budget_qty' => 100,
            'unit_rate' => 50,
        ]);

        ProgressEntry::create(['boq_code' => $boq1->boq_code, 'actual_qty' => 40, 'progress_date' => '2026-01-10']);

        $boq2 = Boq::create([
            'work_package_id' => $wp1->id,
            'boq_code' => 'BOQ-002',
            'budget_qty' => 50,
            'description' => 'Concrete',
            'uom' => 'm3',
            'unit_rate' => 200,
        ]);

        ProgressEntry::create(['boq_code' => $boq2->boq_code, 'actual_qty' => 10, 'progress_date' => '2026-01-15']);
    }
}
