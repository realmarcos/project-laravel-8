# 📘 **Tutorial: Criando um CRUD Completo no Laravel**

## 🚀 **1. Preparando o Ambiente**

Antes de tudo, você precisa ter instalado:

* **PHP 7.x ou superior**
* **Composer**
* **MySQL ou MariaDB**
* **Laravel 10+** (ou versão atual)

### ✔ Criar um novo projeto Laravel

```bash
composer create-project laravel/laravel crud-laravel
cd crud-laravel
```

---

# 🗄 **2. Criando o Banco de Dados e Configurando o .env**

Crie um banco no MySQL:

```sql
CREATE DATABASE crud_laravel;
```

No arquivo **.env**, ajuste:

```
DB_DATABASE=crud_laravel
DB_USERNAME=seu_usuario
DB_PASSWORD=sua_senha
```

---

# 📦 **3. Criar a Migration, Model e Controller**

Vamos criar um CRUD de **Produtos** como exemplo.

### ✔ Gerar Model com Migration e Controller RESTful

```bash
php artisan make:model Product -mc
php artisan make:controller ProductController --resource
```

Isso gerou:

* `app/Models/Product.php`
* `database/migrations/xxxx_create_products_table.php`
* `app/Http/Controllers/ProductController.php`

---

# 🛠 **4. Definir os Campos na Migration**

Edite a migration:

```php
public function up(): void
{
    Schema::create('products', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->text('description')->nullable();
        $table->decimal('price', 10, 2);
        $table->timestamps();
    });
}
```

### ✔ Rodar a migration

```bash
php artisan migrate
```

---

# 🧠 **5. Definir os Atributos no Model**

Arquivo: `app/Models/Product.php`

```php
class Product extends Model
{
    protected $fillable = [
        'name',
        'description',
        'price',
    ];
}
```

---

# 📍 **6. Criar as Rotas**

Arquivo: `routes/web.php`

```php
use App\Http\Controllers\ProductController;

Route::resource('products', ProductController::class);
```

Essa única linha já cria todas as rotas de CRUD:

| Método | Rota                | Ação    |
| ------ | ------------------- | ------- |
| GET    | /products           | index   |
| GET    | /products/create    | create  |
| POST   | /products           | store   |
| GET    | /products/{id}      | show    |
| GET    | /products/{id}/edit | edit    |
| PUT    | /products/{id}      | update  |
| DELETE | /products/{id}      | destroy |

---


## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
