<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

    <style>
        body {
            font-family: 'Figtree', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        
        .main-container {
            flex: 1;
        }

        .header-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #f8f9fa;
            padding: 10px 20px;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
        }

        .logo-container img {
            height: 50px;
        }

        .links-container a {
            text-decoration: none;
            margin: 0 22px;
        }

        .button {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            font-family: 'Nunito', sans-serif;
            transition: background-color 0.3s ease;
        }

        .button:hover {
            background-color: #0056b3;
        }

        .content {
            padding-top: 80px; 
        }

        .about-section {
            padding: 50px;
            text-align: center;
            color: black;
            background-color: #FAFAFA;
        }

        .gradient-text {
            background-image: linear-gradient(45deg, #26FF38, #0058FF);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .gradient-text2 {
            background-image: linear-gradient(45deg, #FF6EE8, #0058FF);
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .gray-text {
            color: #4B5563;
        }

        .flex-container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 20px;
        }

        .contact-form {
            max-width: 600px;
            margin: 40px auto;
            background: #A9D9F4;
            padding: 30px;
            box-shadow: 22px 10px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .contact-form h2 {
            color: white;
            margin-bottom: 20px;
        }

        .contact-form label {
            display: block;
            margin-bottom: 5px;
        }

        .contact-form input,
        .contact-form textarea {
            width: 100%;
            padding: 12px 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            resize: vertical;
        }

        .contact-form button {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
        }

        .contact-form button:hover {
            background-color: #97D9FF;
        }

        .photos-grid {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            gap: 20px;
            background-color: #FAFAFA;
        }

        .photo-item {
            text-align: center;
        }

        .rounded-photo {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 50%;
            margin-bottom: 10px;
        }

        .photo-caption {
            font-size: 14px;
            color: #666;
        }

        .footer {
            background-color: #f8f9fa;
            padding: 20px;
            text-align: center;
            margin-top: 40px;
            border-top: 1px solid #e7e7e7;
        }

        .footer p {
            margin: 5px 0;
        }
    </style>
</head>
<body class="antialiased">
    <div class="main-container">    
        @if (Route::has('login'))
            <div class="header-container">
                <div class="logo-container">
                    <img src="{{ asset('logo.png') }}" alt="Logo">
                </div>

                <div class="links-container">
                    @auth
                        @if(Auth::user()->role === 'patient')
                            <a href="{{ url('/patient/dashboard') }}" class="button">Dashboard</a>
                        @elseif(Auth::user()->role === 'medecin')
                            <a href="{{ url('/medecin/dashboard') }}" class="button">Dashboard</a>
                        @elseif(Auth::user()->role === 'admin')
                            <a href="{{ url('/admin/dashboard') }}" class="button">Dashboard</a>
                        @endif
                    @else
                        
                        <a href="{{ route('login') }}" class="button">Log in</a>
                    @endauth
                </div>
            </div>
        @endif

        <div class="content">
            <div class="flex-container">
                <div class="w-1/2">
                    <img src="{{ asset('ph1.png') }}" alt="Image" class="w-full h-auto">
                </div>
                
                <div class="w-1/2 p-4">
                    <h1 class="text-4xl font-bold mb-4 text-center animate__animated animate__fadeInDown gradient-text">"Votre santé, notre priorité"</h1>
                    <p class="text-lg gray-text animate__animated animate__fadeInUp">Transformez la manière dont vous prenez soin de votre santé en profitant d'une plateforme intuitive où 
                        vous pouvez non seulement prendre rendez-vous en un clin d'œil, mais aussi accéder à l'intégralité de vos dossiers médicaux, ainsi qu'à une mine d'informations pertinentes pour votre bien-être. Simplifiez votre quotidien en prenant les rênes de votre santé,
                         et embrassez un mode de vie où la gestion de votre bien-être est aussi simple que de toucher un écran.</p>
                </div>
            </div>

            <div class="about-section">
                <h2 class="text-3xl font-bold mb-4 animate__animated animate__fadeInDown">About us</h2>
                <p class="text-lg animate__animated animate__fadeInUp"><span class="gradient-text2">VitaNova</span> est un hôpital innovant et dynamique, engagé à transformer la manière dont nous pensons à la santé.</p>
                <p class="text-lg animate__animated animate__fadeInUp">Situé au cœur de notre communauté, nous sommes dédiés à offrir des soins de qualité, personnalisés et accessibles à tous.</p>
                <p class="text-lg animate__animated animate__fadeInUp">Rejoignez-nous dans cette mission de transformation de la santé.</p>
            </div>

            <div class="photos-grid">
            <div class="photo-item">
    
            <img src="{{ asset('m4.jpg') }}" alt="Description de la photo 4" class="rounded-photo">
    <p class="photo-caption">Directeur Général - Hassan Ait Oufkir</p>
</div>
<div class="photo-item">
    <img src="{{ asset('m2.jpg') }}" alt="Description de la photo 2" class="rounded-photo">
    <p class="photo-caption">Directeur Administratif - Ahmed Benjelloun</p>
</div>
<div class="photo-item">
    <img src="{{ asset('m5.jpg') }}" alt="Description de la photo 3" class="rounded-photo">
    <p class="photo-caption">Responsable des Soins Infirmiers - Souad El Kabbaj</p>
</div>
<div class="photo-item">
<img src="{{ asset('m1.jpg') }}" alt="Description de la photo 1" class="rounded-photo">
<p class="photo-caption">Chargé des Ressources Humaines - Fatima Zahra El Amrani</p>
</div>

            </div>

            <div class="flex-container">
                <!-- Contact Form -->
                <div class="contact-form">
                    <h2 class="text-3xl font-bold mb-4">Send us a message</h2>
                    <form action="{{ route('contact.send') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="name" class="block text-lg font-medium text-gray-700">Name</label>
                            <input type="text" id="name" name="name" class="form-input mt-1 block w-full" required>
                        </div>
                        <div class="mb-4">
                            <label for="email" class="block text-lg font-medium text-gray-700">Email</label>
                            <input type="email" id="email" name="email" class="form-input mt-1 block w-full" required>
                        </div>
                        <div class="mb-4">
                            <label for="message" class="block text-lg font-medium text-gray-700">Message</label>
                            <textarea id="message" name="message" class="form-textarea mt-1 block w-full" rows="5" required></textarea>
                        </div>
                        <div>
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Send</button>
                        </div>
                    </form>
                </div>
                <div class="w-1/2">
                    <img src="{{ asset('photo.png') }}" alt="Image" class="w-full h-auto">
                </div>
            </div>
        </div>
    </div>
    
    <div class="footer">
        <p>Téléphone: 05 23 45 67 89</p>
        <p>Lieu: 123 Rue hassan, 75001 Rabat, Maroc</p>
        <p>Email: contact@vitanova.mr</p>
    </div>
</body>
</html>