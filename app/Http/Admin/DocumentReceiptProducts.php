<?php

namespace App\Http\Admin;

use AdminColumn;
use AdminColumnFilter;
use AdminDisplay;
use AdminDisplayFilter;
use AdminForm;
use AdminFormElement;
use AdminSection;
use App\Models\DocumentReceiptProduct;
use App\Models\MovementProduct;
use App\Models\Stock;
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
 * Class DocumentReceiptProducts
 *
 * @property \App\Models\DocumentReceiptProduct $model
 *
 * @see https://sleepingowladmin.ru/#/ru/model_configuration_section
 */
class DocumentReceiptProducts extends Section implements Initializable
{
    /**
     * @var bool
     */
    protected $checkAccess = false;

    /**
     * @var string
     */
    protected $title = "Поступление товара";

    /**
     * @var string
     */
    protected $alias;

    /**
     * Initialize class.
     */
    public function initialize()
    {
        $this->addToNavigation()->setPriority(100)->setIcon('fa fa-lightbulb-o');
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
            AdminColumn::link('title', 'Title', 'created_at')
                ->setSearchCallback(function ($column, $query, $search) {
                    return $query
                        ->orWhere('name', 'like', '%' . $search . '%')
                        ->orWhere('created_at', 'like', '%' . $search . '%');
                })
                ->setOrderable(function ($query, $direction) {
                    $query->orderBy('created_at', $direction);
                }),
            // AdminColumn::boolean('name', 'On'),
            AdminColumn::text('stock.name', 'Stock')->setHtmlAttribute('class', 'text-center'),
            // AdminColumn::text('stock', 'stock')
            //     ->setWidth('160px'),
            AdminColumn::text('amt', 'Amount')
                ->setWidth('160px'),


        ];

        $display = AdminDisplay::datatables()
            // ->with('stockname')
            //  ->setFilters(
            //      AdminDisplayFilter::related('stock_id')->setModel(Stocks::class),
            //      AdminDisplayFilter::field('stock.name')->setOperator(\SleepingOwl\Admin\Display\Filter\FilterBase::CONTAINS)
            //  )
            ->setName('firstdatatables')
            ->setOrder([[0, 'asc']])
            ->setDisplaySearch(true)
            ->paginate(25)
            ->setColumns($columns)
            ->setHtmlAttribute('class', 'table-primary table-hover th-center');

        $display->setColumnFilters([
            AdminColumnFilter::select()
                ->setModelForOptions(\App\Models\DocumentReceiptProduct::class, 'name')
                ->setLoadOptionsQueryPreparer(function ($element, $query) {
                    return $query;
                })
                ->setDisplay('name')
                ->setColumnName('name')
                ->setPlaceholder('All names'),
        ]);
        $display->getColumnFilters()->setPlacement('card.heading');

        return $display;
    }

    /**
     * @param int|null $id
     * @param array $payload
     *
     * @return FormInterface
     */
    public function onEdit($id = null, $payload = [])
    {
        $tabs = AdminDisplay::tabbed();
        $tabs->setTabs(function ($tab) use (&$id) {
            $tabs = [];

        $form = AdminForm::card()->addBody([
            AdminFormElement::columns()->addColumn([
                AdminFormElement::hidden('title'),
                AdminFormElement::hidden('id'),
                AdminFormElement::html('Документ №'.$id),
                AdminFormElement::select('stock_id', 'Место хранения', Stock::class)
                ->setDisplay('name'),

                AdminFormElement::text('amt', 'Количество')
                        ->required(),
                // ->setLoadOptionsQueryPreparer(function ($element, $query) {
                //     return $query++
                //         ->where('roles', 'manager');
                // }),
            ], 'col-xs-12 col-sm-6 col-md-4 col-lg-4')]);

        $form->getButtons()->setButtons([
            'save'  => new Save(),
            'save_and_close'  => new SaveAndClose(),
            'save_and_create'  => new SaveAndCreate(),
            'cancel'  => (new Cancel()),
        ]);

        // Tabs
        $tabs[] = AdminDisplay::tab($form)->setLabel('Edit');
        if (!is_null($id)){

            $html = AdminFormElement::columns()->addColumn([
                AdminSection::getModel(MovementProduct::class)
                ->fireDisplay(['doc_id' => $id,'doctype'=>DocumentReceiptProduct::class])

            ], 'col-md-12 receipt');

            $tabs[] = AdminDisplay::tab($html)->setLabel('Movement')->setHtmlAttribute('class','tovar');
        }

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
