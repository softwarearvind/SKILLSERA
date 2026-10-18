<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Batch;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;
use App\Mail\StudentBatchAssignedMail;
use Illuminate\Support\Facades\Mail;

class BatchManagementController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Batch List
    |--------------------------------------------------------------------------
    */

    public function index(Request $request)
    {
        $query = Batch::with('course');

        if ($request->filled('search')) {

            $search = $request->search;

            $query->where(function ($q) use ($search) {

                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('code', 'like', "%{$search}%")
                    ->orWhereHas('course', function ($course) use ($search) {

                        $course->where(
                            'name',
                            'like',
                            "%{$search}%"
                        );

                    });

            });
        }

        if ($request->status === 'active') {

            $query->where('is_active', true);

        } elseif ($request->status === 'inactive') {

            $query->where('is_active', false);

        }

        $batches = $query
            ->latest()
            ->paginate(15)
            ->withQueryString();

        $totalBatches = Batch::count();

        $activeBatches = Batch::where(
            'is_active',
            true
        )->count();

        $inactiveBatches = Batch::where(
            'is_active',
            false
        )->count();

        return view(
            'super-admin.batches.index',
            compact(
                'batches',
                'totalBatches',
                'activeBatches',
                'inactiveBatches'
            )
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Create
    |--------------------------------------------------------------------------
    */

    public function create()
    {
        $courses = Course::where(
            'is_active',
            true
        )
        ->orderBy('name')
        ->get();

        $students = User::where(
            'role',
            'student'
        )
        ->where(
            'is_active',
            true
        )
        ->orderBy('name')
        ->get();

        return view(
            'super-admin.batches.create',
            compact(
                'courses',
                'students'
            )
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Store
    |--------------------------------------------------------------------------
    */

    public function store(Request $request)
{
    $request->validate([

        'course_id' =>
            'required|exists:courses,id',

        'name' =>
            'required|string|max:255',

        'code' =>
            'required|string|max:100|unique:batches,code',

        'start_date' =>
            'required|date',

        'end_date' =>
            'nullable|date|after_or_equal:start_date',

        'start_time' =>
            'nullable',

        'end_time' =>
            'nullable',

        'days' =>
            'nullable|string|max:255',

        'room' =>
            'nullable|string|max:255',

        'mode' =>
            'required|in:online,offline,hybrid',

        'meeting_link' =>
            'nullable|url',

        'capacity' =>
            'required|integer|min:1',

        'description' =>
            'nullable|string',

        'students' =>
            'nullable|array',

        'students.*' =>
            'integer|exists:users,id',
    ]);


    /*
    |--------------------------------------------------------------------------
    | Create Batch
    |--------------------------------------------------------------------------
    */

    $batch = Batch::create([

        'course_id' =>
            $request->course_id,

        'name' =>
            $request->name,

        'code' =>
            $request->code,

        'start_date' =>
            $request->start_date,

        'end_date' =>
            $request->end_date,

        'start_time' =>
            $request->start_time,

        'end_time' =>
            $request->end_time,

        'days' =>
            $request->days,

        'room' =>
            $request->room,

        'mode' =>
            $request->mode,

        'meeting_link' =>
            $request->meeting_link,

        'capacity' =>
            $request->capacity,

        'description' =>
            $request->description,

        'is_active' =>
            true,
    ]);


    /*
    |--------------------------------------------------------------------------
    | Assign Students
    |--------------------------------------------------------------------------
    */

    if ($request->filled('students')) {

        $students = User::where(
            'role',
            'student'
        )
        ->where(
            'is_active',
            true
        )
        ->whereIn(
            'id',
            $request->students
        )
        ->get();


        /*
        |--------------------------------------------------------------------------
        | Attach Students
        |--------------------------------------------------------------------------
        */

        foreach ($students as $student) {

            $batch->students()->attach(
                $student->id,
                [
                    'joined_at' =>
                        now()->toDateString(),

                    'is_active' =>
                        true,
                ]
            );

        }


        /*
        |--------------------------------------------------------------------------
        | Load Course
        |--------------------------------------------------------------------------
        */

        $batch->load('course');


        /*
        |--------------------------------------------------------------------------
        | Queue Email For Each Student
        |--------------------------------------------------------------------------
        */

        foreach ($students as $student) {

            Mail::to($student->email)
                ->queue(
                    new StudentBatchAssignedMail(
                        $student,
                        $batch
                    )
                );

        }

    }


    /*
    |--------------------------------------------------------------------------
    | Redirect
    |--------------------------------------------------------------------------
    */

    return redirect()
        ->route(
            'super-admin.batches.index'
        )
        ->with(
            'success',
            'Batch created successfully. Student email notifications have been queued.'
        );
}


    /*
    |--------------------------------------------------------------------------
    | Show
    |--------------------------------------------------------------------------
    */

    public function show($id)
    {
        $batch = Batch::with([
            'course',
            'students',
        ])->findOrFail($id);

        return view(
            'super-admin.batches.show',
            compact('batch')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Edit
    |--------------------------------------------------------------------------
    */

    public function edit($id)
    {
        $batch = Batch::findOrFail($id);

        $courses = Course::where(
            'is_active',
            true
        )
        ->orderBy('name')
        ->get();

        $students = User::where(
            'role',
            'student'
        )
        ->where(
            'is_active',
            true
        )
        ->orderBy('name')
        ->get();

        return view(
            'super-admin.batches.edit',
            compact(
                'batch',
                'courses',
                'students'
            )
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Update
    |--------------------------------------------------------------------------
    */

    public function update(Request $request, $id)
    {
        $batch = Batch::findOrFail($id);

        $request->validate([

            'course_id' =>
                'required|exists:courses,id',

            'name' =>
                'required|string|max:255',

            'code' =>
                'required|string|max:100|unique:batches,code,' .
                $batch->id,

            'start_date' =>
                'required|date',

            'end_date' =>
                'nullable|date|after_or_equal:start_date',

            'start_time' =>
                'nullable',

            'end_time' =>
                'nullable',

            'days' =>
                'nullable|string|max:255',

            'room' =>
                'nullable|string|max:255',

            'mode' =>
                'required|in:online,offline,hybrid',

            'meeting_link' =>
                'nullable|url',

            'capacity' =>
                'required|integer|min:1',

            'description' =>
                'nullable|string',

            'students' =>
                'nullable|array',

            'students.*' =>
                'integer|exists:users,id',
        ]);


        $batch->update([

            'course_id' =>
                $request->course_id,

            'name' =>
                $request->name,

            'code' =>
                $request->code,

            'start_date' =>
                $request->start_date,

            'end_date' =>
                $request->end_date,

            'start_time' =>
                $request->start_time,

            'end_time' =>
                $request->end_time,

            'days' =>
                $request->days,

            'room' =>
                $request->room,

            'mode' =>
                $request->mode,

            'meeting_link' =>
                $request->meeting_link,

            'capacity' =>
                $request->capacity,

            'description' =>
                $request->description,
        ]);


        /*
        |--------------------------------------------------------------------------
        | Update Students
        |--------------------------------------------------------------------------
        */

        $studentIds = User::where(
            'role',
            'student'
        )
        ->where(
            'is_active',
            true
        )
        ->whereIn(
            'id',
            $request->input('students', [])
        )
        ->pluck('id')
        ->toArray();


        $syncData = [];

        foreach ($studentIds as $studentId) {

            $syncData[$studentId] = [

                'joined_at' =>
                    now()->toDateString(),

                'is_active' =>
                    true,
            ];
        }

        $batch->students()->sync($syncData);


        return redirect()
            ->route(
                'super-admin.batches.index'
            )
            ->with(
                'success',
                'Batch updated successfully.'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | Toggle Status
    |--------------------------------------------------------------------------
    */

    public function toggleStatus($id)
    {
        $batch = Batch::findOrFail($id);

        $batch->is_active =
            !$batch->is_active;

        $batch->save();

        return back()->with(
            'success',
            'Batch status updated successfully.'
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Delete
    |--------------------------------------------------------------------------
    */

    public function destroy($id)
    {
        $batch = Batch::findOrFail($id);

        $batch->delete();

        return back()->with(
            'success',
            'Batch deleted successfully.'
        );
    }
}
