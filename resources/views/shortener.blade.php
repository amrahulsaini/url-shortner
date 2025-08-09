<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Shorter.ly - The Simple URL Shortener</title>
    <!-- We still use Bootstrap, but we will override it with our own styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- 1. Import a professional font from Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">

    <style>
        /* 2. A beautiful animated gradient background and modern font */
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(-45deg, #ee7752, #e73c7e, #23a6d5, #23d5ab);
            background-size: 400% 400%;
            animation: gradientBG 15s ease infinite;
            height: 100vh;
            display: flex; /* These 3 lines vertically center the card */
            align-items: center;
            justify-content: center;
        }

        /* Keyframes for the background animation */
        @keyframes gradientBG {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        /* 3. The "floating" card with a fade-in animation */
        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            animation: fadeIn 1s ease-in-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .card-header h1 {
            font-weight: 700; /* Bolder title */
        }
        
        /* 4. Better looking form elements */
        .form-control {
            height: 50px;
            border-radius: 10px;
        }
        .btn-primary {
            height: 50px;
            border-radius: 10px;
            font-weight: 500;
            transition: all 0.2s ease; /* Smooth transition for hover effects */
        }

        /* 5. A satisfying button hover effect */
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(0, 123, 255, 0.3);
        }

        /* 6. A slide-in animation for the success message */
        .alert-success {
            animation: slideIn 0.5s forwards;
        }

        @keyframes slideIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body>
    <div class="container" style="max-width: 600px;">
        <div class="card">
            <div class="card-header text-center bg-white border-0 pt-4">
                <h1>Shorter.ly</h1>
        