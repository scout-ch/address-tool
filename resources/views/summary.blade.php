@extends('layouts.app')

@section('content')
 <div class="container">
  <div class="row justify-content-center">
   <div class="col-md-8">
    <div class="card">
     <div class="card-header">Kontakt gefunden</div>

     <div class="card-body">
      <table>
        <tr>
         <th>
          Kontakt-Mail
         </th>
         <th>
          Benutzer-Link
         </th>
        </tr>
          @foreach($found as  $data)
            <tr>
              <td>{{ $data[0] }}</td>
              <td>{!! $data[1] !!}</td>
            </tr>
          @endforeach
      </table>

         <form method="post" action='{{ route('mailer-send') }}'>
             @csrf

             @foreach($found as $mailadress)
                <input type="hidden" name="mail[]" value="{{ $mailadress[0].','.$mailadress[1] }}">
             @endforeach

             <input type="submit" value="Mail an gelistete Kontakte senden">
         </form>
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
