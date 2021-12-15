@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="btn btn-secondary position-relative">
            <h1>Einstellungen</h1>
        </div>
        <div class="systempanel">
        <img style="margin-top:3.8em; margin-left:3em;"src="sources/settings.svg" alt="Settings_Picture">
            <div>
                <span id=systempanelbutton>
                    <a id=archiv href="/Archive"></a>
                </span>
                <span id=systempanelbutton>
                    <a id=aufgabenexportierenundimportieren href="/NonAdminExportImport"></a>
                </span>
                <span id=systempanelbutton>
                    <a id=usernotification href="/UserNotifications" data-toggle="tooltip" data-placement="top"></a>
                </span>
            </div>
        </div>
    </div>
@endsection
