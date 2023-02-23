<x-layout>
    <div class="container py-md-5 container--narrow">
      @unless($todo->isEmpty())
      <h2 class="text-center mb-4">To-Do</h2>
      <br>
      <div class="media" >
    @foreach ($todo as $todo)
      <a href="/todo/{{$todo->id}}" class="list-group-item list-group-item-action">
      <img class="media-object" style="width:40px" src="{{$todo->user->avatar}}"/>
      <small>{{$todo->user->username}}</small>
      <hr>
      <strong>{{$todo->title}}</strong> 
      <hr>

        {{$todo->body}}

      <hr>
      <small>{{$todo->created_at->format('j/n/Y')}}</small>
    </a>
    @endforeach
  </div>
      @else
      <div class="text-center">
        <h2>Hello <strong>{{auth()->user()->username}}</strong>, your todo feed is empty.</h2>
        <p class="lead text-muted">Your feed displays the latest todos from the people you follow. If you don&rsquo;t have any friends to follow that&rsquo;s okay; you can use the &ldquo;Search&rdquo; feature in the top menu bar to find content written by people with similar interests and then follow them.</p>
      </div>
      @endunless
      </div>
</x-layout>