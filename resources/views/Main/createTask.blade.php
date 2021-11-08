@extends('layouts.app')
@section('navbar')
<div class="container-fluid navcontainer">
        <nav class="navbar navbar-expand-lg navbar-dark back">
        <a class="navbar-brand" href="/Startseite">Tiktasks</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
            <div class="collapse navbar-collapse" id="navbarToggler">
                <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/Startseite">Einstellungen</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/Startseite">Profil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/Startseite">Ausloggen</a>
                </li>
                </ul>
            </div>
        </nav>
    </div>
@endsection

@section('content')
<div class="container">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="list-group">
            @foreach ($errors->all() as $error)
                <li class="list-group-item">{{ $error }}</li>
            @endforeach
            </ul>
        </div>
    @endif
    <form action="/Save-tasks" method="POST">
        @csrf
        <div class="row">
                <div class="createform col-lg-4 col-md-4 col-sm-4">
                    <div class="form-group">
                        <label for="title">Titel *</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{old('title')}}"placeholder="Titel der Aufgabe">
                    </div>
                    <div class="form-group">
                        <label for="deadline">Deadline</label>
                        <input type="date" class="form-control" id="deadline" name="deadline" value="{{old('deadline')}}">
                    </div>
                    <div class="form-group">
                        <label for="description">Beschreibung</label>
                        <textarea class="form-control" name="description" id="description" cols="30" rows="9">{{old('description')}}</textarea>
                    </div>
                </div>
                <div class="createform col-lg-4 col-md-4 col-sm-4">
                    <div class="form-group">
                        <label for="comment">Kommentar</label>
                        <input type="text" class="form-control" id="comment" name="comment" value="{{old('comment')}}" placeholder="Kommentar">
                    </div>
                    <div class="form-group">
                    <label for="visibility" class="">Sichtbarkeit</label>
                        <select class="form-select" id="visibility" name="visibility" value="{{old('visibility')}}" aria-label="Default select example">
                            <option value="0" selected>privat</option>
                            <option value="1">öffentlich</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="priority" class="">Priorität (1-5 zunehmend wichtiger)</label>
                        <input type="range" class="form-range" id="priority" name="priority" min="1" max="5" step="1" oninput="this.nextElementSibling.value = this.value" value="{{old('effort')}}">
                        <output><b>{{old('priority')}}</b></output>
                    </div>
                    <div class="form-group">
                        <label for="effort" class="form-label">Geschätzter aufwand (in Stunden)</label>
                        <input type="number" class="form-control" id="effort" name="effort" min="0" value="{{old('effort')}}"placeholder="3.5">
                    </div>
                    <div class="form-group"></div>
                    <div class="form-group">
                        <p>Die mit * markierten Felder sind Pflichteingaben</p>
                    </div>
                    <div class="form-group">
                    <span id=speicher ><a id=speichern href="/Create-task" onclick="this.closest('form').submit();return false;"></a></span>
                    </div>
                </div>
                <div class="createform col-lg-4 col-md-4 col-sm-4">
                    <img class="createTaskpic" src="sources/createTask.png" alt="taskpicture">
                </div>

        </div>
    </form>
</div>
@endsection
@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.js"></script>
@endsection

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.css">
@endsection