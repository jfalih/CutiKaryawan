<a href="{{route('admin.user.edit', ['id' => $data->id])}}" class="btn btn-warning">
    <i class="fas fa-edit"></i>
</a>
<form method="POST" action="{{route('admin.user.delete', ['id' => $data->id])}}">
    @method('DELETE')
    @csrf
    <button type="submit" class="btn btn-danger">
        <i class="fas fa-trash"></i>
    </button>
</form>