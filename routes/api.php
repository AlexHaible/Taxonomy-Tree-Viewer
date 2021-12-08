<?php

use App\Actions\Nodes\AddNode;
use Illuminate\Http\Request;
use App\Actions\Nodes\GetChildren;
use App\Actions\Nodes\ChangeParent;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('nodes/{id}/children', function ($id) {
    return GetChildren::getChildren($id);
});

Route::post('nodes/{id}/change-parent', function (Request $request, $id) {
    $body = collect($request->json()->all());

    return ChangeParent::changeParent($id, $body->get('new_parent_id'));
});

Route::post('nodes/new', function (Request $request) {
    $body = collect($request->json()->all());

    return AddNode::addNode($body->get('parent_id'), $body->get('name'), $body->get('details'));
});
