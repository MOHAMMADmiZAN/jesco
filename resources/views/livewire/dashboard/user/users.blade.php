<div x-data="{open: false}"
x-init ="document.title = $wire.title"
>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users List') }}
        </h2>
    </x-slot>

    <div class="row">
        <div class="col-lg-7  px-3 m-auto">
            <div class="card rounded">
                <div class="card-header fw-bold dark:text-white bg-dark">
                    User List
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">

                                <input type="text" class="form-control ml-auto rounded-md border-gray-300 my-2" placeholder="Search Name" wire:model="search">

                            </div>
                            @if(session('alert'))
                                <div class="alert alert-danger"><i class="fas fa-exclamation-circle"></i> {{session('alert')}}</div>
                            @endif
                        </div>
                    </div>
                    @if($users->count()>0)
                    <table class="table table-striped">

                        <thead>
                        <tr>
                            <th>SL</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $k => $user)
                            <tr>
                                <td>{{$users->firstItem()+$k}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td><button class="btn btn-danger" @click="$wire.delete({{$user->id}})"><i class="fas fa-trash-alt"></i></button></td>
                            </tr>


                            @endforeach

                        </tbody>
                    </table>
                    {{$users->links()}}
                </div>
                @else
                    <p>No users</p>
                @endif

            </div>
        </div>



    </div>

</div>
