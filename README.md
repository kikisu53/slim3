# [Slim 3.0 doc](https://www.slimframework.com/docs/) 練習的步驟和心得

## 用 composer 安裝 slim/slim "^3.0"
1. 建立名為 slim3 的資料夾
2. 確認 php.ini 裡面的 `extension=php_openssl.dll` 沒有註解掉。
3. 開啟終端機，在資料夾 slim3　的路徑下，輸入指令 `composer require slim/slim "^3.0"`。

## 啟動
1. 在 slim3 裡，建立一個新資料夾 www 。
2. 在 www 裡，建立一個 index.php 。
3. 第一行務必引入  `require __DIR__ . '/../vendor/autoload.php';`。
    * __DIR__ ：目前檔案所在的路徑，為　PHP 5.3 的新常數。（可不用）
4. 將 [Home](https://www.slimframework.com/docs/) Figure 1: example Slim application 的程式碼貼到下方。
5. 終端機指令 `php -S localhost:8080 -t www www/index.php` 啟動伺服器。
6. 瀏覽器網址列，輸入 http://localhost:8080/hello/123 ，頁面顯示 Hello 123 。

##　[伺服器設定](https://www.slimframework.com/docs/start/web-servers.html)
==Apache 語法參考==
1. https://blog.hinablue.me/apache-note-about-some-rewrite-note-2011-05/
2. 搜尋關鍵字： .htaccess , RewriteCond, RewriteRule

## Configuration ( index.php 中的 $config ) 獨立為一個檔案
1. 在 slim3 裡，建立一個新資料夾 config 。
2. 在 config 裡，建立一個 config.php 。
3. 輸入相關的設定，例如
    * displayErrorDetails = true  // set to false in production
    * addContentLengthHeader = false  // Allow the web server to send the content-length header
4. 格式
    * $config['displayErrorDetails'] = true;
      $config['addContentLengthHeader'] = false;
      $config['db']['host']   = "localhost";
      $config['db']['user']   = "user";
      $config['db']['pass']   = "password";
      $config['db']['dbname'] = "exampleapp";
    * $config = [
        'settings' => [
            'displayErrorDetails' => true,
            'addContentLengthHeader' => false,
            'db' => [
                'host' => 'localhost',
                'user' => 'user',
                'pass' => 'password',
                'dbnmae' => 'exampleapp',
            ],
        ],
    ];
5. 最後一行： ` return $config; `
6. 引用的時候， `$config = require __DIR__ . '/../config/config.php';`


<<<<<<< HEAD
## Autoload (需安裝 Composer ) 和　Namespace
> psr-4, files, classmap (psr-0 已經停用)
1. [Composer的自动加载（autoload），dependencyautoload](http://www.bkjia.com/PHPjc/865616.html)
1. [PHP系列 - Autoload 自動載入](http://justericgg.logdown.com/posts/196891-php-series-autoload)
2. [COMPOSER設計原理與基本用法 autoload](http://blog.turn.tw/?tag=autoload)
3. [代碼、原始碼寫作風格 PSR-4 - PHP編碼規範](http://blog.webgolds.com/view/230#PSR-4)
4. [php – Compoer – 非常簡單的使用 psr-4 來建立自動讀取類別](http://jsnwork.kiiuo.com/archives/2618/php-compoer-%e9%9d%9e%e5%b8%b8%e7%b0%a1%e5%96%ae%e7%9a%84%e4%bd%bf%e7%94%a8-psr-4-%e4%be%86%e5%bb%ba%e7%ab%8b%e8%87%aa%e5%8b%95%e8%ae%80%e5%8f%96%e9%a1%9e%e5%88%a5)
http://blog.tonycube.com/2016/09/php-psr-4-autoloader.html
## Autoload (需安裝 Composer ) 和　Namespace
> psr-4, files, classmap (psr-0 已經停用)
4. [Composer 使用 psr-4 來建立自動讀取類別](http://jsnwork.kiiuo.com/archives/2618/php-compoer-%e9%9d%9e%e5%b8%b8%e7%b0%a1%e5%96%ae%e7%9a%84%e4%bd%bf%e7%94%a8-psr-4-%e4%be%86%e5%bb%ba%e7%ab%8b%e8%87%aa%e5%8b%95%e8%ae%80%e5%8f%96%e9%a1%9e%e5%88%a5)
=======
## Autoload 和　Namespace
### 指令
1. 終端機指令 composer dump-autoload (需安裝 Composer )
    * 每次修改 composer.json 的 autoload 或 autoload-dev 後，一定要執行 `composer dump-autoload` 。
2. PHP 函數：`__autoload()`, `sql_autoload_register()`, `sql_autoload()` 。(PHP 5 以上支援)
    * 參考 vendor 裡面的 autoload.php 和 coomposer/* 。
### 分類 1. PSR-4, PSR-0 (psr-0 已經停用)
    ```
        "autoload": {
            "psr-4": {
                "Pro\\": "controllers/"
            },
            "psr-0": {
                "Pro\\": "controllers/"
            }
        }
    ```
1. psr-4：試圖加載 Pro 這個 class 的時候，會去 `../controllers` 資料夾裡面找。
2. psr-0：試圖加載 Pro 這個 class 的時候，會去 `../controllers/pro` 資料夾裡面找。
3. 命名空間的結尾必須加上 `\\` ，以防出現 Pro 對應到 Project。 


### 分類 2. Classmap, Files
### Reference
4. [php – Compoer – 非常簡單的使用 psr-4 來建立自動讀取類別](http://jsnwork.kiiuo.com/archives/2618/php-compoer-%e9%9d%9e%e5%b8%b8%e7%b0%a1%e5%96%ae%e7%9a%84%e4%bd%bf%e7%94%a8-psr-4-%e4%be%86%e5%bb%ba%e7%ab%8b%e8%87%aa%e5%8b%95%e8%ae%80%e5%8f%96%e9%a1%9e%e5%88%a5)
>>>>>>> b3e7d9c972edcca96f27521baabaa2b27e748dd3
1. [Composer的自动加载（autoload），dependencyautoload](http://www.bkjia.com/PHPjc/865616.html)
1. [PHP系列 - Autoload 自動載入](http://justericgg.logdown.com/posts/196891-php-series-autoload)
2. [COMPOSER設計原理與基本用法 autoload](http://blog.turn.tw/?tag=autoload)
3. [代碼、原始碼寫作風格 PSR-4 - PHP編碼規範](http://blog.webgolds.com/view/230#PSR-4)
<<<<<<< HEAD
https://ahesanalisuthar.wordpress.com/2014/10/18/composer-part-1-autoload-manager-for-php-code/
https://jsnwork.kiiuo.com/archives/2622/php-codeigniter-%e5%ae%89%e8%a3%9d%e4%b8%a6%e4%bd%bf%e7%94%a8-composer-%e8%87%aa%e5%8b%95%e8%bc%89%e5%85%a5%e5%ae%8c%e6%95%b4%e6%ad%a5%e9%a9%9f#autoload
https://laravel-china.org/topics/1002/deep-composer-autoload

composer dump-autoload

## Route
 return
=======


https://jsnwork.kiiuo.com/archives/2622/php-codeigniter-%e5%ae%89%e8%a3%9d%e4%b8%a6%e4%bd%bf%e7%94%a8-composer-%e8%87%aa%e5%8b%95%e8%bc%89%e5%85%a5%e5%ae%8c%e6%95%b4%e6%ad%a5%e9%a9%9f#autoload
https://laravel-china.org/topics/1002/deep-composer-autoload

http://blog.csdn.net/sky_zhe/article/details/38615615
## Route
 return 
>>>>>>> b3e7d9c972edcca96f27521baabaa2b27e748dd3
