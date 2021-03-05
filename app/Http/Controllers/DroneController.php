<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use App\Models\Drone;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class DroneController extends Controller
{
    public function index(Request $request) {

        $validator = Validator::make($request->all(), [
            '_page' => 'integer',
            '_limit' => 'integer',
            '_sort' => 'string',
            '_order' => 'string|in:asc,desc',
        ]);

        if ($validator->fails()) {
            $messages = $validator->errors();

            foreach ($messages->all() as $message)
                return response()->json($message);
        }

        $limit = ($request->has('_limit')) ? $request->_limit : -1;
        $page = ($request->has('_page')) ? $request->_page : 1;
        $sort = ($request->has('_sort')) ? $request->_sort : 'id';
        $order = ($request->has('_order')) ? $request->_order : 'asc';

        $drones = Drone::orderBy($sort, $order);

        Paginator::currentPageResolver(function () use ($page) {
            return $page;
        });

        if ($request->has('image'))
            $drones->where('image', $request->image);
        if ($request->has('name'))
            $drones->where('name', $request->name);
        if ($request->has('address'))
            $drones->where('address', $request->address);
        if ($request->has('battery'))
            $drones->where('battery', $request->battery);
        if ($request->has('max_speed'))
            $drones->where('max_speed', $request->max_speed);
        if ($request->has('average_speed'))
            $drones->where('average_speed', $request->average_speed);
        if ($request->has('status'))
            $drones->where('status', $request->status);

        if ($limit >= 0)
            $drones->paginate($limit);

        return response()->json($drones->get());
    }

    public function insert(Request $request) {

        $validator = Validator::make($request->all(), [
            'image' => 'required|string|regex:/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/',
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'battery' => 'required|integer|min:0|max:100',
            'max_speed' => 'required|numeric',
            'average_speed' => 'required|numeric',
            'status' => 'required|string|in:success,failed',
        ]);

        if ($validator->fails()) {
            $messages = $validator->errors();

            foreach ($messages->all() as $message)
                return response()->json($message);
        }

        Drone::create($request->all());

        return response()->json("Saved successfully.");
    }

    public function update(Request $request, $id) {

        $validator = Validator::make($request->all(), [
            'image' => 'required|string|regex:/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/',
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'battery' => 'required|integer|min:0|max:100',
            'max_speed' => 'required|numeric',
            'average_speed' => 'required|numeric',
            'status' => 'required|string|in:success,failed',
        ]);

        if ($validator->fails()) {
            $messages = $validator->errors();

            foreach ($messages->all() as $message)
                return response()->json($message);
        }

        if (!is_numeric($id))
            return response()->json("The id must be a number.");

        $drone = Drone::find($id);

        $drone->update($request->all());

        return response()->json("Updated successfully.");
    }

    public function delete($id) {

        $drone = Drone::find($id);
        $drone->delete();

        return response()->json("Removed successfully.");
    }

    public function create(Request $request, $id) {

        $validator = Validator::make($request->all(), [
            'image' => 'required|string|regex:/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/',
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'battery' => 'required|integer|min:0|max:100',
            'max_speed' => 'required|numeric',
            'average_speed' => 'required|numeric',
            'status' => 'required|string|in:success,failed',
        ]);

        if ($validator->fails()) {
            $messages = $validator->errors();

            foreach ($messages->all() as $message)
                return response()->json($message);
        }

        if (!is_numeric($id))
            return response()->json("The id must be a number.");

        $drone = Drone::find($id);

        if ($drone)
            $drone->update($request->all());
        else {

            $drone = new Drone();
            $drone->fill($request->all());

            $drone->id = $id;

            $drone->save();
        }

        return response()->json("Saved successfully.");
    }
}