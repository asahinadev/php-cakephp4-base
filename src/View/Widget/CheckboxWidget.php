<?php
namespace App\View\Widget;

use Cake\View\Form\ContextInterface;

class CheckboxWidget extends \Cake\View\Widget\CheckboxWidget
{

    public function render(array $data, ContextInterface $context): string
    {

        $data += [
            'inline' => false,
        ];

        if ($data['inline']) {
            $this->_templates->add([
                'checkboxContainer' => '{{content}}'
            ]);
        }

        unset($data['inline']);

        return parent::render($data, $context);

    }

}
