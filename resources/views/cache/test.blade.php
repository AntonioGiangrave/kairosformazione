WELCOME



@role('superUser')

    modifica

@hasrole

<br>

@foreach($users as $user)
    {{$user->nome}}    @can('superUser') [modifica] @endcan  <br>
@endforeach