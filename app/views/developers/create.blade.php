@extends('layouts.scaffold')

@section('main')

<h1>Create Developer</h1>

{{ Form::open(array('route' => 'developers.store')) }}
	<ul>
        <li>
            {{ Form::label('name', 'Name:') }}
            {{ Form::text('name') }}
        </li>

        <li>
            {{ Form::label('contact_fname', 'Contact_fname:') }}
            {{ Form::text('contact_fname') }}
        </li>

        <li>
            {{ Form::label('contact_lname', 'Contact_lname:') }}
            {{ Form::text('contact_lname') }}
        </li>

        <li>
            {{ Form::label('contact_email', 'Contact_email:') }}
            {{ Form::text('contact_email') }}
        </li>

        <li>
            {{ Form::label('contact_phone', 'Contact_phone:') }}
            {{ Form::text('contact_phone') }}
        </li>

		<li>
			{{ Form::submit('Submit', array('class' => 'btn btn-info')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop


