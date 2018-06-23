# Laravel Blade Directives

A personal collection of Laravel blade directives.

## Install

Via Composer

``` bash
$ composer require stekel/laravel-blade-directives
```

## Directives

| Function      | Description   |
| ------------- | ------------- |
| `@inputValue($model, $attribute)` | Displays form input value, either from the given `$model->$attribute` or from the value of `old($attribute)` |
| `@optionValue($model, $attribute, $default)` | Sets the select option to "selected", either from the given `$model->$attribute` or from the value of `old($attribute)` |
| `@checkboxValue($model, $attribute)` | Sets the checkbox to "checked", either from the given `$model->$attribute` or from the value of `old($attribute)` |
| `@checkboxValueFromArray($model, $attribute, $array)` | Sets the checkbox to "checked", if `$array` contains either `$model->id` or `old($attribute)` |