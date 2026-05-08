<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
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
            justify-content: center;
            align-items: center;
            padding: 24px;
            color: var(--text);
        }

        .card {
            width: min(480px, 100%);
            background: var(--surface);
            border-radius: 20px;
            box-shadow: var(--shadow);
            overflow: hidden;
            display: grid;
            grid-template-columns: 1fr;
            border: 1px solid var(--border);
        }

        .hero {
            background: linear-gradient(135deg, #1e3a8a 0%, #1e40af 100%);
            padding: 48px 32px 32px;
            text-align: center;
            border-bottom: 1px solid var(--border);
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
            background: #1a2942;
            font-size: 0.95rem;
            color: var(--text);
            outline: none;
            transition: all 150ms ease;
        }

        .field input:focus {
            border-color: var(--accent-light);
            box-shadow: 0 0 0 3px rgba(245, 158, 11, 0.2);
            background: #243655;
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

        @media (max-width: 480px) {
            .card {
                border-radius: 16px;
            }

            .hero {
                padding: 36px 24px 24px;
            }

            .hero h1 {
                font-size: 1.875rem;
            }

            .form {
                padding: 24px;
            }
        }
    </style>
</head>
<body>
    <div class="card">
        <div class="hero">
            <h1>Create account</h1>
        </div>

        <div class="form">
            <form action="{{ route('register.store') }}" method="POST">
                @csrf

                <div class="field">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" placeholder="Full name" required />
                    @error('name')
                        <small style="color: #c72e2e;">{{ $message }}</small>
                    @enderror
                </div>

                <div class="field">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="Email" required />
                    @error('email')
                        <small style="color: #c72e2e;">{{ $message }}</small>
                    @enderror
                </div>

                <div class="field">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Password" required />
                    @error('password')
                        <small style="color: #c72e2e;">{{ $message }}</small>
                    @enderror
                </div>

                <div class="field">
                    <label for="admin_key">Admin Key (optional)</label>
                    <input type="text" id="admin_key" name="admin_key" value="{{ old('admin_key') }}" placeholder="Admin Key (optional)" />
                    @error('admin_key')
                        <small style="color: #c72e2e;">{{ $message }}</small>
                    @enderror
                </div>

                <button type="submit" class="btn">Create account</button>
            </form>

            <div class="footer">
                Already have an account? <a href="{{ route('login') }}">Sign in</a>
            </div>
        </div>
    </div>
</body>
</html>