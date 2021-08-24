@if($data->file != null)
<a href="{{url(Storage::url($data->file))}}" target="_blank"  download="{{$data->file}}" class="btn mb-1 btn-warning">
    <i class="uil-file-download"></i>
</a>
@endif
@if($data->status != 'success' && $data->status != 'canceled')
<form method="POST" action="{{ route('admin.cuti.konfirmasi',['id' => $data->id])}}">
@csrf
<button type="submit" class="btn btn-success mb-1">
    <i class="uil-file-plus-alt"></i>
</button>
</form>

<form method="POST" action="{{ route('admin.cuti.tolak',['id' => $data->id])}}">
    @csrf
    <button type="submit" class="btn btn-danger">
        <i class="uil-file-minus-alt"></i>
    </button>
</form>
@endif