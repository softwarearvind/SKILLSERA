<?php

namespace App\Services;

use App\Models\Assignment;
use App\Models\CourseModule;
use App\Models\OnlineTest;
use App\Models\StudentMaterialProgress;
use App\Models\StudentProgress;
use App\Models\TestAttempt;

class StudentProgressService
{
    public function updateModuleProgress(
        int $studentId,
        CourseModule $module
    ): int {

        /*
        |--------------------------------------------------------------------------
        | Total Activities
        |--------------------------------------------------------------------------
        */

        $materialCount = $module->studyMaterials()
            ->where('is_active', true)
            ->count();

        $assignmentCount = Assignment::where(
            'module_id',
            $module->id
        )
            ->where('is_active', true)
            ->count();

        $testCount = $module->onlineTests()
            ->where('is_active', true)
            ->count();

        $totalActivities =
            $materialCount +
            $assignmentCount +
            $testCount;

        /*
        |--------------------------------------------------------------------------
        | No Activities
        |--------------------------------------------------------------------------
        */

        if ($totalActivities === 0) {

            $this->saveProgress(
                $studentId,
                $module,
                0
            );

            return 0;
        }

        /*
        |--------------------------------------------------------------------------
        | Completed Materials
        |--------------------------------------------------------------------------
        */

        $completedMaterials = StudentMaterialProgress::where(
            'student_id',
            $studentId
        )
            ->whereHas('material', function ($query) use ($module) {
                $query->where('module_id', $module->id);
            })
            ->whereNotNull('completed_at')
            ->count();

        /*
        |--------------------------------------------------------------------------
        | Completed Assignments
        |--------------------------------------------------------------------------
        */

        $completedAssignments = \App\Models\AssignmentSubmission::where(
            'student_id',
            $studentId
        )
            ->whereHas('assignment', function ($query) use ($module) {
                $query->where('module_id', $module->id);
            })
            ->whereIn('status', [
                'submitted',
                'reviewed'
            ])
            ->count();

        /*
        |--------------------------------------------------------------------------
        | Completed Tests
        |--------------------------------------------------------------------------
        */

        $completedTests = TestAttempt::where(
            'student_id',
            $studentId
        )
            ->where('status', 'submitted')
            ->where('is_passed', true)
            ->whereHas('test', function ($query) use ($module) {
                $query->where('module_id', $module->id);
            })
            ->get()
            ->unique('test_id')
            ->count();

        /*
        |--------------------------------------------------------------------------
        | Calculate Progress
        |--------------------------------------------------------------------------
        */

        $completedActivities =
            $completedMaterials +
            $completedAssignments +
            $completedTests;

        $progress = (int) round(
            ($completedActivities / $totalActivities) * 100
        );

        /*
        |--------------------------------------------------------------------------
        | Save
        |--------------------------------------------------------------------------
        */

        $this->saveProgress(
            $studentId,
            $module,
            $progress
        );

        return $progress;
    }

    private function saveProgress(
        int $studentId,
        CourseModule $module,
        int $progress
    ): void {

        $status = 'not_started';

        if ($progress > 0 && $progress < 100) {
            $status = 'in_progress';
        }

        if ($progress >= 100) {
            $status = 'completed';
        }

        $data = [
            'progress_percentage' => $progress,
            'status' => $status,
        ];

        if ($progress > 0) {
            $data['started_at'] = now();
        }

        if ($progress >= 100) {
            $data['completed_at'] = now();
        }

        StudentProgress::updateOrCreate(
            [
                'student_id' => $studentId,
                'course_id' => $module->course_id,
                'module_id' => $module->id,
            ],
            $data
        );
    }

    public function updateCourseProgress(
        int $studentId,
        int $courseId
    ): int {

        $modules = CourseModule::where(
            'course_id',
            $courseId
        )
            ->where('is_active', true)
            ->get();

        if ($modules->isEmpty()) {
            return 0;
        }

        $totalProgress = 0;

        foreach ($modules as $module) {

            $totalProgress += $this->updateModuleProgress(
                $studentId,
                $module
            );
        }

        return (int) round(
            $totalProgress / $modules->count()
        );
    }
}
