<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\DomaineEtudes;
use App\Models\User;
use App\Models\Post;
use Response;
class CourseController extends Controller
{

    // YourController.php

    public function index()
    {
        $courses = Course::all();
        $fieldsOfStudy = DomaineEtudes::all();

        return view('display', compact('courses', 'fieldsOfStudy'));
    }

    public function filter(Request $request)
{
    $fieldOfStudy = $request->input('field_of_study');

    $courses = $fieldOfStudy
        ? Course::where('domaine_id', $fieldOfStudy)->get()
        : Course::all();

    // Fetch all fields of study
    $fieldsOfStudy = DomaineEtudes::all();

    return view('display', compact('courses', 'fieldsOfStudy'));
}



    public function getUsersCount()
    {
        return User::count();
    }

    public function getPostsCount()
    {
        return Post::count();
    }

    public function getCoursesCount()
    {
        return Course::count();
    }

    public function show($id)
    {
        $course = Course::findOrFail($id);
        return view('show', compact('course'));
    }

    public function rate(Request $request, $id)
{
    $course = Course::findOrFail($id);

    $ratings = json_decode($course->rating, true) ?? [];
    $ratings[] = $request->input('rating');

    $avgRating = count($ratings) > 0 ? array_sum($ratings) / count($ratings) : 0;

    $course->update([
        'rating' => json_encode($ratings),
        'avg_rating' => $avgRating,
    ]);

    return redirect()->back()->with('success', 'Rating saved successfully.');
}

    public function download($id)
    {
        $course = Course::findOrFail($id);
        $filePath = storage_path("pdf/{$course->pdf_file}");
        return Response::download($filePath, $course->title . '.pdf');
    }

    private function getFieldsOfStudy()
    {
        return DomaineEtudes::all();
    }

    public function create()
{
    $fieldsOfStudy = $this->getFieldsOfStudy();

    return view('create', ['fieldsOfStudy' => $fieldsOfStudy]);
}


public function store(Request $request)
{
    // dd($request->all());
    $request->validate([
        'title' => 'required|string',
        'image' => 'required|string',
        'sub_description' => 'required|string',
        'description' => 'required|string',
        'school' => 'required|string',
        'domaine_id' => 'required|exists:domaine_etudes,id',
        'duree_du_cours' => 'required|string',
        'pdf_file' => 'required|string',
    ]);

    Course::create($request->all());

    return redirect()->route('create')->with('success', 'Course created successfully!');
}


    

}

















// namespace App\Http\Controllers;

// use App\Models\Course;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Response;
// use Illuminate\Support\Facades\Storage;

// class CourseController extends Controller
// {
//     public function index()
//     {
//         $courses = Course::all();

//         return view('courses.index', compact('courses'));
//     }

//     public function download($id)
//     {
//         $course = Course::find($id);

//         $filePath = storage_path("app/pdf/{$course->pdf_path}");

//         return Response::download($filePath, $course->title . '.pdf');
//     }
// }


