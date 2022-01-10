<div class="product">
    <div class="thumb">
        <a href="single-product.html" class="image">
            <img src="{{asset('storage/'.$product->image_url)}}" alt="{{$product->name}}" />
        </a>
        <span class="badges">
                                                    <span class="new">{{\Carbon\Carbon::parse("10 Hours ago")<$product->created_at?'New':$product->created_at->diffForHumans()}}</span>
                                                </span>
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
    <div class="content">
                                                <span class="ratings">
                                                    <span class="rating-wrap">
                                                        <span class="star" style="width: 100%"></span>
                                                    </span>
                                                    <span class="rating-num">( 5 Review )</span>
                                                </span>
        <h5 class="title"><a href="single-product.html">{{$product->name}}
            </a>
        </h5>
        <span class="price">
                                                    <span class="new">${{$product->unit_price}}</span>
                                                </span>
    </div>
</div>
