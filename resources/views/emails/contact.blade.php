<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Mensaje de Contacto</title>
</head>
<body style="font-family: 'Helvetica Neue', Arial, sans-serif; background-color: #f5f7fa; margin: 0; padding: 20px;">
    <div style="max-width: 600px; margin: 0 auto; background-color: #ffffff; border-radius: 10px; overflow: hidden; box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);">
        <!-- Encabezado -->
        <div style="background: linear-gradient(135deg, #0066cc 0%, #004080 100%); padding: 25px; text-align: center;">
            <h1 style="color: white; margin: 0; font-size: 24px; font-weight: 600; letter-spacing: 1px;">NUEVO MENSAJE DE CONTACTO</h1>
        </div>

        <!-- Contenido -->
        <div style="padding: 30px;">
            <div style="margin-bottom: 25px; text-align: center;">
                <p style="color: #666; font-size: 14px; margin-top: 10px;">Nuevo Mensaje. Un cliente se puso en contacto</p>
            </div>

            <!-- Datos del contacto -->
            <div style="background-color: #f9fbfd; border-radius: 8px; border: 1px solid #e1e5eb; padding: 25px; margin-bottom: 25px;">
                <h2 style="color: #333; font-size: 18px; margin-top: 0; margin-bottom: 20px; border-bottom: 1px solid #e1e5eb; padding-bottom: 10px;">Información del Contacto</h2>

                <table style="width: 100%; border-collapse: collapse;">
                    <tr style="border-bottom: 1px solid #e1e5eb;">
                        <td style="padding: 12px 0; width: 30%; color: #0066cc; font-weight: 600;">Nombre:</td>
                        <td style="padding: 12px 0; color: #555;">{{ $contact->name }}</td>
                    </tr>
                    <tr style="border-bottom: 1px solid #e1e5eb;">
                        <td style="padding: 12px 0; color: #0066cc; font-weight: 600;">Apellido:</td>
                        <td style="padding: 12px 0; color: #555;">{{ $contact->last_name }}</td>
                    </tr>
                    <tr style="border-bottom: 1px solid #e1e5eb;">
                        <td style="padding: 12px 0; color: #0066cc; font-weight: 600;">Email:</td>
                        <td style="padding: 12px 0; color: #555;">{{ $contact->email }}</td>
                    </tr>
                    <tr style="border-bottom: 1px solid #e1e5eb;">
                        <td style="padding: 12px 0; color: #0066cc; font-weight: 600;">Teléfono:</td>
                        <td style="padding: 12px 0; color: #555;">{{ $contact->phone }}</td>
                    </tr>
                    <tr>
                        <td style="padding: 12px 0; vertical-align: top; color: #0066cc; font-weight: 600;">Mensaje:</td>
                        <td style="padding: 12px 0; color: #555;">{{ $contact->message }}</td>
                    </tr>
                </table>
            </div>

            <!-- Pie de página -->
            <div style="text-align: center; color: #777; font-size: 13px; line-height: 1.5;">
                <p>Este mensaje fue generado automáticamente. Por favor no responda a este correo.</p>
                <p style="margin-top: 15px;">© {{ date('Y') }} ABALOA. Todos los derechos reservados.</p>
            </div>
        </div>
    </div>
</body>
</html>
