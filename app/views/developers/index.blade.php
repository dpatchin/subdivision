@extends('layouts.scaffold')

@section('main')

<h1>All Developers</h1>

<p>{{ link_to_route('developers.create', 'Add new developer') }}</p>

@if ($developers->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Name</th>
				<th>Contact_fname</th>
				<th>Contact_lname</th>
				<th>Contact_email</th>
				<th>Contact_phone</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($developers as $developer)
				<tr>
					<td>{{{ $developer->name }}}</td>
					<td>{{{ $developer->contact_fname }}}</td>
					<td>{{{ $developer->contact_lname }}}</td>
					<td>{{{ $developer->contact_email }}}</td>
					<td>{{{ $developer->contact_phone }}}</td>
                    <td>{{ link_to_route('developers.edit', 'Edit', array($developer->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('developers.destroy', $developer->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no developers
@endif

@stop
