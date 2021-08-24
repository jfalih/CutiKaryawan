<form method="POST" action="{{route('pengumuman.destroy', ['id' => $data->id])}}">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger">
        <i class="fas fa-trash"></i>
    </button>
</form>