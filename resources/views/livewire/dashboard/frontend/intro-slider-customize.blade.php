<div class="row" x-data="{open:@entangle('isShow')}">
    <div class="col-lg-8 mx-auto ">
        <div class="card">
            <div class="card-header d-flex justify-between">
                <button class="btn btn-secondary w-100" @click="open=true">Add Slide</button>
            </div>
            <div class="card-body">
                @if(session('delete'))
                    <div class="alert alert-danger">{{session('delete')}}</div>
                @endif
                  @if($slides->count()>0)
                    <table class="table table-striped">
                      <thead>
                      <tr>
                          <td>SL</td>
                          <td>Slide Title</td>
                          <td>Sale Discount</td>
                          <td>Slide Photo</td>
                          <td>Action</td>
                      </tr>
                      </thead>
                        <tbody>
                        @foreach($slides as $k=> $s)
                            <tr>
                                <td>{{$k+1}}</td>
                                <td>{{$s->title}}</td>
                                <td>{{$s->sale}}</td>
                                <td><img src="{{asset('/storage'.'/'.$s->slide_image)}}" alt="{{$s->title}}" width="75" height="75"></td>
                                <td><button class="btn btn-danger" wire:click="delete({{$s->id}})"><i class="fas fa-trash-alt"></i></button></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else <p>No Slide</p>
                @endif
            </div>
        </div>
    </div>
    @if($isShow)
        <x-custom.custom-modal title="Intro Slide">
            <form wire:submit.prevent="submit">
                <div class="form-group my-3">
                    <input type="text" class="form-control rounded border-gray-300 @error('slide.sale') is-invalid @enderror" placeholder="Type Sale Discount" wire:model="slide.sale">
                    @error('slide.sale') <span class="text-danger text-center text-uppercase mt-2">{{ $message }}</span> @enderror

                </div>
                <div class="form-group my-3">
                    <input type="text" class="form-control rounded border-gray-300 @error('slide.title') is-invalid @enderror" placeholder="Type Sale Title" wire:model="slide.title">
                    @error('slide.title') <span class="text-danger text-center text-uppercase mt-2">{{ $message }}</span> @enderror

                </div>
                <div class="custom-file my-3">
                    <input type="file" class="custom-file-input rounded border-gray-300 @error('slide.photo') is-invalid @enderror " wire:model="slide.photo">

                </div>
                @error('slide.photo') <span class="text-danger text-center text-uppercase mt-2">{{ $message }}</span> @enderror


                @if ($slide['photo'] )
                    Photo Preview:
                    <img src="{{ $slide['photo']->temporaryUrl()??''}}" height="100" width="100" class="mb-2" alt="">
                @endif

                <button class="btn btn-secondary d-block mx-auto my-3"  @click="open=false">Submit</button>
            </form>
        </x-custom.custom-modal>
    @endif
</div>
