@php
$frontend = rtrim(config('app.frontend_url', config('app.url')), '/');
$placeUrl = $frontend . '/turista/sitio/' . $place->id;
$matched = is_array($matchedPreferences ?? null) ? $matchedPreferences : [];
@endphp

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
            Descubrimiento personalizado
          </h1>
          <p style="margin: 0; color: #475569; font-size: 16px; line-height: 1.5;">
            Encontramos un lugar que coincide perfectamente con tus intereses
          </p>
        </div>

        {{-- Place Image --}}
        @if($place->cover)
        <div style="margin: 32px 0; border-radius: 16px; overflow: hidden; box-shadow: 0 10px 25px rgba(16, 185, 129, 0.1);">
          <img src="{{ asset('storage/' . $place->cover) }}" alt="{{ $place->name }}" style="width: 100%; height: auto; display: block; max-width: 520px; margin: 0 auto;" />
        </div>
        @endif

        {{-- Place Card --}}
        <div style="background: linear-gradient(135deg, #f0fdf4 0%, #ecfdf5 100%); border-radius: 16px; padding: 28px; margin: 28px 0; text-align: left; border: 1px solid rgba(16, 185, 129, 0.2);">
          
          <h2 style="margin: 0 0 12px 0; color: #1e293b; font-size: 24px; font-weight: 700; word-break: break-word;">
            {{ $place->name }}
          </h2>

          @if($place->slogan)
          <p style="margin: 0 0 16px 0; color: #10b981; font-size: 15px; font-weight: 600; font-style: italic;">
            "{{ $place->slogan }}"
          </p>
          @endif

          <div style="margin: 20px 0; color: #475569; font-size: 14px; line-height: 1.7;">
            {{ \Illuminate\Support\Str::limit($place->description, 250) }}
          </div>

          {{-- Categories --}}
          @if(count($matched) > 0)
          <div style="margin: 20px 0; padding-top: 16px; border-top: 1px solid rgba(16, 185, 129, 0.2);">
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

          {{-- Location --}}
          <div style="margin-top: 20px; padding-top: 16px; border-top: 1px solid rgba(16, 185, 129, 0.2);">
            <p style="margin: 0; color: #475569; font-size: 14px;">
              <strong style="color: #10b981;">Ubicación:</strong><br/>
              {{ $place->localization }}
            </p>
          </div>

        </div>

        {{-- CTA Button --}}
        <div style="margin: 32px 0;">
          <a href="{{ $placeUrl }}" 
             style="display: inline-block; background-color: #10b981; color: white; text-decoration: none; border-radius: 9999px; padding: 14px 32px; font-weight: 600; font-size: 15px; transition: all 0.2s ease;">
            Explorar sitio completo
          </a>
        </div>

        {{-- Footer Text --}}
        <div style="margin-top: 40px; padding-top: 24px; border-top: 1px solid #e2e8f0; text-align: center;">
          <p style="margin: 0 0 8px 0; color: #64748b; font-size: 13px; line-height: 1.6;">
            Recibiste este correo porque tienes activadas las notificaciones de descubrimientos en Conexion EcoRisaralda.
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