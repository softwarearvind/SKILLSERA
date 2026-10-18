<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Certificate;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CertificateManagementController extends Controller
{
    /**
     * Certificate List
     */
    public function index(Request $request)
    {
        $query = Certificate::with([
            'student',
            'course'
        ]);

        /*
        |--------------------------------------------------------------------------
        | Search
        |--------------------------------------------------------------------------
        */

        if ($request->filled('search')) {

            $search = $request->search;

            $query->where(function ($q) use ($search) {

                $q->where(
                    'certificate_number',
                    'like',
                    "%{$search}%"
                )

                ->orWhereHas('student', function ($student) use ($search) {

                    $student->where('name', 'like', "%{$search}%")
                        ->orWhere('email', 'like', "%{$search}%");

                })

                ->orWhereHas('course', function ($course) use ($search) {

                    $course->where(
                        'name',
                        'like',
                        "%{$search}%"
                    );

                });

            });
        }

        /*
        |--------------------------------------------------------------------------
        | Course Filter
        |--------------------------------------------------------------------------
        */

        if ($request->filled('course_id')) {

            $query->where(
                'course_id',
                $request->course_id
            );
        }

        /*
        |--------------------------------------------------------------------------
        | Status Filter
        |--------------------------------------------------------------------------
        */

        if ($request->filled('status')) {

            $query->where(
                'is_active',
                $request->status
            );
        }

        /*
        |--------------------------------------------------------------------------
        | Certificates
        |--------------------------------------------------------------------------
        */

        $certificates = $query
            ->latest()
            ->paginate(15)
            ->withQueryString();

        /*
        |--------------------------------------------------------------------------
        | Courses
        |--------------------------------------------------------------------------
        */

        $courses = Course::orderBy('name')->get();

        /*
        |--------------------------------------------------------------------------
        | Statistics
        |--------------------------------------------------------------------------
        */

        $totalCertificates = Certificate::count();

        $activeCertificates = Certificate::where(
            'is_active',
            true
        )->count();

        $inactiveCertificates = Certificate::where(
            'is_active',
            false
        )->count();

        $thisMonthCertificates = Certificate::whereMonth(
            'issue_date',
            now()->month
        )
        ->whereYear(
            'issue_date',
            now()->year
        )
        ->count();

        return view(
            'super-admin.certificates.index',
            compact(
                'certificates',
                'courses',
                'totalCertificates',
                'activeCertificates',
                'inactiveCertificates',
                'thisMonthCertificates'
            )
        );
    }


    /**
     * Generate Certificate Form
     */
    public function create()
    {
        $students = User::where('role', 'student')
            ->where('is_active', true)
            ->orderBy('name')
            ->get();

        $courses = Course::where('is_active', true)
            ->orderBy('name')
            ->get();

        return view(
            'super-admin.certificates.create',
            compact(
                'students',
                'courses'
            )
        );
    }


    /**
     * Store Certificate
     */
    public function store(Request $request)
    {
        $request->validate([

            'student_id' => [
                'required',
                'exists:users,id'
            ],

            'course_id' => [
                'required',
                'exists:courses,id'
            ],

            'title' => [
                'required',
                'string',
                'max:255'
            ],

            'issue_date' => [
                'required',
                'date'
            ],

            'completion_date' => [
                'nullable',
                'date'
            ],

            'percentage' => [
                'nullable',
                'numeric',
                'min:0',
                'max:100'
            ],

            'grade' => [
                'nullable',
                'string',
                'max:20'
            ],

            'description' => [
                'nullable',
                'string'
            ],

            'is_active' => [
                'required',
                'boolean'
            ],
        ]);


        /*
        |--------------------------------------------------------------------------
        | Check Student
        |--------------------------------------------------------------------------
        */

        $student = User::where('role', 'student')
            ->where('is_active', true)
            ->findOrFail($request->student_id);


        /*
        |--------------------------------------------------------------------------
        | Course
        |--------------------------------------------------------------------------
        */

        $course = Course::where(
            'is_active',
            true
        )->findOrFail($request->course_id);


        /*
        |--------------------------------------------------------------------------
        | Generate Unique Certificate Number
        |--------------------------------------------------------------------------
        */

        do {

            $certificateNumber =
                'CERT-' .
                now()->format('Y') .
                '-' .
                strtoupper(
                    Str::random(8)
                );

        } while (
            Certificate::where(
                'certificate_number',
                $certificateNumber
            )->exists()
        );


        /*
        |--------------------------------------------------------------------------
        | Create Certificate
        |--------------------------------------------------------------------------
        */

        Certificate::create([

            'student_id' => $student->id,

            'course_id' => $course->id,

            'certificate_number' =>
                $certificateNumber,

            'title' =>
                $request->title,

            'issue_date' =>
                $request->issue_date,

            'completion_date' =>
                $request->completion_date,

            'percentage' =>
                $request->percentage,

            'grade' =>
                $request->grade,

            'description' =>
                $request->description,

            'is_active' =>
                $request->is_active,

        ]);


        return redirect()
            ->route(
                'super-admin.certificates.index'
            )
            ->with(
                'success',
                'Certificate generated successfully.'
            );
    }


    /**
     * Show Certificate
     */
      public function show($id)
{
    $certificate = Certificate::with([
        'student',
        'course'
    ])->findOrFail($id);

    $verificationUrl = route(
        'certificate.verify',
        $certificate->certificate_number
    );

    return view(
        'super-admin.certificates.show',
        compact(
            'certificate',
            'verificationUrl'
        )
    );
}


    /**
     * Delete Certificate
     */
    public function destroy($id)
    {
        $certificate = Certificate::findOrFail($id);

        $certificate->delete();

        return back()->with(
            'success',
            'Certificate deleted successfully.'
        );
    }


 

    /**
     * Toggle Certificate Status
     */
    public function toggleStatus($id)
    {
        $certificate = Certificate::findOrFail($id);

        $certificate->is_active =
            !$certificate->is_active;

        $certificate->save();

        return back()->with(
            'success',
            'Certificate status updated successfully.'
        );
    }
}