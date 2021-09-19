# Avatary

Avatary is a simple API to generate avatars based on initials

## Installation

Clone the repository
```bash
git clone https://github.com/prettifystudio/avatary && cd avatary
```
Install the dependencies

```bash
composer install
```

Setup the environment

```bash
cp .env.example .env
```
Generte the application key

```bash
php artisan key:generate
```

& Finally 

```bash
php artisan serve
```






## Usage

The API is simple, you hit the endpoint <pre>GET [127.0.0.1:8000/api/initials](127.0.0.1:8000/api/initials) </pre>
Sending the request without any params will return an image with random background colors. <br>
But you can customize the generated image.

### params

```
```

## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

Please make sure to update tests as appropriate.

## License
[MIT](https://choosealicense.com/licenses/mit/)