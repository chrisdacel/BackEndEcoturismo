<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body { font-family: 'Albert Sans', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif; margin: 0; padding: 0; background-color: #f8fafc; }
        .container { max-width: 600px; margin: 0 auto; background-color: #ffffff; }
        .header { background: linear-gradient(135deg, #10b981 0%, #059669 100%); padding: 32px 24px; text-align: center; border-radius: 16px 16px 0 0; }
        .header h2 { margin: 0; color: #ffffff; font-size: 24px; font-weight: 700; letter-spacing: -0.5px; }
        .body { background-color: #ffffff; padding: 32px 24px; }
        .body p { color: #475569; font-size: 15px; line-height: 1.6; margin: 0 0 24px 0; }
        .card { background: linear-gradient(135deg, #f0fdf4 0%, #ecfdf5 100%); border-radius: 12px; padding: 24px; margin: 24px 0; border-left: 5px solid #10b981; }
        .card h3 { margin: 0 0 16px 0; color: #1e293b; font-size: 20px; font-weight: 700; }
        .card .label { margin: 0 0 8px 0; color: #64748b; font-size: 12px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px; }
        .card .info { border-top: 1px solid rgba(16, 185, 129, 0.3); padding-top: 16px; margin-top: 16px; }
        .card .info p { margin: 0 0 8px 0; color: #475569; font-size: 14px; }
        .card .info p:last-child { margin: 0; }
        .button-wrapper { text-align: center; margin: 32px 0; }
        .button { display: inline-block; background-color: #10b981; color: #ffffff; text-decoration: none; border-radius: 999px; padding: 14px 32px; font-weight: 600; font-size: 15px; }
        .footer-note { margin: 24px 0 0 0; padding-top: 24px; border-top: 1px solid #e2e8f0; color: #64748b; font-size: 13px; line-height: 1.5; }
        .footer { background-color: #f8fafc; padding: 20px 24px; text-align: center; border-radius: 0 0 16px 16px; border-top: 1px solid #e2e8f0; }
        .footer p { margin: 0; color: #94a3b8; font-size: 12px; }
        strong { color: #10b981; }
    </style>
</head>
<body>
<div class="container">
    <div class="header">
        <h2>Nuevo evento disponible</h2>
    </div>

    <div class="body">
        <p>Hola {{ $user->name }},</p>
        <p>Hemos encontrado un evento que te puede interesar en uno de tus sitios favoritos.</p>

        <div class="card">
            <p class="label">Sitio: {{ $place->name }}</p>
            <h3>{{ $event->title }}</h3>
            
            @if($event->description)
            <p>{{ $event->description }}</p>
            @endif
            
            <div class="info">
                <p><strong>Inicio:</strong> {{ $event->starts_at->format('d \\d\\e M \\d\\e Y \\a \\l\\a\\s H:i') }}</p>
                @if($event->ends_at)
                <p><strong>Fin:</strong> {{ $event->ends_at->format('d \\d\\e M \\d\\e Y \\a \\l\\a\\s H:i') }}</p>
                @endif
            </div>
        </div>

        <div class="button-wrapper">
            <a href="{{ config('app.frontend_url', config('app.url')) }}/turista/sitio/{{ $place->id }}#evento-{{ $event->id }}" class="button">
                Ver evento completo
            </a>
        </div>

        <p class="footer-note">Recibiste este correo porque tienes activadas las notificaciones en Conexion EcoRisaralda.</p>
    </div>

    <div class="footer">
        <p>© 2026 Conexion EcoRisaralda. Todos los derechos reservados.</p>
    </div>
</div>
</body>
</html>
