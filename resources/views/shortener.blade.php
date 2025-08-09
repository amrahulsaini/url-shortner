<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QuickLink | Your Professional Link Shortener</title>
    
    <!-- Bootstrap for layout -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Google Font: Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700;900&display=swap" rel="stylesheet">

    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
        :root {
            --background: #111827; /* Dark Blue/Gray */
            --surface: #1f2937;    /* Lighter card background */
            --primary: #3b82f6;     /* A vibrant blue */
            --text-light: #f9fafb;  /* Off-white */
            --text-muted: #9ca3af;  /* Gray for subtitles */
            --border-radius: 0.75rem;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--background);
            color: var(--text-light);
            padding-top: 4rem;
            padding-bottom: 4rem;
        }

        .main-container {
            max-width: 700px;
            animation: fadeInPage 1.5s ease-out;
        }
        @keyframes fadeInPage { from { opacity: 0; } to { opacity: 1; } }

        /* Animated Gradient Text for the Title */
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
        
        .hero-subtitle {
            font-size: 1.2rem;
            color: var(--text-muted);
            margin-bottom: 3rem;
        }

        /* The Main Form Card with a Glow Effect */
        .form-card {
            background: var(--surface);
            padding: 2rem;
            border-radius: var(--border-radius);
            transition: box-shadow 0.3s ease;
        }
        .form-card.glowing {
            box-shadow: 0 0 25px rgba(59, 130, 246, 0.5);
        }

        .form-control {
            height: 55px;
            background-color: #374151;
            border: 1px solid #4b5563;
            color: var(--text-light);
        }
        .form-control::placeholder { color: #9ca3af; }
        .form-control:focus {
            background-color: #374151;
            border-color: var(--primary);
            box-shadow: none;
            color: var(--text-light);
        }

        .btn-primary { height: 55px; font-weight: 700; }
        
        /* The "How It Works" section */
        .how-it-works {
            margin-top: 5rem;
            text-align: center;
        }
        .how-it-works h2 {
            font-weight: 700;
            margin-bottom: 3rem;
        }
        .step-card {
            background: var(--surface);
            padding: 2rem;
            border-radius: var(--border-radius);
            height: 100%;
            /* Staggered animation for each step */
            opacity: 0;
            animation: slideUpFade 0.6s ease-out forwards;
        }
        .step-card:nth-child(1) { animation-delay: 0.2s; }
        .step-card:nth-child(2) { animation-delay: 0.4s; }
        .step-card:nth-child(3) { animation-delay: 0.6s; }

        @keyframes slideUpFade {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .step-icon {
            font-size: 2.5rem;
            color: var(--primary);
            margin-bottom: 1.5rem;
        }
        .step-card h3 {
            font-size: 1.2rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }
        .step-card p {
            color: var(--text-muted);
        }

    </style>
</head>
<body>
    <div class="container main-container">
        <!-- HERO SECTION -->
        <div class="text-center">
            <h1 class="hero-title">QuickLink</h1>
            <p class="hero-subtitle">Powerful links. Perfectly short.</p>
        </div>

        <!-- FORM CARD -->
        <div class="form-card" id="formCard">
            <form action="{{ route('shorten.url') }}" method="POST">
                @csrf
                <div class="input-group">
                    <input id="urlInput" type="url" name="original_url" class="form-control" placeholder="Paste your super long URL here..." required>
                    <button class="btn btn-primary" type="submit">Shorten It!</button>
                </div>
            </form>

            @if (session('success'))
                <div class="alert alert-success mt-4">{!! session('success') !!}</div>
            @endif
        </div>

        <!-- HOW IT WORKS SECTION -->
        <section class="how-it-works">
            <h2>Create & Share in 3 Simple Steps</h2>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="step-card">
                        <i class="fas fa-paste step-icon"></i>
                        <h3>1. Paste</h3>
                        <p>Paste your long, unwieldy link into the input field above.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="step-card">
                        <i class="fas fa-magic-wand-sparkles step-icon"></i>
                        <h3>2. Shorten</h3>
                        <p>Click the button and let our magic create a short, memorable link for you.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="step-card">
                        <i class="fas fa-share-alt step-icon"></i>
                        <h3>3. Share</h3>
                        <p>Copy your new QuickLink and share it anywhere. It's that easy!</p>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script>
        // JavaScript for the form card glow effect
        const formCard = document.getElementById('formCard');
        const urlInput = document.getElementById('urlInput');

        urlInput.addEventListener('focus', () => {
            formCard.classList.add('glowing');
        });

        urlInput.addEventListener('blur', () => {
            formCard.classList.remove('glowing');
        });
    </script>
</body>
</html>