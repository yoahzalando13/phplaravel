<?php
namespace App\Http\Controllers;
use Illuminate\View\View;

    Class CourseController extends Controller {
        public function index(): View
        {
            return view('course', ['title' => 'Framework PHP',
                                    'framework' => 'Laravel',
                                    'unit' => 1,
                                    ]);
        }

        public function about(): View
        {
            return view('about');
        }
   }