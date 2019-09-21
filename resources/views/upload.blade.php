<html>
 <head>
  <title>Hilfetool Address-Meldungen</title>
  </head>
  <body>
      <form action="./upload_receiver" method="post" enctype="multipart/form-data">
        @csrf <!-- {{ csrf_field() }} -->
        <br />
          Bitte CSV-Datei für den Upload auswählen:<br /><br />
          <input type="file" name="fileToUpload" id="fileToUpload"><br /><br />
          <input type="submit" value="Upload" name="submit">
      </form>

  </body>
</html>
