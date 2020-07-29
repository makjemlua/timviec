<div class="col-sm-8 message-wrappe">
    <div class="chatbody">
      <div class="panel panel-primary">
        <div class="panel-heading top-bar">
          <div class="col-md-8 col-xs-8">
            <h3 class="panel-title"><span class="fa fa-comment"></span> Chat - ÂA</h3>
          </div>
        </div>
      </div>
    </div>
      <div class="panel-body msg_container_base">
  @foreach($messages as $message)
    <div class="row msg_container {{ ($message->ch_from == Auth::id()) ? 'base_sent' : 'base_receive' }}">
        <div class="col-md-10 col-xs-10">
            <div class="messages msg_sent">
                <p>{{ $message->message }}</p>
                <time datetime="{{ date('d M y, h:i a', strtotime($message->created_at)) }}"></time>
            </div>
        </div>

    </div>
    @endforeach


    </div>
    <div class="panel-footer">
      <div class="input-group">
            <div class="input-text input-group-btn">
              <input type="text" name="message" class="form-control">
            </div>
      </div>
  </div>
</div>

{{-- <div class="message-wrapper">
    <ul class="messages">
        @foreach($messages as $message)
            <li class="message clearfix">
                <div class="{{ ($message->ch_from == Auth::id()) ? 'sent' : 'received' }}">
                    <p>{{ $message->ch_content }}</p>
                    <p class="date">{{ date('d M y, h:i a', strtotime($message->created_at)) }}</p>
                </div>
            </li>
        @endforeach
    </ul>
</div>

<div class="input-text">
    <input type="text" name="message" class="submit">
</div> --}}