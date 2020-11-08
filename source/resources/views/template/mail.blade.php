<html>
<table width="100%">
    <tbody>
    <tr>
        <td align="center">
            <table border="0" width="550">
                <tbody>
                <tr>
                    <td valign="top" align="left" width="200"><h1>MiData Adress-Audit</h1></td>
                    <td valign="top" align="rigth" width="150"><img src="data:image/png;base64,{{base64_encode(file_get_contents(resource_path('images/logo.png')))}}" alt="Logo Pfadibewegung Schweiz"></td>
                </tr>
                </tbody>
            </table>
            <br />
            <table width="550" cellpadding="0" cellspacing="0" border="0">
                <tbody>
                <tr>
                    <td width="15"></td>
                    <td align="left" width="535">
                        <table width="507" cellpadding="0" cellspacing="0" border="0">
                            <tbody>
                            <tr>
                                <td>
                                    <p style="padding-left: 5px;">
                                        Wir haben festgestellt, dass die Adressen der folgenden Mitglieder nicht mehr korrekt sind.
                                        Bitte nimm dir doch die Zeit, um die Angaben in der MiData zu korrigieren.
                                        <br /><br />
                                        ----------
                                        <br /><br />
                                        Nous avons remarqué que les adresses des membres suivants ne sont plus correctes.
                                        Nous vous prions de bien vouloir corriger les données dans la MiData au plus vite possible.
                                        <br /><br />
                                        ----------
                                        <br /><br />
                                        <h3>Gemeldete Personen / Personnes signalées:</h3>
                                        {!! $wrong_user !!}
                                        <br /><br />
                                    </p>
                                    <br />
                                    <p style="color: #adb5bd">
                                      <b>Wer hat diese E-Mail ausgelöst?</b><br/>
                                      Bei einem Postversand eines Kantonalverbandes oder der PBS (Sarasani) gibt es regelmässig Retouren, die eingehen.
                                      Damit die Unterlagen beim nächsten Versand nicht wieder ins Leere gehen, werden falsche Adressen den Abteilungen gemeldet.
                                      <br /><br />
                                      Kontaktperson für diese Meldung:
                                      {{ $contact }}
                                      <br /><br />
                                      ----------
                                      <br /><br />
                                      <b>D'où vient cet e-mail?</b><br/>
                                      Lorsqu'une association cantonale ou le MSdS (Sarasani) envoie des document par poste, il y a régulièrement des retours. Afin d'éviter que les documents ne soient de nouveau
                                      perdus la prochaine fois qu'ils sont envoyés, les adresses erronées sont signalées aux groups.
                                      <br /><br />
                                      Contact pour ce message:
                                      {{ $contact }}
                                    </p>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>
    </tbody>
</table>
</html>
