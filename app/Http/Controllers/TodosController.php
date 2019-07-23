<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;
use Session;

class TodosController extends Controller
{
    public function index(){
        $todos=Todo::all();
        return view('todos')->with('todos',$todos);
    }
    public function store(Request $request){
        Todo::create([
        'todo'=>$request->todo
    ]);
    Session::flash('success',"Your Todo is created !");
            return redirect()->back();
    }
    public function delete($id){
      $todo=Todo::find($id);
      $todo->delete();
      
    Session::flash('success',"Your Todo is Deleted !");
      return redirect()->back();  
    }
    public function update($id){
        $todo=Todo::find($id);
        
        return view('update')->with('todo',$todo);  
      }
    public function save(Request $request,$id){
        $todo=Todo::find($id);
        $todo->todo=$request->todo;
        $todo->save();
        
        Session::flash('success',"Your Todo is Updated !");
        return redirect('/todos');

    }
    public function completed($id){
        $todo=Todo::find($id);
        $todo->completed=1;
        $todo->save();
        
        Session::flash('success',"Your Todo is Marked as completed !");
        
        return redirect('/todos');
        
          
      }  

}
