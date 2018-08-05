
# Blog

基于`Laravel 5.5*` 和 `Vuejs 2.*`的开源博客 

## Basic Features

- Manage users, articles, discussions and media
- Statistical tables
- Categorize articles
- Label classification
- Content moderation
- Own comments system
- Multi-language switching
- Markdown Editor
- and more...

[ainiok](https://github.com/ainiok/blog) Laravel 5.*

## Server Requirements

- PHP >= 7.0.0
- Node >= 6.x
- OpenSSL PHP Extension
- PDO PHP Extension
- Mbstring PHP Extension
- Tokenizer PHP Extension
- XML PHP Extension


## Install

### 1. Clone the source code or create new project.

```shell
git clone https://github.com/ainiok/blog.git
```

OR

```shell
composer create-project 
```

### 2. Set the basic config

```shell
cp .env.example .env
```

Edit the `.env` file and set the `database` and other config for the system after you copy the `.env`.example file.

### 2. Install the extended package dependency.

Install the `Laravel` extended repositories: 

```shell
composer install -vvv
```

Install the `Vuejs` extended repositories: 

```shel
npm install
```

Compile the js code: 

```shel
npm run dev

// OR

npm run watch

// OR

npm run production
```

### 3. Run the blog install command, the command will run the `migrate` command and generate test data.

```shell
php artisan blog:install
```

## Contributors

- [ainiok](http://github.com/ainiok)

## Thanks

## License

The project is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).


## 安装需要注意的问题

- storage/oauth-private.key 的权限必须是600 或660
- storage/oauth-public.key  的权限可以是755 或 777