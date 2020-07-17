<?php
namespace App\View\Helper;

trait OptionsAwareTrait
{

    public $buttonClasses = [
        'default',
        'btn-default',
        'success',
        'btn-success',
        'warning',
        'btn-warning',
        'danger',
        'btn-danger',
        'info',
        'btn-info',
        'primary',
        'btn-primary',
    ];

    public $buttonClassAliases = [
        'default' => 'btn-default',
        'success' => 'btn-success',
        'warning' => 'btn-warning',
        'danger' => 'btn-danger',
        'info' => 'btn-info',
        'primary' => 'btn-primary',
    ];

    public function applyButtonClasses(array $data)
    {

        if ($this->hasAnyClass($this->buttonClasses, $data)) {
            $data = $this->injectClasses([
                'btn'
            ], $data);
        }
        else {
            $data = $this->injectClasses([
                'btn',
                'btn-default'
            ], $data);
        }

        return $this->renameClasses($this->buttonClassAliases, $data);

    }

    public function renameClasses(array $classMap, array $options)
    {

        $options += [
            'class' => []
        ];
        $options['class'] = $this->_toClassArray($options['class']);
        $classes = [];
        foreach ($options['class'] as $name) {
            $classes[] = array_key_exists($name, $classMap) ? $classMap[$name] : $name;
        }
        $options['class'] = trim(implode(' ', $classes));

        return $options;

    }

    public function hasAnyClass($classes, array $options)
    {

        $options += [
            'class' => []
        ];

        $options['class'] = $this->_toClassArray($options['class']);
        $classes = $this->_toClassArray($classes);

        foreach ($classes as $class) {
            if (in_array($class, $options['class'])) {
                return true;
            }
        }

        return false;

    }

    public function injectClasses($classes, array $options)
    {

        $options += [
            'class' => [],
            'skip' => []
        ];

        $options['class'] = $this->_toClassArray($options['class']);
        $options['skip'] = $this->_toClassArray($options['skip']);
        $classes = $this->_toClassArray($classes);

        foreach ($classes as $class) {
            if (! in_array($class, $options['class']) && ! in_array($class, $options['skip'])) {
                array_push($options['class'], $class);
            }
        }

        unset($options['skip']);
        $options['class'] = trim(implode(' ', $options['class']));

        return $options;

    }

    public function checkClasses($classes, array $options)
    {

        if (empty($options['class'])) {
            return false;
        }

        $options['class'] = $this->_toClassArray($options['class']);
        $classes = $this->_toClassArray($classes);

        foreach ($classes as $class) {
            if (! in_array($class, $options['class'])) {
                return false;
            }
        }

        return true;

    }

    protected function _toClassArray($mixed)
    {

        if (! is_array($mixed)) {
            $mixed = explode(' ', $mixed);
        }

        return $mixed;

    }

}
