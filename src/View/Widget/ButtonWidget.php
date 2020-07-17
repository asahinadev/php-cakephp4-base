<?php
namespace App\View\Widget;

use App\View\Helper\OptionsAwareTrait;
use Cake\View\Form\ContextInterface;

class ButtonWidget extends \Cake\View\Widget\ButtonWidget
{
    use OptionsAwareTrait;

    protected $_styles = [
        'default',
        'success',
        'warning',
        'danger',
        'info',
        'primary',
    ];

    public function render(array $data, ContextInterface $context): string
    {

        $data = $this->applyButtonClasses($data);

        return parent::render($data, $context);

    }

}
