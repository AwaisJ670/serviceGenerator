![Laravel Service Generator](https://banners.beyondco.de/Service%20Generator%20Tool.png?theme=dark&packageManager=composer+require&packageName=codebider%2Fservice-generator-tool&pattern=zigZag&style=style_1&description=This+can+make+a+service+in+laravel+projects.&md=1&showWatermark=1&fontSize=100px&images=https%3A%2F%2Flaravel.com%2Fimg%2Flogomark.min.svg)


![Packagist Downloads](https://img.shields.io/packagist/dt/codebider/service-generator-tool)
![Packagist Version](https://img.shields.io/packagist/v/codebider/service-generator-tool)
# Laravel Service Generator

[![License: MIT](https://img.shields.io/badge/license-MIT-blue.svg)](LICENSE)

A simple yet powerful Laravel package to generate service classes using an Artisan command.

---

## 📦 Installation

You can install the package via Composer:

```bash
composer require codebider/service-generator-tool
```

If you’re using Laravel < 5.5, add the service provider manually in `config/app.php`:

```php
'providers' => [
    CodeBider\ServiceGenerator\ServiceGeneratorServiceProvider::class,
];
```

---

## ⚙️ Configuration (Optional)

You can publish the config and stub file using:

```bash
php artisan vendor:publish --provider="CodeBider\ServiceGenerator\ServiceGeneratorServiceProvider"
```

This will publish:

- `config/service-generator.php`
- `stubs/service.stub`

---

## 🧪 Usage

Generate a new service class using:

```bash
php artisan make:service {name}
php artisan make:service InventoryService
```

This will create the service class in the configured path named as InventoryService  (default: `app/Services`).

---

## 🛠 Configuration Options

File: `config/service-generator.php`

```php
return [
    'namespace' => 'App\\Services',
    'path' => app_path('Services'),
];
```

---

## ✏️ Custom Stub

By default, the package provides a `service.stub` file. You can customize the stub by modifying the published file:

```
/stubs/service.stub
```

The stub supports two variables:

- `{{ namespace }}`
- `{{ class }}`

Example stub:

```php
<?php

namespace {{ namespace }};

class {{ class }}
{
    //
}
```

---

## ✅ Testing

```bash
composer test
```

---

## 📄 License

This package is open-sourced software licensed under the [MIT license](LICENSE).

---

## 👤 Author

Developed with ❤️ by [Awais Javaid](mailto:info.awaisjavaid@gmail.com)  
📦 Package: `codebider/service-generator`

---

## 🤝 Contributing

Contributions are welcome! Please feel free to submit a Pull Request or open an issue.
