		{{ Form::label('content','Item Title')}}
		{{ Form::text('content')}}
		{{ $errors->first('content','<small class="error">:message</small>') }}
		{{ Form::submit('Update', array("class"=>"button"))}}