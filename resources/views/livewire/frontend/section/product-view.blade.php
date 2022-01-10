<div class="product-area pt-100px pb-100px">
    <div class="container">
        <!-- Section Title & Tab Start -->
        <div class="row">
            <!-- Section Title Start -->
            <div class="col-12">
                <div class="section-title text-center mb-0">
                    <h2 class="title">#products</h2>
                    <!-- Tab Start -->
                    <div class="nav-center" >
                        <ul class="product-tab-nav nav align-items-center justify-content-center">

                            <li class="nav-item" wire:click="all_products"><a class="nav-link {{$isActive==='all'? 'active':""}} " data-bs-toggle="tab"
                                                    href="#tab-product--all">All</a></li>
                            <li class="nav-item"  wire:click="new_product"><a class="nav-link {{$isActive==='new'?'active':""}}" data-bs-toggle="tab"
                                                                              href="#tab-product--new">New</a>
                            </li>

                            @foreach($categories as $category)
                                <li class="nav-item" wire:click="category_products({{$category->id}})" wire:key="{{Str::random(25)}}">
                                    <a class="nav-link {{$isActive=== $category->categoryName?'active':''}}" data-bs-toggle="tab" href="#tab-product-{{$category->categoryName}}">{{$category->categoryName}}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <!-- Tab End -->
                </div>
            </div>
            <!-- Section Title End -->
        </div>
        <!-- Section Title & Tab End -->

        <div class="row">
            <div class="col">
                <div class="tab-content mb-30px0px">
                    <!-- 1st tab start -->
                    <div class="tab-pane fade-show active " id="tab-product--{{$in}}">
                        <div class="row">

                            @foreach($products->take(8) as $product)
                                <div class="col-lg-4 col-xl-3 col-md-6 col-sm-6 col-xs-6 mb-30px" data-aos="fade-up"
                                     data-aos-delay="200" wire:key="{{Str::random(34)}}">

                                    <livewire:frontend.component.single-product :product="$product" wire:key="{{Str::random(124)}}"/>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                @if($products->count()>8)
                    <a href="shop-left-sidebar.html" class="btn btn-lg btn-primary btn-hover-dark m-auto"> Load More <i
                            class="fa fa-arrow-right ml-15px" aria-hidden="true"></i></a>
                @endif
            </div>
        </div>
    </div>

</div>






