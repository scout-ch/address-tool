@extends('layouts.app')

@section('content')
 <div class="container">
  <div class="row justify-content-center">
   <div class="col-md-8">

    <h2>Übersicht über deinen Versand</h2><br/>
    <div id="accordion">

     <div class="card">
       <div class="card-header" id="headingOne">
         <h5 class="mb-0">
           <button class="btn btn-secondary" data-toggle="collapse" data-target="#found" aria-expanded="false" aria-controls="found">
             Zeige E-Mails pro Empfänger ({{ count($found) }})
           </button>
         </h5>
       </div>

       <div id="found" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
        <div class="card-body">
         <table class="table">
           <thead><tr>
            <th scope="col">
             Kontakt-Mail
            </th>
            <th scope="col">
             Benutzer-Link
            </th>
           </tr></thead>
           <tbody>
             @foreach($found as  $data)
               <tr>
                 <td>{{ $data[0] }}</td>
                 <td>{!! $data[1] !!}</td>
               </tr>
             @endforeach
           </tbody>
          </table>
        </div>
      </div>
     </div><br/>

     <div class="card">
      <div class="card-header" id="headingTwo">
        <h5 class="mb-0">
          <button class="btn btn-secondary" data-toggle="collapse" data-target="#notfound" aria-expanded="false" aria-controls="notfound">
            Zeige Elemente mit Fehler ({{ count($not_found) }})
          </button>
        </h5>
      </div>

      <div id="notfound" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
        <div class="card-body">
         @foreach($not_found as $entry)
          <div class="alert alert-info" role="alert"><a href="{{ $group_url.$entry[0] }}" target="_blank">{{ $entry[1] }}</a></div>
         @endforeach
        </div>
      </div>
     </div>
    </div><br/><br/>

     <!--<div class="card">
      <div class="card-header" id="headingThree">
       <h5 class="mb-0">
         <button class="btn btn-primary" data-toggle="collapse" data-target="#mailing" aria-expanded="false" aria-controls="mailing">
           Übersicht E-Mails
         </button>
       </h5>
     </div>-->
     <div class="card">
      <div id="mailing" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
       <div class="card-body">
        <div class="alert alert-warning" role="alert">Willst du wirklich {{ count($found) }} Mails verschicken?</div><br/>
        <form method="post" action='{{ route('mailer-send') }}'>
           @csrf

           @foreach($found as $mailadress)
              <input type="hidden" name="mail[]" value="{{ $mailadress[0] }}">
           @endforeach

           <input type="submit" class="btn btn-danger" value="Mail an gelistete Kontakte senden">
        </form>
       </div>
      </div>
     </div>



  </div>
 </div>
</div>
@endsection
