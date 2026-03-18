@component('mail::message')
<div style="font-family: 'Albert Sans', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif; background-color: #ffffff;">

<div style="max-width: 600px; margin: 0 auto;">

    <div style="background: linear-gradient(135deg, #10b981 0%, #059669 100%); padding: 32px 24px; text-align: center; border-radius: 16px 16px 0 0;">
        <h2 style="margin: 0; color: #ffffff; font-size: 24px; font-weight: 700; letter-spacing: -0.5px;">
            Nuevo evento disponible
        </h2>
    </div>

    <div style="background-color: #ffffff; padding: 32px 24px;">
        <p style="margin: 0 0 24px 0; color: #475569; font-size: 15px; line-height: 1.6;">
            Hola {{ $user->name }},
        </p>
        <p style="margin: 0 0 24px 0; color: #475569; font-size: 15px; line-height: 1.6;">
            Hemos encontrado un evento que te puede interesar en uno de tus sitios favoritos.
        </p>

        <div style="background: linear-gradient(135deg, #f0fdf4 0%, #ecfdf5 100%); border-radius: 12px; padding: 24px; margin: 24px 0; border-left: 5px solid #10b981;">
            <p style="margin: 0 0 8px 0; color: #64748b; font-size: 12px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px;">
                Sitio: {{ $place->name }}
            </p>
            <h3 style="margin: 0 0 16px 0; color: #1e293b; font-size: 20px; font-weight: 700;">
                {{ $event->title }}
            </h3>
            
            @if($event->description)
            <p style="margin: 0 0 16px 0; color: #475569; font-size: 14px; line-height: 1.6;">
                {{ $event->description }}
            </p>
            @endif
            
            <div style="border-top: 1px solid rgba(16, 185, 129, 0.3); padding-top: 16px; margin-top: 16px;">
                <p style="margin: 0 0 8px 0; color: #475569; font-size: 14px;">
                    <strong style="color: #10b981;">Inicio:</strong> {{ $event->starts_at->format('d \\d\\e M \\d\\e Y \\a \\l\\a\\s H:i') }}
                </p>
                @if($event->ends_at)
                <p style="margin: 0; color: #475569; font-size: 14px;">
                    <strong style="color: #10b981;">Fin:</strong> {{ $event->ends_at->format('d \\d\\e M \\d\\e Y \\a \\l\\a\\s H:i') }}
                </p>
                @endif
            </div>
        </div>

        <div style="text-align: center; margin: 32px 0;">
            <a href="{{ config('app.frontend_url', config('app.url')) }}/turista/sitio/{{ $place->id }}#evento-{{ $event->id }}" 
               style="display: inline-block; background-color: #10b981; color: #ffffff; text-decoration: none; border-radius: 999px; padding: 14px 32px; font-weight: 600; font-size: 15px;">
                Ver evento completo
            </a>
        </div>

        <p style="margin: 24px 0 0 0; padding-top: 24px; border-top: 1px solid #e2e8f0; color: #64748b; font-size: 13px; line-height: 1.5;">
            Recibiste este correo porque tienes activadas las notificaciones en Conexion EcoRisaralda.
        </p>
    </div>

    <div style="background-color: #f8fafc; padding: 20px 24px; text-align: center; border-radius: 0 0 16px 16px; border-top: 1px solid #e2e8f0;">
        <p style="margin: 0; color: #94a3b8; font-size: 12px;">
            © 2026 Conexion EcoRisaralda. Todos los derechos reservados.
        </p>
    </div>

</div>

</div>
@endcomponent
