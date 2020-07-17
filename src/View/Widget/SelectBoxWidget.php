<?php
namespace App\View\Widget;

use Cake\View\Form\ContextInterface;

class SelectBoxWidget extends \Cake\View\Widget\SelectBoxWidget
{
    use InputgroupTrait;

    public function render(array $data, ContextInterface $context): string
    {

        return $this->_withInputGroup($data, $context);

    }

}
