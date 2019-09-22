@extends('layouts.app')

@section('content')
    <div class="container">
        @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        <form action="./upload_receiver" method="post" enctype="multipart/form-data">
                        @csrf <!-- {{ csrf_field() }} -->
                            <br />
                            Bitte CSV-Datei für den Upload auswählen:<br /><br />
                            <input type="file" name="fileToUpload" id="fileToUpload"><br /><br />
                            <input type="submit" value="Upload" name="submit">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
