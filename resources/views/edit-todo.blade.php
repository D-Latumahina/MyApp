<x-layout doctitle="Edit To-Do">
    <div class="container py-md-5 container--narrow">
        <form action="/todo/{{$todo->id}}" method="POST">
            <p><small><strong><a href="/todo/{{$todo->id}}">&laquo; Back to todo</a></strong></small></p>
            @csrf
            @method('PUT')
          <div class="form-group">
            <label for="todo-title" class="text-muted mb-1"><small>Title</small></label>
            <input value="{{old('title', $todo->title)}}" name="title" id="todo-title" class="form-control form-control-lg form-control-title" type="text" placeholder="" autocomplete="off" />
            @error('title')
                <p class="m-0 small alert alert-danger shadow-sm">{{$message}}</p>
            @enderror
        </div>
  
          <div class="form-group">
            <label for="todo-body" class="text-muted mb-1"><small>Body Content</small></label>
            <textarea value="{{old('body', $todo->title)}}" name="body" id="todo-body" class="body-content tall-textarea form-control" type="text"></textarea>
            @error('body')
            <p class="m-0 small alert alert-danger shadow-sm">{{$message}}</p>
            @enderror
        </div>
  
          <button class="btn btn-primary">Save Changes</button>
        </form>
      </div>
</x-layout>