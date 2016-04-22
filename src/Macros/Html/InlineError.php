<?php

Form::macro('InlineError', function($input, $errors, $class = 'help-block') {
    if ( !is_null($errors) && $errors->has($input) ) {
        $message = $errors->first($input);
        return "<span class=\" $class \">  $message </span>";
    }

    return;
});
