<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Radio Siaran Pemerintah Daerah Klaten</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        :root {
            --primary-bg: #0d121e;
            --secondary-bg: #141b27;
            --accent: #ffd700;
            --text-light: #ffffff;
            --text-muted: #a0a0a0;
            --red: #ff3b3b;
            --blue: #0066ff;
            --gray: #2c3440;
            --border: #2a323f;
            --hover-bg: #1a222f;
        }

        body {
            background-color: var(--primary-bg);
            color: var(--text-light);
            line-height: 1.6;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            padding-top: 154px;
        }

        .custom-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 15px;
        }

        .sticky-header {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 1000;
            background-color: var(--primary-bg);
        }

        .header-top-bar {
            background-color: #0a0e15;
            padding: 8px 0;
            border-bottom: 1px solid var(--border);
        }

        .on-air-status {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 0.9rem;
        }

        .on-air-badge {
            background-color: var(--red);
            color: white;
            padding: 2px 8px;
            border-radius: 3px;
            font-weight: bold;
            font-size: 0.8rem;
        }

        .live-info {
            display: flex;
            align-items: center;
            gap: 15px;
            color: var(--text-muted);
        }

        .live-info i {
            color: var(--accent);
        }

        .live-radio-link {
            display: flex;
            align-items: center;
            gap: 5px;
            color: var(--accent);
            font-size: 0.9rem;
            text-decoration: none;
            cursor: pointer;
        }

        .live-radio-link:hover {
            text-decoration: underline;
            color: var(--accent);
        }

        .main-header {
            background-color: var(--primary-bg);
            padding: 15px 0;
            border-bottom: 1px solid var(--border);
        }

        .logo-img {
            width: auto;
            height: 60px;
        }

        .radio-title h1 {
            font-size: 1.5rem;
            font-weight: bold;
            color: var(--accent);
            margin-bottom: 0.2rem;
        }

        .radio-title p {
            font-size: 0.9rem;
            color: var(--text-muted);
            margin-bottom: 0;
        }

        .search-input {
            padding-left: 35px;
            border: 1px solid var(--border);
            background-color: var(--secondary-bg);
            color: var(--text-light);
            border-radius: 4px;
        }

        .search-input:focus {
            border-color: var(--accent);
            background-color: var(--secondary-bg);
            color: var(--text-light);
            box-shadow: 0 0 0 0.25rem rgba(255, 215, 0, 0.25);
        }

        .search-icon {
            position: absolute;
            left: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-muted);
        }

        .admin-btn {
            background-color: transparent;
            border: 1px solid var(--accent);
            color: var(--accent);
            border-radius: 4px;
            padding: 8px 20px;
            transition: all 0.3s;
        }

        .admin-btn:hover {
            background-color: var(--accent);
            color: #000;
        }

        .custom-nav {
            background-color: var(--primary-bg);
            border-top: 1px solid var(--border);
            border-bottom: 1px solid var(--border);
        }

        .custom-nav .nav-link {
            color: var(--text-light);
            font-size: 0.95rem;
            padding: 10px 15px;
            transition: color 0.2s;
            display: block;
        }

        .custom-nav .nav-link:hover {
            color: var(--accent);
        }

        .mobile-menu-btn {
            display: none;
            background: none;
            border: none;
            color: var(--accent);
            font-size: 1.5rem;
            cursor: pointer;
            padding: 5px 10px;
        }

        .mobile-menu-btn:focus {
            outline: none;
        }

        .hero-section {
            margin: 20px 0;
        }

        .live-player {
            background-color: var(--secondary-bg);
            border-radius: 8px;
            overflow: hidden;
            border: 1px solid var(--border);
            height: 100%;
        }

        .player-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 15px;
            background-color: var(--gray);
            border-bottom: 1px solid var(--border);
        }

        .station-logo {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .station-logo span {
            font-weight: bold;
            color: var(--accent);
        }

        .listeners {
            display: flex;
            align-items: center;
            gap: 5px;
            font-size: 0.9rem;
        }

        .listener-dot {
            width: 8px;
            height: 8px;
            background-color: var(--red);
            border-radius: 50%;
        }

        .player-image {
            position: relative;
            height: 420px;
            background: url('{{ asset('images/photo-live.jpg') }}') no-repeat center;
            background-size: cover;
        }

        .player-image::before {
            content: '';
            position: absolute;
            top: 18px;
            left: 14px;
            width: 80px;
            height: 36px;
            background-color: var(--accent);
            border-radius: 4px;
            z-index: 1;
        }

        .rspd-overlay {
            position: absolute;
            top: 10px;
            left: 12px;
            z-index: 2;
            display: flex;
            flex-direction: column;
            gap: 2px;
            padding: 10px;
        }

        .rspd-overlay .rspd-text {
            font-weight: bold;
            font-size: 1.2rem;
            letter-spacing: 1px;
            margin-bottom: 8px;
            color: #000;
        }

        .rspd-overlay .frequency-text {
            font-size: 0.8rem;
            font-weight: 500;
            color: var(--accent);
        }

        .listeners-overlay {
            position: absolute;
            top: 10px;
            right: 10px;
            z-index: 2;
            display: flex;
            align-items: center;
            gap: 5px;
            padding: 5px 10px;
            background-color: rgba(0, 0, 0, 0.7);
            border-radius: 20px;
            color: var(--text-light);
            font-size: 0.9rem;
        }

        .listeners-overlay .listener-dot {
            width: 6px;
            height: 6px;
            background-color: var(--red);
            border-radius: 50%;
        }

        .play-button {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 60px;
            height: 60px;
            background-color: rgba(0, 0, 0, 0.7);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            border: 2px solid var(--text-light);
            transition: transform 0.3s, background-color 0.3s;
            z-index: 3;
        }

        .play-button:hover {
            transform: translate(-50%, -50%) scale(1.1);
        }

        .play-button.playing {
            background-color: rgba(255, 59, 59, 0.5);
        }

        .fa-play {
            margin-left: 4px;
            color: white;
            font-size: 24px;
        }

        .play-button i {
            color: white;
            font-size: 24px;
        }

        .player-controls {
            display: flex;
            justify-content: space-around;
            padding: 15px;
            background-color: var(--gray);
            border-top: 1px solid var(--border);
        }

        .control-btn {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 8px 15px;
            background-color: var(--accent);
            color: #000;
            border-radius: 4px;
            font-weight: bold;
            cursor: pointer;
            width: 32%;
            justify-content: center;
            transition: background-color 0.3s;
        }

        .control-btn:hover {
            background-color: #e6c200;
        }

        .volume-control {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px 15px;
            background-color: var(--secondary-bg);
            border-radius: 4px;
            margin-top: 10px;
        }

        .volume-slider {
            flex-grow: 1;
            -webkit-appearance: none;
            height: 5px;
            background: var(--gray);
            border-radius: 5px;
            outline: none;
        }

        .volume-slider::-webkit-slider-thumb {
            -webkit-appearance: none;
            width: 15px;
            height: 15px;
            background: var(--accent);
            border-radius: 50%;
            cursor: pointer;
        }

        .volume-slider::-moz-range-thumb {
            width: 15px;
            height: 15px;
            background: var(--accent);
            border-radius: 50%;
            cursor: pointer;
            border: none;
        }

        .volume-icon {
            color: var(--text-muted);
            font-size: 1.2rem;
        }

        .streaming-status {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 5px 10px;
            background-color: rgba(0, 102, 255, 0.1);
            border-radius: 4px;
            margin: 10px 15px;
            font-size: 0.9rem;
        }

        .status-indicator {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background-color: var(--red);
            animation: pulse 2s infinite;
        }

        .status-indicator.playing {
            background-color: #00ff00;
            animation: pulse 1s infinite;
        }

        @keyframes pulse {
            0% {
                opacity: 1;
            }

            50% {
                opacity: 0.5;
            }

            100% {
                opacity: 1;
            }
        }

        .next-program {
            background-color: var(--secondary-bg);
            border-radius: 8px;
            padding: 15px;
            border: 1px solid var(--border);
            height: 100%;
        }

        .next-program h3 {
            margin-bottom: 15px;
            font-size: 1.1rem;
            color: var(--text-muted);
            border-bottom: 1px solid var(--border);
            padding-bottom: 10px;
        }

        .program-card {
            background-color: var(--blue);
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 15px;
        }

        .program-card .station {
            display: flex;
            align-items: center;
            gap: 8px;
            background-color: var(--accent);
            color: #000;
            padding: 2px 8px;
            border-radius: 3px;
            font-size: 0.85rem;
            margin-bottom: 5px;
            width: fit-content;
        }

        .program-card h4 {
            font-size: 1.5rem;
            margin: 10px 0 5px 0;
            color: white;
        }

        .program-card p {
            font-size: 0.95rem;
            color: #cce0ff;
        }

        .program-schedule {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 0;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            margin-top: 10px;
        }

        .program-schedule span {
            font-size: 0.9rem;
            color: #cce0ff;
        }

        .dots {
            display: flex;
            gap: 5px;
            margin-top: 10px;
        }

        .dot {
            width: 10px;
            height: 10px;
            background-color: rgba(255, 255, 255, 0.3);
            border-radius: 50%;
        }

        .dot.active {
            background-color: white;
        }

        .section-header {
            text-align: center;
            padding: 30px 0;
            margin: 0 0 20px 0;
        }

        .section-header h2 {
            font-size: 1.8rem;
            margin-bottom: 10px;
            color: var(--accent);
        }

        .section-header p {
            max-width: 600px;
            margin: 0 auto;
            color: var(--text-muted);
        }

        .info-box {
            background-color: var(--secondary-bg);
            border-radius: 8px;
            padding: 20px;
            border: 1px solid var(--border);
            height: 100%;
        }

        .info-box h3 {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 15px;
            font-size: 1.3rem;
        }

        .profile-img {
            width: 100%;
            height: 300px;
            object-fit: cover;
            border-radius: 8px;
            margin-bottom: 15px;
        }

        .visi-misi {
            margin: 20px 0;
        }

        .visi-misi h4 {
            margin-bottom: 5px;
            color: var(--accent);
            font-size: 1.1rem;
        }

        .visi-misi p {
            margin-bottom: 10px;
            color: var(--text-muted);
        }

        .info-list {
            list-style: none;
            padding-left: 0;
            margin-top: 15px;
        }

        .info-list li {
            display: flex;
            align-items: center;
            gap: 10px;
            color: var(--text-muted);
            margin-bottom: 10px;
        }

        .info-list i {
            color: var(--accent);
        }

        .quick-links {
            display: flex;
            flex-direction: column;
            gap: 10px;
            margin-bottom: 15px;
        }

        .quick-link {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 15px;
            background-color: var(--gray);
            border-radius: 4px;
            border: 1px solid var(--border);
            transition: background-color 0.2s;
        }

        .quick-link:hover {
            background-color: var(--hover-bg);
        }

        .quick-link .status {
            display: flex;
            align-items: center;
            gap: 5px;
            font-size: 0.85rem;
        }

        .status.active {
            color: var(--accent);
        }

        .status.siap {
            color: white;
            background-color: var(--red);
            padding: 2px 6px;
            border-radius: 3px;
        }

        .status.online {
            color: var(--accent);
        }

        .status.tersedia {
            color: var(--accent);
        }

        .emergency {
            background-color: #5a1a1a;
            padding: 10px;
            border-radius: 4px;
            margin: 15px 0;
            font-size: 0.9rem;
        }

        .emergency i {
            color: var(--red);
            margin-right: 5px;
        }

        .contact-list {
            display: flex;
            flex-direction: column;
            gap: 10px;
            margin: 15px 0;
        }

        .contact-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 8px 0;
            border-bottom: 1px solid var(--border);
        }

        .contact-item:last-child {
            border-bottom: none;
        }

        .contact-name {
            color: var(--text-light);
        }

        .contact-number {
            color: var(--accent);
            font-weight: bold;
        }

        .program-item {
            background-color: var(--secondary-bg);
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 15px;
            border: 1px solid var(--border);
        }

        .program-item h3 {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 5px;
            font-size: 1.2rem;
        }

        .program-item .status {
            font-size: 0.8rem;
            padding: 2px 6px;
            border-radius: 3px;
            background-color: var(--red);
            color: white;
        }

        .program-item .status.upcoming {
            background-color: var(--accent);
            color: #000;
        }

        .program-item .status.harian {
            background-color: var(--gray);
            color: white;
        }

        .program-item p {
            margin: 10px 0;
            color: var(--text-muted);
        }

        .program-time {
            display: flex;
            align-items: center;
            gap: 10px;
            margin: 5px 0;
            font-size: 0.9rem;
            flex-wrap: wrap;
        }

        .program-time i {
            color: var(--accent);
        }

        .tags {
            display: flex;
            gap: 5px;
            margin-top: 5px;
            flex-wrap: wrap;
        }

        .tag {
            padding: 2px 6px;
            background-color: var(--gray);
            border-radius: 3px;
            font-size: 0.8rem;
            color: var(--text-muted);
        }

        .schedule-table {
            background-color: var(--secondary-bg);
            border-radius: 8px;
            padding: 15px;
            margin-top: 20px;
            border: 1px solid var(--border);
        }

        .schedule-table h3 {
            margin-bottom: 15px;
            font-size: 1.2rem;
        }

        .schedule-row {
            display: flex;
            padding: 8px 0;
            border-bottom: 1px solid var(--border);
        }

        .schedule-day {
            width: 100px;
            font-weight: bold;
            flex-shrink: 0;
        }

        .schedule-programs {
            flex: 1;
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .schedule-program {
            padding: 4px 8px;
            background-color: var(--gray);
            border-radius: 3px;
            font-size: 0.85rem;
        }

        .studio-info {
            background-color: var(--secondary-bg);
            border-radius: 8px;
            padding: 20px;
            border: 1px solid var(--border);
            height: 100%;
        }

        .studio-info h3 {
            margin-bottom: 15px;
            font-size: 1.2rem;
        }

        .studio-detail {
            display: flex;
            justify-content: space-between;
            padding: 8px 0;
            border-bottom: 1px solid var(--border);
        }

        .studio-detail:last-child {
            border-bottom: none;
        }

        .berita-tabs {
            display: flex;
            gap: 10px;
            margin: 20px 0;
            justify-content: center;
            background-color: var(--secondary-bg);
            border-radius: 20px;
            padding: 5px;
            border: 1px solid var(--border);
            flex-wrap: wrap;
        }

        .berita-tab {
            padding: 8px 15px;
            background-color: transparent;
            border-radius: 20px;
            cursor: pointer;
            font-size: 0.9rem;
            transition: background-color 0.2s;
            color: var(--text-light);
            border: none;
        }

        .berita-tab.active {
            background-color: var(--accent);
            color: #000;
        }

        .berita-tab:hover:not(.active) {
            background-color: var(--hover-bg);
        }

        .berita-card {
            background-color: var(--secondary-bg);
            border-radius: 8px;
            overflow: hidden;
            border: 1px solid var(--border);
            transition: transform 0.2s;
            height: 100%;
        }

        .berita-card:hover {
            transform: translateY(-5px);
        }

        .berita-img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .berita-content {
            padding: 15px;
        }

        .berita-category {
            display: inline-block;
            padding: 2px 6px;
            background-color: var(--gray);
            border-radius: 3px;
            font-size: 0.8rem;
            margin-bottom: 10px;
            color: var(--text-light);
        }

        .berita-title {
            font-size: 1.1rem;
            margin-bottom: 10px;
            color: var(--text-light);
        }

        .berita-desc {
            color: var(--text-muted);
            margin-bottom: 10px;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .berita-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 0.85rem;
            color: var(--text-muted);
        }

        .berita-meta i {
            color: var(--accent);
        }

        .view-more {
            width: 200px;
            display: block;
            text-align: center;
            margin: 20px auto;
            padding: 10px 20px;
            background-color: var(--gray);
            color: var(--text-light);
            border-radius: 4px;
            font-weight: 600;
            text-decoration: none;
            border: 1px solid var(--border);
            transition: all 0.3s;
        }

        .view-more:hover {
            background-color: var(--accent);
            color: #000;
        }

        .note-banner {
            background-color: #f0f8ff;
            color: #003366;
            padding: 15px 20px;
            border-radius: 4px;
            margin: 30px 0;
            font-size: 14px;
            border: 1px solid #cce0ff;
            width: 100%;
        }

        .note-banner strong {
            color: var(--red);
        }

        footer {
            background-color: var(--accent);
            color: #000;
            padding: 30px 0;
            border-top: 1px solid #000;
            margin-top: 30px;
        }

        .footer-column h3 {
            margin-bottom: 15px;
            font-size: 1.2rem;
            color: #000;
        }

        .footer-column p {
            margin-bottom: 15px;
            font-size: 0.95rem;
            color: #333;
        }

        .footer-links {
            list-style: none;
            padding-left: 0;
        }

        .footer-links li {
            margin-bottom: 8px;
        }

        .footer-links a {
            color: #000;
            text-decoration: none;
            transition: color 0.2s;
            font-size: 0.95rem;
        }

        .footer-links a:hover {
            color: #333;
            text-decoration: underline;
        }

        .social-icons {
            display: flex;
            gap: 10px;
            margin: 15px 0;
        }

        .social-icon {
            width: 35px;
            height: 35px;
            background-color: #000;
            border-radius: 4px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-decoration: none;
            font-size: 1rem;
            transition: background-color 0.3s;
        }

        .social-icon:hover {
            background-color: #333;
            color: white;
        }

        .info-siaran {
            margin-top: 15px;
        }

        .info-siaran div {
            display: flex;
            align-items: center;
            gap: 8px;
            margin: 5px 0;
            font-size: 0.95rem;
        }

        .info-siaran i {
            color: #000;
        }

        .footer-bottom {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-top: 20px;
            border-top: 1px solid #000;
            margin-top: 20px;
            font-size: 0.85rem;
            flex-wrap: wrap;
        }

        .footer-bottom a {
            color: #000;
            text-decoration: none;
            margin: 0 10px;
        }

        .footer-bottom a:hover {
            text-decoration: underline;
        }

        @media (max-width: 991.98px) {
            body {
                padding-top: 154px;
            }

            .mobile-menu-btn {
                display: block;
            }

            .custom-nav .nav {
                display: none;
                flex-direction: column;
                width: 100%;
                background-color: var(--primary-bg);
                position: absolute;
                top: 100%;
                left: 0;
                border-bottom: 1px solid var(--border);
                box-shadow: 0 5px 10px rgba(0, 0, 0, 0.3);
            }

            .custom-nav .nav.show {
                display: flex;
            }

            .custom-nav .nav-item {
                width: 100%;
            }

            .custom-nav .nav-link {
                padding: 12px 20px;
                border-bottom: 1px solid var(--border);
            }

            .custom-nav .nav-link:last-child {
                border-bottom: none;
            }

            .nav-container {
                display: flex;
                justify-content: space-between;
                align-items: center;
                position: relative;
            }

            .custom-nav .nav {
                flex-wrap: nowrap;
            }
        }

        @media (max-width: 768px) {
            .custom-nav .nav-link {
                padding: 8px 10px;
                font-size: 0.9rem;
            }

            .player-image {
                height: 200px;
            }

            .section-header h2 {
                font-size: 1.5rem;
            }

            .footer-bottom {
                flex-direction: column;
                gap: 10px;
                text-align: center;
            }

            .search-input {
                margin-bottom: 10px;
            }

            .radio-title h1 {
                font-size: 1.2rem;
            }

            .logo-img {
                height: 50px;
            }

            .admin-btn {
                padding: 6px 15px;
                font-size: 0.9rem;
            }

            .hero-section {
                margin-top: 10px;
            }

            .player-controls {
                flex-direction: column;
                gap: 10px;
            }

            .control-btn {
                width: 100%;
            }
        }

        @media (max-width: 576px) {
            body {
                padding-top: 160px;
            }

            .on-air-status {
                flex-wrap: wrap;
                justify-content: center;
            }

            .live-info {
                flex-wrap: wrap;
                justify-content: center;
            }

            .program-time {
                flex-direction: column;
                align-items: flex-start;
                gap: 5px;
            }

            .schedule-row {
                flex-direction: column;
                gap: 5px;
            }

            .schedule-day {
                width: 100%;
            }

            .sticky-header {
                position: fixed;
            }

            .radio-title h1 {
                font-size: 1rem;
            }

            .radio-title p {
                font-size: 0.8rem;
            }

            .search-input {
                width: 100% !important;
            }

            .main-header .d-flex {
                flex-direction: column;
                align-items: flex-start !important;
            }

            .main-header .d-flex>div {
                width: 100%;
                margin-bottom: 10px;
            }

            .main-header .d-flex>div:last-child {
                margin-bottom: 0;
            }
        }

        @media (max-width: 375px) {
            body {
                padding-top: 165px;
            }

            .radio-title h1 {
                font-size: 0.9rem;
            }

            .on-air-badge {
                font-size: 0.7rem;
            }

            .live-info span {
                font-size: 0.8rem;
            }
        }

        .contact-section-card {
            background-color: var(--secondary-bg);
            border-radius: 8px;
            padding: 25px;
            border: 1px solid var(--border);
            height: auto;
        }

        .contact-section-card h3 {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
            font-size: 1.3rem;
            color: var(--text-light);
        }

        .contact-section-card h3 i {
            color: var(--accent);
            font-size: 1.2rem;
        }

        .contact-detail-item {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            padding: 12px 0;
            border-bottom: 1px solid var(--border);
        }

        .contact-detail-item:last-child {
            border-bottom: none;
        }

        .contact-icon {
            width: 40px;
            height: 40px;
            background-color: rgba(255, 215, 0, 0.1);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .contact-icon i {
            color: var(--accent);
            font-size: 1.1rem;
        }

        .contact-content {
            flex: 1;
        }

        .contact-content strong {
            color: var(--text-light);
            display: block;
            margin-bottom: 5px;
            font-size: 0.95rem;
        }

        .contact-content div {
            color: var(--text-muted);
            font-size: 0.9rem;
            line-height: 1.4;
        }

        .operational-hours {
            margin-top: 10px;
        }

        .operational-hours div {
            padding: 8px 0;
            border-bottom: 1px solid var(--border);
        }

        .operational-hours div:last-child {
            border-bottom: none;
        }

        .operational-hours span {
            font-size: 0.95rem;
            color: var(--text-light);
        }

        .operational-hours .text-warning {
            color: var(--accent) !important;
            font-weight: 500;
        }

        /* Updated Google Maps Styles */
        .google-map-container {
            height: 280px;
            border-radius: 8px;
            overflow: hidden;
            margin-bottom: 15px;
            border: 1px solid var(--border);
            position: relative;
        }

        .google-map-container iframe {
            width: 100%;
            height: 100%;
            border: none;
            filter: grayscale(20%) contrast(1.1);
        }

        .map-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(to bottom, rgba(13, 18, 30, 0.3), rgba(13, 18, 30, 0.1));
            pointer-events: none;
            border-radius: 8px;
        }

        .map-info {
            position: absolute;
            bottom: 10px;
            left: 10px;
            background-color: rgba(13, 18, 30, 0.85);
            padding: 8px 12px;
            border-radius: 6px;
            border-left: 3px solid var(--accent);
            z-index: 2;
        }

        .map-info div:first-child {
            font-size: 0.9rem;
            color: var(--text-light);
            font-weight: 600;
        }

        .map-info div:last-child {
            font-size: 0.8rem;
            color: var(--text-muted);
        }

        .btn-outline-light {
            border: 1px solid var(--text-light);
            color: var(--text-light);
            background-color: transparent;
            border-radius: 6px;
            padding: 10px;
            transition: all 0.3s;
            font-weight: 500;
        }

        .btn-outline-light:hover {
            background-color: var(--text-light);
            color: var(--primary-bg);
        }

        .form-label {
            color: var(--text-light);
            font-weight: 500;
            margin-bottom: 8px;
            font-size: 0.95rem;
        }

        .form-label strong {
            font-weight: 600;
        }

        .form-control,
        .form-select {
            background-color: var(--secondary-bg);
            border: 1px solid var(--border);
            color: var(--text-light);
            border-radius: 6px;
            padding: 10px 12px;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: var(--accent);
            background-color: var(--secondary-bg);
            color: var(--text-light);
            box-shadow: 0 0 0 0.25rem rgba(255, 215, 0, 0.25);
        }

        .btn-warning {
            background-color: var(--accent);
            color: #000;
            border: none;
            border-radius: 6px;
            font-weight: bold;
            transition: all 0.3s;
        }

        .btn-warning:hover {
            background-color: #e6c200;
            color: #000;
        }

        @media (max-width: 768px) {
            .contact-section-card {
                padding: 20px;
            }

            .contact-detail-item {
                padding: 10px 0;
            }

            .contact-icon {
                width: 36px;
                height: 36px;
            }

            .google-map-container {
                height: 220px;
            }
        }

        @media (max-width: 576px) {
            .contact-section-card {
                padding: 15px;
            }

            .contact-section-card h3 {
                font-size: 1.2rem;
                margin-bottom: 15px;
            }

            .operational-hours div {
                flex-direction: column;
                align-items: flex-start;
                gap: 5px;
            }

            .google-map-container {
                height: 180px;
            }
        }
    </style>
</head>

<body>
    <div class="sticky-header">
        <div class="header-top-bar">
            <div class="custom-container">
                <div class="d-flex flex-column flex-md-row justify-content-between align-items-center">
                    <div class="on-air-status mb-2 mb-md-0">
                        <span class="on-air-badge">ON AIR</span>
                        <span>Live: Siaran Langsung</span>
                        <div class="live-info">
                            <span><i class="fas fa-wifi"></i> FM 91,6 MHz</span>
                        </div>
                    </div>
                    <a href="#" class="live-radio-link" id="headerLiveRadio">
                        <i class="fas fa-volume-up"></i> Live Radio
                    </a>
                </div>
            </div>
        </div>
        <header class="main-header">
            <div class="custom-container">
                <div class="d-flex flex-column flex-md-row justify-content-between align-items-center">
                    <div class="d-flex align-items-center mb-3 mb-md-0">
                        <img src="{{ asset('images/logo.jpg') }}" alt="Logo RSPD" class="logo-img me-3">
                        <div class="radio-title">
                            <h1>Radio Siaran Pemerintah Daerah</h1>
                            <p>Kabupaten Klaten - FM 91,6 MHz</p>
                        </div>
                    </div>
                    <div class="d-flex flex-column flex-sm-row align-items-center justify-content-end w-50 w-md-auto">
                        <div class="position-relative mb-2 mb-sm-0 me-sm-2 w-100 w-sm-auto" style="min-width: 200px;">
                            <i class="fas fa-search search-icon"></i>
                            <input type="text" class="form-control search-input"
                                placeholder="Cari berita, program...">
                        </div>
                        <button class="admin-btn">Admin</button>
                    </div>
                </div>
            </div>
        </header>
        <nav class="custom-nav">
            <div class="custom-container nav-container">
                <button class="mobile-menu-btn" id="mobileMenuBtn">
                    <i class="fas fa-bars"></i>
                </button>
                <ul class="nav justify-content-start flex-wrap" id="mainNav">
                    <li class="nav-item">
                        <a class="nav-link" href="#home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#program-siaran">Program Siaran</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#berita">Berita</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#tentang">Tentang Kami</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#kontak">Kontak</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <section class="hero-section" id="home">
        <div class="custom-container">
            <div class="row g-4">
                <div class="col-lg-8">
                    <div class="live-player">
                        <div class="streaming-status" id="streamingStatus">
                            <div class="status-indicator" id="statusIndicator"></div>
                            <span id="statusText">Radio Offline - Klik tombol play untuk memulai streaming</span>
                        </div>
                        <div class="player-image">
                            <div class="rspd-overlay">
                                <div class="rspd-text">RSPD</div>
                                <div class="frequency-text">91,6 FM KLATEN</div>
                            </div>
                            <div class="listeners-overlay">
                                <span class="listener-dot"></span>
                                <span>140</span>
                            </div>
                            <div class="play-button" id="playButton">
                                <i class="fas fa-play" id="playIcon"></i>
                            </div>
                        </div>
                        <div class="volume-control">
                            <i class="fas fa-volume-up volume-icon" id="volumeIcon"></i>
                            <input type="range" min="0" max="100" value="70" class="volume-slider"
                                id="volumeSlider">
                        </div>
                        <div class="player-controls">
                            <div class="control-btn" id="hearButton">
                                <i class="fas fa-headphones"></i>
                                <span>Hear</span>
                            </div>
                            <div class="control-btn" id="chatButton">
                                <i class="fas fa-comment"></i>
                                <span>Chat</span>
                            </div>
                            <div class="control-btn" id="livechatButton">
                                <i class="fas fa-wifi"></i>
                                <span>Livechat</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="next-program">
                        <h3>NEXT PROGRAM</h3>
                        <div class="program-card">
                            <div class="station">RSPD</div>
                            <h4>POP</h4>
                            <p>MINGGU 09.00-10.00</p>
                            <div class="program-schedule">
                                <span>SENIN - JUMAT</span>
                                <span>SAPA KASEP KLATEN</span>
                            </div>
                            <div class="dots">
                                <div class="dot active"></div>
                                <div class="dot"></div>
                                <div class="dot"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-header">
        <div class="custom-container">
            <h2>Radio Siaran Pemerintah Daerah <span style="color: var(--accent);">Klaten</span></h2>
            <p>Menyajikan informasi terkini, program berkualitas, dan pelayanan publik untuk masyarakat Klaten.
                Dengarkan
                siaran langsung 24/7 di FM 107.5 MHz.</p>
        </div>
    </section>
    <section class="mb-5" id="tentang">
        <div class="custom-container">
            <div class="row g-4">
                <div class="col-lg-6">
                    <div class="info-box">
                        <h3><i class="fas fa-building"></i> Profil Radio</h3>
                        <img src="{{ asset('images/profile.jpg') }}" alt="Profil Radio" class="profile-img">
                        <div class="visi-misi">
                            <h4>Visi & Misi</h4>
                            <p><strong>Visi:</strong> Menjadi media komunikasi publik terdepan dalam menyampaikan
                                informasi
                                pemerintah dan memberdayakan masyarakat Klaten.</p>
                            <p><strong>Misi:</strong> Menyediakan informasi akurat, transparan, dan bermanfaat bagi
                                kemajuan daerah
                                dan kesejahteraan masyarakat.</p>
                        </div>
                        <ul class="info-list">
                            <li><i class="far fa-clock"></i> Berdiri sejak 1995</li>
                            <li><i class="far fa-user"></i> 20+ Program</li>
                            <li><i class="fas fa-map-marker-alt"></i> Jl. Pemuda No. 140, Klaten</li>
                            <li><i class="fas fa-phone"></i> (0272) 329450</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="info-box">
                        <h3><i class="fas fa-clipboard-list"></i> Layanan Publik Cepat</h3>
                        <div class="quick-links">
                            <div class="quick-link">
                                <div>Pengumuman Vaksinasi</div>
                                <div class="status active">Aktif <i class="fas fa-external-link-alt"></i></div>
                            </div>
                            <div class="quick-link">
                                <div>Info Bencana Alam</div>
                                <div class="status siap">Siaga <i class="fas fa-external-link-alt"></i></div>
                            </div>
                            <div class="quick-link">
                                <div>Pelayanan Pajak</div>
                                <div class="status online">Online <i class="fas fa-external-link-alt"></i></div>
                            </div>
                            <div class="quick-link">
                                <div>Perizinan Usaha</div>
                                <div class="status tersedia">Tersedia <i class="fas fa-external-link-alt"></i></div>
                            </div>
                        </div>
                        <div class="emergency">
                            <i class="fas fa-exclamation-triangle"></i> Kontak Darurat
                        </div>
                        <div class="contact-list">
                            <div class="contact-item">
                                <div class="contact-name">PMI Klaten</div>
                                <div class="contact-number">0272-321234</div>
                            </div>
                            <div class="contact-item">
                                <div class="contact-name">Polres Klaten</div>
                                <div class="contact-number">0272-321122</div>
                            </div>
                            <div class="contact-item">
                                <div class="contact-name">Pemadam Kebakaran</div>
                                <div class="contact-number">0272-321199</div>
                            </div>
                            <div class="contact-item">
                                <div class="contact-name">RSUD Klaten</div>
                                <div class="contact-number">0272-321555</div>
                            </div>
                        </div>
                        <div class="emergency">
                            <strong>Untuk keadaan darurat:</strong> Hubungi 112 atau datang langsung ke kantor kecamatan
                            terdekat.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-header" id="program-siaran">
        <div class="custom-container">
            <h2>Program Siaran</h2>
            <p>Program unggulan yang siap melayani informasi terbaik untuk masyarakat Klaten</p>
        </div>
    </section>
    <section class="mb-5">
        <div class="custom-container">
            <div class="row g-4">
                <div class="col-lg-8">
                    <h3 class="mb-3"><i class="fas fa-microphone-alt"></i> Program Unggulan</h3>
                    <div class="program-item">
                        <h3>Suara Rakyat Klaten <span class="status">Live</span></h3>
                        <p>Forum interaktif untuk menampung aspirasi dan keluhan masyarakat</p>
                        <div class="program-time">
                            <i class="far fa-clock"></i>
                            <span>08:00 - 10:00 WIB</span>
                            <span class="tag">Interaktif</span>
                            <span>Host: Budi Santoso</span>
                        </div>
                    </div>
                    <div class="program-item">
                        <h3>Ngobrol Santai <span class="status upcoming">Upcoming</span></h3>
                        <p>Talkshow budaya lokal dan komunitas Klaten</p>
                        <div class="program-time">
                            <i class="far fa-clock"></i>
                            <span>15:00 - 16:00 WIB</span>
                            <span class="tag">Talkshow</span>
                            <span>Host: Sari Dewi</span>
                        </div>
                    </div>
                    <div class="program-item">
                        <h3>Berita Daerah <span class="status harian">Harian</span></h3>
                        <p>Update harian berita dan pengumuman resmi Pemkab Klaten</p>
                        <div class="program-time">
                            <i class="far fa-clock"></i>
                            <span>06:00, 12:00, 18:00 WIB</span>
                            <span class="tag">Berita</span>
                            <span>Host: Tim Redaksi</span>
                        </div>
                    </div>
                    <div class="schedule-table">
                        <h3><i class="far fa-calendar-alt"></i> Jadwal Mingguan</h3>
                        <div class="schedule-row">
                            <div class="schedule-day">Senin</div>
                            <div class="schedule-programs">
                                <div class="schedule-program">Senam Pagi</div>
                                <div class="schedule-program">Info Kesehatan</div>
                                <div class="schedule-program">Musik Nusantara</div>
                            </div>
                        </div>
                        <div class="schedule-row">
                            <div class="schedule-day">Selasa</div>
                            <div class="schedule-programs">
                                <div class="schedule-program">Suara Rakyat</div>
                                <div class="schedule-program">Ngobrol Santai</div>
                                <div class="schedule-program">Berita Malam</div>
                            </div>
                        </div>
                        <div class="schedule-row">
                            <div class="schedule-day">Rabu</div>
                            <div class="schedule-programs">
                                <div class="schedule-program">Program Anak</div>
                                <div class="schedule-program">Wisata Klaten</div>
                                <div class="schedule-program">Talk Show</div>
                            </div>
                        </div>
                        <div class="schedule-row">
                            <div class="schedule-day">Kamis</div>
                            <div class="schedule-programs">
                                <div class="schedule-program">Motivasi Pagi</div>
                                <div class="schedule-program">UMKM Corner</div>
                                <div class="schedule-program">Musik Klasik</div>
                            </div>
                        </div>
                        <div class="schedule-row">
                            <div class="schedule-day">Jumat</div>
                            <div class="schedule-programs">
                                <div class="schedule-program">Kajian Islami</div>
                                <div class="schedule-program">Budaya Lokal</div>
                                <div class="schedule-program">Request Song</div>
                            </div>
                        </div>
                        <div class="schedule-row">
                            <div class="schedule-day">Sabtu</div>
                            <div class="schedule-programs">
                                <div class="schedule-program">Weekend Special</div>
                                <div class="schedule-program">Sport Corner</div>
                                <div class="schedule-program">Nostalgia</div>
                            </div>
                        </div>
                        <div class="schedule-row">
                            <div class="schedule-day">Minggu</div>
                            <div class="schedule-programs">
                                <div class="schedule-program">Family Time</div>
                                <div class="schedule-program">Komunitas</div>
                                <div class="schedule-program">Easy Listening</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="studio-info">
                        <h3>Info Studio</h3>
                        <div class="studio-detail">
                            <span>Jam Siaran:</span>
                            <span>24/7</span>
                        </div>
                        <div class="studio-detail">
                            <span>Frekuensi:</span>
                            <span>FM 91.6 MHz</span>
                        </div>
                        <div class="studio-detail">
                            <span>Jangkauan:</span>
                            <span>Kabupaten Klaten</span>
                        </div>
                        <div class="studio-detail">
                            <span>Format:</span>
                            <span>Stereo</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-header" id="berita">
        <div class="custom-container">
            <h2>Berita Terkini</h2>
            <p>Informasi terkini dari Pemerintah Kabupaten Klaten, budaya lokal, dan aktivitas masyarakat</p>
        </div>
    </section>
    <section class="mb-5">
        <div class="custom-container">
            <div class="berita-tabs">
                <button class="berita-tab active">Berita Pemerintah</button>
                <button class="berita-tab">Budaya</button>
                <button class="berita-tab">Musik</button>
                <button class="berita-tab">Komunitas</button>
            </div>
            <div class="row g-4 mt-3">
                <div class="col-md-4">
                    <div class="berita-card">
                        <img src="https://via.placeholder.com/400x200" alt="Berita Pemerintah" class="berita-img">
                        <div class="berita-content">
                            <div class="berita-category">Ekonomi</div>
                            <div class="berita-title">Pemkab Klaten Luncurkan Program Digitalisasi UMKM</div>
                            <div class="berita-desc">Program bantuan digitalisasi untuk meningkatkan daya saing UMKM di
                                era digital
                            </div>
                            <div class="berita-meta">
                                <div><i class="far fa-calendar"></i> 15 Januari 2025</div>
                                <div><i class="far fa-eye"></i> 245</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="berita-card">
                        <div class="berita-content">
                            <div class="berita-category">Infrastruktur</div>
                            <div class="berita-title">Pembangunan Jalan Penghubung Desa Selesai</div>
                            <div class="berita-desc">Infrastruktur jalan sepanjang 5 km menghubungkan 3 desa di
                                Kecamatan Bayat
                            </div>
                            <div class="berita-meta">
                                <div><i class="far fa-calendar"></i> 14 Januari 2025</div>
                                <div><i class="far fa-eye"></i> 189</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="berita-card">
                        <div class="berita-content">
                            <div class="berita-category">Kesehatan</div>
                            <div class="berita-title">Vaksinasi COVID-19 Dosis Booster Tahap 2</div>
                            <div class="berita-desc">Pemkab Klaten menggelar vaksinasi booster untuk masyarakat umur
                                18+</div>
                            <div class="berita-meta">
                                <div><i class="far fa-calendar"></i> 13 Januari 2025</div>
                                <div><i class="far fa-eye"></i> 367</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <a href="#" class="view-more">Lihat Berita Lainnya</a>
        </div>
    </section>
    <section id="kontak" class="mb-5">
        <div class="custom-container">
            <div class="section-header text-center mb-4">
                <h2>Hubungi Kami</h2>
                <p>Sampaikan masukan, saran, atau pertanyaan Anda. Kami siap melayani dan mendengarkan aspirasi
                    masyarakat Klaten.</p>
            </div>
            <div class="row g-4">
                <div class="col-lg-8">
                    <div class="contact-section-card">
                        <h3 class="mb-4"><i class="fas fa-envelope me-2"></i> Formulir Masukan Warga</h3>
                        <form>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="namaLengkap" class="form-label"><strong>Nama Lengkap
                                            *</strong></label>
                                    <input type="text" class="form-control" id="namaLengkap"
                                        placeholder="Masukkan nama lengkap" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="nomorTelepon" class="form-label"><strong>Nomor
                                            Telepon</strong></label>
                                    <input type="tel" class="form-control" id="nomorTelepon"
                                        placeholder="08xx xxxx xxxx">
                                </div>
                                <div class="col-12">
                                    <label for="subjek" class="form-label"><strong>Subjek *</strong></label>
                                    <input type="text" class="form-control" id="subjek"
                                        placeholder="Ringkasan topik yang ingin disampaikan" required>
                                </div>
                                <div class="col-12">
                                    <label for="pesan" class="form-label"><strong>Pesan *</strong></label>
                                    <textarea class="form-control" id="pesan" rows="4"
                                        placeholder="Tuliskan pesan, saran, atau keluhan Anda di sini..." required></textarea>
                                </div>
                                <div class="col-md-6">
                                    <label for="email" class="form-label"><strong>Email</strong></label>
                                    <input type="email" class="form-control" id="email"
                                        placeholder="nama@email.com">
                                </div>
                                <div class="col-md-6">
                                    <label for="kategori" class="form-label"><strong>Kategori</strong></label>
                                    <select class="form-select" id="kategori">
                                        <option selected>Pilih kategori</option>
                                        <option value="1">Pengaduan</option>
                                        <option value="2">Saran</option>
                                        <option value="3">Permintaan Informasi</option>
                                        <option value="4">Kerjasama</option>
                                        <option value="5">Lainnya</option>
                                    </select>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end mt-4">
                                <button type="submit"
                                    class="btn btn-warning d-flex align-items-center px-4 py-2 fw-bold">
                                    <i class="fas fa-paper-plane me-2"></i> Kirim Pesan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="contact-section-card mb-4">
                        <h3 class="mb-4"><i class="fas fa-phone me-2"></i> Informasi Kontak</h3>
                        <div class="contact-detail-item">
                            <div class="contact-icon">
                                <i class="fas fa-phone-alt"></i>
                            </div>
                            <div class="contact-content">
                                <strong>Telepon</strong>
                                <div>(0272) 329450</div>
                            </div>
                        </div>
                        <div class="contact-detail-item">
                            <div class="contact-icon">
                                <i class="fab fa-whatsapp"></i>
                            </div>
                            <div class="contact-content">
                                <strong>WhatsApp</strong>
                                <div>+62889 0294 9093</div>
                            </div>
                        </div>
                        <div class="contact-detail-item">
                            <div class="contact-icon">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div class="contact-content">
                                <strong>Email</strong>
                                <div>klatenrspd@gmail.com</div>
                            </div>
                        </div>
                        <div class="contact-detail-item">
                            <div class="contact-icon">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div class="contact-content">
                                <strong>Alamat</strong>
                                <div>Jl. Pemuda No. 140</div>
                                <div>Klaten</div>
                            </div>
                        </div>
                    </div>
                    <div class="contact-section-card mb-4">
                        <h3 class="mb-4"><i class="far fa-clock me-2"></i> Jam Operasional</h3>
                        <div class="operational-hours">
                            <div class="d-flex justify-content-between mb-2">
                                <span>Senin - Jumat</span>
                                <span class="text-warning">06:00 - 24:00 WIB</span>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <span>Sabtu - Minggu</span>
                                <span class="text-warning">06:00 - 24:00 WIB</span>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <span>Siaran Langsung</span>
                                <span class="text-warning">24/7</span>
                            </div>
                            <div class="d-flex justify-content-between">
                                <span>Layanan Telepon</span>
                                <span class="text-warning">08:00 - 16:00 WIB</span>
                            </div>
                        </div>
                    </div>
                    <div class="contact-section-card">
                        <h3 class="mb-4"><i class="fas fa-map-marked-alt me-2"></i> Lokasi Studio</h3>
                        <div class="google-map-container">
                            <iframe 
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3953.859748804551!2d110.60146134920434!3d-7.698196672575521!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a43f9c0ef424d%3A0x439fcb157f7884f0!2sJl.%20Pemuda%20Utara%20No.140%2C%20Tegalputihan%2C%20Bareng%20Lor%2C%20Kec.%20Klaten%20Utara%2C%20Kabupaten%20Klaten%2C%20Jawa%20Tengah%2057414!5e0!3m2!1sid!2sid!4v1765877523529!5m2!1sid!2sid"
                                allowfullscreen="" 
                                loading="lazy" 
                                referrerpolicy="no-referrer-when-downgrade">
                            </iframe>
                            <div class="map-overlay"></div>
                            <div class="map-info">
                                <div>RSPD Klaten</div>
                                <div>Jl. Pemuda Utara No.140</div>
                            </div>
                        </div>
                        <a href="https://www.google.com/maps/place/Jl.+Pemuda+Utara+No.140,+Tegalputihan,+Bareng+Lor,+Kec.+Klaten+Utara,+Kabupaten+Klaten,+Jawa+Tengah+57414/@-7.6981967,110.6014613,17z/data=!3m1!4b1!4m6!3m5!1s0x2e7a43f9c0ef424d:0x439fcb157f7884f0!8m2!3d-7.6981967!4d110.6040362!16s%2Fg%2F11t3y_nszg?entry=ttu"
                            target="_blank" 
                            class="btn btn-outline-light w-100 d-flex align-items-center justify-content-center py-2">
                            <i class="fas fa-external-link-alt me-2"></i> Buka di Google Maps
                        </a>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-12">
                    <div class="note-banner">
                        <strong>Catatan:</strong> Untuk pengaduan yang bersifat mendesak atau darurat, silakan hubungi
                        langsung via
                        telepon atau datang ke kantor kami. Pesan melalui formulir akan direspon dalam 1x24 jam pada
                        hari kerja.
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer>
        <div class="custom-container">
            <div class="row g-4">
                <div class="col-lg-3 col-md-6">
                    <div class="footer-column">
                        <div class="d-flex align-items-center mb-3">
                            <i class="fas fa-wifi fs-4 me-2"></i>
                            <h3 class="mb-0">RSPD Klaten</h3>
                        </div>
                        <p>Radio Siaran Pemerintah Daerah</p>
                        <p>Radio Siaran Pemerintah Daerah Klaten - Menyajikan informasi resmi, program berkualitas, dan
                            hiburan untuk masyarakat Klaten sejak 1995.</p>
                        <div class="footer-contact">
                            <p><i class="fas fa-map-marker-alt me-2"></i> Jl. Pemuda No. 140, Klaten</p>
                            <p><i class="fas fa-phone me-2"></i> (0272) 329450</p>
                            <p><i class="fas fa-envelope me-2"></i> klatenrspd@gmail.com</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="footer-column">
                        <h3>Link Penting</h3>
                        <ul class="footer-links">
                            <li><a href="#">Portal Resmi Pemkab Klaten</a></li>
                            <li><a href="#">Layanan Pajak Online</a></li>
                            <li><a href="#">Perizinan Online</a></li>
                            <li><a href="#">Layanan Kesehatan</a></li>
                            <li><a href="#">Info UMKM</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="footer-column">
                        <h3>Layanan Radio</h3>
                        <ul class="footer-links">
                            <li><a href="#">Live Streaming</a></li>
                            <li><a href="#">Podcast Archive</a></li>
                            <li><a href="#">Program Schedule</a></li>
                            <li><a href="#">News & Updates</a></li>
                            <li><a href="#">Contact Us</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="footer-column">
                        <h3>Ikuti Kami</h3>
                        <div class="social-icons">
                            <a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a>
                            <a href="#" class="social-icon"><i class="fab fa-twitter"></i></a>
                            <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
                            <a href="#" class="social-icon"><i class="fab fa-youtube"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div>© 2025 RSPD Klaten - Radio Siaran Pemerintah Daerah Kabupaten Klaten. Hak cipta dilindungi
                    undang-undang.</div>
                <div>
                    <a href="#">Kebijakan Privasi</a>
                    <a href="#">Syarat & Ketentuan</a>
                    <a href="#">Login Staff</a>
                </div>
            </div>
        </div>
    </footer>

    <audio id="radioStream" preload="none"></audio>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const radioStream = document.getElementById('radioStream');
            const playButton = document.getElementById('playButton');
            const playIcon = document.getElementById('playIcon');
            const headerLiveRadio = document.getElementById('headerLiveRadio');
            const volumeSlider = document.getElementById('volumeSlider');
            const volumeIcon = document.getElementById('volumeIcon');
            const streamingStatus = document.getElementById('streamingStatus');
            const statusText = document.getElementById('statusText');
            const statusIndicator = document.getElementById('statusIndicator');

            const streamUrl = "https://studio1.indostreamers.com:8020/stream";

            let isPlaying = false;

            radioStream.src = streamUrl;
            radioStream.volume = volumeSlider.value / 100;

            function updateVolumeIcon(volume) {
                if (volume === 0) {
                    volumeIcon.className = "fas fa-volume-mute volume-icon";
                } else if (volume < 0.5) {
                    volumeIcon.className = "fas fa-volume-down volume-icon";
                } else {
                    volumeIcon.className = "fas fa-volume-up volume-icon";
                }
            }

            function updateStatus(playing, message) {
                isPlaying = playing;
                statusText.textContent = message;

                if (playing) {
                    playIcon.className = "fas fa-pause";
                    playButton.classList.add('playing');
                    statusIndicator.classList.add('playing');
                    statusIndicator.style.backgroundColor = '#00ff00';
                } else {
                    playIcon.className = "fas fa-play";
                    playButton.classList.remove('playing');
                    statusIndicator.classList.remove('playing');
                    statusIndicator.style.backgroundColor = 'var(--red)';
                }
            }

            function togglePlayback() {
                if (isPlaying) {
                    radioStream.pause();
                    updateStatus(false, "Radio Paused - Klik tombol play untuk melanjutkan");
                } else {
                    radioStream.play().then(() => {
                        updateStatus(true, "Radio Streaming Live - RSPD Klaten FM 91.6 MHz");
                    }).catch(error => {
                        console.error("Error playing audio:", error);
                        updateStatus(false, "Error: Gagal memulai streaming. Coba lagi.");

                        if (error.name === 'NotSupportedError' || error.name === 'TypeError') {
                            setTimeout(() => {
                                radioStream.load();
                                radioStream.play().then(() => {
                                    updateStatus(true,
                                        "Radio Streaming Live - RSPD Klaten FM 91.6 MHz"
                                    );
                                }).catch(err => {
                                    console.error("Second attempt failed:", err);
                                    updateStatus(false,
                                        "Error: Browser tidak mendukung streaming audio. Coba browser lain."
                                    );
                                });
                            }, 500);
                        }
                    });
                }
            }

            playButton.addEventListener('click', togglePlayback);
            headerLiveRadio.addEventListener('click', function(e) {
                e.preventDefault();
                togglePlayback();
            });

            volumeSlider.addEventListener('input', function() {
                const volume = this.value / 100;
                radioStream.volume = volume;
                updateVolumeIcon(volume);

                localStorage.setItem('radioVolume', volume);
            });

            const savedVolume = localStorage.getItem('radioVolume');
            if (savedVolume !== null) {
                const volume = parseFloat(savedVolume);
                volumeSlider.value = volume * 100;
                radioStream.volume = volume;
                updateVolumeIcon(volume);
            }

            radioStream.addEventListener('playing', function() {
                updateStatus(true, "Radio Streaming Live - RSPD Klaten FM 91.6 MHz");
            });

            radioStream.addEventListener('pause', function() {
                if (!radioStream.ended) {
                    updateStatus(false, "Radio Paused - Klik tombol play untuk melanjutkan");
                }
            });

            radioStream.addEventListener('ended', function() {
                updateStatus(false, "Streaming ended - Klik tombol play untuk memulai kembali");
            });

            radioStream.addEventListener('error', function(e) {
                console.error("Audio error:", radioStream.error);
                updateStatus(false, "Error: Gagal memuat stream. Coba refresh halaman.");
            });

            radioStream.addEventListener('waiting', function() {
                statusText.textContent = "Buffering... Harap tunggu";
            });

            const tabs = document.querySelectorAll('.berita-tab');
            tabs.forEach(tab => {
                tab.addEventListener('click', function() {
                    tabs.forEach(t => t.classList.remove('active'));
                    this.classList.add('active');
                });
            });

            const mobileMenuBtn = document.getElementById('mobileMenuBtn');
            const mainNav = document.getElementById('mainNav');
            if (mobileMenuBtn && mainNav) {
                mobileMenuBtn.addEventListener('click', function() {
                    mainNav.classList.toggle('show');
                    const icon = this.querySelector('i');
                    if (icon.classList.contains('fa-bars')) {
                        icon.classList.remove('fa-bars');
                        icon.classList.add('fa-times');
                    } else {
                        icon.classList.remove('fa-times');
                        icon.classList.add('fa-bars');
                    }
                });

                document.addEventListener('click', function(event) {
                    if (!event.target.closest('.nav-container') && mainNav.classList.contains('show')) {
                        mainNav.classList.remove('show');
                        const icon = mobileMenuBtn.querySelector('i');
                        icon.classList.remove('fa-times');
                        icon.classList.add('fa-bars');
                    }
                });

                const navLinks = mainNav.querySelectorAll('.nav-link');
                navLinks.forEach(link => {
                    link.addEventListener('click', function() {
                        mainNav.classList.remove('show');
                        const icon = mobileMenuBtn.querySelector('i');
                        icon.classList.remove('fa-times');
                        icon.classList.add('fa-bars');
                    });
                });
            }

            function adjustBodyPadding() {
                const stickyHeader = document.querySelector('.sticky-header');
                if (stickyHeader) {
                    const headerHeight = stickyHeader.offsetHeight;
                    document.body.style.paddingTop = headerHeight + 'px';
                }
            }

            window.addEventListener('load', adjustBodyPadding);
            window.addEventListener('resize', adjustBodyPadding);
            adjustBodyPadding();

            document.querySelectorAll('.custom-nav .nav-link').forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();

                    const targetId = this.getAttribute('href');
                    if (targetId === '#home') {
                        window.scrollTo({
                            top: 0,
                            behavior: 'smooth'
                        });
                    } else if (targetId.startsWith('#')) {
                        const targetElement = document.querySelector(targetId);
                        if (targetElement) {
                            const sectionHeader = targetElement.querySelector('h2');

                            let scrollPosition;
                            if (sectionHeader) {
                                const headerHeight = document.querySelector('.sticky-header')
                                    .offsetHeight;
                                const sectionTop = sectionHeader.getBoundingClientRect().top;
                                const currentScroll = window.pageYOffset;

                                scrollPosition = currentScroll + sectionTop - headerHeight - 20;
                            } else {
                                const headerHeight = document.querySelector('.sticky-header')
                                    .offsetHeight;
                                const sectionTop = targetElement.getBoundingClientRect().top;
                                const currentScroll = window.pageYOffset;

                                scrollPosition = currentScroll + sectionTop - headerHeight;
                            }

                            window.scrollTo({
                                top: scrollPosition,
                                behavior: 'smooth'
                            });
                        }
                    }
                });
            });

            const hearButton = document.getElementById('hearButton');
            const chatButton = document.getElementById('chatButton');
            const livechatButton = document.getElementById('livechatButton');

            hearButton.addEventListener('click', function() {
                togglePlayback();
            });

            chatButton.addEventListener('click', function() {
                alert('Fitur chat akan segera hadir!');
            });

            livechatButton.addEventListener('click', function() {
                alert('Live chat tersedia pada jam siaran interaktif.');
            });

            updateStatus(false, "Radio Offline - Klik tombol play untuk memulai streaming");
        });
    </script>
</body>

</html>
