@extends('layouts.app')

@section('content')
    <div class="container">
        @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif


        @if(null === env('FAKER_MAIL'))
            <div class="alert alert-success">
                Das System läuft momentan im Produktiv-Modus. Alle Mails werden an die ermittelten Empfänger gesendet!
            </div>
        @else
            <div class="alert alert-danger">
                Das System läuft momentan im Test-Modus. Alle Mails werden an {{env('FAKER_MAIL')}} gesendet!
            </div>
        @endif

        <div class="row justify-content-center">
            <div class="col-md">
                <div class="card">
                    <div class="card-header">CSV hochladen</div>

                    <div class="card-body">
                        <form action="./upload_receiver" method="post" enctype="multipart/form-data">
                            @csrf <!-- {{ csrf_field() }} -->

                            Bitte CSV-Datei für den Upload auswählen:<br /><br />
                            <input type="file" name="fileToUpload" id="fileToUpload" accept="text/csv">
                            <br />
                            <br />
                            <input type="submit" value="Upload" name="submit">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
