<?php

class FormValidation
{
    private $data;
    private $rules;
    private $label;
    private $message;
    private $errorMessage;

    public function setData($data)
    {
        $this->data = $data;
        echo "<pre>";
        echo var_dump($this->data);
        echo "</pre>";
    }

    public function setRule($fieldName, $label, $rules)
    {
        $this->label[$fieldName] = $label;
        $this->rules[$fieldName] = $rules;
    }

    public function run()
    {
        foreach ($this->rules as $field => $rules) {
            $item['field'] = $field;
            $item['rules'] = $rules;
            $item['value'] = (isset($this->data[$field])) ? $this->data[$field] : '';
            $this->check($item);
        }
        return isset($this->errorMessage) ? false : true;
    }

    private function check($item)
    {
        foreach ($item['rules'] as $rule => $value) {
            if (method_exists($this, $rule)) {
                if (is_array($value)) {
                    call_user_func_array([$this,$rule], [$item,$value]);
                } else {
                    if (!call_user_func_array([$this,$rule], [$item,$value])) {
                        break;
                    }
                }
            } else {
                echo "Method $rule tidak ditemukan<br>";
            }
        }
    }

    public function setMessage($field, $ruleMessage)
    {
        $this->message[$field] = $ruleMessage;
    }

    private function message($field, $rule, $message)
    {
        if (isset($this->message[$field][$rule])) {
            $this->errorMessage[$field] = $this->message[$field][$rule];
        } else {
            $this->errorMessage[$field] = $message;
        }
    }

    public function errors()
    {
        return isset($this->errorMessage)? $this->errorMessage : false ;
    }

    public function error($field)
    {
        return isset($this->errorMessage[$field])? $this->errorMessage[$field] : false ;
    }

    private function not_empty()
    {
        //
    }

    private function file_name($item, $rules)
    {
        $item['rules'] = $rules;
        $this->check($item);
    }

    private function file_size($item, $rules)
    {
        $item['rules'] = $rules;
        $this->check($item);
    }
}
