<div class="container-fluid d-flex justify-content-center">
    
    {{-- Cointainer --}}
    <div class="container w-50 px-5">
        <h1 class="text-center mt-5">Comments</h1>

        {{-- Alert validation rule --}}
        <div class="alert">
            @error('newComment') <span class="error text-danger fw-bold">{{ $message }}</span> @enderror
        </div>
        
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
            <div class="cards-box mt-5">
                <div class="card">
                    {{-- <img src="..." class="card-img-top" alt="..."> --}}
                    <div class="card-body lh-1">
                        <p class="card-text text-muted fw-light">{{ \Carbon\Carbon::parse($comment->created_at)->diffForHumans() }} by <b>{{$comment->creator->name}}</b></p>
                        <p class="card-text">{{$comment->body}}</p>
                    </div>
                </div>
            </div> 
        @endforeach
        {{-- /ForEach cards comment --}}

    </div>
    {{-- /Cointainer --}}
   
</div>
