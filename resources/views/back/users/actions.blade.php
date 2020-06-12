@if(request()->user()->id !== $id)
    @if($banned_at !== null)
        <form method="POST" action="{{ route('back.users.unban', $id) }}" onClick="return confirm('{{ __('Are you sure you want to unban this user?') }}')" accept-charset="UTF-8" style="display:inline">
            @csrf
            <button type="submit" class="btn btn-xs btn-success">
                <i class="fa fa-check"></i>
            </button>
        </form>
    @endif
    @if($banned_at === null)
        <form method="POST" action="{{ route('back.users.ban', $id) }}" onClick="return confirm('{{ __('Are you sure you want to ban this user?') }}')" accept-charset="UTF-8" style="display:inline">
            @csrf
            <button type="submit" class="btn btn-xs btn-danger">
                <i class="fa fa-ban"></i>
            </button>
        </form>
    @endif
    <form method="POST" action="{{ route('back.users.ban', $id) }}" onClick="return confirm('{{ __('Are you sure you want to delete this user?') }}')" accept-charset="UTF-8" style="display:inline">
        @csrf
        <button type="submit" class="btn btn-xs btn-danger">
            <i class="fa fa-trash"></i>
        </button>
    </form>
@endif
