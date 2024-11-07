# lara-train

#### 项目介绍

- Laravel语法训练，基于PHP7.2版本，起于2024年11月04日。

#### PHP介绍

- PHP是一门解释性语言，是服务端语言，在程序run时解释器将代码实时转换为机器码，从而执行，所以可以热加载
- PHP支持OOP思想，PHP3版本支持类文件引入(require和include)，PHP5版本引入spl机制自动加载函数,__autoload()函数在7版本废弃。
- PHP语言本身不支持并发

#### PHP业务

- 编写脚本、连接数据库、文件操作、自动化处理等。
- 提供小程序、网页、APP等服务接口，并编写处理数据和业务逻辑的部分，目前大部分用于此。

#### PHP运行

```php
// 脚本运行
php xxx.php
// 切到项目目录，启动Web服务
php -S localhost:8000 public/index.php
// Laravel项目启动指定读取的配置文件 APP_ENV在配置文件中设置
php artisan serve --env={'APP_ENV'} --port=8090
// 生成表单请求类
php artisan make:request LoginRequest
// 生成控制器类
php artisan make:controller LoginController
// 在 Feature 目录下创建一个测试类...
php artisan make:test UserTest
// 在 Unit 目录下创建一个测试类...
php artisan make:test UserTest --unit
```

#### COR
// 责任链模式，COR简称
chain of responsibility pattern

#### 附录

- https://www.php.net/manual/zh/
- https://learnku.com/docs/psr/psr-12-extended-coding-style-guide/5789#5d9b22
- https://docs.golaravel.com/docs/5.8/installation
- https://web.archive.org/web/20240305063021/http://www.simplesoftware.io/#/docs-usage
