<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>html invoice email template - Bootdey.com</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
        
    </style>
</head>

<body>
    <div style="background-color: #f6f6f6; color: #333; height: 100%; width: 100%;" height="100%" width="100%">
        <table cellspacing="0" style="background-color: #f6f6f6; border-collapse: collapse; padding: 40px; width: 100%;" width="100%">
            <tbody>
                <tr>
                    <td width="5px" style="padding: 0;"></td>
                    <td style="clear: both; display: block; margin: 0 auto; max-width: 600px; padding: 10px 0;">
                        <table width="100%" cellspacing="0" style="border-collapse: collapse;">
                            <tbody>
                                <tr>
                                    <td style="padding: 0;">
                                        {{-- <a href="#" style="color: #348eda;" target="_blank">
                                            <img src="//ssl.gstatic.com/accounts/ui/logo_2x.png" alt="Bootdey.com" style="height: 50px; max-width: 100%; width: 157px;" height="50" width="157" />
                                        </a> --}}
                                        
                                        <p style="color: #666; font-size: 12px; font-weight: normal; margin-bottom: 10px;">
                                            <a href="https://www.infrastructures.gov.bf/accueil">Ministere des Infrastructures et du désenclavement</a>
                                        </p>
                                        <p style="margin: 0; color: #666; font-size: 12px; font-weight: normal;">Direction Générale des Etudes Statistiques et Sectorielles</p>
                                        <p style="margin: 0; color: #666; font-size: 12px; font-weight: normal;"><span class="il"></span> Avenue ..............</p>
                                    </td>
                                    <td style="color: #999; font-size: 12px; padding: 0; text-align: right; align-items: end;" >
                                        {{ $demande->raison_social }}<br>
                                        {{$demande->email_entreprise}}<br>
                                        @if (!empty($demande->numero_telephone))
                                        {{ $demande->numero_telephone }}
                                        @endif
                                        @if (!empty($demande->tel_1))
                                            {{ $demande->tel_1 }}
                                        @endif
                                        @if (!empty($demande->tel_2))
                                            {{ $demande->tel_2 }}
                                        @endif <br>
                                        {{ \Carbon\Carbon::parse($demande->created_at)->format('d/m/y') }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                    <td width="5px" style="padding: 0;"></td>
                </tr>
                <br><br><br><br><br><br>
                <tr>
                    <td width="5px" style="padding: 0;"></td>
                    <td style="background-color:#FFFFFF; border: 1px solid #000; clear: both; display: block; margin: 0 auto; max-width: 600px; padding: 0;">
                        <table width="100%" style="background: #f9f9f9; border-bottom: 1px solid #eee; border-collapse: collapse; color: #999;">
                            <tbody>
                                <tr>
                                    <td width="50%" style="padding: 20px;"><strong style="color: #e21b2c; font-size: 24px;">{{$demande->montant}} F CFA</strong> <b style="color: rgb(47, 219, 47)"> Payé </b></td>
                                    <td width="50%" style="padding: 20px; align-items: end;"><span class="il"></span></td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                    <td style="padding: 0;"></td>
                    <td width="5px" style="padding: 0;"></td>
                </tr>
                <tr>
                    <td width="5px" style="padding: 0;"></td>
                    <td style="border: 1px solid #000; border-top: 0; clear: both; display: block; margin: 0 auto; max-width: 600px; padding: 0;">
                        <table cellspacing="0" style="border-collapse: collapse; border-left: 1px solid #000; margin: 0 auto; max-width: 600px;">
                            <tbody>
                                <tr>
                                    <td valign="top" style="padding: 20px;">
                                        <h3 style="
                                            border-bottom: 1px solid #000;
                                            color: #000;
                                            font-family: 'Helvetica Neue', Helvetica, Arial, 'Lucida Grande', sans-serif;
                                            font-size: 18px;
                                            font-weight: bold;
                                            line-height: 1.2;
                                            margin: 0;
                                            margin-bottom: 15px;
                                            padding-bottom: 5px;
                                        ">
                                            Resumé
                                        </h3>
                                        <table cellspacing="0" style="border-collapse: collapse; margin-bottom: 40px;">
                                            <tbody>
                                                <tr>
                                                    <td style="padding: 5px 0;">Frais de dossier</td>
                                                    <td style="padding: 5px 0; align-items: end;">25 000 F CFA </td>
                                                </tr>
                                                <tr>
                                                    <td style="padding: 5px 0;">Frais de timbre</td>
                                                    <td style="padding: 5px 0;align-items: end;">20 000 F CFA </td>
                                                </tr>
                                                <tr>
                                                    <td style="padding: 5px 0;">Frais d'examen de dossier </td>
                                                    <td style="padding: 5px 0;align-items: end;">
                                                        @if($demande->Categorie->code == "TH") 50 000 F CFA
                                                        @elseif($demande->Categorie->code == "TR1") 200 000 F CFA
                                                        @elseif($demande->Categorie->code == "TR2") 300 000 F CFA
                                                        @elseif($demande->Categorie->code == "TR3") 500 000 F CFA
                                                        @elseif($demande->Categorie->code == "EC") 300 000 FCFA
                                                        @endif
                                                    </td>
                                                </tr><br>
                                                <tr>
                                                    <td style="border-bottom: 2px solid #000; border-top: 2px solid #000; font-weight: bold; padding: 5px 0;">Montant total</td>
                                                    <td style="align-items: end;border-bottom: 2px solid #000; border-top: 2px solid #000; font-weight: bold; padding: 5px 0;">{{$demande->montant}} F CFA</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                    <td width="5px" style="padding: 0;"></td>
                </tr>
                <tr style="color: #666; font-size: 12px;">
                    <td width="5px" style="padding: 10px 0;"></td>
                    <td style="clear: both; display: block; margin: 0 auto; max-width: 600px; padding: 10px 0;">
                        <table width="100%" cellspacing="0" style="border-collapse: collapse;">
                            <tbody>
                                <tr>
                                    <td width="40%" valign="top" style="padding: 10px 0;">
                                        <h4 style="margin: 0;">Questions?</h4>
                                        <p style="color: #666; font-size: 12px; font-weight: normal; margin-bottom: 10px;">
                                            visiter notre plateforme
                                            <a href="#" style="color: #666;" target="_blank">
                                                mid.gov.bf
                                            </a>
                                            section fAQ pour toute question.
                                        </p>
                                    </td>
                                    <td width="10%" style="padding: 10px 0;">&nbsp;</td>
                                    <td width="40%" valign="top" style="padding: 10px 0;">
                                        
                                        
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                    <td width="5px" style="padding: 10px 0;"></td>
                </tr>
            </tbody>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript">

    </script>
</body>

</html>