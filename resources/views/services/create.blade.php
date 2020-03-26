@extends ('layouts.app')

@section ('content')

    <h1>Add New Service</h1>
    
    {{ Form::open(['route' => 'services.store']) }}
    
    <div class='form-group col-xs-12 col-md-4'>
        {!! Form::label('date', 'Date:') !!}
        {!! Form::date('date', \Carbon\Carbon::now(), ['class' => 'form-control']) !!}
    </div>
    
    <div class='form-group col-xs-12 col-md-4'>
        {!! Form::label('time', 'Time:') !!}
        {!! Form::select('time', ['' => 'Select..', 'AM' => 'AM', 'PM' => 'PM'], null, ['class' => 'form-control']) !!}
    </div>
    
    <div class='form-group col-xs-12 col-md-4'>
        {!! Form::label('type', 'Type:') !!}
        {!! Form::select('type', ['' => 'Select..', 'Bible Class' => 'Bible Class', 'Worship' => 'Worship'], null, ['class' => 'form-control']) !!}
    </div>
    
    <div class="row">
        <div class="col-md-12">
    		{{ Form::submit('Add Service', ['class' => 'btn btn-primary']) }}
    	</div>
	</div>
    
    {{ Form::close() }}
    
@endsection