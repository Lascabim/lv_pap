# Description

This is my backend project for my PAP, along with my React Native Application, I´m creating a running app.

# Run Project

- Run Laravel Project after the migrations and seeders in the correct IP and PORT

```
php artisan migrate:fresh --seed
php artisan serve --host 192.168.1.189 --port 8000
```

- Run Ngrok

```
ngrok http 192.168.1.189:8000
```