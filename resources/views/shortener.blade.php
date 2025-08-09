<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QuickLink | The Ultimate URL Shortener</title>
    
    <!-- Using a modern CSS Reset and Bootstrap for the grid system -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Professional Google Font: Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet">

    <style>
        /* A more robust CSS setup */
        :root {
            --primary-color: #0d6efd; /* Bootstrap Blue */
            --background-color: #f8f9fa;
            --text-color: #212529;
            --light-text-color: #6c757d;
            --border-radius: 0.75rem;
            --box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        }

        html, body {
            height: 100%;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--background-color);
            color: var(--text-color);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1rem;
            animation: fadeInPage 1s ease-out;
        }

        @keyframes fadeInPage {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        .main-container {
            width: 100%;
            max-width: 650px;
            text-align: center;
        }

        .hero-section h1 {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .hero-section p {
            font-size: 1.15rem;
            color: var(--light-text-color);
            margin-bottom: 2.5rem;
        }

        .form-card {
            background: #ffffff;
            padding: 2rem;
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
        }

        .form-control {
            height: 55px;
            font-size: 1rem;
            border-radius: var(--border-radius);
            border: 1px solid #ced4da;
        }
        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
        }

        .btn-primary {
            height: 55px;
            font-size: 1rem;
            font-weight: 500;
            border-radius: var(--border-radius);
            transition: background-color 0.2s ease, transform 0.2s ease;
        }
        .btn-primary:hover {
            transform: scale(1.02);
        }

        .alert-success {
            text-align: left;
            border-radius: var(--border-radius);
            margin-top: 1.5rem;
            animation: slideUp 0.5s ease-out;
        }
        .alert-success a {
            font-weight: 700;
        }

        @keyframes slideUp {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .footer-text {
            margin-top: 2rem;
            font-size: 0.9rem;
            color: var(--light-text-color);
        }
    </style>
</head>
<body>
    <main class="main-container">
        <div class="hero-section">
            <h1>QuickLink</h1>
            <p>The simplest way to shorten, share, and track your links.</p>
        </div>

        <div class="form-card">
            <form action="{{ route('shorten.url') }}" method="POST">
                @csrf
                <div class="input-group">
                    <input
                        type="url"
                        name="original_url"
                        class="form-control @error('original_url') is-invalid @enderror"
                        placeholder="Paste your long URL here..."
                        aria-label="Long URL"
                        required
                    >
                    <button class="btn btn-primary" type="submit">Shorten</button>
                </div>
                @error('original_url')
                    <div class="text-danger text-start mt-2">{{ $message }}</div>
                @enderror
            </form>

            @if (session('success'))
                <div class="alert alert-success" role="alert">{!! session('success') !!}</div>
            @endif
        </div>

        <p class="footer-text">Built with Laravel & ❤️ for your internship showcase.</p>
    </main>
</body>
</html>