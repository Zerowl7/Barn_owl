<?php

namespace App\Providers;

use SleepingOwl\Admin\Providers\AdminSectionsServiceProvider as ServiceProvider;
use SleepingOwl\Admin\Contracts\Navigation\NavigationInterface;

class AdminSectionsServiceProvider extends ServiceProvider
{

    /**
     * @var array
     */
    protected $sections = [


        \App\Models\Stock::class => 'App\Http\Admin\Stocks',
        \App\Models\Product::class => 'App\Http\Admin\Products',
        \App\Models\MovementProduct::class => 'App\Http\Admin\MovementProducts',

        \App\Models\DocumentReceiptProduct::class => 'App\Http\Admin\DocumentReceiptProducts',
        \App\Models\DocumentSaleProduct::class => 'App\Http\Admin\DocumentSaleProducts',
        
        \App\Models\DocumentMovementProduct::class => 'App\Http\Admin\DocumentMovementProducts',
        \App\Models\MovementDocument::class => 'App\Http\Admin\MovementDocuments',
         
    ];

    /**
     * Register sections.
     *
     * @param \SleepingOwl\Admin\Admin $admin
     * @return void
     */
    public function boot(\SleepingOwl\Admin\Admin $admin)
    {
    	//
        $this->app->call([$this, 'registerNavigation']);
        parent::boot($admin);
    }

    /**
     * @param NavigationInterface $navigation
     */

    public function registerNavigation( NavigationInterface $navigation ) {
        require base_path( 'app/admin/navigation.php' );
         $navigation->setFromArray(
                  require base_path( 'app/admin/navigation.php' )
      );
      }
}
