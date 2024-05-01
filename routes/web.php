<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UtilisateurController;
use App\Http\Controllers\ListePostsController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    $courseController = new CourseController();

    $usersCount = $courseController->getUsersCount();
    $postsCount = $courseController->getPostsCount();
    $coursesCount = $courseController->getCoursesCount();

    return view('acceuil', compact('usersCount', 'postsCount', 'coursesCount'));
});

Auth::routes();
Route::get('/register/step1',[RegisterController::class,'showStep1Form'])->name('register.step1');
Route::post('/register/step1', [RegisterController::class,'processStep1']);
Route::get('/register/step2', [RegisterController::class,'showStep2Form'] )->name('register.step2');
Route::post('/register/step2', [RegisterController::class,'register'] );
Route::get('/feed', [App\Http\Controllers\PostController::class, 'index'])->name('feed');
Route::get('/acc', function(){
    return view('acceuil');
});


// Route::get('/feed', function () {
//     $user = Auth::user();

//     $photoPath = $user->profile && $user->profile->photo
//         ? 'storage/' . $user->profile->photo
//         : asset("images/noprofile.png");

//     return view('feed', compact('user', 'photoPath'));
// })->name('feeed');


Route::get('/courses', [CourseController::class, 'index'])->name('display');
Route::get('/courses/filter', [CourseController::class, 'filter'])->name('courses.filter');
Route::get('/courses/create', [CourseController::class, 'create'])->name('create');
Route::post('/courses/store', [CourseController::class, 'store'])->name('courses.store');
Route::get('/courses/{id}', [CourseController::class, 'show'])->name('show');
Route::post('/courses/rate/{id}', [CourseController::class, 'rate'])->name('rate');
Route::post('/courses/{id}/download', [CourseController::class, 'download'])->name('download');
Route::get('/domaines_etudes', [CourseController::class, 'getFieldsOfStudy']);







Route::get('/profile/create', [ProfileController::class, 'create'])->name('profile.create');
Route::post('/profile/store', [ProfileController::class, 'store'])->name('profile.store');
Route::get('/empty', [UtilisateurController::class, 'ListeUser'])->name('liste-utilisateurs');
Route::get('/profile/{id}/modifier', [UtilisateurController::class, 'modifierUser'])->name('profiles.create');
Route::put('/profile/{id}/mettre-a-jour', [UtilisateurController::class, 'mettreAJourUser'])->name('profiles.update');
Route::get('/profile/{id}/create', [ProfileController::class, 'create'])->name('profiles.create');
Route::put('/profile/{id}/mettre-a-jour', [ProfileController::class, 'mettreAJourProfile'])->name('profiles.update');
Route::prefix('admin')->group(function (){
    Route::get('/dashboard',[App\Http\Controllers\Admin\DashboardController::class,'index']);
});
Route::get('/dashboard', [ProfileController::class, 'showDashboard'])->name('dashboard');
Route::get('/profiles/create/{id}', [ProfileController::class, 'create'])->name('profiles.create');
Route::match(['put', 'post'], '/profiles/mettre-a-jour/{id}', [ProfileController::class, 'mettreAJourProfile'])->name('profiles.mettre-a-jour');
Route::get('/liste_utilisateurs', [UtilisateurController::class, 'listeUtilisateur'])->name('liste_utilisateurs');
Route::get('/posts', [ListePostsController::class, 'index'])->name('posts.liste');
Route::get('/static', [ListePostsController::class,'showStaticPage'])->name('static.page');
Route::get('/static', [ListePostsController::class, 'showUserStats'])->name('static.page');
Route::delete('/liste_utilisateurs/{utilisateur}', [UtilisateurController::class, 'destroy'])->name('utilisateurs.destroy');
Route::get('/chart', [ChartController::class, 'showChart'])->name('chart');
Route::get('/chart', [ChartController::class, 'showChart'])->name('chart');
Route::get('/chart/users-registration-data', [ChartController::class, 'getUsersRegistrationData'])->name('chart.users-registration-data');
Route::get('/liste_posts', [ListePostsController::class, 'listePosts'])->name('liste_posts');
Route::get('/posts/{id}/destroy', [ListePostsController::class, 'destroy'])->name('posts.destroy');
Route::get('/profile', [ProfileController::class,'showProfile'])->name('profile');


Route::get('/user-profile', [UserProfileController::class, 'index'])->name('user.profile');

Route::get('/liste_courses', [CourseController::class, 'admincourse'])->name('liste_courses');

Route::delete('/courses/{course}', [CourseController::class, 'destroy'])->name('courses.destroy');





Route::get('/feed', [PostController::class, 'index'])->name('feed');
Route::get('/create_post', [PostController::class, 'create'])->name('create_post');
Route::post('/store_post', [PostController::class, 'store'])->name('store_post');
Route::get('/edit_post/{post}', [PostController::class, 'edit'])->name('edit_post');
Route::post('/update_post/{post}', [PostController::class, 'update'])->name('update_post');
Route::get('/delete_post/{post}', [PostController::class, 'destroy'])->name('delete_post');
Route::post('/comment_post/{post}', [PostController::class, 'comment'])->name('comment_post');
Route::get('/delete_comment/{comment}', [CommentController::class, 'destroy'])->name('delete_comment');
Route::get('/edit_comment/{comment}', [CommentController::class, 'edit'])->name('edit_comment');
Route::post('/update_comment/{comment}', [CommentController::class, 'update'])->name('update_comment');
Route::post('/like_post_ajax/{post}', [PostController::class, 'likeAjax'])->name('like_post_ajax');