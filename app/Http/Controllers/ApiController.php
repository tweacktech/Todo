<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use App\Models\User;
use DB;

class ApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $credentials = $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        User::create($credentials);
        return response()->json(['message','successfully created new user']);
        
    }
    
   public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (!auth()->attempt($credentials)) {
            return response()->json(['message' => 'Invalid login credentials'], 401);
        }

        $user = $request->user();

        $user_id=auth()->user()->id;
        return response()->json([
            'user' => $user,
            'User_id' => $user_id,
        ]);
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();

        return response()->json(['message' => 'Successfully logged out']);
    }


   public function index()
    {
        // return Todo::all();

        return response()->json(Todo::all());
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
       $data->user_id=$request->user_id;
       $data->title = $request->title;
       $data->description = $request->description;
    $data->save();
    return response()->json(['message' => 'Todo created successfully!']);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         // return ;
         return response()->json(Todo::findOrFail($id));
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
    return response()->json(['success', 'Todo updated successfully!']);
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

    return response()->json(['success', 'Todo deleted successfully!']);
    }
}
