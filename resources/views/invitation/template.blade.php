<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invitation à rejoindre une colocation</title>
</head>
<body style="margin:0;padding:0;background-color:#F5F0E8;font-family:'Helvetica Neue',Arial,sans-serif;">

    <table width="100%" cellpadding="0" cellspacing="0" style="background-color:#F5F0E8;padding:40px 16px;">
        <tr>
            <td align="center">
                <table width="560" cellpadding="0" cellspacing="0" style="max-width:560px;width:100%;background-color:#FFFDF7;border-radius:24px;overflow:hidden;box-shadow:0 4px 40px rgba(28,25,23,0.10);">

                    {{-- Header --}}
                    <tr>
                        <td style="background-color:#1C1917;padding:40px 48px;">
                            <p style="color:#F59E0B;font-size:20px;font-weight:700;margin:0 0 24px 0;">CoLocator</p>
                            <h1 style="color:#FFFDF7;font-size:28px;font-weight:700;line-height:1.3;margin:0;">
                                Vous avez été invité à rejoindre une
                                <span style="color:#F59E0B;font-style:italic;">colocation</span>
                            </h1>
                        </td>
                    </tr>

                    {{-- Body --}}
                    <tr>
                        <td style="padding:40px 48px;">

                            {{-- Owner info --}}
                            <table cellpadding="0" cellspacing="0" style="margin-bottom:28px;">
                                <tr>
                                    <td style="vertical-align:middle;">
                                        <div style="width:48px;height:48px;border-radius:50%;background-color:#1C1917;color:#F59E0B;font-size:20px;font-weight:700;text-align:center;line-height:48px;min-width:48px;">
                                            A
                                        </div>
                                    </td>
                                    <td style="padding-left:14px;vertical-align:middle;">
                                        <p style="margin:0;font-size:15px;font-weight:600;color:#1C1917;">Ahmed Benali</p>
                                        <p style="margin:0;font-size:13px;color:#A8A29E;">vous invite à rejoindre sa colocation</p>
                                    </td>
                                </tr>
                            </table>

                            {{-- Message --}}
                            <p style="font-size:14px;color:#57534E;line-height:1.7;margin:0 0 28px 0;">
                                Bonjour <strong style="color:#1C1917;">Youssef</strong>,<br><br>
                                Ahmed Benali vous a invité à rejoindre sa colocation sur CoLocator.
                                Acceptez l'invitation pour commencer à partager les dépenses et gérer votre vie en colocation ensemble.
                            </p>

                            {{-- Colocation card --}}
                            <table cellpadding="0" cellspacing="0" width="100%" style="margin-bottom:32px;">
                                <tr>
                                    <td style="background-color:#F5F0E8;border-left:4px solid #F59E0B;border-radius:12px;padding:18px 22px;">
                                        <p style="margin:0 0 4px 0;font-size:11px;font-weight:600;color:#A8A29E;text-transform:uppercase;letter-spacing:1px;">Colocation</p>
                                        <p style="margin:0;font-size:20px;font-weight:700;color:#1C1917;">Appartement Casablanca</p>
                                    </td>
                                </tr>
                            </table>

                            {{-- Accept button --}}
                            <table cellpadding="0" cellspacing="0" width="100%" style="margin-bottom:12px;">
                                <tr>
                                    <td align="center" style="background-color:#1C1917;border-radius:14px;">
                                        <a href={{route('acceptInvit',['token'=>$token])}} style="display:block;padding:16px;color:#FFFDF7;font-size:15px;font-weight:600;text-decoration:none;text-align:center;">
                                            ✓ Accepter l'invitation
                                        </a>
                                    </td>
                                </tr>
                            </table>

                            {{-- Decline button --}}
                            <table cellpadding="0" cellspacing="0" width="100%">
                                <tr>
                                    <td align="center" style="border:1.5px solid #E7E5E4;border-radius:14px;">
                                        <a href="#" style="display:block;padding:14px;color:#A8A29E;font-size:14px;font-weight:500;text-decoration:none;text-align:center;">
                                            Refuser
                                        </a>
                                    </td>
                                </tr>
                            </table>

                        </td>
                    </tr>

                    {{-- Footer --}}
                    <tr>
                        <td style="padding:24px 48px;border-top:1px solid #F5F0E8;text-align:center;">
                            <p style="margin:0;font-size:12px;color:#A8A29E;line-height:1.6;">
                                Si vous n'attendiez pas cette invitation, vous pouvez ignorer cet email.<br>
                                &copy; 2026 CoLocator. Tous droits réservés.
                            </p>
                        </td>
                    </tr>

                </table>
            </td>
        </tr>
    </table>

</body>
</html>
