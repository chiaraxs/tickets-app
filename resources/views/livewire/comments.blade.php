<div class="container-fluid d-flex justify-content-center">
    
    {{-- Cointainer --}}
    <div class="container w-50 px-5">
        <h1 class="text-center mt-5">Comments</h1>

        {{-- Alert validation rule --}}
        <div class="alert">
            @error('newComment') <span class="error text-danger fw-bold">{{ $message }}</span> @enderror
        </div>
        {{-- /Alert validation rule --}}

        {{-- Alert success message --}}
        <div>
            @if (session()->has('message'))
                <div class="alert alert-success p-2">
                    {{ session('message') }}
                </div>
            @endif
        </div>
        {{-- /Alert success message --}}

        {{-- Image section upload --}}
        <section>
            <img src="{{$image}}" width="200">
            <input type="file" id="image" wire:change="$emit('fileChoosen')">
        </section>
        {{-- /Image section upload --}}

        
        {{-- Form --}}
        <form class="">
            <div class="mb-3">
              <input type="text" class="form-control" id="comment" placeholder="What's in your mind?" wire:model.lazy="newComment">
            </div>
        </form>
        {{-- /Form --}}

        {{-- Button --}}
        <div class="d-flex justify-content-end">
            <button class="btn btn-primary" wire:click="addComment">Add comment</button>
        </div>
        {{-- /Button --}}

        <hr class="border border-primary border-2 opacity-25 mt-5">

        {{-- ForEach cards comment --}}
        @foreach ($comments as $comment)
            <div class="cards-box mt-5 pb-2">
                <div class="card">
                   
                    <div class="card-body lh-1">

                        <div class="d-flex justify-content-between">
                            <p class="card-text text-muted fw-light">{{ \Carbon\Carbon::parse($comment->created_at)->diffForHumans() }} by <b>{{$comment->creator->name}}</b></p>
                            <i class="fas fa-times text-danger fw-bolder cursor-pointer" wire:click="removeComment({{$comment->id}})"></i>
                        </div>
                        
                        {{-- Image from storage --}}
                        @if ($comment->image)
                            <div class="d-flex justify-content-center">
                                <img src="/storage/{{ $comment->image }}" width="200">  
                            </div> 
                        @endif
                        {{-- /Image from storage --}}

                        <p class="card-text text-center">{{$comment->body}}</p>
                    </div>
                </div>
            </div> 
        @endforeach
        
            {{-- Pagination --}}
            <div class="alert d-flex justify-content-center"">
                {{ $comments->links() }}
            </div>
            {{-- /Pagination --}}

        
        {{-- /ForEach cards comment --}}

    </div>
    {{-- /Cointainer --}}
   
</div>

{{-- Upload Image script --}}
<script>
    window.livewire.on('fileChoosen', () => {

       let inputField = document.getElementById('image')
       
       let file = inputField.files[0]

       let reader = new FileReader();

        reader.onloadend = () => {
            window.livewire.emit('fileUpload', reader.result);
        }

       reader.readAsDataURL(file);
    })
</script>
