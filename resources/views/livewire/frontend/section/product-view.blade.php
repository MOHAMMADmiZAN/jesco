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

                                    <div class="product">
                                        <div class="thumb">

                                            <a href="" class="image">
                                                <img src="{{asset('/storage/'.$product->image_url)}}" alt="Product" />
                                            </a>
                                            <span class="badges"><span class="new">{{\Carbon\Carbon::parse("10 Hours ago")<$product->created_at?'New':$product->created_at->diffForHumans()}}</span></span>
                                            <div class="actions">
                                                <a href="wishlist.html" class="action wishlist" title="Wishlist"><i
                                                        class="pe-7s-like"></i></a>
                                                <a href="#" class="action quickview" data-link-action="quickview"
                                                   title="Quick view" data-bs-toggle="modal"
                                                   data-bs-target="#exampleModal"><i class="pe-7s-search"></i></a>
                                                <a href="compare.html" class="action compare" title="Compare"><i
                                                        class="pe-7s-refresh-2"></i></a>
                                            </div>
                                            <button title="Add To Cart" class=" add-to-cart">Add
                                                To Cart</button>
                                        </div>
                                        <div class="content"><span class="ratings"><span class="rating-wrap"><span class="star" style="width: 100%"></span></span><span class="rating-num">( 5 Review )</span></span>
                                            <h5 class="title"><a href="single-product.html">{{$product->name}}
                                                </a>
                                            </h5>
                                            <span class="price"><span class="new">${{$product->unit_price}}</span></span>
                                        </div>
                                    </div>
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






