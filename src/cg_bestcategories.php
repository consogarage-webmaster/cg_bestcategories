<?php

if (!defined('_PS_VERSION_')) {
    exit;
}

class Cg_bestcategories extends Module
{
    public function __construct()
    {
        $this->name = 'cg_bestcategories';
        $this->tab = 'front_office_features';
        $this->version = '1.0.0';
        $this->author = 'Your Name';
        $this->need_instance = 0;
        $this->bootstrap = true;

        parent::__construct();

        $this->displayName = $this->l('Best Categories');
        $this->description = $this->l('Displays selected categories on the homepage.');
    }

    public function install()
    {
        return parent::install() &&
            $this->registerHook('displayHome') &&
            Configuration::updateValue('CG_BESTCATEGORIES_SELECTED_CATEGORIES', '');
    }

    public function uninstall()
    {
        return parent::uninstall() &&
            Configuration::deleteByName('CG_BESTCATEGORIES_SELECTED_CATEGORIES');
    }

    public function hookDisplayHome($params)
    {
        $selectedCategories = explode(',', Configuration::get('CG_BESTCATEGORIES_SELECTED_CATEGORIES'));
        $categories = [];

        foreach ($selectedCategories as $id_category) {
            $category = new Category((int)$id_category);
            if (Validate::isLoadedObject($category)) {
                $categories[] = [
                    'id' => $category->id,
                    'name' => $category->name,
                    'link' => $category->getLink(),
                    'image' => $category->getImage(),
                ];
            }
        }

        $this->context->smarty->assign('categories', $categories);
        return $this->display(__FILE__, 'views/templates/hook/displayHome.tpl');
    }
}