<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;
use Carbon\Carbon;
// We will use Form Request to validate incoming requests from our store and update method
use App\Http\Requests\Reports\StoreRequest;
use App\Models\Reports;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        $user = Auth::user();
        $role = $user->role;
        if ($role == 'clerk') {
            $route = 'clerk.report.index';
        } if ($role == 'admin') {
            $route = 'admin.report.repindex';
        }
        return response()->view($route);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        $currentDate = Carbon::now()->format('Y-m-d');
        $user = Auth::user();
        $userdept = $user->department;
        $username = $user->name;
        return response()->view('clerk.report.index', compact('currentDate', 'userdept', 'username'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        // insert only requests that already validated in the StoreRequest
        $create = Reports::create($validated);

        if($create) {
            // add flash for the success notification
            session()->flash('notif.success', 'Reports created successfully!');
            return redirect()->route('creports.index');
        }

        return abort(500);
    }

    /**
     * Display the specified resource.
     */
    public function show(Reports $id): View
    {
        $user = Auth::user();
        $role = $user->role;
        if ($role == 'clerk') {
            $route = 'clerk.report.show';
        } if ($role == 'admin') {
            $route = 'admin.report.repshow';
        }
        return view($route, ['report' => $id]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
