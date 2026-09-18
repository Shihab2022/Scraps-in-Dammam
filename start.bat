@echo off
title Scraps Buyer in Saudi Arabia - Local Dev Server
cd /d "%~dp0"

rem ---- Locate PHP (PATH first, then common XAMPP location) ----
set PHP_CMD=php
where php >nul 2>&1
if errorlevel 1 (
    if exist "C:\xampp\php\php.exe" (
        set PHP_CMD=C:\xampp\php\php.exe
    ) else (
        echo [ERROR] PHP was not found. Install XAMPP ^(https://www.apachefriends.org^)
        echo or add PHP to your PATH, then run this file again.
        pause
        exit /b 1
    )
)

echo ============================================
echo  Scraps Buyer in Saudi Arabia - local development server
echo ============================================
echo  PHP:  %PHP_CMD%
echo  URL:  http://localhost:8000
echo  Admin: http://localhost:8000/admin  ^(first run: /admin/install^)
echo  Stop: press Ctrl+C in this window
echo ============================================
start "" http://localhost:8000/
%PHP_CMD% -S localhost:8000 router.php