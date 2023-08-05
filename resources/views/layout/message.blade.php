@if ($errors->any())
    <!-- Error Alert -->
    <div class="alert alert-danger alert-dismissible fade show">
        <ul>
            @foreach ($errors->all() as $item)
                <li><p class="font-monospace"><strong>Error!</strong> {{ $item }}</p></li>
                <button type="button" class="btn btn-close" data-bs-dismiss="alert"></button>
            @endforeach
        </ul>
    </div>
    
@endif

@if (Session::get('success'))
    <div class="alert alert-success alert-dismissible fade show">
        <strong>Success!</strong> {{ Session::get('success') }}.
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif