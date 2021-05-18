<?php

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

use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Route;

Route::get('/a', function () {
    echo "hello world";
});

Route::get('/redis', function () {
    $visits = Redis::Incr('visits');
    return $visits;
});

Route::get('/diem', function () {
    echo "ban da co diem";
})->middleware('MyMiddle');
Route::get('/loi', function () {
    echo "chua co diem";
})->name('loi');
Route::get('nhapdiem', function () {
    return view('nhapdiem');
})->name('nhapdiem');
Route::get('qb/get', function () {
    $data = DB::table('users')->get();
    // var_dump($data);
    foreach ($data as $row) {
        foreach ($row as $key => $value) {
            echo $key . ":" . $value;
        }
        echo "hr";
    }
});
//////////////

Route::get('qb/where', function () {
    $data = DB::table('users')->where('id = 2')->get();
    // var_dump($data);
    foreach ($data as $row) {
        foreach ($row as $key => $value) {
            echo $key . ":" . $value;
        }
        echo "hr";
    }
});

// select id, name,email
Route::get('qb/select', function () {
    $data = DB::table('users')->select(['id', 'name', 'email'])->where('id = 2');
    foreach ($data as $row) {
        foreach ($row as $key => $value) {
            echo $key . ":" . $value;
        }
        echo "hr";
    }
});
//raw

Route::get('qb/raw', function () {
    $data = DB::table('users')->select(DB::raw('id,name as hoten,email'))->where('id = 2')->get();
    foreach ($data as $row) {
        foreach ($row as $key => $value) {
            echo $key . ":" . $value;
        }
        echo "hr";
    }
});
//order by
Route::get('qb/orderby', function () {
    $data = DB::table('users')->select(['id', 'name', 'email'])->oderBy('id', 'desc')->get();
    foreach ($data as $row) {
        foreach ($row as $key => $value) {
            echo $key . ":" . $value;
        }
        echo "hr";
    }
});

// update
Route::get('qb/update', function () {
    DB::table('users')->where('id',1)->update(['name'=>'website','email'=>'pppppp@gmail.com']);
    echo "da update";
});
/// increment ,decrement 
// delete() truncate()-> xoa tat ca