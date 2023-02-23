<x-layout :doctitle="$todo->title">
    <div class="container py-md-5 container--narrow">
        <div class="d-flex justify-content-between">
          <h2>{{$todo->title}}</h2>
          @can('update', $todo)
          <span class="pt-2">
            <a href="/todo/{{$todo->id}}/edit" class="text-primary mr-2" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fas fa-edit"></i></a>
            <form class="delete-todo-form d-inline" action="/todo/{{$todo->id}}" method="POST">
              @csrf
              @method('DELETE')
              <button class="delete-todo-button text-danger" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fas fa-trash"></i></button>
            </form>
          </span>
          @endcan
        </div>
  
        <p class="text-muted small mb-4">
          <a href="/profile/{{$todo->user->username}}"><img class="avatar-tiny" src="{{$todo->user->avatar}}" /></a>
          Posted by <a href="/profile/{{$todo->user->username}}">{{$todo->user->username}}</a> on {{$todo->created_at->format('n/j/Y')}} {{$todo->created_at->format('H:i')}}
        </p>
  
        <div class="body-content">
          {!! $todo->body !!}
        </div>

        <a class="btn btn-sm btn-default mr-2" href="/todos">Back to to-dos</a>
      </div>
  
      <!-- footer begins -->
  
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
      <script>
        $('[data-toggle="tooltip"]').tooltip()
      </script>
    </body>
  </html>
</x-layout>