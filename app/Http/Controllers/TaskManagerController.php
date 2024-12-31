<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tasks;
use Illuminate\Support\Facades\Auth;

class TaskManagerController extends Controller
{
    public function index(){
        if(Auth::check()){
        $allTasks = Tasks::all();
        return view('index',['tasks'=>$allTasks]);
        }else{
            return redirect()->to('/login');
        }
    }

    

    public function createTask(Request $request){
        if(Auth::check()){
    $validation = $request->validate([
    'title' => 'required',
    'description' => 'required'
    ]);

    if(Tasks::create($validation)){
        return redirect()->to('/')->with('add-status','errors');
    }
}else{
    return redirect()->to('/login');
}

    }

    public function edit($id){
        if(Auth::check()){
        $task = Tasks::findOrFail($id);
        return view('edit',['task'=>$task]);
    }else{
        return redirect()->to('/login');
    }
    }
    
    public function update(Request $request,$id){
        if(Auth::check()){
        $task = Tasks::findOrFail($id);
        $validation = $request->validate([
            'title'=>'required',
            'description'=>'required'
        ]);
        $task->title = $request->title;
        $task->description = $request->description;
        if($task->save()){
        return redirect()->to(route('index'))->with('edit-status','successfully edited');
        }
        else{
            echo 'error';
        }
    }else{
        return redirect()->to('/login');
    }

    }

    public function delete($id){
        if(Auth::check()){
        if(Tasks::destroy($id)){
        return redirect()->to(route('index'))->with('massage','successfully deleted');
        }
        else{
            echo 'error';
        }
    }else{
        return redirect()->to('/login');
    }
}
    
    public function status($id){
        if(Auth::check()){
        $task = Tasks::findOrFail($id);
        if($task->status=="Pending"){
        $task->status = "Done";
        $task->save();
        
        return redirect()->to('/')->with('status','Task Status Updated Success');
        }
        else{
        $task->status = "Pending";
        $task->save();
        
        return redirect()->to('/')->with('status','Task Status Updated Success');
        } 
    }
else{
    return redirect()->to('/login');
}
    }

    public function fileUpload(){
        return view('uploadtest');
    }
    public function savefile(Request $request){
        $validation = $request->validate([
            'image'=>'required|image',
        ]);
        if($request->file('image')->store('images','public')){
           return redirect()->to('/fileupload')->with('upload-success','Your File Uploaded Successfully');
        }
    }
}

