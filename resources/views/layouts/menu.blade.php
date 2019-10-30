
@can('isAdmin')
<li class="nav-item nav-title">
    Administrator Account
</li>
<li class="nav-item">
<a class="nav-link" href="/home">
    <i class="nav-icon icon-speedometer"></i> Dashboard
</a>
</li>
@include('layouts.menu-admin')
@elsecan('isOperator')
<li class="nav-item nav-title">
    Operator Account
</li>
<li class="nav-item">
<a class="nav-link" href="/home">
    <i class="nav-icon icon-speedometer"></i> Dashboard
</a>
</li>
@include('layouts.menu-operator')

@else
<li class="nav-item nav-title">
    Registered Account
</li>
<li class="nav-item">
<a class="nav-link" href="/home">
    <i class="nav-icon icon-speedometer"></i> Dashboard
</a>
</li>
@include('layouts.menu-registered')

@endcan
