
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        :root {
            --primary: #1e3a8a;
            --primary-dark: #1e40af;
            --accent: #d97706;
            --accent-light: #f59e0b;
            --surface: rgba(15, 23, 42, 0.96);
            --text: #f8fafc;
            --text-light: #cbd5e1;
            --border: #334155;
            --shadow: 0 20px 50px rgba(0, 0, 0, 0.4);
            --shadow-sm: 0 4px 12px rgba(0, 0, 0, 0.3);
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", sans-serif;
            background: linear-gradient(135deg, #0f172a 0%, #1a2942 50%, #1e293b 100%);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            gap: 18px;
            padding: 24px;
            color: var(--text);
        }

        .card {
            width: min(440px, 100%);
            background: var(--surface);
            border-radius: 20px;
            box-shadow: var(--shadow);
            overflow: hidden;
            display: grid;
            grid-template-columns: 1fr;
            border: 1px solid rgba(99, 102, 241, 0.1);
        }

        .hero {
            background: var(--surface);
            padding: 48px 32px 32px;
            text-align: center;
        }

        .hero h1 {
            margin: 0;
            font-size: 2.125rem;
            letter-spacing: -0.025em;
            color: var(--accent-light);
            font-weight: 700;
        }

        .hero p {
            margin: 12px auto 0;
            color: #cbd5e1;
            max-width: 320px;
            line-height: 1.6;
            font-size: 0.95rem;
        }

        .form {
            padding: 32px 32px 36px;
        }

        .field {
            display: flex;
            flex-direction: column;
            gap: 8px;
            margin-bottom: 18px;
        }

        .field label {
            font-size: 0.85rem;
            color: var(--text);
            font-weight: 500;
        }

        .field input {
            padding: 12px 14px;
            border-radius: 12px;
            border: 1px solid var(--border);
            background: #ffffff;
            font-size: 0.95rem;
            outline: none;
            transition: all 150ms ease;
        }

        .field input:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.1);
            background: #fafbff;
        }

        .actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            font-size: 0.9rem;
        }

        .actions a {
            color: var(--accent-light);
            text-decoration: none;
            font-weight: 500;
            transition: color 150ms ease;
        }

        .actions a:hover {
            color: #fbbf24;
            text-decoration: underline;
        }

        .btn {
            width: 100%;
            padding: 13px 16px;
            border: none;
            border-radius: 12px;
            background: linear-gradient(135deg, var(--accent), var(--accent-light));
            color: #1f2937;
            font-size: 1rem;
            font-weight: 600;
            letter-spacing: 0.02em;
            cursor: pointer;
            transition: all 160ms ease;
            box-shadow: 0 4px 15px rgba(217, 119, 6, 0.4);
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(217, 119, 6, 0.5);
        }

        .btn:active {
            transform: translateY(0);
        }

        .divider {
            display: flex;
            align-items: center;
            gap: 12px;
            margin: 28px 0 20px;
            color: var(--text-light);
            font-size: 0.85rem;
            font-weight: 500;
        }

        .divider::before,
        .divider::after {
            content: "";
            flex: 1;
            height: 1px;
            background: var(--border);
        }

        .social {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 12px;
        }

        .social button {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 8px;
            padding: 12px;
            border-radius: 12px;
            border: 1px solid var(--border);
            background: #1a2942;
            cursor: pointer;
            font-size: 0.9rem;
            color: var(--text);
            transition: all 160ms ease;
        }

        .social button:hover {
            border-color: var(--accent-light);
            background: #243655;
            transform: translateY(-2px);
            box-shadow: var(--shadow-sm);
        }

        .social svg {
            width: 18px;
            height: 18px;
        }

        .footer {
            margin-top: 20px;
            text-align: center;
            color: var(--text-light);
            font-size: 0.9rem;
        }

        .footer a {
            color: var(--accent-light);
            text-decoration: none;
            font-weight: 600;
            transition: color 150ms ease;
        }

        .footer a:hover {
            color: #fbbf24;
        }

        .glass-card {
            width: min(440px, 100%);
            margin: 0 auto 18px;
            background: rgba(255, 255, 255, 0.08);
            border: 1px solid rgba(255, 255, 255, 0.12);
            border-radius: 20px;
            backdrop-filter: blur(18px);
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.25);
        }

        .glass-card .card-body {
            padding: 24px 24px 20px;
            color: var(--text);
        }

        .glass-card h5 {
            margin: 0 0 12px;
            font-size: 1.05rem;
            color: var(--accent-light);
        }

        .glass-card .weather-value {
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 6px;
        }

        .glass-card .weather-desc {
            text-transform: capitalize;
            color: var(--text-light);
        }

        .weather-info {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 12px;
        }

        .weather-info h5,
        .weather-info .weather-value,
        .weather-info .weather-desc {
            margin: 0;
        }

        @media (min-width: 520px) {
            .weather-info {
                flex-direction: row;
                align-items: center;
                justify-content: center;
                gap: 24px;
                text-align: left;
                flex-wrap: wrap;
            }
        }

        @media (max-width: 480px) {
            body {
                padding: 16px;
            }

            .card,
            .glass-card {
                width: 100%;
            }

            .card {
                border-radius: 16px;
            }

            .hero {
                padding: 36px 18px 22px;
            }

            .hero h1 {
                font-size: 1.875rem;
            }

            .form {
                padding: 22px;
            }
        }
    </style>
</head>
<body>
    <div class="glass-card shadow-lg">
        <div class="card-body text-center" id="weather">
            @if(isset($weather) && $weather)
                <div class="weather-info">
                    <h5>{{ $weather['city'] }}</h5>
                    <div class="weather-value">{{ $weather['temp'] }}°C</div>
                    <div class="weather-desc">{{ $weather['description'] }}</div>
                </div>
            @else
                <div>Loading weather...</div>
            @endif
        </div>
    </div>

    <div class="card">
        <div class="hero">
            <h1>Login here</h1>
        </div>

        <div class="form">
            @if(session('success'))
                <p style="color: #1f7a4a; text-align: center; margin: 0 0 16px;">
                    {{ session('success') }}
                </p>
            @endif

            @if($errors->has('email'))
                <p style="color: #c72e2e; text-align: center; margin: 0 0 16px;">
                    {{ $errors->first('email') }}
                </p>
            @endif

            <form method="POST" action="{{ route('login.submit') }}">
                @csrf

                <div class="field">
                    <label for="email">Email</label>
                    <input id="email" name="email" type="email" value="{{ old('email') }}" placeholder="Email" required />
                </div>

                <div class="field">
                    <label for="password">Password</label>
                    <input id="password" name="password" type="password" placeholder="Password" required />
                </div>


                <button type="submit" class="btn">Sign in</button>
            </form>


            <div class="footer">
                Don’t have an account? <a href="{{ route('register') }}">Create new account</a>
            </div>
        </div>
    </div>

    <script>
        async function loadWeather() {
            try {
                const res = await fetch('/weather');
                const data = await res.json();
                const weatherEl = document.getElementById('weather');
                if (!weatherEl) return;

                weatherEl.innerHTML = `
                    <h5>${data.name}</h5>
                    <div class="weather-value">${data.main.temp}°C</div>
                    <div class="weather-desc">${data.weather[0].description}</div>
                `;
            } catch (error) {
                console.error('Weather load failed', error);
            }
        }

        loadWeather();
        setInterval(loadWeather, 60000);
    </script>
</body>
</html>