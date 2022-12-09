<div class="container-fluid border">
    <div class="container">
        <h3 class="text-center mt-5">Support Tickets</h3>

        {{-- ForEach cards comment --}}
        @foreach ($tickets as $ticket)
            <div class="cards-box mt-5 pb-2">
                <div class="card">
                   
                    {{-- Emit on selectedTicket --}}
                    <div class="card-body lh-1 {{$active == $ticket->id ? 'bg-light bg-gradient' : ''}}" wire:click="$emit('ticketSelected', {{$ticket->id}})">

                        <div class="d-flex justify-content-between">
                            <p class="card-text text-muted fw-light">{{ \Carbon\Carbon::parse($ticket->created_at)->diffForHumans() }}</p>
                            <p class="card-text text-center">{{$ticket->question}}</p>
                        </div>

                    </div>
                </div>
            </div> 
        @endforeach
        

        
        {{-- /ForEach cards comment --}}
    </div>
</div>
