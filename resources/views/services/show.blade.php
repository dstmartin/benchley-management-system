@extends ('layouts.app')

@section ('content')

    <h1>{{ Carbon\Carbon::parse($service->date)->format('l, F d, Y') }} {{ $service->time }} | {{ $service->type }}</h1>

    <livewire:services.show :service="$service->id">
    


@endsection
