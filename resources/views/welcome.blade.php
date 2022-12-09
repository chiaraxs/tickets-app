<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tickets Support App</title>
    
    {{-- Bootstrap cdn --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    
    {{-- Fontawesome cdn --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    {{-- Livewire styles --}}
    <livewire:styles />
    {{-- Livewire scripts --}}
    <livewire:scripts />
    
  </head>

  <body>
    
    {{-- Livewire component --}}
    <div class="container-fluid">
      <div class="container">
        <div class="row">
          <div class="col-3">
            <livewire:tickets />
          </div>
    
          <div class="col-9">
            <livewire:comments />
          </div>
        </div>
      </div>
    </div>

  </body>
    
</html>
