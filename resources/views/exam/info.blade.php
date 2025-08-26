<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exam Session Details</title>
    <link rel="stylesheet" href="/styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Cinzel+Decorative:wght@400;700;900&family=Cinzel:wght@400;500;600;700&family=Noto+Sans+Arabic:wght@400;500;600;700&display=swap" rel="stylesheet">

</head>
<body class="session-detials">
<header class="main-header">
    <div class="header-content">
        <div class="logo-container">
            <img src="/imgs/logo.png" alt="Thoth Gate Logo" class="logo-image">
            <h1 class="site-logo">Thoth Gate</h1>
        </div>

        <!-- Hamburger Menu Button -->
        <button class="hamburger-menu" id="hamburgerMenu">
            <span></span>
            <span></span>
            <span></span>
        </button>

        <nav class="main-nav">
            <ul>
                <li><a href="/" class="active">Home</a></li>
                <li><a href="/courses">Courses</a></li>
                <li><a href="/community">Chat</a></li>
                <li><a href="/contact">Contact</a></li>
                <li><a href="/profile">Profile</a></li>
                <li>
                    <form method="POST" action="/logout" id = "logoutForm">
                        @csrf
                        @method('DELETE')
                        <a href="#" class="logout-btn" onclick="document.getElementById('logoutForm').submit(); return false;">Logout</a>
                    </form>
                </li>
            </ul>
        </nav>

        <div class="switchers-container">
            <button class="theme-switcher" id="themeSwitcher" title="Toggle Dark Mode">
                <span class="theme-icon">🌙</span>
            </button>
            <button class="language-switcher" id="languageSwitcher" title="Switch Language">
                <span class="language-text">EN</span>
            </button>
        </div>
    </div>
</header>

<!-- Mobile Sidebar -->
<div class="mobile-sidebar" id="mobileSidebar">
    <div class="sidebar-header">
        <div class="logo-container">
            <img src="imgs/logo.png" alt="Thoth Gate Logo" class="logo-image">
            <h1 class="site-logo">Thoth Gate</h1>
        </div>
        <button class="close-sidebar" id="closeSidebar">
            <span></span>
            <span></span>
        </button>
    </div>

    <nav class="sidebar-nav">
        <ul>
            <li><a href="/" class="active">Home</a></li>
            <li><a href="/courses">Courses</a></li>
            <li><a href="/community">Chat</a></li>
            <li><a href="/contact">Contact</a></li>
            <li><a href="/profile">Profile</a></li>
            <li>
                <form method="POST" action="/logout" id = "logoutForm">
                    @csrf
                    @method('DELETE')
                    <a href="#" class="logout-btn" onclick="document.getElementById('logoutForm').submit(); return false;">Logout</a>
                </form>
            </li>
        </ul>
    </nav>

    <div class="sidebar-switchers">
        <button class="theme-switcher" id="sidebarThemeSwitcher" title="Toggle Dark Mode">
            <span class="theme-icon">🌙</span>
        </button>
        <button class="language-switcher" id="sidebarLanguageSwitcher" title="Switch Language">
            <span class="language-text">EN</span>
        </button>
    </div>
</div>

<!-- Sidebar Overlay -->
<div class="sidebar-overlay" id="sidebarOverlay"></div>

<main class="container" style="max-width:600px; margin-top:3rem;">
    <h2 class="section-title">Exam Session Details</h2>
    <div class="profile-card-exam" style="padding:2rem; text-align:left; margin-top:50px;margin-bottom:50px;">
        <div class="detail-group">
            <label>Student:</label>
            <span id="studentName">{{$session->student->user->name}}</span>
        </div>

        <div class="detail-group">
            <label>Subject:</label>
            <span id="examName">{{$session->exam->lecture->course->subject}}</span>
        </div>

        <div class="detail-group">
            <label>Lecture:</label>
            <span id="examName">{{$session->exam->lecture->title}}</span>
        </div>

        <div class="detail-group">
            <label>Score:</label>
            <span id="examScore"> {{$session->score}} /  {{$session->exam->questions->count()}}</span>
        </div>
        <div class="detail-group">
            <label>Status:</label>
            <span id="examStatus">Submitted</span>
        </div>
        <div class="detail-group">
            <label>Time Taken:</label>
            @php
                $diffInSeconds = $session->started_at->diffInSeconds($session->submitted_at);
                if($diffInSeconds > $session->duration*60){
                    $diffInSeconds = $session->duration * 60;
                }
                $hours = intdiv($diffInSeconds, 3600);
                $minutes = intdiv($diffInSeconds % 3600, 60);
                $seconds = $diffInSeconds % 60;
            @endphp
            <span id="timeTaken">
                @if($hours > 0)
                    {{ $hours }}h
                @endif
                @if($minutes > 0)
                    {{ $minutes }}m
                @endif
                {{$seconds}}s
            </span>
        </div>

        <a href="/info/model/{{$session->id}}" class="course-btn" style="width: max-content; justify-self: center; margin-top:15px">Model Answer</a>

    </div>
</main>
<footer class="main-footer">
    <div class="container">
        <div class="footer-content">
            <div class="footer-section">
                <h3>Thoth Gate</h3>
                <p>Gateway to Ancient Wisdom, Modern Learning</p>
            </div>
            <div class="footer-section">
                <h4>Quick Links</h4>
                <ul>
                    <li><a href="/">Home</a></li>
                    <li><a href="/courses">Courses</a></li>
                    <li><a href="/community">Chat</a></li>
                    <li><a href="/contact">Contact</a></li>
                    <li><a href="/profile">Profile</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h4>Contact</h4>
                <p>Email: info@thothgate.edu.eg</p>
                <p>Phone: +20 123 456 789</p>
            </div>
            <div class="footer-section">
                <h4>Follow Us</h4>
                <div class="social-icons">
                    <a href="#" class="social-icon">📘</a>
                    <a href="#" class="social-icon">📷</a>
                    <a href="#" class="social-icon">🐦</a>
                    <a href="#" class="social-icon">💼</a>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2024 Thoth Gate Learning Center. All rights reserved.</p>
        </div>
    </div>
</footer>

<script src="/script.js"></script>
</body>
</html>
