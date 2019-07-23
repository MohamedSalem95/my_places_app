<nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom mb-2">
    <div class="container">
    <a class="navbar-brand" href="{{ route('home') }}"> <i class="fas fa-map-marker-alt"></i> {{ env('APP_NAME') }} </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            
            
            
        </ul>

        <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                        <a class="btn btn-primary" href="{{ route('places.create') }}">
                            <i class="fas fa-plus"></i>
                            New place
                        </a>
                    </li>
                    
            <li class="nav-item">
              
                <a href="{{ route('places.dashboard') }}" class="btn btn-success ml-2">
                    <i class="fas fa-tachometer-alt"></i>
                    Manage your places
                </a>
            </li>
        </ul>
        </div>
    </div>
  </nav>