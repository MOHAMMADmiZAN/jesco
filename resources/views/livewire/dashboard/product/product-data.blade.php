<div x-data="{open: @entangle('isShow'),isUploading: false, progress: 0}"
     x-on:livewire-upload-start="isUploading = true"

     x-on:livewire-upload-finish="isUploading = false"

     x-on:livewire-upload-error="isUploading = false"

     x-on:livewire-upload-progress="progress = $event.detail.progress"
>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Products List') }}
        </h2>
    </x-slot>
    <div class="row">
        <div class="col-lg-9 mx-auto">
            <div class="card">
                @if(session('delete'))
                    <div class="alert alert-danger">
                        {{session('delete')}}
                    </div>

                @endif
                <div class="card-header">
                    <div class="row">
                        <div class="col-lg-3">
                            <select class="form-select" wire:model="num">
                                <option value="5">5</option>
                                <option value="10">10</option>
                                <option value="15">15</option>
                                <option value="20">20</option>
                            </select>
                        </div>

                        <div class="col-lg-9 text-right">
                            <div class="form-group d-inline-block">
                                <input type="text" class="form-control rounded border-gray-300 w-100"
                                       placeholder=" Search Product" wire:model="search">
                            </div>
                            <button class="btn btn-secondary text-white" @click="open = true"><i
                                    class="fas fa-plus mr-2"></i>Add
                                Product
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body">

                 @if($product_data->count()>0)
                    <table class="table table-stripe">
                        <thead>
                        <tr>
                            <th>SL</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Unit Price</th>
                            <th>Quantity</th>
                            <th>Product_Image</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($product_data as $k=> $p)
                                <tr>
                                    <td>{{$product_data->firstItem()+$k}}</td>
                                    <td>{{$p->name}}</td>
                                    <td>{{$p->category->categoryName}}</td>
                                    <td>{{$p->unit_price}}</td>
                                    <td>{{$p->quantity}}</td>
                                    <td><img src="{{asset('/storage/'.$p->image_url)}}" alt="{{$p->name}}" style="max-width:100px;max-height:100px"></td>
                                    <td><button class="btn btn-danger" wire:click="delete({{$p->id}})">Delete</button></td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                     {{$product_data->links()}}
                    @endif
                </div>
            </div>
        </div>

    </div>
    @if($isShow)
        <x-custom.custom-modal title="Add Product">
            <form wire:submit.prevent="submit">
                <div class="form-group my-2">
                    <input type="text"
                           class="form-control rounded border-gray-300 @error('productData.name') is-invalid @enderror"
                           placeholder="Type Product_name" wire:model="productData.name">
                </div>
                @error('productData.name')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
                <div class="form-group my-2">
                    <select class="form-select @error('productData.category') is-invalid @enderror text-gray-500"
                            wire:model="productData.category" wire:change="subcategory_data">
                        <option value=>Select Category</option>
                        @foreach($category as $k=>$ct)
                            <option value="{{$ct->id}}">{{$ct->categoryName}}</option>
                        @endforeach
                    </select>

                </div>
                @error('productData.category')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
                <div class="form-group my-2">
                    <select class="form-select @error('productData.subcategory') is-invalid @enderror text-gray-500"
                            wire:model="productData.subcategory">
                        <option value=>Select Sub-Category</option>
                        @foreach($subcategory as $k=>$ct)
                            <option value="{{$ct->id}}">{{Str::ucfirst($ct->sub_category_name)}}</option>
                        @endforeach
                    </select>

                </div>
                @error('productData.subcategory')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
                <div class="form-group my-2">
                    <input type="text"
                           class="form-control rounded border-gray-300 @error('productData.unit_price') is-invalid @enderror"
                           placeholder=" Type Unit Price" wire:model="productData.unit_price">

                </div>
                @error('productData.unit_price')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
                <div class="form-group my-2">
                    <input type="text"
                           class="form-control rounded border-gray-300 @error('productData.quantity') is-invalid @enderror"
                           placeholder=" Type Product_Quantity" wire:model="productData.quantity">

                </div>
                @error('productData.quantity')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
                <div class="form-group my-2">
                    <textarea  class="form-control rounded border-gray-300" cols="30" rows="5" placeholder=" Type Product Description" wire:model="productData.description"></textarea>
                </div>
                @error('productData.description')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
                <div class="form-group my-2">
                    <textarea  class="form-control rounded border-gray-300" cols="30" rows="5" placeholder=" Type Product Information" wire:model="productData.information"></textarea>
                </div>
                @error('productData.information')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
                <h3 class="py-2">Product Image Upload:</h3>
                <hr>
                <div class="custom-file my-2">

                    <input type="file" class="custom-file-input rounded border-gray-300 "
                           wire:model="productData.image">
                </div>
                @if ($productData['image'] )
                    Photo Preview:
                    <img src="{{ $productData['image']->temporaryUrl()??''}}"
                         style="max-width:100px;max-height:100px" class="mb-2">
                @endif
                <hr>
                <h3 class="py-2">Product Thumbnail Upload:</h3>
                <hr>
                <div class="custom-file my-2">

                    <input type="file" class="custom-file-input rounded border-gray-300 "
                           wire:model="product_thumbnail" multiple>
                </div>
                @if($product_thumbnail)
                    <div class="d-flex flex-wrap">
                        @foreach($product_thumbnail as $thumbnail)
                            <img src="{{ $thumbnail->temporaryUrl()??''}}" style="max-width:100px;max-height:100px"
                                 class="mb-2">
                        @endforeach
                    </div>
                @endif
            <!-- Progress Bar -->

                <div x-show="isUploading">

                    <progress max="100" class=" border-gray-300 rounded-md mb-2 w-50 py-1 mx-auto" :value="progress"
                              x-text="progress+'%'"></progress>

                </div>
                @error('productData.image') <div class="alert alert-danger">{{$message}}</div> @enderror


                <hr class="mb-3">
                <button class="btn btn-secondary d-block mx-auto">Submit</button>
            </form>

        </x-custom.custom-modal>
    @endif




</div>
