# Чат (тестовое)

Это простое приложение чата, созданное с использованием Laravel, Vue.js и Pusher. 

## Начало работы

Клонируйте репозиторий проекта с помощью следующей команды, если вы используете SSH

```bash
git clone git@github.com:
```

После клонирования выполните:

```bash
composer install
```

Дублируйте .env.example и переименуйте его в .env

Затем выполните:

```bash
php artisan key:generate
```

### Подготовка

#### Настройка Pusher

Если у вас его еще нет, создайте бесплатную учетную запись Pusher по адресу https://pusher.com/signup, затем войдите в свой аккаунт и создайте приложение.

Установите BROADCAST_DRIVER в вашем файле .env на pusher:

```txt
BROADCAST_DRIVER=pusher
```

Затем заполните учетные данные вашего приложения Pusher в вашем файле .env:

```txt
PUSHER_APP_ID=xxxxxx
PUSHER_APP_KEY=xxxxxxxxxxxxxxxxxxxx
PUSHER_APP_SECRET=xxxxxxxxxxxxxxxxxxxx
PUSHER_APP_CLUSTER=
```

#### Миграции базы данных

Убедитесь, что вы заполнили детали вашей базы данных в вашем файле .env перед запуском миграций:

```bash
php artisan migrate
```

И запустите приложение:

```bash
php artisan serve
```

и посетите http://localhost:8000/, чтобы увидеть приложение в действии.

## Создано с использованием

* [Pusher](https://pusher.com/) - API для создания реального времени
* [Laravel](https://laravel.com) - PHP-фреймворк
* [Vue.js](https://vuejs.org) - JavaScript-фреймворк

## Разработчик

* Степанов Дмитрий Игоревич 