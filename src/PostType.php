<?php

namespace JoshTaylor;

class PostType
{
    protected $name;

    protected $arguments;

    protected $labels;

    public function __construct($name, $arguments = [], $labels = [])
    {
        $this->name = $name;
        $this->arguments = $arguments;
        $this->labels = $labels;
    }

    public function register()
    {
        return register_post_type(
            $this->name, array_merge(['labels' => $this->labels()], $this->arguments())
        );
    }

    public function arguments()
    {
        return $this->arguments;
    }

    public function labels($key = null)
    {
        if ($key) {
            return $this->labels[$key];
        }
        return $this->labels;
    }
}
