# mia-mail-zf3
The library that send email.

# Instalación libreria

1. Agregar libreria en composer.json:
```json
"mobileia/mia-mail-zf3": "^0.0"
```

2. Activar modulo en ZF3 (modules.config.php):
```php
'MIAEmail',
```

# Configuración SendGrid

1. Agregar API_KEY de SendGrid:

```php
'sendgrid' => [
    'api_key' => 'API_KEY_HERE',
    'from' => 'no-reply@mobileia.com',
    'name' => 'MobileIA',
    'reply_to' => 'admin@mobileia.com',
    'template_folder' => __DIR__ . '/../view/email/',
    'base_url' => 'http://ohduty.mobileia.com/'
]
```

2. Ver Previsualizador de emails