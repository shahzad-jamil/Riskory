<div class="d-inline-block">
    @if (!($rc->likedBy(auth()->user())))
        <a role="button" onclick="parent.location='{{route('rc.like',$rc)}}'" href="javascript:void(0);"><i class="far fa-thumbs-up"></i></a>
    @else
        <form action="{{route('rc.unlike',$rc)}}" name="unlike" method="POST">
            @csrf
            @method('DELETE')
            <button class="bg-dark" role="button" type="submit"><i class="fas fa-thumbs-up"></i></button>
        </form>
    @endif
            <p class="p-style font-eb text-center">{{$rc->likes->count()}}</p>
            
        </div>
        <div class="d-inline-block">
    @if (!($rc->dislikedBy(auth()->user())))
        <a role="button" onclick="parent.location='{{route('rc.dislike',$rc)}}'" href="javascript:void(0);"><i class="far fa-thumbs-down"></i></a>
    @else
        <form action="{{route('rc.undislike',$rc)}}" name="undislike" method="POST">
            @csrf
            @method('DELETE')
            <button class="bg-dark" role="button" type="submit"><i class="fas fa-thumbs-down"></i></button>
        </form>
    @endif
            <p class="p-style font-eb text-center">{{$rc->dislikes->count()}}</p>
            
            
        </div>
        <div class="d-inline-block">
        
    @if (!($rc->bookmarkedBy(auth()->user())))
        <a role="button" onclick="parent.location='{{route('rc.bookmark',$rc)}}'" href="javascript:void(0);"><i class="far fa-bookmark"></i></a>
    @else
        <form action="{{route('rc.unbookmark',$rc)}}" name="unbookmark{{$rc->id}}" method="POST">
            @csrf
            @method('DELETE')
            <button class="bg-dark" role="button" type="submit"><i class="fas fa-bookmark"></i></button>
        </form>
    @endif
            <p class="p-style font-eb text-center">{{$rc->bookmarks->count()}}</p>
        </div>

