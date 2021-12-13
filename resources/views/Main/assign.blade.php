@extends('layouts.app')

@section('content')
    @if (auth()->user()->isManager())
        <div class="container">
            <div class="container">
                <div class="btn btn-secondary position-relative">
                    <h1>Aufgaben zuweisen</h1>
                </div>
            </div>
            @if ($TaskUserPairs->first())
                <form id="zuweisen" action="/assignTasks" method="POST">
                    @csrf
                    <input id="zuweisen-input" type="text" name="operator" placeholder="Mitarbeiter E-Mail">
                    <div id="zuweisen-list">
                        @foreach ($TaskUserPairs as $TaskUserPair)
                            @if ($TaskUserPair->users_id == auth()->user()->id)
                                @foreach ($tasks as $task)
                                    @if ($task->completed == false && $task->id == $TaskUserPair->tasks_id)
                                        <li id="zuweisen-item" class="list-group-item">
                                            <label>
                                                <input class="form-check-input me-1" name="tasks[]" type="checkbox"
                                                    value="{{ $task->id }}" aria-label="...">
                                                {{ $task->title }}
                                            </label>
                                        </li>
                                    @endif
                                @endforeach
                            @endif
                        @endforeach
                    </div>
                    <div>
                        <input id="zuweisenbutton" class="btn btn-info" type="submit" name="send">
                    </div>
                </form>
            @else
                <div class="container">
                    <h4 class="EmptyWebsite">Keine Aufgaben vorhanden</p>
                </div>
            @endif
        </div>
    @endif
@endsection
