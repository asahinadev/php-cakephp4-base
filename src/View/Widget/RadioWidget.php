<?php
namespace App\View\Widget;

use Cake\View\Form\ContextInterface;

class RadioWidget extends \Cake\View\Widget\RadioWidget
{

    protected $_inline = false;

    public function render(array $data, ContextInterface $context): string
    {

        $data += [
            'inline' => false,
        ];
        $this->_inline = $data['inline'];
        unset($data['inline']);

        return parent::render($data, $context);

    }

    protected function _renderLabel(array $radio, $label, $input, $context, $escape)
    {

        if ($this->_inline) {
            $label = [
                'text' => $radio['text'],
                'class' => 'radio-inline',
            ];
        }

        return parent::_renderLabel($radio, $label, $input, $context, $escape);

    }

}
