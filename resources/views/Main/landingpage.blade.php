@extends('layouts.landing_app')
@section('content')
    <div class="transition2"></div>
    <div class="wrapper">
        <div class="container landingpage">
            <div class="row">
                <div class="col-lg-6">
                    <img class="logo" src="sources/logo.png" alt="logo">
                    <!-- Insert Corporate Text here -->
                    <p class="introduction">
                    Tik Task kann verwendet werden, um individuelle To-do-Listen einzusehen, anzulegen und editieren zu können, die von dem Tool gespeichert, geladen, mit anderen Benutzern geteilt und exportiert werden können. Der Zweck von Tik Tasks ist daher der Einsatz im Arbeitsalltag der Firma und/oder bei Projekten.
                    </p>
                    <span id="einloggen"><a href="/login"></a></span>
                </div>
                <div class="col-lg-6">
                    <img class="workpicture" src="sources/LandingPageIllustrationsScaledDown.jpg" alt="work">
                </div>
            </div>
        </div>
    </div>
    <div class="transition1"></div>
    <footer class="text-center text-lg-start">
        <div class="text-center p-3 foot">
        Tik Tasks 2021: This is a simple To-do-list Tool and designed for educational purposes only
        </div>
    </footer>

@endsection
