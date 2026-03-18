<x-mail::layout>
{{-- Header --}}
<x-slot:header>
<x-mail::header :url="config('app.frontend_url', config('app.url'))">
Conexion EcoRisaralda
</x-mail::header>
</x-slot:header>

{{-- Body --}}
<x-mail::panel>
<table role="presentation" border="0" cellpadding="0" cellspacing="0" style="width: 100%; text-align: center;">
  <tr>
    <td style="padding: 40px 20px;">
      <div style="font-family: 'Albert Sans', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;">
        
        {{-- Greeting Section --}}
        <div style="margin-bottom: 32px;">
          <h1 style="margin: 0 0 8px 0; color: #10b981; font-size: 28px; font-weight: 700; letter-spacing: -0.5px;">
            Nuevo evento disponible
          </h1>
          <p style="margin: 0; color: #475569; font-size: 16px; line-height: 1.5;">
            Hola {{ $user->name }}, hemos encontrado un evento que te puede interesar
          </p>
        </div>

        {{-- Event Card --}}
        <div style="background: linear-gradient(135deg, #f0fdf4 0%, #ecfdf5 100%); border-radius: 16px; padding: 28px; margin: 28px 0; text-align: left; border-left: 4px solid #10b981;">
          
          <div style="margin-bottom: 20px;">
            <p style="margin: 0 0 8px 0; color: #64748b; font-size: 12px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px;">
              Sitio: {{ $place->name }}
            </p>
            <h2 style="margin: 0; color: #1e293b; font-size: 22px; font-weight: 700; word-break: break-word;">
              {{ $event->title }}
            </h2>
          </div>

          @if($event->description)
          <div style="margin: 20px 0; color: #475569; font-size: 14px; line-height: 1.6;">
            {{ $event->description }}
          </div>
          @endif

          <table role="presentation" border="0" cellpadding="0" cellspacing="0" style="width: 100%; margin-top: 20px;">
            <tr>
              <td style="border-top: 1px solid rgba(16, 185, 129, 0.2); padding-top: 16px;">
                <table role="presentation" border="0" cellpadding="0" cellspacing="0" style="width: 100%;">
                  <tr>
                    <td style="font-size: 14px; color: #475569; padding: 8px 0; text-align: left;">
                      <strong style="color: #10b981;">Inicio:</strong> {{ $event->starts_at->format('d \\d\\e M \\d\\e Y \\a \\l\\a\\s H:i') }}
                    </td>
                  </tr>
                  @if($event->ends_at)
                  <tr>
                    <td style="font-size: 14px; color: #475569; padding: 8px 0; text-align: left;">
                      <strong style="color: #10b981;">Fin:</strong> {{ $event->ends_at->format('d \\d\\e M \\d\\e Y \\a \\l\\a\\s H:i') }}
                    </td>
                  </tr>
                  @endif
                </table>
              </td>
            </tr>
          </table>

        </div>

        {{-- CTA Button --}}
        <div style="margin: 32px 0;">
          <a href="{{ config('app.frontend_url', config('app.url')) }}/turista/sitio/{{ $place->id }}#evento-{{ $event->id }}" 
             style="display: inline-block; background-color: #10b981; color: white; text-decoration: none; border-radius: 9999px; padding: 14px 32px; font-weight: 600; font-size: 15px; transition: all 0.2s ease;">
            Ver evento completo
          </a>
        </div>

        {{-- Footer Text --}}
        <div style="margin-top: 40px; padding-top: 24px; border-top: 1px solid #e2e8f0; text-align: center;">
          <p style="margin: 0 0 8px 0; color: #64748b; font-size: 13px; line-height: 1.6;">
            Recibiste este correo porque tienes activadas las notificaciones en Conexion EcoRisaralda.
          </p>
          <p style="margin: 0; color: #94a3b8; font-size: 12px;">
            © 2026 Conexion EcoRisaralda. Todos los derechos reservados.
          </p>
        </div>

      </div>
    </td>
  </tr>
</table>
</x-mail::panel>

{{-- Footer --}}
<x-slot:footer>
<x-mail::footer>
© {{ date('Y') }} Conexion EcoRisaralda. Todos los derechos reservados.
</x-mail::footer>
</x-slot:footer>
</x-mail::layout>
