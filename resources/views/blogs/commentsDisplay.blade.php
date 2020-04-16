@if($comments)
<?php
$i = 1;
?>
@foreach($comments as $comment)
<li class="media">
  <span style="border: 1px solid #d9d9d9; border-radius: 50%; padding: 2px 2px">{{ $i++ }}</span>
    <div class="media-left"> <a href="#"> <img class="media-object img-responsive" src="{{ isset($comment->user->avatar) ? asset(pare_url_file($comment->user->avatar)) : asset(pare_url_file($comment->employer->em_avatar)) }}" style="width: 100px; height: 100px; border-radius: 50%;" alt=""> <br>
      </a> </div>
    <div class="media-body">
      <h6 class="media-heading">
        @if(isset($comment->user->name))
            {{ $comment->user->name }} - Khách hàng
        @else
            {{ $comment->employer->name }} - Nhà tuyển dụng
        @endif
        <span>{{ $comment->created_at->diffForHumans() }}</span>
        {{ $comment->ra_content }}</p>
       </div>
       @if(isset($comment->user->name) || isset($comment->employer->name))
       @else
       <div class="commnetsfrm">
          <form action="{{ route('post.reply.article', [$articleDetail, $comment->id]) }}" method="GET">
            @csrf
            <div class="form-group">
                {{-- <input type="text" name="ra_id" value="{{ $comment->id }}"> --}}
                <input type="text" name="ra_content" class="form-control" placeholder="Reply" required>
              <button type="submit" class="btn">Reply</button>
            </div>
          </form>
        </div>
        @endif
  </li>

    @if(count($comment->replies))
    <div class="a" style="margin-top: 10px;width: 750px; height: 300px; overflow:auto;">
      @foreach($comment->replies as $rep1)
            <li class="media margin-left80">
              <div class="media-left"> <a href="#"> <img class="media-object img-responsive" src="{{ isset($rep1->user->avatar) ? asset(pare_url_file($rep1->user->avatar)) : asset(pare_url_file($rep1->employer->em_avatar)) }}" style="width: 100px; height: 100px; border-radius: 50%;" alt=""> <br>
                </a> </div>
              <h6 class="media-body">
                <div class="media-heading">
                  @if(isset($rep1->ra_user_id))
                      {{ $rep1->user->name }} - Khách hàng
                  @else
                      {{ $rep1->employer->name }} - Nhà tuyển dụng
                  @endif
                  <span>{{ $rep1->created_at->diffForHumans() }}</span>
                  {{ $rep1->ra_content }}</p>
                </div>
              </h6>
            </li>
        @endforeach
    </div>
    @endif
@endforeach
@endif