<?php

namespace App\Http\Admin;

use AdminColumn;
use AdminSection;
use AdminColumnFilter;
use AdminDisplay;
use AdminForm;
use AdminFormElement;
use App;
use App\Models\DocumentReceiptProduct;
use App\Models\Product;
use Cache;
use Illuminate\Database\Eloquent\Model;
use SleepingOwl\Admin\Contracts\Display\DisplayInterface;
use SleepingOwl\Admin\Contracts\Form\FormInterface;
use SleepingOwl\Admin\Contracts\Initializable;
use SleepingOwl\Admin\Form\Buttons\Cancel;
use SleepingOwl\Admin\Form\Buttons\Save;
use SleepingOwl\Admin\Form\Buttons\SaveAndClose;
use SleepingOwl\Admin\Form\Buttons\SaveAndCreate;
use SleepingOwl\Admin\Section;

/**
 * Class MovementProducts
 *
 * @property \App\Models\MovementProduct $model
 *
 * @see https://sleepingowladmin.ru/#/ru/model_configuration_section
 */
class MovementProducts extends Section implements Initializable
{
    /**
     * @var bool
     */
    protected $checkAccess = false;

    /**
     * @var string
     */
    protected $title = "Движение товара";

    /**
     * @var string
     */
    protected $alias;


    /**
     * Initialize class.
     */
    public function initialize()
    {
        // $this->addToNavigation()->setPriority(100)->setIcon('fa fa-lightbulb-o');
    }

    /**
     * @param array $payload
     *
     * @return DisplayInterface
     */
    public function onDisplay($payload = [])

    {


        $columns = [
            AdminColumn::text('id', '#')->setWidth('50px')->setHtmlAttribute('class', 'text-center'),
            // AdminColumn::link('doc_type', 'type', 'created_at'),

            // AdminColumn::text('stock.name', 'Stock')
            //     ->setWidth('160px'),

            AdminColumn::text('product.name', 'Product')
                ->setWidth('160px'),
            AdminColumn::text('amt', 'Кол-во')
            // AdminColumn::boolean('name', 'On'),
            // AdminColumn::text('created_at', 'Created / updated', 'updated_at')
            //     ->setWidth('160px')
            //     ->setOrderable(function($query, $direction) {
            //         $query->orderBy('updated_at', $direction);
            //     })
            //     ->setSearchable(false)
            // ,
        ];

        $display = AdminDisplay::datatables()
            ->setName('firstdatatables')
            ->setOrder([[0, 'asc']])
            ->setDisplaySearch(true)
            ->paginate(25)
            ->setColumns($columns)
            ->setHtmlAttribute('class', 'table-primary table-hover th-center');

        if (isset($payload['doc_id'])) {
            Cache::store('database')->put(substr($_COOKIE['laravel_session'], 1, 8), ['doc_id' => $payload['doc_id'], 'doctype' => $payload['doctype']], 6000);
            $docRP = App($payload['doctype'])->find($payload['doc_id'])->first();

            $display->setApply(function ($query) use (&$payload, &$docRP) {
                $query->where('doc_id', $payload['doc_id'])
                    ->where('doc_type', $docRP->type);
            });
        }
        return $display;
    }





    // // $display->setColumnFilters([
    // //     AdminColumnFilter::select()
    // //         ->setModelForOptions(\App\Models\MovementProduct::class, 'name')
    // //         ->setLoadOptionsQueryPreparer(function($element, $query) {
    // //             return $query;
    // //         })
    // //         ->setDisplay('name')
    // //         ->setColumnName('name')
    // //         ->setPlaceholder('All names')
    // //     ,
    // ]);




    // $display->getColumnFilters()->setPlacement('card.heading');

    // return $display;


    /**
     * @param int|null $id
     * @param array $payload
     *
     * @return FormInterface
     */
    public function onEdit($id = null, $payload = [])
    {

        $tabs = AdminDisplay::tabbed();
        $tabs->setTabs(function ($tab) {
            $tabs = [];



            $doc = Cache::store('database')->get(substr($_COOKIE['laravel_session'], 1, 8));
            $docM = App($doc['doctype'])->find($doc['doc_id'])->first();



            $form = AdminForm::card()->addBody([
                AdminFormElement::columns()->addColumn([
                    AdminFormElement::hidden('doc_id')->setDefaultValue($docM->id),
                    AdminFormElement::hidden('doc_type')->setDefaultValue($docM->type),
                    AdminFormElement::hidden('stock_id')->setDefaultValue($docM->stock_id),
                    AdminFormElement::hidden('product_id'),
                    AdminFormElement::html('<h6 >Наименование товара: <span class="formname"> </span><h6>'),

                    AdminFormElement::text('amt', 'Количество')->required(),


                    // AdminFormElement::text('name', 'Name')
                    //     ->required()
                    // ,

                    // AdminFormElement::html('<hr>'),
                    // AdminFormElement::datetime('created_at')
                    //     ->setVisible(true)
                    //     ->setReadonly(false)
                    // ,

                ], 'col-xs-12 col-sm-6 col-md-4 col-lg-4')->addColumn([
                    AdminFormElement::text('id', 'ID')->setReadonly(true),

                ], 'col-xs-12 col-sm-6 col-md-8 col-lg-8'),
            ]);

            $form->getButtons()->setButtons([
                'save'  => new Save(),
                'save_and_close'  => new SaveAndClose(),
                // 'save_and_create'  => new SaveAndCreate(),
                'cancel'  => (new Cancel()),
            ]);
            $tabs[] = AdminDisplay::tab($form)->setLabel('Product')->setHtmlAttribute('class', 'product');
            $html = AdminFormElement::columns()->addColumn([
                AdminSection::getModel(Product::class)
                    ->fireDisplay()
                    ->addScript('custom-script', asset('js/movementproducts.js'))
                    ->addStyle('custom-style', asset('css/style.css'))

            ], 'col-md-12 productmovementproducts');

            $tabs[] = AdminDisplay::tab($html)->setLabel('Товары')->setHtmlAttribute('class', 'tovar');

            return $tabs;
        });
        return $tabs;
    }


    /**
     * @return FormInterface
     */
    public function onCreate($payload = [])
    {
        return $this->onEdit(null, $payload);
    }

    /**
     * @return bool
     */
    public function isDeletable(Model $model)
    {
        return true;
    }

    /**
     * @return void
     */
    public function onRestore($id)
    {
        // remove if unused
    }
}
