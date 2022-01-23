<div x-data="{open: @entangle('isShow'),isUploading: false, progress: 0}"
     x-on:livewire-upload-start="isUploading = true"

     x-on:livewire-upload-finish="isUploading = false"

     x-on:livewire-upload-error="isUploading = false"

     x-on:livewire-upload-progress="progress = $event.detail.progress"
>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Blog') }}
        </h2>
    </x-slot>
    <div class="row">
        <div class="col-lg-9  mx-auto">
          <div class="card">
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
                              Blog
                          </button>
                      </div>
                  </div>
              </div>
              <div class="card-body">


              </div>

          </div>
        </div>
    </div>
    @if($isShow)
        <x-custom.custom-modal title="Add Blog">
            <form wire:submit.prevent="submit">

               <div class="form-group">
                   <input class="form-control border-gray-300 rounded" id="title" type="text" placeholder=" Type Blog Title" wire:model="blogData.title">
               </div>



                <!-- Progress Bar -->


                <div x-show="isUploading">

                    <progress max="100" class=" border-gray-300 rounded-md mb-2 w-50 py-1 mx-auto" :value="progress"
                              x-text="progress+'%'"></progress>

                </div>
                @error('productData.image') <div class="alert alert-danger">{{$message}}</div> @enderror


                <hr class="mb-3 mt-3">
                <button class="btn btn-secondary d-block mx-auto">Submit</button>
            </form>
        </x-custom.custom-modal>
    @endif
</div>
