<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>URL Shortener</title>
    <!-- Using Bootstrap for simple styling -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; }
        .container { max-width: 600px; }
    </style>
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card">
            <div class="card-header text-center">
                <h1>URL Shortener</h1>
            </div>
            <div class="card-body">

                {{-- This block will display the success message after shortening a URL --}}
                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                       {!! session('success') !!} {{-- The {!! !!} syntax is used to render HTML, like the <a> tag --}}
                    </div>
                @endif

                <form action="{{ route('shorten.url') }}" method="POST">
                    @csrf {{-- This is a required security token for all Laravel forms --}}
                    <div class="input-group mb-3">
                        <input
                            type="url"
                            name="original_url"
                            class="form-control @error('original_url') is-invalid @enderror"
                            placeholder="Enter a long URL here..."
                            required
                        >
                        <button class="btn btn-primary" type="submit">Shorten</button>
                    </div>

                    {{-- This will display a validation error if the URL is not valid --}}
                    @error('original_url')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </form>
            </div>
        </div>
    </div>
</body>
</html>