<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Advertencia por Faltas</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f4f4f4; margin: 0; padding: 0;">
    <table width="100%" cellpadding="0" cellspacing="0">
        <tr>
            <td text-align style="padding: 20px;">
                <table width="600" style="background-color: #ffffff; border-radius: 8px; overflow: hidden; box-shadow: 0 2px 6px rgba(0,0,0,0.1);">
                    <tr>
                        <td style="background-color: #1e3a8a; padding: 20px; text-align: center; color: white;">
                            <h1 style="margin: 0;">Advertencia por Faltas</h1>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 30px;">
                            <h2 style="color: #1e293b;">Hola {{ $nombre }},</h2>
                            <p style="font-size: 16px; color: #334155;">
                                Hemos notado que has acumulado <strong>3 inasistencias</strong> sin justificar en tu servicio social.
                            </p>
                            <p style="font-size: 16px; color: #334155;">
                                Recuerda que la <strong>asistencia regular</strong> es un requisito indispensable para cumplir tus <strong>horas de servicio</strong>.
                            </p>
                            <p style="font-size: 16px; color: #334155;">
                                Por favor, contacta al <strong>encargado del servicio social</strong> lo antes posible para evitar posibles sanciones.
                            </p>
                            <hr style="margin: 30px 0;">
                            <p style="font-size: 14px; color: #64748b; text-align: center;">
                                Este mensaje fue generado automáticamente por el sistema de control de asistencias.
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="background-color: #e2e8f0; text-align: center; padding: 15px; font-size: 14px; color: #475569;">
                            © {{ date('Y') }} Centro de Cómputo.
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
