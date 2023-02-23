<x-profile :sharedData="$sharedData" doctitle="{{$sharedData['username']}}'s To-Do's">
    <div class="media">
        @foreach ($todos as $todo)
        <a href="/todo/{{$todo->id}}" class="list-group-item list-group-item-action">
        <img class="avatar-tiny" src="{{$todo->userTodo->avatar}}" />
        <Small>{{$todo->title}}</Small> 
        <hr>
        {{$todo->body}}
      </a>
      @endforeach
    </div>
  </x-profile>