<!DOCTYPE html>
<html>

<head>
    <title>GEMS - TECHNICAL TEST</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50 p-10">
    <div class="max-w-4xl mx-auto bg-white p-8 shadow rounded">
        <h1 class="text-2xl font-bold mb-2">{{ $project->project_name }}</h1>
        <p class="text-gray-500 mb-6">Code: {{ $project->project_code }}</p>

        <div class="bg-blue-900 text-white p-6 rounded mb-8">
            <div class="flex justify-between items-end">
                <div>
                    <div class="text-sm uppercase tracking-wide">Overall Progress</div>
                    <div class="text-4xl font-bold">{{ number_format($project->overall_progress, 2) }}%</div>
                </div>
                <div class="text-right">
                    <div>
                        <div class="text-sm uppercase tracking-wide">Total Contract</div>
                        <div class="text-4xl font-bold">{{ number_format($project->workPackages->sum('total_amount'), 0) }}</div>
                    </div>
                </div>
            </div>
        </div>

        @foreach ($project->workPackages as $wp)
            <div class="mb-8 border-b pb-6">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-xl font-bold">{{ $wp->wp_code }} - {{ $wp->wp_name }}</h2>
                    <span class="font-semibold text-blue-900">WP Progress:
                        {{ number_format($wp->wp_progress, 2) }}%</span>
                </div>

                <table class="w-full border-collapse">
                    <thead class="bg-gray-100 text-left">
                        <tr>
                            <th class="p-2 border">BOQ Code</th>
                            <th class="p-2 border text-right">Budget Qty</th>
                            <th class="p-2 border text-right">Actual Qty</th>
                            <th class="p-2 border text-right">Amount (Price)</th>
                            <th class="p-2 border text-right">Progress</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($wp->boqs as $boq)
                            <tr>
                                <td class="p-2 border">{{ $boq->boq_code }}</td>
                                <td class="p-2 border text-right">{{ $boq->budget_qty }}</td>
                                <td class="p-2 border text-right">{{ $boq->progressEntries->sum('actual_qty') }}</td>
                                <td class="p-2 border text-right">{{ number_format($boq->amount, 0) }}</td>
                                <td class="p-2 border text-right font-bold">{{ number_format($boq->progress, 2) }}%
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endforeach
    </div>
</body>

</html>
