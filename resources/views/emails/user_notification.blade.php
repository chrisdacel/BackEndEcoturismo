@component('mail::message')
<div style="font-family: 'Albert Sans', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif; background-color: #ffffff;">

<div style="max-width: 600px; margin: 0 auto;">

    <div style="background: linear-gradient(135deg, #10b981 0%, #059669 100%); padding: 32px 24px; text-align: center; border-radius: 16px 16px 0 0;">
        <h2 style="margin: 0; color: #ffffff; font-size: 24px; font-weight: 700; letter-spacing: -0.5px;">
            {{ $subjectLine }}
        </h2>
    </div>

    <div style="background-color: #ffffff; padding: 32px 24px;">
        <div style="background: linear-gradient(135deg, #f0fdf4 0%, #ecfdf5 100%); border-radius: 12px; padding: 24px; margin: 24px 0; border-left: 5px solid #10b981;">
            <p style="margin: 0; color: #475569; font-size: 15px; line-height: 1.7;">
                {{ $messageText }}
            </p>
        </div>

        <div style="text-align: center; margin: 32px 0;">
            <a href="{{ $actionUrl }}" 
               style="display: inline-block; background-color: #10b981; color: #ffffff; text-decoration: none; border-radius: 999px; padding: 14px 32px; font-weight: 600; font-size: 15px;">
                {{ $actionLabel }}
            </a>
        </div>

        <div style="background-color: #f0f9ff; border-left: 4px solid #0284c7; border-radius: 8px; padding: 16px; margin: 24px 0;">
            <p style="margin: 0; color: #0c4a6e; font-size: 13px; line-height: 1.6;">
                Si no realizaste esta solicitud o no reconoces esta actividad, por favor ignora este correo. Tu cuenta está segura.
            </p>
        </div>

        <p style="margin: 24px 0 0 0; padding-top: 24px; border-top: 1px solid #e2e8f0; color: #64748b; font-size: 13px; line-height: 1.5;">
            Este es un correo automático de Conexion EcoRisaralda. Por favor no respondas a este mensaje.
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
