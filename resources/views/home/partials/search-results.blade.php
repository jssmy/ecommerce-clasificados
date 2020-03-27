<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- ASIDE -->
            <!-- /ASIDE -->
            <!-- STORE -->
            <div id="store" class="col-md-12">
                <!-- store top filter -->
                <div class="store-filter clearfix">
                    <div class="store-sort">
                        <h4>{{$products->total() }} encontrados</h4>
                    </div>
                </div>
                <!-- /store top filter -->

                <!-- store products -->
                <div class="row">
                    <!-- product -->
                    @forelse($products as $product)
                        <div class="col-md-4 col-xs-6">
                            @include('layouts.product.main-product-item',['product'=>$product])
                        </div>
                    @empty
                    @endforelse
                    <!-- /product -->
                </div>
                <!-- /store products -->

                <!-- store bottom filter -->
                <div class="store-filter clearfix">
                        {!! $products->appends(request()->query())->links() !!}
                <!-- /store bottom filter -->
                </div>
            </div>
            <!-- /STORE -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
