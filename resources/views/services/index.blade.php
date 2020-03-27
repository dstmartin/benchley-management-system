@extends ('layouts.app')

@section ('content')

    <h1>List of Services</h1>
    
    @if ($services->count())
        <div class="table-responsive">
            <table class="table table-bordered table-condensed">
        		<thead>
        			<tr>
        				<th>Date/Time</th>
        				<th>Type</th>
        				<th>Present</th>
        				<th>Absent</th>
        				<th>Unknown</th>
        				<th>Actions</th>
        			</tr>
        		</thead>
        		<tbody>
                    @foreach($services as $service)
                        <tr>
                            <td>{{ Carbon\Carbon::parse($service->date)->format('F d, Y') }} {{ $service->time }}</td>
                            <td>{{ $service->type }}</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><a href="{{ route('services.show', $service->id) }}" class="btn btn-info btn-xs">Manage Attendance</a></td>
                        </tr>
                    @endforeach
        		</tbody>
        	</table>
        </div>
        {{ $services->links() }}
    
    @else
        <p>Sorry! No results matched your query.</p>
    @endif

    <p>
        <a href="{{ route('services.create') }}" class="btn btn-success">Add Service</a>
    </p>
@endsection