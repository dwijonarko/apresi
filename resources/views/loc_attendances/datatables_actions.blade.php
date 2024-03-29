{!! Form::open(['route' => ['locAttendances.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>
    <a href="{{ route('locAttendances.show', $id) }}" class='btn btn-ghost-success'>
       <i class="fa fa-eye"></i>
    </a>
    @can('isAdmin')
    <a href="{{ route('locAttendances.edit', $id) }}" class='btn btn-ghost-info'>
        <i class="fa fa-edit"></i>
     </a>
     {!! Form::button('<i class="fa fa-trash"></i>', [
         'type' => 'submit',
         'class' => 'btn btn-ghost-danger',
         'onclick' => "return confirm('Are you sure?')"
     ]) !!}        
    @endcan

</div>
{!! Form::close() !!}
