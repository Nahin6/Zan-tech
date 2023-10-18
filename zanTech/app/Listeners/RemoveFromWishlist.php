<?php

namespace App\Listeners;

use App\Events\ProductDeleted;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\WishlistItem;
class RemoveFromWishlist implements ShouldQueue
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(ProductDeleted $event): void
    {
        $deletedProduct = $event->product;

        // Remove the deleted product from users' wish lists
        WishlistItem::where('product_id', $deletedProduct->id)->delete();
    }

}
