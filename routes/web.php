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
Route::get('/gallery', [GalleryController::class, 'showCats'])->name('show.cats');
Route::get('/gallery/{gallery_id}', [GalleryController::class, 'showCat'])->name('show.cat');
Route::get('user/upload', [GalleryController::class, 'userUpload'])->name('upload.cat');
Route::get('user/artist/gallery', [GalleryController::class, 'userGalleryshow'])->name('view.user.cat');
Route::post('/gallery/approve/{id}', [GalleryController::class, 'galleryApprove'])->name('apply.gallery.approve');




Route::get('/events', [EventsController::class, 'wEvents'])->name('showevents');
Route::get('/events/{view_id}', [EventsController::class, 'viewevent'])->name('show.event');

Route::get('current/events', [EventsController::class, 'currentEvents'])->name('current.showevents');
Route::get('upcoming/events', [EventsController::class, 'upcomingEvents'])->name('upcoming.showevents');
Route::get('past/events', [EventsController::class, 'pastEvents'])->name('past.showevents');




Route::get('/courses', [CoursesController::class, 'wCourses'])->name('showcourses');
Route::get('/cdetails/{details_id}', [CoursesController::class, 'viewCourses'])->name('view.course');
Route::post('/enroll/{details_id}', [CoursesController::class, 'enroll'])->name('enroll.course');

Route::get('/artists', [ArtistsController::class, 'wArtists'])->name('showartists');
Route::get('/adetails/{view_id}', [ArtistsController::class, 'viewArtist'])->name('view.artist');
Route::get('/applyartist', [ArtistsController::class, 'applyArtist'])->name('apply.artist');
Route::post('/applyartist/store', [ArtistsController::class, 'storeApply'])->name('apply.artist.store');
Route::post('/artist/approve/{id}', [ArtistsController::class, 'artistApprove'])->name('apply.artist.approve');


Route::get('/blog', [BlogController::class, 'wBlog'])->name('showblog');
Route::get('/blog/{view_id}', [BlogController::class, 'viewblog'])->name('view.blog');
Route::post('/store/{blog_id}', [BlogController::class, 'storeComment'])->name('comment.store');
Route::get('/like/{blog_id}', [BlogController::class, 'like'])->name('like.store');


Route::get('/contact', [ContactController::class, 'wContact'])->name('showcontact');
Route::post('/contact/store', [ContactController::class, 'storeContact'])->name('contact.store');



// <!-- AUTH -->
Route::get('/registration', [UserController::class, 'regForm'])->name('regForm');
Route::post('/registration/store', [UserController::class, 'regStore'])->name('store.regForm');
Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/login/store', [UserController::class, 'loginStore'])->name('store.login');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');



// <!-- ARTIST -->
Route::get('artist/create', [BlogController::class, 'createBlog'])->name('artist.blog.create');
Route::post('artist/blog/store', [BlogController::class, 'storeBlog'])->name('blog.store');
Route::get('create/blog/artist', [ArtistsController::class, 'createBlogs'])->name('artistblog.create');
Route::get('viewblog/artist', [BlogController::class, 'artistblogshow'])->name('artistblogcreate');
Route::get('showblog/artist', [BlogController::class, 'artistblogshow'])->name('artist.blog.list');
Route::get('blog/updating/{update_id}', [BlogController::class, 'updateBlog'])->name('updating.blog');
Route::patch('blog/updateding/{updated_id}', [BlogController::class, 'updatedBlog'])->name('updateding.blog');
Route::get('/deleting/{blog_id}', [BlogController::class, 'deleteBlog'])->name('blog.deleting');


Route::get('/create', [CoursesController::class, 'createCourse'])->name('course.artist.create');
Route::post('artist/course/store', [CoursesController::class, 'storeCourse'])->name('course.store');
Route::get('artist/course/view', [CoursesController::class, 'artistCourseshow'])->name('view.artist.course');
Route::get('course/update/{update_id}', [CoursesController::class, 'updateCourse'])->name('updating.course');
Route::patch('course/updated/{updated_id}', [CoursesController::class, 'updatedCourse'])->name('updateding.course');
Route::get('/delete/{course_id}', [CoursesController::class, 'deleteCourse'])->name('deleting.course');
Route::get('eroll/course/{course_id}', [CoursesController::class, 'enrolllist'])->name('artist.enroll.list');


Route::get('/create/cat', [GalleryController::class, 'createCat'])->name('create.artist.cat');
Route::post('cat/store', [GalleryController::class, 'storeCat'])->name('store.cat');
Route::get('artist/gallery', [GalleryController::class, 'artistGalleryshow'])->name('view.artist.cat');
Route::get('userartist/addimage/{gallery_id}', [GalleryController::class, 'addimage'])->name('artist.add.image');
Route::post('artist/store/{gallery_id}', [GalleryController::class, 'storeImage'])->name('store.image');







// <!-- ADMIN -->
Route::group(['prefix'=>'admin','middleware'=>['admin', 'auth']], function(){
    Route::get('/', function () {
        return view('welcome');
    });

Route::group(['prefix'=>'courses'], function(){
    Route::get('/', [CoursesController::class, 'index'])->name('courses');
    Route::get('/create', [CoursesController::class, 'createCourse'])->name('course.create');
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
Route::get('/create', [GalleryController::class, 'createCat'])->name('create.cat');
Route::get('/addimage/{gallery_id}', [GalleryController::class, 'addimage'])->name('add.image');
Route::get('/delete/{gallery_id}', [GalleryController::class, 'deleteCat'])->name('cat.delete');
Route::get('/update/{update_id}', [GalleryController::class, 'updateCat'])->name('update.cat');
Route::patch('/updated/{updated_id}', [GalleryController::class, 'updatedCat'])->name('updated.cat');
Route::get('image/details/{details_id}', [GalleryController::class, 'detailsGallery'])->name('details.gallery');
Route::get('singleimage/delete/{image_id}', [GalleryController::class, 'deleteSingleimage'])->name('delete.singleimage');





Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::get('/delete/{blog_id}', [ContactController::class, 'deletecontact'])->name('contact.delete');
Route::patch('/response/{id}', [ContactController::class, 'response'])->name('response');



Route::get('/list', [UserController::class, 'list'])->name('list');
Route::patch('/block/{id}', [UserController::class, 'block'])->name('block');

});
