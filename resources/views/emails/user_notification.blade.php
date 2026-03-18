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
        <div style="margin-bottom: 32px; text-align: center;">
          <h1 style="margin: 0 0 8px 0; color: #10b981; font-size: 28px; font-weight: 700; letter-spacing: -0.5px;">
            {{ $subjectLine }}
          </h1>
        </div>

        {{-- Message Content --}}
        <div style="background: linear-gradient(135deg, #f0fdf4 0%, #ecfdf5 100%); border-radius: 16px; padding: 28px; margin: 28px 0; border: 1px solid rgba(16, 185, 129, 0.2); text-align: left;">
          <div style="color: #475569; font-size: 15px; line-height: 1.7;">
            {{ $messageText }}
          </div>
        </div>

        {{-- CTA Button --}}
        <div style="margin: 32px 0;">
          <a href="{{ $actionUrl }}" 
             style="display: inline-block; background-color: #10b981; color: white; text-decoration: none; border-radius: 9999px; padding: 14px 32px; font-weight: 600; font-size: 15px; transition: all 0.2s ease;">
            {{ $actionLabel }}
          </a>
        </div>

        {{-- Security Notice --}}
        <div style="background-color: #f0f9ff; border-left: 4px solid #0284c7; border-radius: 8px; padding: 16px; margin: 24px 0;">
          <p style="margin: 0; color: #0c4a6e; font-size: 13px; line-height: 1.6;">
            Si no realizaste esta solicitud o no reconoces esta actividad, por favor ignora este correo. Tu cuenta está segura.
          </p>
        </div>

        {{-- Footer Text --}}
        <div style="margin-top: 40px; padding-top: 24px; border-top: 1px solid #e2e8f0; text-align: center;">
          <p style="margin: 0 0 8px 0; color: #64748b; font-size: 13px; line-height: 1.6;">
            Este es un correo automático de Conexion EcoRisaralda. Por favor no respondas a este mensaje.
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
