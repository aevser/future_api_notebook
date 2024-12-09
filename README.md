# Демонстрационный проект

Создан с целью демонстрации умения работать с фреймворком. 
Представлено 8 записей в локальной БД: Sqlite. 
Вывод всех записей с пагинацией по 4 элемента. 
Стандартные методы CRUD. 

1. api/v1/notebook - получаем все записи [GET]
2. api/v1/notebook/{id} - получаем все записи [GET]
3. api/v1/notebook - получаем все записи [POST]
4. api/v1/notebook/{id} - получаем все записи [PUT]
5. api/v1/notebook/{id} - получаем все записи [DELETE]

# Запустить проект

1. git clone 
2. composer install
3. cp .env.example .env
4. php artisan migrate
5. php artisan db:seed --Class=DatabaseSeeder
6. php artisan serve

