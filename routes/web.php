<?php

use App\Http\Controllers\grades\gradeController;
use Illuminate\Support\Facades\Route;
use PHPUnit\TextUI\XmlConfiguration\Group;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*Route::get('/', function () {
    return view('empty');
});*/
Route::get('/', function () {
    return view('home');
})->name('home');


Route::get('/Teacher/home', function () {
    return view('emptyteacher');
})->name('Teacher.home');
Route::get('/Parent/home', function () {
    return view('emptyparent');
})->name('Parent.home');
Route::get('/Student/home', function () {
    return view('emptytstd');
})->name('Student.home');
Route::get('/Accountant/home', function () {
    return view('emptystaff');
})->name('Accountant.home');
Route::get('/Driver/home', function () {
    return view('empty');
})->name('Driver.home');
Route::get('/Guided/home', function () {
    return view('empty');
})->name('Guided.home');
Route::get('/Librarian/home', function () {
    return view('empty');
})->name('Librarian.home');
Route::get('/Receptionist/home', function () {
    return view('empty');
})->name('Receptionist.home');



Route::get("/app", function () {
    return view('layouts.app');
})->name('app');

Route::group(['namespace' => 'Auth'], function () {

    // Route::get("/admin", "AdminAuthController@index")->name('admin.home');
    Route::get("/login", "UserAuthController@showLoginForm")->name('login');
    Route::post("/login", "UserAuthController@userlogin")->name('logins');
    Route::get('/logout', 'UserAuthController@logout')->name('logout');
    Route::post('/logout', 'UserAuthController@logout')->name('logouts');

    Route::get("/register", "UserRegisterController@showRegisterForm")->name('register');
    Route::post("/register", "UserRegisterController@UserRegister")->name('registers');
});

Route::group(['namespace' => 'Auth'], function () {

    Route::get("/admin", "AdminAuthController@index")->name('admin.home');
    Route::get("/admin/login", "AdminAuthController@showLoginForm")->name('admin.login');
    Route::post("/admin/login", "AdminAuthController@adminlogin")->name('admin.logins');
    Route::get('/admin/logout', 'AdminAuthController@logout')->name('admin.logout');
    Route::post('/admin/logout', 'AdminAuthController@logout')->name('admin.logouts');

    Route::get("/admin/register", "AdminRegisterController@showRegisterForm")->name('admin.register');
    Route::post("/admin/register", "AdminRegisterController@adminRegister")->name('admin.registers');
});


Route::group(['namespace' => 'Levels'], function () {
    Route::resource('Levels', 'levelController');
});

Route::group(['namespace' => 'Classes'], function () {
    Route::resource('Class', 'classController');
});


Route::group(['namespace' => 'homeworks'], function () {
    Route::resource('homework', 'homeworkController');
});

Route::group(['namespace' => 'Sections'], function () {
    Route::resource('Section', 'sectionController');
});

Route::group(['namespace' => 'Sessions'], function () {
    Route::resource('Session', 'sessionController');
});

Route::group(['namespace' => 'Subjects'], function () {
    Route::resource('Subject', 'subjectController');
});

Route::group(['namespace' => 'teachers'], function () {
    Route::resource('Teacher', 'teacherController');
    //Route::get('assigning', 'assigningController');
    // Route::get('assigning', 'assigningController');
});

Route::group(['namespace' => 'Staffs'], function () {
    Route::resource('Staff', 'staffController');
});

Route::group(['namespace' => 'Students'], function () {
    Route::resource('Student', 'studentController');
    Route::resource('Attendance', 'AttendanceController');
    Route::resource('Promotion', 'PromotionController');
});



Route::group(['namespace' => 'Exams'], function () {
    Route::resource('Exam', 'examController');
});


Route::group(['namespace' => 'sessions'], function () {
    Route::resource('schedules', 'sessionController');
});


Route::group(['namespace' => 'Messages', 'middleware' => ['AdminAuth:admin']], function () {
    Route::resource('Message', 'messageController');
});
Route::group(['namespace' => 'Messages', 'middleware' => ['auth']], function () {
    Route::resource('Message', 'messageController');
});
