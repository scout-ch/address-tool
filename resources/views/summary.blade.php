@extends('layouts.app')

@section('content')
 <div class="container">
  <div class="row justify-content-center">
   <div class="col-md-8">
    <div class="card">
     <div class="card-header">Kontakt gefunden</div>

     <div class="card-body">
      @foreach($found as  $entry)
        {{ $entry }}
       @endforeach
     </div>
    </div>

    <div class="card">
     <div class="card-header">Kontakt <b>nicht</b> gefunden</div>

     <div class="card-body">
      @foreach($not_found as  $entry)
       <i>{{ $entry }}</i> <br />
      @endforeach
     </div>
    </div>
   </div>
  </div>
 </div>
@endsection
