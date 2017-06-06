# mia-mail-zf3
The library that send email.

# Configuración SendGrid

1. Agregar API_KEY de SendGrid:

```php
'sendgrid' => [
    'api_key' => 'API_KEY_HERE',
    'from' => 'no-reply@mobileia.com',
    'name' => 'MobileIA',
    'reply_to' => 'admin@mobileia.com',
    'template_folder' => __DIR__ . '/../view/email/',
]
```