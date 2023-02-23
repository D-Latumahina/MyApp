<x-layout doctitle="Create New To-Do">
    <div class="container py-md-5 container--narrow">
        <form action="/create-todo" method="POST">
            @csrf
          <div class="form-group">
            <label for="todo-title" class="text-muted mb-1"><small>Title</small></label>
            <input value="{{old('title')}}" name="title" id="todo-title" class="form-control form-control-lg form-control-title" type="text" placeholder="" autocomplete="off" />
            @error('title')
                <p class="m-0 small alert alert-danger shadow-sm">{{$message}}</p>
            @enderror
        </div>
  
          <div class="form-group">
            <label for="todo-body" class="text-muted mb-1"><small>Body Content</small></label>
            <textarea value="{{old('body')}}" name="body" id="todo-body" class="body-content tall-textarea form-control" type="text"></textarea>
            @error('body')
            <p class="m-0 small alert alert-danger shadow-sm">{{$message}}</p>
            @enderror
        </div>
  
          <button class="btn btn-primary">Save New To-do</button>
        </form>
      </div>
</x-layout>