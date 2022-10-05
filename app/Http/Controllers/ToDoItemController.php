<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ToDoItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $item  = Item::orderBy('start_at', 'asc')->get();//orderBy('start_at', 'asc');

        return response()->json(["date" => $item]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $newItem = new Item;
        $newItem->subject = $request->subject;
        $newItem->save();

        return response()->json(["data" => "New line is added"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $existingItem = Item::find($id);

        if($existingItem){
            $existingItem->subject = $request->subject;
            $existingItem->description = $request->description;
            $existingItem->priority = $request->priority;
            $existingItem->finish_at = Carbon::now();
            $existingItem->save();

            return response()->json(['data' => "Record is updated"]);
        }
        return response()->json(['data' => "Item not found"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $existingItem = Item::find($id);

        if($existingItem){
            $existingItem->delete();

            return response()->json(['data' => "Item is deleted"]);
        }

        return response()->json(['data' => "Item not found"]);
    }
}
