namespace PrestaShop\Module\CgBestCategories\Form;

use PrestaShop\PrestaShop\Core\Form\FormBuilderInterface;
use PrestaShop\PrestaShop\Core\Form\FormInterface;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilder;

class CategorySelectionType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $categories = $this->getCategories(); // Method to fetch categories

        foreach ($categories as $category) {
            $builder->add('category_' . $category['id_category'], CheckboxType::class, [
                'label' => $category['name'],
                'required' => false,
            ]);
        }

        $builder->add('save', SubmitType::class, [
            'label' => 'Save',
        ]);
    }

    private function getCategories()
    {
        // This method should return an array of categories with 'id_category' and 'name'
        // Example return format:
        // return [
        //     ['id_category' => 1, 'name' => 'Category 1'],
        //     ['id_category' => 2, 'name' => 'Category 2'],
        // ];
    }
}