<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use DB;

class TodoController extends Controller
{

      public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    // $todos = Todo::all()->latest()->paginate(24);
        $user_id=auth()->user()->id;
    $todos = DB::table('todos')->select('*')->where('user_id',$user_id)->latest()->paginate(24);

    return view('index', compact('todos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     $data = new Todo;
      $data->user_id=auth()->user()->id;
       $data->title = $request->title;
       $data->description = $request->description;
    $data->save();

     // return $validatedData;
    

    return redirect('index')->with('success', 'Todo created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $todo=Todo::findOrFail($id);
    return view('show', compact('todo'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   public function edit($id)
    {   $todo=Todo::findOrFail($id);
    return view('edit', compact('todo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   public function update(Request $request, $id)
    {
    $todo=Todo::findOrFail($id);
     $todo->title=$request->title;
$todo->description=$request->description;

    
    $todo->save();
    return redirect('index')->with('success', 'Todo updated successfully!');
    // return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
     $todo = Todo::find($id);
    $todo->delete();

    return redirect('index')->with('success', 'Todo deleted successfully!');
    }
}
