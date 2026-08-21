Write-Host "Starting Laravel server..." -ForegroundColor Green
$laravel = Start-Process -FilePath "php" -ArgumentList "artisan serve" -WorkingDirectory "C:\xampp\htdocs\charm-laravel" -NoNewWindow -PassThru

Start-Sleep -Seconds 3

Write-Host "Starting ngrok tunnel to http://127.0.0.1:8000 ..." -ForegroundColor Green
$ngrok = Start-Process -FilePath "C:\ngrok\ngrok.exe" -ArgumentList "http 8000" -NoNewWindow -PassThru

Write-Host ""
Write-Host "========================================" -ForegroundColor Yellow
Write-Host "Laravel is running on http://127.0.0.1:8000" -ForegroundColor Cyan
Write-Host "ngrok URL will appear in the ngrok window" -ForegroundColor Cyan
Write-Host "Press Ctrl+C in both windows to stop" -ForegroundColor Yellow
Write-Host "========================================" -ForegroundColor Yellow
