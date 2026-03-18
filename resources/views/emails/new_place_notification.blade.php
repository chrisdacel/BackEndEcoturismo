@php
$frontend = rtrim(config('app.frontend_url', config('app.url')), '/');
$placeUrl = $frontend . '/turista/sitio/' . $place->id;
$matched = is_array($matchedPreferences ?? null) ? $matchedPreferences : [];
@endphp

@component('mail::message')
<div style="font-family: 'Albert Sans', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif; background-color: #ffffff;">

<div style="max-width: 600px; margin: 0 auto;">

    <div style="background: linear-gradient(135deg, #10b981 0%, #059669 100%); padding: 32px 24px; text-align: center; border-radius: 16px 16px 0 0;">
        <h2 style="margin: 0; color: #ffffff; font-size: 24px; font-weight: 700; letter-spacing: -0.5px;">
            Descubrimiento personalizado
        </h2>
    </div>

    <div style="background-color: #ffffff; padding: 32px 24px;">
        <p style="margin: 0 0 8px 0; color: #475569; font-size: 15px; line-height: 1.6;">
            Encontramos un lugar que coincide perfectamente con tus intereses.
        </p>

        @if($place->cover)
        <div style="margin: 24px 0; border-radius: 12px; overflow: hidden;">
            <img src="{{ asset('storage/' . $place->cover) }}" alt="{{ $place->name }}" style="width: 100%; height: auto; display: block; max-width: 520px; margin: 0 auto; border-radius: 12px;" />
        </div>
        @endif

        <div style="background: linear-gradient(135deg, #f0fdf4 0%, #ecfdf5 100%); border-radius: 12px; padding: 24px; margin: 24px 0; border-left: 5px solid #10b981;">
            <h3 style="margin: 0 0 8px 0; color: #1e293b; font-size: 20px; font-weight: 700;">
                {{ $place->name }}
            </h3>

            @if($place->slogan)
            <p style="margin: 0 0 16px 0; color: #10b981; font-size: 14px; font-weight: 600; font-style: italic;">
                "{{ $place->slogan }}"
            </p>
            @endif

            <p style="margin: 0 0 16px 0; color: #475569; font-size: 14px; line-height: 1.6;">
                {{ Illuminate\Support\Str::limit($place->description, 250) }}
            </p>

            @if(count($matched) > 0)
            <div style="margin: 16px 0; padding-top: 16px; border-top: 1px solid rgba(16, 185, 129, 0.3);">
                <p style="margin: 0 0 12px 0; color: #64748b; font-size: 12px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px;">
                    Categorías relacionadas
                </p>
                <div style="display: flex; flex-wrap: wrap; gap: 8px;">
                    @foreach($matched as $category)
                    <span style="display: inline-block; background-color: #dbeafe; color: #0369a1; padding: 6px 12px; border-radius: 999px; font-size: 12px; font-weight: 500;">
                        {{ $category }}
                    </span>
                    @endforeach
                </div>
            </div>
            @endif

            <div style="margin-top: 16px; padding-top: 16px; border-top: 1px solid rgba(16, 185, 129, 0.3);">
                <p style="margin: 0; color: #475569; font-size: 14px;">
                    <strong style="color: #10b981;">Ubicación:</strong><br/>
                    {{ $place->localization }}
                </p>
            </div>
        </div>

        <div style="text-align: center; margin: 32px 0;">
            <a href="{{ $placeUrl }}" 
               style="display: inline-block; background-color: #10b981; color: #ffffff; text-decoration: none; border-radius: 999px; padding: 14px 32px; font-weight: 600; font-size: 15px;">
                Explorar sitio completo
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