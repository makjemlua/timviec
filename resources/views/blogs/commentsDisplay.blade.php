@if($comments)
<?php
$i = 1;
?>
@foreach($comments as $comment)
<li class="media">
  <span style="border: 1px solid #d9d9d9; border-radius: 50%; padding: 2px 2px">{{ $i++ }}</span>
  @if($comment->user)
    <div class="media-left"> <a href="#"> <img class="media-object img-responsive" src="{{ isset($comment->user->avatar) ? asset(pare_url_file($comment->user->avatar)) : asset('images/default.png') }}" style="width: 100px; height: 100px; border-radius: 50%;" alt=""> <br>
      </a>
    </div>
  @elseif($comment->employer)
    <div class="media-left"> <a href="#"> <img class="media-object img-responsive" src="{{ isset($comment->employer->em_avatar) ? asset(pare_url_file($comment->employer->em_avatar)) : asset('images/default.png') }}" style="width: 100px; height: 100px; border-radius: 50%;" alt=""> <br>
      </a>
    </div>
  @endif
    <div class="media-body">
      <h6 class="media-heading">
        @if(isset($comment->user))
            {{ $comment->user->name }} - Khách hàng
        @else
            {{ $comment->employer->name }} - Nhà tuyển dụng
        @endif
        <span>{{ $comment->created_at->diffForHumans() }}</span>
        <p>{{ $comment->ra_content }}</p>
       </div>
       @if(isset($comment->user) || isset($comment->employer))

       <div class="commnetsfrm">
          <form action="{{ route('post.reply.article', [$articleDetail, $comment->id]) }}" method="GET">
            @csrf
            <div class="form-group">
                {{-- <input type="text" name="ra_id" value="{{ $comment->id }}"> --}}
                <input type="text" name="ra_content" class="form-control" placeholder="Trả lời bình luận" required>
              <button type="submit" class="btn">Trả lời bình luận</button>
            </div>
          </form>
        </div>
        @endif
  </li>

    @if(count($comment->replies))
    <div class="a" style="margin-top: 10px;width: 750px; height: 300px; overflow:auto;">
      @foreach($comment->replies as $rep1)
            <li class="media margin-left80">
              @if($rep1->user)
              <div class="media-left"> <a href="#"> <img class="media-object img-responsive" src="{{ isset($rep1->user) ? asset(pare_url_file($rep1->user->avatar)) : asset('images/default.png') }}" style="width: 100px; height: 100px; border-radius: 50%;" alt=""> <br>
                </a>
              </div>
              @elseif($rep1->employer)
              <div class="media-left"> <a href="#"> <img class="media-object img-responsive" src="{{ isset($rep1->employer) ? asset(pare_url_file($rep1->employer->em_avatar)) : asset('images/default.png') }}" style="width: 100px; height: 100px; border-radius: 50%;" alt=""> <br>
                </a>
              </div>
              @endif
              <h6 class="media-body">
                <div class="media-heading">
                  @if(isset($rep1->ra_user_id))
                      {{ $rep1->user->name }} - Khách hàng
                  @else
                      {{ $rep1->employer->name }} - Nhà tuyển dụng
                  @endif
                  <span>{{ $rep1->created_at->diffForHumans() }}</span>
                  <p>{{ $rep1->ra_content }}</p>
                </div>
              </h6>
            </li>
        @endforeach
    </div>
    @endif
@endforeach
@endif