<?php

use App\Models\Author;
use App\Models\Tasks;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get("/app", function () {
    $authors = Author::all();
    $tasks   = Tasks::orderBy("created_at", "DESC")->get();
    return inertia("App", ["users" => $authors, "todos" => $tasks]);
});

Route::post("/add", function (Request $request) {
    $req = Validator::make($request->all(), [
        'title' => 'required|string|between:2,100',

    ]);

    if ($req->fails()) {
        return response()->json($req->errors()->toJson(), 400);
    }

    Tasks::create(
        $req->validated(),
    );

    return redirect("/app");
});

Route::post("/update/{id}", function (Request $request, $id) {
    $existingItem = Tasks::find($id);

    if ($existingItem) {
        $existingItem->completed = $request->task['completed'] ? true : false;
        $existingItem->completed = $request->task['completed_at'] ? Carbon::now() : null;
        $existingItem->save();

        return redirect("/app");
    }

    return "Item not found!";
});
Route::post("/delete/{id}", function (Request $request) {
    $existingItem = Tasks::find($id);

    if ($existingItem) {
        $existingItem->delete();

        return redirect("/app");
    }

    return "Item not found!";
});
