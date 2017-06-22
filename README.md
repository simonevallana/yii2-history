Yii2 history
============
This extension saves ActiveRecord attribute update/create/remove logs in db.
Attribute changes are converted to json and stores as single row for single ActiveRecord in 'history' table.

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist erkebulan69/yii2-history "*"
```

or add

```
"erkebulan69/yii2-history": "*"
```

to the require section of your `composer.json` file.


Usage
-----

Once the extension is installed, run migration in terminal:

```php
php yii migrate --migrationPath=@boolean/history/migrations
```

Configure History component in backend config (if UI History is not necessary, skip this step):

```php
'modules' => [
    'history' => [
        'class' => \boolean\history\Module::className(),
    ],
],
```

Go to  ```http:://backend.yourdomain.com/history``` in order to watch history logs (if module is configured)

Usage for model as behavior:

Simple:
```php
public function behaviors()
{
    return [
        \boolean\history\HistoryBehavior::className(),
        ...
    ];
}
```

Configurable:
```php
public function behaviors()
{
    return [
        'history' => [
            'class' => HistoryBehavior::className(),
            'skipAttributes' => ['updated_at'] // attributes, that should be ignored
        ],
        ...
    ];
}
```