<div x-data="{open: @entangle('isShow')}">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Category List') }}
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
                                 <input type="text" class="form-control rounded border-gray-300 w-100" placeholder=" Search Category" x-model="$wire.search">
                             </div>
                            <button class="btn btn-secondary text-white" @click="open=true"><i class="fas fa-plus mr-2"></i>Add
                                Category
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
                    @if($category->count()>0)
                    <table class="table table-stripe text-center">
                        <thead>
                        <tr>
                            <th>SL</th>
                            <th>Category Name</th>
                            <th>Category ADDED BY</th>
                            <th>Category Thumbnail</th>
                            <th>Category Add</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($category as $k=>$ct)
                            <tr>
                                <td>{{$category->firstItem()+$k}}</td>
                                <td>{{$ct->categoryName}}</td>
                                <td>{{$ct->user->name}}</td>
                                <td><img src="{{asset('storage/'.$ct->categoryPhotoUrl)}}" alt="{{$ct->categoryName}}" width="50" height="50" class="mx-auto"></td>
                                <td>{{$ct->created_at->diffForHumans()}}</td>
                                <td><button class="btn btn-primary mx-2"><i class="fas fa-edit"></i></button><button class="btn btn-danger" wire:click="delete({{$ct->id}})"><i class="far fa-trash-alt"></i></button></td>
                            </tr>

                        @endforeach
                        </tbody>
                    </table>
                        {{$category->links()}}
                        @else
                            <p>No Data Found</p>
                        @endif

                </div>
            </div>
        </div>
    </div>
    @if($isShow)
        <x-custom.custom-modal title="Category Add" >
                <form @submit.prevent="$wire.submit">

                    <div class="form-group">
                        <input type="text" class="form-control rounded border-gray-300 @error('categoryData.name') is-invalid @enderror" placeholder="Category Name"
                               wire:model="categoryData.name" wire:dirty.class="text-success">
                    </div>
                    @error('categoryData.name') <span class="text-danger text-center text-uppercase mt-2">{{ $message }}</span> @enderror
                    <div class="custom-file my-3">
                        <input type="file" class="custom-file-input rounded border-gray-300 @error('categoryData.photo') is-invalid @enderror " wire:model="categoryData.photo">
                    </div>
                    @error('categoryData.photo') <span class="text-danger text-center text-uppercase mt-2">{{ $message }}</span> @enderror
                    @if ($categoryData['photo'] )
                        Photo Preview:
                        <img src="{{ $categoryData['photo']->temporaryUrl()??''}}" height="100" width="100" class="mb-2">
                    @endif
                    <hr>
                    <button class="btn btn-secondary d-block mx-auto my-3" >ADD</button>
                </form>
            </x-custom.custom-modal>

    @endif
</div>

