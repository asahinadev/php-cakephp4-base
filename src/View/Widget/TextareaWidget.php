<?php
namespace App\View\Widget;

use Cake\View\Form\ContextInterface;

class TextareaWidget extends \Cake\View\Widget\TextareaWidget
{
    use InputgroupTrait;

    public function render(array $data, ContextInterface $context): string
    {

        return $this->_withInputGroup($data, $context);

    }

}
