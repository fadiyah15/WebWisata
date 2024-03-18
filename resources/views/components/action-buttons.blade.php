<div class="btn-group">
    <a href="#" class="btn btn-primary btn-xs edit-button mx-1" data-toggle="modal"
        data-target="#editModal{{$id}}" data-id="{{$id}}">
        <i class="fa fa-edit"></i>
    </a>
    <a href="{{ route($route . '.destroy', $id) }}"
        onclick="notificationBeforeDelete(event, this, {{$key+1}})" class="btn btn-danger btn-xs">
        <i class="fa fa-trash"></i>
    </a>
</div>

