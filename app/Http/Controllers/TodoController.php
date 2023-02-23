<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function actuallyUpdate (Todo $todo, Request $request) {
        $incomingFields = $request->validate([
            'title' => 'required',
            'body' => 'required'
        ]);

        $incomingFields['title'] = strip_tags($incomingFields['title']);
        $incomingFields['body'] = strip_tags($incomingFields['body']);

        $todo->update($incomingFields);

        return back()->with('success', 'Post successfullt updated.');
    }


    public function showEditForm(Todo $todo) {
        return view('edit-todo', ['todo' => $todo]);
    }

    public function delete(Todo $todo) {
        // if (auth()->user()->cannot('delete', $post)) {
        //     return 'You cannot do that';
        // }
        $todo->delete();

        return redirect('/profile/' . auth()->user()->username)->with('success', 'Todo successfully deleted.');
    }

    public function storeNewTodo(Request $request) {
        $incomingFields = $request->validate([
            'title' => 'required',
            'body' => 'required'
        ]);

        $incomingFields['title'] = strip_tags($incomingFields['title']);
        $incomingFields['body'] = strip_tags($incomingFields['body']);
        $incomingFields['user_id'] = auth()->id();

       $newTodo = Todo::create($incomingFields);
       return redirect("/todo/{$newTodo->id}")->with('success', 'New to-do succesfully created');
    }

    public function showCreateForm() {
        return view('create-todo');
    }

    public function viewSingleTodo(Todo $todo) {
        $todo['body'] = strip_tags(Str::markdown($todo->body), '<p><ul><ol><li><strong><em><h3><br>');
         return view('single-todo', ['todo' => $todo]);
    }

    public function viewEveryTodo(Todo $todo) {
        
            if (auth()->check()) {
                return view('todo-feed', ['todo' => auth()->user()->feedTodos()->latest()->get()]);
            } else {
                return view('homepage');
            }

        $todo['body'] = strip_tags(Str::markdown($todo->body), '<p><ul><ol><li><strong><em><h3><br>');
        return view('todo-feed', ['todo' => $todo]);
    }
}
