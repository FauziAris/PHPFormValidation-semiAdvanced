<?php

function set_value($name, $value = null)
{
    $v= null;
    if (isset($_REQUEST[$name])) {
        $v = $_REQUEST[$name];
    }

    if (isset($value)) {
        $v = $value;
    }
    return $v;
}

function set_checked($v_a, $v_b)
{
    $result= false;
    if (is_array($v_b)) {
        foreach ($v_b as $key => $value) {
            if ($v_a == $value) {
                $result = true;
                break;
            }
        }
    } else {
        $result = ($v_a == $v_b)? true : false;
    }
    return $result;
}

function form_post($action = null, $attributes=null)
{
    $html = "<form action='$action' method='POST' ";
    if (isset($attributes)) {
        foreach ($attributes as $att => $value) {
            $html .=" $att='$value' ";
        }
    }
    $html .= ">";
    return $html;
}

function form_get($action = null, $attributes=null)
{
    $html = "<form action='$action' method='GET' ";
    if (isset($attributes)) {
        foreach ($attributes as $att => $value) {
            $html .=" $att='$value' ";
        }
    }
    $html .= ">";
    return $html;
}

function form_file($action = null, $attributes=null)
{
    $html = "<form action='$action' method='POST' enctype='multipart/form-data' ";
    if (isset($attributes)) {
        foreach ($attributes as $att => $value) {
            $html .=" $att='$value' ";
        }
    }
    $html .= ">";
    return $html;
}

function form_close()
{
    return "</form>";
}

function input_text($name, $value=null, $attributes = null)
{
    $html ="<input type='text' name='$name' value='$value' ";
    if (isset($attributes)) {
        foreach ($attributes as $attribute => $value) {
            $html .= " $attribute='$value' ";
        }
    }
    $html .= ">";
    return $html;
}

function input_hidden($name, $value=null, $attributes = null)
{
    $html ="<input type='hidden' name='$name' value='$value' ";
    if (isset($attributes)) {
        foreach ($attributes as $attribute => $value) {
            $html .= " $attribute='$value' ";
        }
    }
    $html .= ">";
    return $html;
}

function input_password($name, $value =null, $attributes = null)
{
    $html ="<input type='password' name='$name' value='$value' ";
    if (isset($attributes)) {
        foreach ($attributes as $attribute => $v) {
            $html .= " $attribute='$v' ";
        }
    }
    $html .= ">";
    return $html;
}

function input_file($name, $attributes = null)
{
    $html ="<input type='file' name='$name' ";
    if (isset($attributes)) {
        foreach ($attributes as $attribute => $v) {
            $html .= " $attribute='$v' ";
        }
    }
    $html .= ">";
    return $html;
}

function input_submit($value, $attributes = null)
{
    $html ="<input type='submit' value='$value' ";
    if (isset($attributes)) {
        foreach ($attributes as $attribute => $v) {
            $html .= " $attribute='$v' ";
        }
    }
    $html .= ">";
    return $html;
}

function input_radio($name, $value, $checked=false, $attributes = null)
{
    $html = "<input type='radio' name='$name' value='$value' ";
    if (isset($attributes)) {
        foreach ($attributes as $attribute => $v) {
            $html .= " $attribute='$v' ";
        }
    }
    if ($checked) {
        $html .= " checked ";
    }
    $html .= ">";
    return $html;
}

function input_checkbox($name, $value, $checked=false, $attributes = null)
{
    $html = "<input type='checkbox' name='$name' value='$value' ";
    if (isset($attributes)) {
        foreach ($attributes as $attribute => $v) {
            $html .= " $attribute='$v' ";
        }
    }
    if ($checked) {
        $html .= " checked ";
    }
    $html .= ">";
    return $html;
}

function select_option($name, $options, $value=null, $attributes=null)
{
    $html = "<select name='$name' ";
    if (isset($attributes)) {
        foreach ($attributes as $attribute => $v) {
            $html .= " $attribute='$v' ";
        }
    }
    $html .= ">";
    foreach ($options as $key => $val) {
        $html .= "<option value='$key' ";
        if ($value == $key) {
            $html .= " selected ";
        }
        $html .= ">".$val."</option>";
    }
    $html .= "</select>";
    return $html;
}

function textarea($name, $value=null, $attributes=null)
{
    $html ="<textarea name='$name' ";
    if (isset($attributes)) {
        foreach ($attributes as $attribute => $v) {
            $html .= " $attribute='$v' ";
        }
    }
    $html .= ">";
    $html .= $value ."</textarea>";
    return $html;
}
