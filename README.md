# Criar o projeto
composer create-project laravel/laravel telegram-bot-laravel
cd telegram-bot-laravel

# Copiar os arquivos gerados acima para as respectivas pastas

# Instalar dependências adicionais
composer require laravel/sanctum
composer require guzzlehttp/guzzle

# Publicar configurações
php artisan vendor:publish --provider="Laravel\Sanctum\SanctumServiceProvider"

# Executar migrations
php artisan migrate

# Executar seeders
php artisan db:seed
php artisan bot:seed-settings

# Configurar webhook
php artisan telegram:set-webhook

# Agendar verificação de expiração (adicionar ao cron)
# * * * * * php /path-to-project/artisan schedule:run >> /dev/null 2>&1