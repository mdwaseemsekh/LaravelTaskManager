<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Manager</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body>

<div class="container">
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="/">Task Manager </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">About Us</a>
        </li>
        
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success mr-4" type="submit">Search</button>
      </form>
      <a href="{{route('logout')}}"><button class=" btn btn-danger ml-4" >
        Log Out</button></a>
    </div>
  </div>
</nav>
    </div>


<div class="form-container container mt-4 pt-4 mb-3">
    @if(session()->has('status'))
    {{session()->get('status')}}
    @endif
    <h4>Add New Task</h4>
    @if($errors->any())
    @foreach($errors->all() as $error)
    <li>{{$error}}</li>
    @endforeach
    @endif
    <form action="{{route('createTask')}}" method="post">
        @csrf
        <label for="title" class="form-label"><b>Task Title :</b></label>
        <input type="text" name="title" class="form-control" placeholder="Enter Your Task Title">
        
        <label for="title" class="form-label mt-3"><b>Task Description :</b></label>
        <input type="text" name="description" class="form-control" placeholder="Enter Your Task Description">
        <input type="submit" class="btn btn-success mt-2" value="Submit">
    </form>
</div>

<hr>

<div class="prev-tasks container">
    <h4>Your Previous Tasks</h4>

    <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Task Tittle</th>
      <th scope="col">Task Description</th>
      <th scope="col">Status</th>
      <th scope="col" class="text-center">Action</th>
      
    </tr>
  </thead>
  <tbody>
      @foreach($tasks as $task)
    <tr>
      <th scope="row">{{$task['id']}}</th>
      <td>{{$task['title']}}</td>
      <td>{{$task['description']}}</td>
      <td >{{$task['status']}}</td>
      <td class="text-center">
      <a href="/edit/{{$task['id']}}"><button class="btn btn-secondary">Edit</button></a> 
       <a href="/delete/{{$task['id']}}"><button class="btn btn-danger">Delete</button></a> 
      <a href="/status/{{$task['id']}}"><button class="btn btn-success">
        @if($task['status']=="Pending")
        Mark Done
        @else
        Mark Pending
        @endif
      </button></a> 

      </td>
    </tr>
    @endforeach
 
  </tbody>
</table>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>