{{--
<div class="container">
	<div class="row">
	   <div class="col-md-12">
	      <form method="post" action="#" id="#">




              <div class="form-group files color">
                  @if (isset($image))

                  <img src="{{$image}}" width="100" height="50">
                  @endif
                <label>Upload Your File </label>
                <input wire:change="$emit('fileChosen')" id="myfile" type="file" class="form-control" multiple="">
              </div>


          </form>


	  </div>
	</div>
</div>

@push('js')

<script>
    window.livewire.on('fileChosen', ()=>{
        let fileChosen = document.getElementById("myfile");
        let file = fileChosen.files[0];
        let reader = new FileReader;
        reader.onload = ()=> {
            window.livewire.emit('fileUploadHandler', reader.result);
        }

        let output = reader.readAsDataURL(file);

        console.log(output);
    });
</script>

@endpush --}}
