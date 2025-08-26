<?php

namespace CgBestCategories\Controller;

use PrestaShop\PrestaShop\Adapter\AbstractAdminController;
use PrestaShop\PrestaShop\Core\Module\Module;
use PrestaShop\PrestaShop\Core\Module\ModuleManagerBuilder;
use Symfony\Component\HttpFoundation\Request;

class AdminBestCategoriesController extends AbstractAdminController
{
    public function __construct()
    {
        parent::__construct();
        $this->bootstrap = true;
        $this->table = 'cg_bestcategories';
        $this->className = 'CgBestCategories';
        $this->context = Context::getContext();
    }

    public function initContent()
    {
        parent::initContent();
        $this->setTemplate('admin/configure.tpl');
    }

    public function postProcess()
    {
        if (Tools::isSubmit('submitBestCategories')) {
            $selectedCategories = Tools::getValue('categories');
            Configuration::updateValue('CG_BESTCATEGORIES_SELECTED', implode(',', $selectedCategories));
            $this->confirmations[] = $this->trans('Categories updated successfully.', [], 'Modules.CgBestCategories.Admin');
        }
    }

    public function renderForm()
    {
        $this->fields_value['categories'] = explode(',', Configuration::get('CG_BESTCATEGORIES_SELECTED'));

        $this->fields_form = [
            'legend' => [
                'title' => $this->trans('Best Categories', [], 'Modules.CgBestCategories.Admin'),
            ],
            'input' => [
                [
                    'type' => 'categories',
                    'label' => $this->trans('Select Categories', [], 'Modules.CgBestCategories.Admin'),
                    'name' => 'categories',
                    'multiple' => true,
                    'required' => true,
                ],
            ],
            'submit' => [
                'title' => $this->trans('Save', [], 'Modules.CgBestCategories.Admin'),
                'class' => 'btn btn-default pull-right',
            ],
        ];

        return parent::renderForm();
    }
}