@if ($errors->any())
    <div style="margin: 0 20px 20px;">
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif

@if (session()->has('massage'))
    <div style="margin: 0 20px 20px;">
        <div class="alert alert-{{ session('type') }}">
            {{ session('massage') }}
        </div>
    </div>
@endif
