<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class ToDoItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Inertia\Response
     */
    public function index()
    {
        $item  = Item::orderBy('start_at', 'asc')->get();

        return Inertia::render('Todo', [
            'todoItems' => $item
        ]);
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
     * @return \Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $request->validate([
            'subject' => 'required'
        ]);

        $todo['user_id'] = auth()->user()->id;

        $newItem = new Item;
        $newItem->user_id = $todo['user_id'];
        $newItem->subject = $request->subject;
        $newItem->save();

        return redirect('todos');
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
     * @return
     */
    public function update(Request $request, $id)
    {

        $todo = json_decode($request->getContent());

        $existingItem = Item::findOrFail($id);

        $existingItem->subject = $todo->subject;
        $existingItem->description = $todo->description;
        $existingItem->priority = $todo->priority;
        $existingItem->finish_at = Carbon::now();
        $existingItem->save();

        return Redirect::route('todos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $existingItem = Item::find($id);

        $existingItem->delete();

        return redirect('todos');
    }
}
