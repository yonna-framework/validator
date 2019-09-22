[![License](https://img.shields.io/github/license/yonna-framework/validator.svg)](https://packagist.org/packages/yonna/validator)
[![Repo Size](https://img.shields.io/github/repo-size/yonna-framework/validator.svg)](https://packagist.org/packages/yonna/validator)
[![Downloads](https://img.shields.io/packagist/dm/yonna/validator.svg)](https://packagist.org/packages/yonna/validator)
[![Version](https://img.shields.io/github/release/yonna-framework/validator.svg)](https://packagist.org/packages/yonna/validator)
[![Php](https://img.shields.io/packagist/php-v/yonna/validator.svg)](https://packagist.org/packages/yonna/validator)

## Yonna validator库

```
validator 协助你处理数据校验
```

## 

#### 如何安装

##### 可以通过composer安装：`composer require yonna/validator`

##### 可以通过git下载：`git clone https://github.com/yonna-framework/validator.git`

> Yonna demo：[GOTO yonna](https://github.com/yonna-framework/yonna)

#### array
```php
<?php
use Yonna\Validator\ArrayValidator;

ArrayValidator::required($this->input(), ['uid', 'login_name'], function ($error) {
    Exception::params($error);
});

ArrayValidator::integer($this->input(), ['qty', 'views'], 0, 10000, function ($error) {
    Exception::params($error);
});

ArrayValidator::multiple(
    $this->input(),
    [
        'uid' => [
            'required' => true,
        ],
        'quantity' => [
            'type' => 'int',
            'min' => 1,
            'max' => 10,
        ],
        'some_list' => [
            'type' => 'array',
        ],
    ],
    function ($error) {
        Exception::params($error);
    }
);
?>
```