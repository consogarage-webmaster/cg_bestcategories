<?php

namespace CgBestCategories\Hook;

use PrestaShop\PrestaShop\Adapter\Category\CategoryDataProvider;
use PrestaShop\PrestaShop\Adapter\Hook\HookManager;
use PrestaShop\PrestaShop\Core\Module\WidgetInterface;
use PrestaShop\PrestaShop\Core\Module\Module;
use PrestaShop\PrestaShop\Core\Smarty\SmartyAdapter;

class DisplayHomeHook implements WidgetInterface
{
    private $categoryDataProvider;
    private $hookManager;
    private $smarty;

    public function __construct()
    {
        $this->categoryDataProvider = new CategoryDataProvider();
        $this->hookManager = new HookManager();
        $this->smarty = new SmartyAdapter();
    }

    public function render(array $params)
    {
        $selectedCategories = $this->getSelectedCategories();
        $this->smarty->assign('categories', $selectedCategories);
        
        return $this->smarty->fetch('module:cg_bestcategories/views/templates/hook/displayHome.tpl');
    }

    private function getSelectedCategories()
    {
        $categoryIds = json_decode(Configuration::get('CG_BESTCATEGORIES_SELECTED_CATEGORIES'), true);
        $categories = [];

        if (!empty($categoryIds)) {
            foreach ($categoryIds as $id) {
                $category = $this->categoryDataProvider->getCategory($id);
                if ($category) {
                    $categories[] = [
                        'id' => $category['id_category'],
                        'name' => $category['name'],
                        'link' => $this->context->link->getCategoryLink($category['id_category']),
                        'image' => $category['image'],
                    ];
                }
            }
        }

        return $categories;
    }
}