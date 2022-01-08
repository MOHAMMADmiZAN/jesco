
<div class="bg-gray-500 bg-opacity-50" style="top: 0;left: 0; position: absolute; width: 100%; height: 100%; overflow-x: hidden">
    <div class="row">
        <div class="col-lg-6 mx-auto">
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg py-6 text-center" style="position: relative">
                        <div style="position:absolute; top: 5px;right:10px; cursor: pointer; width: 25px; height: 25px; text-align: center; line-height: 25px; border-radius: 50%" class="bg-red-700" @click="open=false" wire:click="resetFilters">
                            <i class="fas fa-times text-white"></i>
                        </div>
                        <div class="row">
                            <div class="col-lg-10 mx-auto">
                                <div class="card">
                                    <div class="card-header">{{strtoupper($title)}}</div>
                                    <div class="card-body">
                                        @if(session('alert'))
                                            <div class="alert alert-success">
                                                {{session('alert')}}
                                            </div>
                                        @endif
                                            @if(session('error'))
                                                <div class="alert alert-danger">
                                                    {{session('danger')}}
                                                </div>
                                            @endif
                                        {{$slot}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
