<?php

namespace App\Providers;
use App\Models\NavbarItem;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\Course;


class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        View::share(
            'navbarItems',
            NavbarItem::query()
                ->where('is_active', true)
                ->orderBy('sort_order')
                ->orderBy('id')
                ->get()
        );


         View::composer('*', function ($view) {

            $formdata = Course::where('is_active', true)
                ->orderBy('name', 'asc')
                ->get();

            $view->with('formdata', $formdata);

        });


         View::composer('*', function ($view) {

            $navbarCourses = Course::with([
                'modules' => function ($query) {
                    $query->where('is_active', true)
                          ->orderBy('sort_order');
                }
            ])
            ->where('is_active', true)
            ->orderBy('name')
            ->get();

            $view->with('navbarCourses', $navbarCourses);
        });

    }


}
