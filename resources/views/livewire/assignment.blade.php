<div class="flex justify-center">
        <div class="w-8/12">
            <h1 class="my-10 text-3xl">Assignment</h1>
            <form action="" method="POST" enctype="multipart/form-data" class="form-horizontal">
            @csrf 
            <div class="card-body">
                <div class="form-group">
                    <div class="col-sm-10">
                        <label for="status">Select Class</label>
                        <select wire:model="selectedCountry">
                            <option value="">Select</option>
                            @foreach($countrys as $country)
                                <option value="{{ $country->id }}"> {{ $country->name }} </option>
                            @endforeach
                        </select>
                    </div>
                    {{ selectedCountry }}
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary" wire:loading.attr="disabled">Add Assignment</button>
                <div wire:loading>
                        djfgdfjhkbghdrg
                </div>
            </div>
        
        </form>
        </div>
</div>
