@php
$frontend = rtrim(config('app.frontend_url', config('app.url')), '/');
$placeUrl = $frontend . '/turista/sitio/' . $place->id;
$matched = is_array($matchedPreferences ?? null) ? $matchedPreferences : [];
@endphp

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
        .image { margin: 24px 0; border-radius: 12px; overflow: hidden; }
        .image img { width: 100%; height: auto; display: block; max-width: 520px; margin: 0 auto; border-radius: 12px; }
        .card { background: linear-gradient(135deg, #f0fdf4 0%, #ecfdf5 100%); border-radius: 12px; padding: 24px; margin: 24px 0; border-left: 5px solid #10b981; }
        .card h3 { margin: 0 0 8px 0; color: #1e293b; font-size: 20px; font-weight: 700; }
        .card .slogan { margin: 0 0 16px 0; color: #10b981; font-size: 14px; font-weight: 600; font-style: italic; }
        .card .description { margin: 0 0 16px 0; color: #475569; font-size: 14px; line-height: 1.6; }
        .categories { margin: 16px 0; padding-top: 16px; border-top: 1px solid rgba(16, 185, 129, 0.3); }
        .categories-label { margin: 0 0 12px 0; color: #64748b; font-size: 12px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px; }
        .categories-list { display: flex; flex-wrap: wrap; gap: 8px; }
        .category-badge { display: inline-block; background-color: #dbeafe; color: #0369a1; padding: 6px 12px; border-radius: 999px; font-size: 12px; font-weight: 500; }
        .location { margin-top: 16px; padding-top: 16px; border-top: 1px solid rgba(16, 185, 129, 0.3); color: #475569; font-size: 14px; }
        strong { color: #10b981; }
        .button-wrapper { text-align: center; margin: 32px 0; }
        .button { display: inline-block; background-color: #10b981; color: #ffffff; text-decoration: none; border-radius: 999px; padding: 14px 32px; font-weight: 600; font-size: 15px; }
        .footer-note { margin: 24px 0 0 0; padding-top: 24px; border-top: 1px solid #e2e8f0; color: #64748b; font-size: 13px; line-height: 1.5; }
        .footer { background-color: #f8fafc; padding: 20px 24px; text-align: center; border-radius: 0 0 16px 16px; border-top: 1px solid #e2e8f0; }
        .footer p { margin: 0; color: #94a3b8; font-size: 12px; }
    </style>
</head>
<body>
<div class="container">
    <div class="header">
        <h2>Descubrimiento personalizado</h2>
    </div>

    <div class="body">
        <p>Encontramos un lugar que coincide perfectamente con tus intereses.</p>

        @if($place->cover)
        <div class="image">
            <img src="{{ asset('storage/' . $place->cover) }}" alt="{{ $place->name }}" />
        </div>
        @endif

        <div class="card">
            <h3>{{ $place->name }}</h3>

            @if($place->slogan)
            <p class="slogan">"{{ $place->slogan }}"</p>
            @endif

            <p class="description">{{ Illuminate\Support\Str::limit($place->description, 250) }}</p>

            @if(count($matched) > 0)
            <div class="categories">
                <p class="categories-label">Categorías relacionadas</p>
                <div class="categories-list">
                    @foreach($matched as $category)
                    <span class="category-badge">{{ $category }}</span>
                    @endforeach
                </div>
            </div>
            @endif

            <div class="location">
                <strong>Ubicación:</strong><br/>
                {{ $place->localization }}
            </div>
        </div>

        <div class="button-wrapper">
            <a href="{{ $placeUrl }}" class="button">Explorar sitio completo</a>
        </div>

        <p class="footer-note">Recibiste este correo porque tienes activadas las notificaciones en Conexion EcoRisaralda.</p>
    </div>

    <div class="footer">
        <p>© 2026 Conexion EcoRisaralda. Todos los derechos reservados.</p>
    </div>
</div>
</body>
</html>