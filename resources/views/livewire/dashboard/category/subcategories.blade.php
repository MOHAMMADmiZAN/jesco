<div x-data="{open:@entangle('isShow')}">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('SubCategory List') }}
        </h2>
    </x-slot>
    <div class="row">
        <div class="col-lg-10 m-auto">
            <div class="card mx-3">
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
                                <input type="text" class="form-control rounded border-gray-300 w-100" placeholder=" Search SubCategory" x-model="$wire.search">
                            </div>
                            <button class="btn btn-secondary text-white" @click="open=true"><i class="fas fa-plus mr-2"></i>Add
                                SubCategory
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @if(session('delete'))
                        <div class="alert alert-danger">
                            {{session('delete')}}
                        </div>
                    @endif
                    @if($subcategory->count()>0)
                        <table class="table table-stripe text-center">
                            <thead>
                            <tr>
                                <th>SL</th>
                                <th> Subcategory Name</th>
                                <th>Subcategory ADDED BY</th>
                                <th>Category Name</th>
                                <th>Subcategory Add</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($subcategory as $k=>$ct)
                                <tr>
                                    <td>{{$subcategory->firstItem()+$k}}</td>
                                    <td>{{$ct->sub_category_name}}</td>
                                    <td>{{$ct->user->name}}</td>
                                    <td>{{$ct->category->categoryName}}</td>
                                    <td>{{$ct->created_at->diffForHumans()}}</td>

                                    <td><button class="btn btn-primary mx-2"><i class="fas fa-edit"></i></button><button class="btn btn-danger" wire:click="delete({{$ct->id}})"><i class="far fa-trash-alt"></i></button></td>
                                </tr>

                            @endforeach
                            </tbody>
                        </table>
                        {{$subcategory->links()}}
                    @else
                        <p>No Data Found</p>
                    @endif

                </div>
            </div>
        </div>
    </div>
    @if($isShow)
        <x-custom.custom-modal title="SubCategory Add">
                <form wire:submit.prevent="submit">
                    <div class="form-group">
                        <input type="text" class="form-control rounded border-gray-300 @error('subcategoryData.name') is-invalid @enderror" placeholder="SubCategory Name"
                               wire:model="subcategoryData.name">
                    </div>
                    @error('subcategoryData.name') <span class="text-danger text-center text-uppercase mt-2">{{ $message }}</span> @enderror

                    <div class="form-group mt-3">
                        <select  class="form-select @error('subcategoryData.category') is-invalid @enderror" wire:model="subcategoryData.category">
                            <option value>Select Category</option>
                            @foreach($category as $ct)
                                <option value="{{$ct->id}}">{{$ct->categoryName}}</option>
                            @endforeach
                        </select>

                    </div>
                    @error('subcategoryData.category') <span class="text-danger text-center text-uppercase mt-2">{{ $message }}</span> @enderror

                    <hr class="mt-3">
                    <button class="btn btn-secondary d-block mx-auto my-3" >ADD</button>
                </form>
            </x-custom.custom-modal>
    @endif
</div>
