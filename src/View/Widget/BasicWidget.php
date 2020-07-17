<?php
namespace App\View\Widget;

use Cake\View\Form\ContextInterface;

class BasicWidget extends \Cake\View\Widget\BasicWidget
{
    use InputgroupTrait;

    public function render(array $data, ContextInterface $context): string
    {

        return $this->_withInputGroup($data, $context);

    }

}
