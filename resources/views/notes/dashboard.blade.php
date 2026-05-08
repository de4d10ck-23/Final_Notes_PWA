
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <style>
        :root {
            --bg: #0f1419;
            --surface: rgba(15, 23, 42, 0.96);
            --panel: rgba(30, 41, 59, 0.85);
            --text: #f8fafc;
            --text-light: #cbd5e1;
            --border: #334155;
            --primary: #1e3a8a;
            --primary-dark: #1e40af;
            --accent: #d97706;
            --accent-light: #f59e0b;
            --danger: #ef4444;
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

        .dashboard {
            width: min(600px, 100%);
            background: var(--surface);
            border-radius: 20px;
            box-shadow: var(--shadow);
            overflow: hidden;
            border: 1px solid var(--border);
        }

        .dashboard__header {
            padding: 24px 28px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: linear-gradient(135deg, #1e3a8a 0%, #1e40af 100%);
            border-bottom: 1px solid var(--border);
        }

        .dashboard__header h1 {
            margin: 0;
            font-size: 1.15rem;
            font-weight: 700;
            color: var(--accent-light);
        }

        .dashboard__header small {
            display: block;
            color: #cbd5e1;
            margin-top: 4px;
            font-weight: 500;
        }

        .logout {
            border: 1px solid var(--danger);
            background: transparent;
            cursor: pointer;
            padding: 10px 14px;
            border-radius: 10px;
            transition: all 150ms ease;
            font-weight: 500;
            color: var(--danger);
        }

        .logout:hover {
            background: rgba(239, 68, 68, 0.1);
            transform: translateY(-1px);
        }

        .card {
            padding: 22px 24px;
            margin: 20px;
            border-radius: 16px;
            background: var(--panel);
            box-shadow: var(--shadow-sm);
            border: 1px solid var(--border);
        }

		.weather-banner {
			display: flex;
			align-items: center;
			justify-content: space-between;
			gap: 14px;
			padding: 18px 22px;
			margin: 0 20px 16px;
			border-radius: 16px;
			background: rgba(30, 41, 59, 0.9);
			border: 1px solid rgba(249, 115, 22, 0.18);
			box-shadow: var(--shadow-sm);
		}

		.weather-banner__info {
			display: grid;
			gap: 4px;
		}

		.weather-banner__title {
			font-size: 0.98rem;
			font-weight: 700;
			color: var(--accent-light);
		}

		.weather-banner__subtitle {
			color: var(--text-light);
		}

        .field input,
        .field textarea {
            width: 100%;
            padding: 12px 14px;
            border-radius: 12px;
            border: 1px solid var(--border);
            background: #1a2942;
            font-size: 0.95rem;
            color: var(--text);
            outline: none;
            resize: vertical;
            transition: all 150ms ease;
            font-family: inherit;
        }

        .field input:focus,
        .field textarea:focus {
            border-color: var(--accent-light);
            box-shadow: 0 0 0 3px rgba(245, 158, 11, 0.2);
            background: #243655;
        }

        textarea {
            min-height: 100px;
        }

        .btn {
            width: 100%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 12px 16px;
            border: none;
            border-radius: 12px;
            background: linear-gradient(135deg, var(--accent), var(--accent-light));
            color: #1f2937;
            font-weight: 600;
            font-size: 0.95rem;
            cursor: pointer;
            transition: all 160ms ease;
            box-shadow: 0 4px 12px rgba(217, 119, 6, 0.4);
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(217, 119, 6, 0.5);
        }

        .btn:active {
            transform: translateY(0);
        }

        .btn--danger {
            background: linear-gradient(135deg, #ef4444, #dc2626);
            color: white;
            box-shadow: 0 4px 12px rgba(239, 68, 68, 0.3);
        }

        .btn--danger:hover {
            box-shadow: 0 8px 20px rgba(239, 68, 68, 0.4);
        }

        .note_card {
            padding: 18px 20px;
            margin: 20px;
            border-radius: 14px;
            background: rgba(30, 41, 59, 0.6);
            box-shadow: var(--shadow-sm);
            border: 1px solid var(--border);
            transition: all 150ms ease;
        }

        .note_card:hover {
            box-shadow: 0 8px 20px rgba(217, 119, 6, 0.15);
            transform: translateY(-2px);
        }

        .note_card h2 {
            margin: 0 0 8px;
            font-size: 1rem;
            color: var(--accent-light);
            font-weight: 600;
        }

        .note_card p {
            margin: 0 0 12px;
            color: var(--text-light);
            line-height: 1.5;
            font-size: 0.95rem;
        }

        .note_card small {
            color: var(--text-light);
            font-size: 0.85rem;
        }

        .note_card form button {
            width: 100%;
            margin-top: 12px;
        }

        .notes {
            padding: 0 20px 24px;
            display: grid;
            gap: 16px;
        }

        .note {
            padding: 18px 20px;
            border-radius: 14px;
            background: rgba(255, 255, 255, 0.8);
            box-shadow: var(--shadow-sm);
            border: 1px solid var(--border);
            transition: all 150ms ease;
        }

        .note:hover {
            box-shadow: 0 8px 20px rgba(99, 102, 241, 0.12);
            transform: translateY(-2px);
        }

        .note__header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 16px;
            margin-bottom: 12px;
        }

        .note__header h2 {
            margin: 0;
            font-size: 1rem;
            color: var(--primary);
            font-weight: 600;
        }

        .note__header button {
            border: none;
            border-radius: 10px;
            padding: 6px 12px;
            background: rgba(239, 68, 68, 0.1);
            color: var(--danger);
            cursor: pointer;
            font-weight: 600;
            font-size: 0.8rem;
            transition: all 120ms ease;
        }

        .note__header button:hover {
            background: rgba(239, 68, 68, 0.2);
            transform: translateY(-1px);
        }

        .note p {
            margin: 0;
            color: var(--text-light);
            line-height: 1.5;
            font-size: 0.95rem;
        }

        @media (max-width: 500px) {
            .dashboard {
                width: 100%;
                margin: 0;
            }

            .card {
                margin: 14px;
            }

            .dashboard__header {
                padding: 16px 18px;
            }
        }
    </style>
</head>
<body>
    <div class="dashboard">
        <header class="dashboard__header">
            <div>
                @php $user = auth()->user(); @endphp
                <h1>
                @if($user && $user->role == 1)
                    Hello, {{ $user->name }}, these are all the notes and their authors
                @else
                    Hello, {{ $user?->name }}
                @endif
                </h1>
            </div>

            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="logout" aria-label="Logout">
                    Logout
                </button>
            </form>
        </header>

        <div class="card">
            <form method="POST" action="/notes">
                @csrf

                <div class="field">
                    <input type="text" name="title" placeholder="Title" required />
                </div>

                <br>

                <div class="field">
                    <textarea name="content" placeholder="Content" required></textarea>
                </div>

                <br>

                <button type="submit" class="btn">
                    <span style="font-size: 1.2rem; line-height: 1;">+</span>
                    Add note
                </button>
            </form>
        </div>

        @if(isset($notes) && count($notes) > 0)
            @foreach($notes as $note)
                <div class="note_card">
                        <h2>{{ $note->title }}</h2>
                        <p>{{ $note->content }}</p>

                        @if(auth()->user() && auth()->user()->role == 1)
                            <small class="text-dark"><strong>Author:</strong> {{ $note->user->name }}</small>
                        @endif

                    <form method="POST" action="/notes/{{ $note->id }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn--danger" aria-label="Delete note">
                            <span aria-hidden="true">🗑</span> Delete
                        </button>
                    </form>
                </div>
            @endforeach
        @else
            <p>No notes found.</p>  
        @endif
    </div>
</body>
</html>