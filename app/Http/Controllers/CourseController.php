<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\DomaineEtudes;
use App\Models\User;
use App\Models\Post;
use Response;
use Illuminate\Support\Facades\Log;
class CourseController extends Controller
{

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

    return view('show', ['course' => $course]);
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

// public function download($id)
// {
//     $course = Course::findOrFail($id);

//     $filePath = storage_path("app/public/pdfs/{$course->pdf_file}");

//     return response()->download($filePath, $course->title . '.pdf');
// }

public function download($id)
{
    $course = Course::findOrFail($id);

    $pdfFilePath = storage_path("app/public/{$course->pdf_file}");

    $pdfResponse = response()->download($pdfFilePath, $course->title . '.pdf');

    $imageFilePath = storage_path("app/public/{$course->image}");

    $imageResponse = response()->download($imageFilePath, $course->title . '_image.png');

    return $pdfResponse;
}

    private function getFieldsOfStudy()
    {
        return DomaineEtudes::all();
    }

//     public function create()
// {
//     $fieldsOfStudy = $this->getFieldsOfStudy();

//     return view('create', ['fieldsOfStudy' => $fieldsOfStudy]);
// }

// public function store(Request $request)
// {
//     try {
//         $request->validate([
//             'title' => 'required|string',
//             'image' => 'required|image|mimes:jpeg,png,jpg,gif',
//             'pdf_file' => 'required|mimes:pdf',
//             'sub_description' => 'required|string',
//             'description' => 'required|string',
//             'school' => 'required|string',
//             'domaine_id' => 'required|exists:domaine_etudes,id',
//             'duree_du_cours' => 'required|string',
//         ]);

//         $imagePath = $request->file('image')->storeAs('images', $request->file('image')->getClientOriginalName(), 'public');

//         $pdfPath = $request->file('pdf_file')->storeAs('pdfs', $request->file('pdf_file')->getClientOriginalName(), 'public');
//         dd($request->all()); // Vérifiez si les données du formulaire sont correctes
//         dd($imagePath, $pdfPath); // Vérifiez les chemins des fichiers après le téléchargement
        
//         $requestData = $request->all();
//         $requestData['image'] = $imagePath;
//         $requestData['pdf_file'] = $pdfPath;

//         Course::create($requestData);

//         return redirect()->route('create')->with('success', 'Course created successfully!');
//     } catch (\Exception $e) {
//         \Log::error("Error creating course: " . $e->getMessage());
//         return redirect()->route('create')->with('error', 'Failed to create course.');
//     }
// }

public function create()
    {
        // You can include any additional data needed by the form, like fields of study
        $fieldsOfStudy = $this->getFieldsOfStudy();

        return view('create', ['fieldsOfStudy' => $fieldsOfStudy]);
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'title' => 'required|string',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:8192',
                'pdf_file' => 'required|mimes:pdf|max:10000',
                'sub_description' => 'required|string',
                'description' => 'required|string',
                'school' => 'required|string',
                'domaine_id' => 'required|exists:domaine_etudes,id',
                'duree_du_cours' => 'required|string',
            ]);

            $imagePath = $request->file('image')->store('images', 'public');
            $pdfPath = $request->file('pdf_file')->store('pdfs', 'public');

            $requestData = $request->all();
            $requestData['image'] = $imagePath;
            $requestData['pdf_file'] = $pdfPath;

            Course::create($requestData);

            return redirect()->route('create')->with('success', 'Course created successfully!');
        } catch (\Exception $e) {
            \Log::error("Error creating course: " . $e->getMessage());
            \Log::error("Stack trace: " . $e->getTraceAsString());

            return redirect()->route('create')->with('error', 'Failed to create course.');
        }
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


