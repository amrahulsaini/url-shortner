<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QuickLink | Your Professional Link Shortener</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
        :root {
            --background: #111827;
            --surface: #1f2937;
            --primary: #3b82f6;
            --text-light: #f9fafb;
            --text-muted: #9ca3af;
            --border-radius: 0.75rem;
            --border-color: #374151;
        }
        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--background);
            color: var(--text-light);
            padding: 4rem 0;
            animation: fadeInPage 1.5s ease-out;
        }
        @keyframes fadeInPage { from { opacity: 0; } to { opacity: 1; } }
        .main-container { max-width: 700px; }
        section { margin-bottom: 6rem; }
        .section-title { font-weight: 700; margin-bottom: 3rem; text-align: center; }
        .hero-title {
            font-size: 4rem;
            font-weight: 900;
            background: linear-gradient(90deg, #3b82f6, #a855f7, #ec4899);
            background-size: 200% auto;
            color: #000;
            background-clip: text;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            animation: gradient-text 5s linear infinite;
        }
        @keyframes gradient-text { to { background-position: 200% center; } }
        .hero-subtitle { font-size: 1.2rem; color: var(--text-muted); margin-bottom: 3rem; }
        .form-card { background: var(--surface); padding: 2rem; border-radius: var(--border-radius); transition: box-shadow 0.3s ease; }
        .form-card.glowing { box-shadow: 0 0 25px rgba(59, 130, 246, 0.5); }
        .form-control { height: 55px; background-color: var(--border-color); border: 1px solid #4b5563; color: var(--text-light); }
        .form-control::placeholder { color: #9ca3af; }
        .form-control:focus { background-color: var(--border-color); border-color: var(--primary); box-shadow: none; color: var(--text-light); }
        .btn-primary { height: 55px; font-weight: 700; }
        .step-card, .tech-card {
            background: var(--surface);
            padding: 2rem;
            border-radius: var(--border-radius);
            height: 100%;
            border: 1px solid var(--border-color);
            opacity: 0;
            animation: slideUpFade 0.6s ease-out forwards;
        }
        .how-it-works .step-card:nth-child(1) { animation-delay: 0.2s; }
        .how-it-works .step-card:nth-child(2) { animation-delay: 0.4s; }
        .how-it-works .step-card:nth-child(3) { animation-delay: 0.6s; }
        .tech-stack .tech-card:nth-child(1) { animation-delay: 0.2s; }
        .tech-stack .tech-card:nth-child(2) { animation-delay: 0.4s; }
        .tech-stack .tech-card:nth-child(3) { animation-delay: 0.6s; }
        .tech-stack .tech-card:nth-child(4) { animation-delay: 0.8s; }
        @keyframes slideUpFade { from { opacity: 0; transform: translateY(30px); } to { opacity: 1; transform: translateY(0); } }
        .icon { font-size: 2.5rem; color: var(--primary); margin-bottom: 1.5rem; }
        .card-title { font-size: 1.2rem; font-weight: 700; margin-bottom: 0.5rem; }
        .card-text { color: var(--text-muted); }
        .code { font-family: monospace; background-color: var(--border-color); padding: 0.2rem 0.4rem; border-radius: 4px; font-size: 0.9rem; }
    </style>
</head>
<body>
    <div class="container main-container">
        <section class="text-center">
            <h1 class="hero-title">QuickLink</h1>
            <p class="hero-subtitle">Powerful links. Perfectly short.</p>
            <div class="form-card" id="formCard">
                <form action="{{ route('shorten.url') }}" method="POST">
                    @csrf
                    <div class="input-group"><input id="urlInput" type="url" name="original_url" class="form-control" placeholder="Paste your super long URL here..." required><button class="btn btn-primary" type="submit">Shorten It!</button></div>
                </form>
                @if (session('success'))<div class="alert alert-success mt-4">{!! session('success') !!}</div>@endif
            </div>
        </section>

        <section class="how-it-works">
            <h2 class="section-title">How It Works</h2>
            <div class="row g-4">
                <div class="col-md-4"><div class="step-card"><i class="fas fa-paste icon"></i><h3 class="card-title">1. Paste</h3><p class="card-text">Paste your long link into the input field above.</p></div></div>
                <div class="col-md-4"><div class="step-card"><i class="fas fa-magic-wand-sparkles icon"></i><h3 class="card-title">2. Shorten</h3><p class="card-text">Our backend creates a unique, short code for your link.</p></div></div>
                <div class="col-md-4"><div class="step-card"><i class="fas fa-share-alt icon"></i><h3 class="card-title">3. Share</h3><p class="card-text">Copy your new QuickLink and share it anywhere. It's that easy!</p></div></div>
            </div>
        </section>

        <section class="tech-stack">
            <h2 class="section-title">The Technology Behind the Magic</h2>
            <div class="row g-4">
                <div class="col-md-6"><div class="tech-card"><i class="fab fa-laravel icon"></i><h3 class="card-title">Laravel 10 Backend</h3><p class="card-text">The core of the application, built on a robust and modern PHP framework following MVC principles.</p></div></div>
                <div class="col-md-6"><div class="tech-card"><i class="fas fa-route icon"></i><h3 class="card-title">RESTful Routes</h3><p class="card-text">Uses clean, defined routes: <code class="code">GET /</code>, <code class="code">POST /shorten</code>, and <code class="code">GET /{shortcode}</code> for handling all requests.</p></div></div>
                <div class="col-md-6"><div class="tech-card"><i class="fas fa-database icon"></i><h3 class="card-title">SQL Database</h3><p class="card-text">Stores links in a table with <code class="code">original_url</code>, <code class="code">short_code</code>, and timestamp columns, managed by Laravel's Eloquent ORM.</p></div></div>
                <div class="col-md-6"><div class="tech-card"><i class="fas fa-code icon"></i><h3 class="card-title">Blade Templates</h3><p class="card-text">The dynamic frontend is rendered server-side using Laravel's powerful Blade templating engine, mixing HTML with PHP logic seamlessly.</p></div></div>
            </div>
        </section>
    </div>
    <script>
        const formCard = document.getElementById('formCard');
        const urlInput = document.getElementById('urlInput');
        urlInput.addEventListener('focus', () => formCard.classList.add('glowing'));
        urlInput.addEventListener('blur', () => formCard.classList.remove('glowing'));
    </script>
</body>
</html>