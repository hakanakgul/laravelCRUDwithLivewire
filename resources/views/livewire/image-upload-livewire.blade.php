<div class="container">
    @if (session()->has('message'))
        <h5 class="alert alert-success from-control">{{ session('message') }}</h5>
    @endif
    @if (session()->has('error'))
        <h5 class="alert alert-danger">{{ session('error') }}</h5>
    @endif

    <div class="row">
        <div class="col-md-12">
            <div class="card">

                <div class="card-header">
                    Upload
                </div>
                <div class="card-body">
                    <form wire:submit.prevent="save">
                        <div class="mb-3">
                            <input type="file" wire:model="photo" class="form-control" accept=".jpg, .jpeg, .png">
                            <div wire:loading wire:target="photo" class="form-control">Uploading...</div>

                            @error('photo')
                                <span class="alert alert-danger">{{ $message }}</span>
                            @enderror
                            @if ($photo && !$errors->has('photo'))
                                <img src="{{ $photo->temporaryUrl() }}" height="150px">
                            @endif
                        </div>

                        <button type="submit" class="btn btn-primary form-control">Save Photo</button>
                    </form>

                    @foreach ($photos as $photo)
                        <input type="text" value={{ $photo->file_name }} class="form-control">
                        <img src="{{ asset('storage/photos/' . $photo->file_name) }}" height="150px">
                        <br>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
