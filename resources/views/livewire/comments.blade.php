

<form wire:submit.prevent="storeComments" enctype="multipart/form-data">

    <div class="form-group">
        <input type="file" wire:change="$emit('chosenFile')" id="myImage">
    </div>

    <div class="form-group">
        <label for="exampleInputEmail1">Comments</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Type your comments"  wire:model="input_comments">

        @error('input_comments') <small id="emailHelp" class="text-danger">{{ $message }}</small> @enderror

    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

<div class="card mt-4">
  <div class="card-header">
    Quote
  </div>
  <div class="card-body">
    <blockquote class="blockquote mb-0">
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
      <footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer>
    </blockquote>
  </div>
</div>

{{dd($image)}}

@push('js')
<script>
    window.livewire.on('chosenFile', ()=>{
        let inputFile = document.getElementById('myImage');
        let file = inputFile.files[0];
        let reader = new FileReader();

        reader.onloadend = ()=>{
            window.livewire.emit('fileUploadHandeler', reader.result);
        };
        reader.readAsDataURL(file);
        // alert('ok');
    });
</script>

@endpush
