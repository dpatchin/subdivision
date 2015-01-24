@extends('layouts.scaffold')

@section('main')

<h1>All Subdivisions</h1>

<p>{{ link_to_route('subdivisions.create', 'Add new subdivision') }}</p>

@if ($subdivisions->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Developer_id</th>
				<th>Name</th>
				<th>Address</th>
				<th>City</th>
				<th>State</th>
				<th>Zip</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($subdivisions as $subdivision)
				<tr>
					<td>{{{ $subdivision->developer_id }}}</td>
					<td>{{{ $subdivision->name }}}</td>
					<td>{{{ $subdivision->address }}}</td>
					<td>{{{ $subdivision->city }}}</td>
					<td>{{{ $subdivision->state }}}</td>
					<td>{{{ $subdivision->zip }}}</td>
                    <td>{{ link_to_route('subdivisions.edit', 'Edit', array($subdivision->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('subdivisions.destroy', $subdivision->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no subdivisions
@endif

@stop
