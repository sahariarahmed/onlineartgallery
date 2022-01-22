<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\ArtistsController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('website.home');
});

Route::get('/events', [EventsController::class, 'wEvents'])->name('showevents');
Route::get('/events/{view_id}', [EventsController::class, 'viewevent'])->name('show.event');

Route::get('/courses', [CoursesController::class, 'wCourses'])->name('showcourses');
Route::get('/details/{details_id}', [CoursesController::class, 'viewCourses'])->name('view.course');
Route::post('/enroll/{details_id}', [CoursesController::class, 'enroll'])->name('enroll.course');

Route::get('/artists', [ArtistsController::class, 'wArtists'])->name('showartists');

Route::get('/blog', [BlogController::class, 'wBlog'])->name('showblog');
Route::get('/blog/{view_id}', [BlogController::class, 'viewblog'])->name('view.blog');

Route::get('/contact', [ContactController::class, 'wContact'])->name('showcontact');
Route::post('/contact/store', [ContactController::class, 'storeContact'])->name('contact.store');



// <!-- AUTH -->
Route::get('/registration', [UserController::class, 'regForm'])->name('regForm');
Route::post('/registration/store', [UserController::class, 'regStore'])->name('store.regForm');
Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/login/store', [UserController::class, 'loginStore'])->name('store.login');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');




// <!-- ADMIN -->
Route::group(['prefix'=>'admin','middleware'=>['admin', 'auth']], function(){
    Route::get('/', function () {
        return view('welcome');
    });

Route::group(['prefix'=>'courses'], function(){
    Route::get('/', [CoursesController::class, 'index'])->name('courses');
    Route::get('/create', [CoursesController::class, 'createCourse'])->name('course.create');
    Route::post('/store', [CoursesController::class, 'storeCourse'])->name('course.store');
    Route::get('/delete/{course_id}', [CoursesController::class, 'deleteCourse'])->name('delete.course');
    Route::get('/details/{details_id}', [CoursesController::class, 'detailsCourse'])->name('details.course');
    Route::get('/update/{update_id}', [CoursesController::class, 'updateCourse'])->name('update.course');
    Route::patch('/updated/{updated_id}', [CoursesController::class, 'updatedCourse'])->name('updated.course');
    Route::get('/course/{course_id}', [CoursesController::class, 'enrolllist'])->name('enroll.list');

});
Route::group(['prefix'=>'artists'], function(){
    Route::get('/', [ArtistsController::class, 'index'])->name('artists');
    Route::get('/create', [ArtistsController::class, 'createArtists'])->name('artist.create');
    Route::post('/store', [ArtistsController::class, 'storeArtists'])->name('artists.store');
    Route::get('/delete/{course_id}', [ArtistsController::class, 'deleteArtist'])->name('delete.artist');
    Route::get('/details/{details_id}', [ArtistsController::class, 'detailsArtist'])->name('details.artist');
    Route::get('/update/{update_id}', [ArtistsController::class, 'updateArtist'])->name('update.artist');
    Route::patch('/updated/{updated_id}', [ArtistsController::class, 'updatedArtist'])->name('updated.artist');
});
Route::group(['prefix'=>'blog'], function(){
    Route::get('/', [BlogController::class, 'index'])->name('blog');
    Route::get('/create', [BlogController::class, 'createBlog'])->name('blog.create');
    Route::post('/store', [BlogController::class, 'storeBlog'])->name('blog.store');
    Route::get('/delete/{blog_id}', [BlogController::class, 'deleteBlog'])->name('blog.delete');
    Route::get('/details/{details_id}', [BlogController::class, 'detailsBlog'])->name('blog.details');
    Route::get('/update/{update_id}', [BlogController::class, 'updateBlog'])->name('update.blog');
    Route::patch('/updated/{updated_id}', [BlogController::class, 'updatedBlog'])->name('updated.blog');
});

Route::group(['prefix'=>'events'], function(){
    Route::get('/', [EventsController::class, 'index'])->name('events');
    Route::get('/create', [EventsController::class, 'createEvent'])->name('event.create');
    Route::post('/store', [EventsController::class, 'storeEvent'])->name('event.store');
    Route::get('/details/{details_id}', [EventsController::class, 'detailsEvent'])->name('details.event');
    Route::get('/delete/{event_id}', [EventsController::class, 'deleteEvent'])->name('delete.event');
    Route::get('/update/{update_id}', [EventsController::class, 'updateEvent'])->name('update.event');
    Route::patch('/updated/{updated_id}', [EventsController::class, 'updatedEvent'])->name('updated.event');
    Route::get('/list', [EventsController::class, 'list'])->name('event.list');




});

Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery');

Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::get('/delete/{blog_id}', [ContactController::class, 'deletecontact'])->name('contact.delete');



Route::get('/list', [UserController::class, 'list'])->name('list');
Route::patch('/block/{id}', [UserController::class, 'block'])->name('block');

});
