@extends('components.layouts.app')

@section('content')
        @if(isset($status) && isset($message))
            <div class="alert {{ $status == 'error' ? 'alert-warning' : 'alert-success' }} alert-dismissible fade show" role="alert">
                {{ $message }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @if (isset($jsonData))
                <div class="json-view">
                    <pre>{{ $jsonData }}</pre>
                </div>
            @endif
        @endif

    </div>
@endsection

</body>
</html>
