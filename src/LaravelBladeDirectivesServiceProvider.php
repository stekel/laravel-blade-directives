<?php

namespace stekel\LaravelBladeDirectives;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class LaravelBladeDirectivesServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::directive('inputValue', function ($expression) {
            
            list($model, $parameter) = explode(',',str_replace(['(',')',' '], '', $expression));
            $parameter = str_replace(["'", '"'], '', $parameter);
            
            return "<?php if(isset($model)) echo e(old('$parameter', $model->$parameter)); else echo e(old('$parameter')); ?>";
        });

        Blade::directive('optionValue', function ($expression) {
            
            list($model, $parameter, $default) = explode(',',str_replace(['(',')',' '], '', $expression));
            $parameter = str_replace(["'", '"'], '', $parameter);
            
            return "<?php if((isset($model) && old('$parameter', $model->$parameter) == $default) || old('$parameter') == $default) echo 'selected=\"selected\"' ?>";
        });
        
        Blade::directive('checkboxValue', function ($expression) {
            
            list($model, $parameter) = explode(',',str_replace(['(',')',' '], '', $expression));
            $parameter = str_replace(["'", '"'], '', $parameter);
            
            return "<?php if((isset($model) && old('$parameter', $model->$parameter) == 1) || old('$parameter') == 1) echo 'checked=\"checked\"' ?>";
        });
        
        Blade::directive('checkboxValueFromArray', function ($expression) {
             
            list($model, $parameter, $array) = explode(',',str_replace(['(',')',' '], '', $expression));
            $parameter = str_replace(["'", '"'], '', $parameter);
            
            return "<?php if(collect(old('$parameter', []))
                ->contains(".$model."->id) ||
                collect($array)->contains(function(\$item) use($model) {
                
                return \$item == ".$model."->id;
            })) echo 'checked=\"checked\"' ?>";
        });
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}