<?php
namespace App\View\Widget;

use App\View\Helper\OptionsAwareTrait;
use Cake\View\Form\ContextInterface;

trait InputgroupTrait
{
    use OptionsAwareTrait;

    protected function _withInputGroup(array $data, ContextInterface $context)
    {

        $data += [
            'prepend' => null,
            'append' => null,
        ];

        if (! isset($data['type']) || $data['type'] !== 'hidden') {
            $data = $this->injectClasses('form-control', $data);
        }

        $prepend = $data['prepend'];
        $append = $data['append'];
        unset($data['append'], $data['prepend']);

        $input = parent::render($data, $context);

        if ($prepend) {
            $prepend = $this->_addon($prepend, $data);
        }
        if ($append) {
            $append = $this->_addon($append, $data);
        }

        if ($prepend || $append) {
            $input = $this->_templates->format('inputGroupContainer',
                [
                    'append' => $append,
                    'prepend' => $prepend,
                    'content' => $input,
                    'templateVars' => $data['templateVars'],
                ]);
        }

        return $input;

    }

    protected function _addon($addon, $data)
    {

        if (is_string($addon)) {
            $class = 'input-group-' . ($this->_isButton($addon) ? 'btn' : 'addon');
            $addon = $this->_templates->format('inputGroupAddon', [
                'class' => $class,
                'content' => $addon,
                'templateVars' => $data['templateVars'],
            ]);
        }
        else {
            $class = 'input-group-btn';
            $addon = $this->_templates->format('inputGroupAddon',
                [
                    'class' => $class,
                    'content' => implode('', $addon),
                    'templateVars' => $data['templateVars'],
                ]);
        }

        return $addon;

    }

    protected function _isButton($html)
    {

        return strpos($html, '<button') !== false || strpos($html, 'type="submit"') !== false;

    }

}
