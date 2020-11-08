@extends('layouts.app')

@section('content')
<div class="container">

  <div class="row justify-content-center">
    <div class="col-md">
      <div class="card">
        <div class="card-header">Wilkommen</div>

        <div class="card-body">
          @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
          @endif

          <div class="alert alert-warning">
            Wenn du gleich loslegen willst, kommst du oben im Menu über "Daten hochladen" zur Eingabemaske.
          </div>

          <h2>F.A.Q.</h2>
          <p>Schön, dass du da bist! Hier findest du ein paar Infos zu dieser Webseite: </p>
          <div class="accordion" id="accordionExample">

            <div class="card">
              <button class="btn btn-faq collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                Wofür kann ich das Adress-Tool verwenden?
              </button>
              <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                <div class="card-body">
                  <p>Mit diesem kleinen Web-Tool kannst du falsche Adressen in der MiData melden.</p>
                  <p>Dies macht zum Beispiel Sinn, wenn du für deinen Kantonalverband (oder fürs Sarasani) einen Versand gemacht hast
                  und dann Retouren von der Post erhalten hast. Damit die Unterlagen beim nächsten Versand nicht wieder zurück
                  kommen, kannst du den jeweiligen Abteilungen melden, bei welchen Mitgliedern etwas mit der Adresse nicht stimmt.</p>
                </div>
              </div>
            </div>

            <div class="card">
              <button class="btn btn-faq" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                Wie gehe ich vor?
              </button>
              <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">
                  <p>Das Adress-Tool braucht nur eine CSV-Datei mit je zwei Angaben pro Person, die du melden möchtest:</p>
                  <ul>
                    <li>Id der Person</li>
                    <li>Id der Hauptebene</li>
                  </ul>
                  <p>Diese beiden Angaben sind auch enthalten, wenn du in der MiData einen Export machst ("Adressliste" oder "Alle Angaben").</p>
                  <img src="{{ asset('images/export_options.png') }}" alt="Export Adressliste und Alle Angaben" class="max_300">
                  <br /><br />
                  <p>Wenn du also die Adressen für einen Post-Versand aus der MiData exportiert hast, kannst du dieselbe Tabelle als Grundlage für dieses Tool verwenden.
                  Am besten speicherst du das Dokument unter einem anderen Namen, damit du unbesorgt filtern und löschen kannst.</p>
                </div>
              </div>
            </div>
            <div class="card">
              <button class="btn btn-faq collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                Wie erstelle ich eine passende CSV-Datei?
              </button>
              <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                <div class="card-body">
                  <p>Wenn du Excel oder ein anderes Tabellenkalkulationsprogramm verwendest, kannst du ganz einfach die CSV-Datei erstellen und dann hochloaden.
                    Du solltest dabei bereits wissen, welche Adressen auch wirklich falsch sind (z.B. Retouren von der Post). Alle Adressen, die du am Schluss
                    in der Liste hast, werden per E-Mail an die entsprechende Abteilung gemeldet. Sei also vorsichtig mit dem Tool!</p>
                  <p>Bevor du das CSV erstellst: Stelle sicher, dass nur noch die Zeilen mit den falschen Adressen in der Tabelle sind. Lösche alles andere heraus!</p>
                  <h4>CSV erstellen</h4>
                  <ul>
                    <li>Spalten "Id" und "Id der Hauptebene" auswählen</li>
                  </ul>

                  <img src="{{ asset('images/export_file.png') }}" alt="Export aus MiData" width="100%">
                  <br /><br />

                  <ul>
                    <li>kopieren</li>
                    <li>neue (leere) Datei erstellen</li>
                    <li>einfügen</li>
                    <li>Titelzeile löschen</li>
                    <li>Als .csv Datei abspeichern</li>
                  </ul>

                  <img src="{{ asset('images/sheet.png') }}" alt="Export aus MiData" class="max_300">
                  <br /><br />
                  <p>Wenn du Excel verwendest, solltest du das Format MS-DOS beim Speichern auswählen</p>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>
@endsection
