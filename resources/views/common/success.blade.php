@if (session('status'))
    <div class="alert alert-success">
        <strong>¡Success! </strong>{{ session('status') }}
    </div>
@endif
