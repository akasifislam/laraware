<div class="flex justify-center mt-5">
    <div class="w-8/12">
        <form action="" method="POST" enctype="multipart/form-data" class="form-horizontal">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <div class="col-sm-10">
                        <label for="status">Select Country</label>
                        <select name="" id="" wire:model="selectedCountry">
                            <option value=""> --- select --- </option>
                            @foreach ($countrys as $country)
                                <option value="{{ $country->id }}"> {{ $country->name }} </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <br>
                <br>
                <br>
                <br>
                <br>
                @if (!is_null($players))
                    <div class="form-group">
                        <div class="col-sm-10">
                            <label for="status">Select Country</label>
                            <select name="" id="" wire:model="selectedCountry">
                                <option value=""> --- select --- </option>
                                @foreach ($players as $countr)
                                    <option value="{{ $countr->id }}"> {{ $countr->name }} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                @endif
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary" wire:loading.attr="disabled">add</button>
                <div wire:loading>
                    Hold on....
                </div>
            </div>
        </form>
    </div>
</div>
