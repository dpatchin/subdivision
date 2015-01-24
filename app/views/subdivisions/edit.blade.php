@extends('layouts.scaffold')

@section('main')

<h1>Edit Subdivision</h1>
{{ Form::model($subdivision, array('method' => 'PATCH', 'route' => array('subdivisions.update', $subdivision->id))) }}
	<ul>
        <li>
            {{ Form::label('developer_id', 'Developer_id:') }}
            {{ Form::input('number', 'developer_id') }}
        </li>

        <li>
            {{ Form::label('name', 'Name:') }}
            {{ Form::text('name') }}
        </li>

        <li>
            {{ Form::label('address', 'Address:') }}
            {{ Form::text('address') }}
        </li>

        <li>
            {{ Form::label('city', 'City:') }}
            {{ Form::text('city') }}
        </li>

        <li>
            {{ Form::label('state', 'State:') }}
            {{ Form::text('state') }}
        </li>

        <li>
            {{ Form::label('zip', 'Zip:') }}
            {{ Form::text('zip') }}
        </li>

		<li>
			{{ Form::submit('Update', array('class' => 'btn btn-info')) }}
			{{ link_to_route('subdivisions.show', 'Cancel', $subdivision->id, array('class' => 'btn')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
