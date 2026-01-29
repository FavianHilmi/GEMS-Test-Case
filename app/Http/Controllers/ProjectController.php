<?php

namespace App\Http\Controllers;
use App\Models\Project;
use App\Models\Boq;
use App\Models\ProgressEntry;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
   public function index()
    {
        $project = Project::with(['workPackages.boqs.progressEntries'])->first();

        if (!$project) {
            return "No available data";
        }

        return view('dashboard', compact('project'));
    }

    public function storeProgress(Request $request)
    {
        $boq = Boq::findOrFail($request->boq_code);

        $currentQty = $boq->progressEntries->sum('actual_qty');
        $remaining = $boq->budget_qty - $currentQty;

        $request->validate([
            'boq_code' => 'required|exists:boqs,boq_code',
            'progress_date' => 'required|date',
            'actual_qty' => "required|numeric|min:0.01|max:$remaining",
        ], [
            'actual_qty.max' => "Failed, remaining budget $remaining"
        ]);

        ProgressEntry::create($request->all());

        return back()->with('success', 'Success update progress');
    }
}
