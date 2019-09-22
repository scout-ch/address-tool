<table width="100%">
    <tbody>
    <tr>
        <td align="center">
            <table border="0" width="550">
                <tbody>
                <tr>
                    <td valign="top" align="left" width="200"><h1>MiData Adress-Audit</h1></td>
                    <td valign="top" align="rigth" width="200"><img src="{{file_get_contents(resource_path('images/midata.svg'))}}" alt=""></td>
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
                                        Hallo
                                        <br />
                                        Wir haben festgestellt, dass die Adressen der folgenden MiData-Mitglieder nicht mehr korrekt sind:
                                        <br />
                                        {!! $wrong_user !!}

                                    </p>
                                    <br />
                                    <br/>
                                    <br/>
                                    <br/>
                                    <br/>
                                    <p style="color: #adb5bd">Dieses Mail wurde  durch den Adress-Reporter der PBS generiert und versendet.</p>
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