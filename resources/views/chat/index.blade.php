@extends('layouts.app')
@section('content')
<style type="text/css">
  form
  {
    padding: 0 5px;
  }
  input.btn
  {
    font-weight: bold;
    background-color: #46e761;
  }
  input.btn:hover
  {
    color: white;
    background-color: blue;
  }
  div.jobButtons
  {
        display: inline-flex;
  }
</style>
<!-- Page Title start -->
<div class="pageTitle">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-sm-6">
        <h1 class="page-heading">Job Detail</h1>
      </div>
      <div class="col-md-6 col-sm-6">
        <div class="breadCrumb"><a href="">Home</a> / <span>Job Name</span></div>
      </div>
    </div>
  </div>
</div>
<!-- Page Title End -->

<div class="listpgWraper">
  <div class="container">

    <div class="row">

        <div class="col-sm-4">
          <div class="panel panel-primary">
            <div class="panel-heading top-bar">
                        <div class="col-md-8 col-xs-8">
                            <h3 class="panel-title"><span class="fa fa-book"></span> Contacts</h3>
                        </div>
                    </div>
            <table class="table table-striped table-hover">
                <tbody>
                  @foreach($employers as $employer)
                    <tr class="user" id="{{ $employer->userToEmployer->id }}">
                        <td>
                          <span class="pending">{{ $employer->count() }}</span>
                        </td>
                        <td>{{ $employer->userToEmployer->name }}</td>
                    </tr>
                  @endforeach
                </tbody>
            </table>
          </div>
         </div>

         {{-- <div class="col-md-4">
                <div class="user-wrapper">
                    <ul class="users">
                        @foreach($employers as $employer)
                            <li class="user" id="{{ $employer->userToEmployer->id }}">
                                    <span class="pending"></span>

                                <div class="media">
                                    <div class="media-left">
                                        <img src="{{ $employer->userToEmployer->em_avatar }}" alt="" class="media-object">
                                    </div>

                                    <div class="media-body">
                                        <p class="name">{{ $employer->userToEmployer->name }}</p>
                                        <p class="email">{{ $employer->userToEmployer->email }}</p>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div> --}}

         <div class="col-sm-8" id="messages">

         </div>

         </div>
     </div>

  </div>
  </div>
</div>
@endsection
@section('script')
<script src="{{ asset('js/jquery.js') }}"></script>
<script src="https://js.pusher.com/6.0/pusher.min.js"></script>

<script>
    var receiver_id = '';
    var my_id = "{{ Auth::id() }}";
    $(document).ready(function () {
        // ajax setup form csrf token
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('c523bfcaba1e9183cd6d', {
      cluster: 'ap1'
    });

    var channel = pusher.subscribe('my-channel');
    channel.bind('my-event', function(data) {
      alert(JSON.stringify(data));
      //console.log(JSON.stringify(data));

            // if (my_id == data.from) {
            //     $('#' + data.to).click();
            // } else if (my_id == data.to) {
            //     if (receiver_id == data.from) {
            //         // if receiver is selected, reload the selected user ...
            //         $('#' + data.from).click();
            //     } else {
            //         // if receiver is not seleted, add notification for that user
            //         var pending = parseInt($('#' + data.from).find('.pending').html());
            //         if (pending) {
            //             $('#' + data.from).find('.pending').html(pending + 1);
            //         } else {
            //             $('#' + data.from).append('<span class="pending">1</span>');
            //         }
            //     }
            // }
        });
        $('.user').click(function () {
            $('.user').removeClass('active');
            $(this).addClass('active');
            $(this).find('.pending').remove();
            receiver_id = $(this).attr('id');
            $.ajax({
                type: "get",
                url: "message/" + receiver_id, // need to create this route
                data: "",
                cache: false,
                success: function (data) {
                    $('#messages').html(data);
                    scrollToBottomFunc();
                }
            });
        });
        $(document).on('keyup', '.input-text input', function (e) {
            var message = $(this).val();
            // check if enter key is pressed and message is not null also receiver is selected
            if (e.keyCode == 13 && message != '' && receiver_id != '') {
                $(this).val(''); // while pressed enter text box will be empty
                var datastr = "receiver_id=" + receiver_id + "&message=" + message;
                $.ajax({
                    type: "post",
                    url: "{{ route('chat.submit') }}", // need to create this post route
                    data: datastr,
                    cache: false,
                    success: function (data) {
                    },
                    error: function (jqXHR, status, err) {
                    },
                    complete: function () {
                        scrollToBottomFunc();
                    }
                })
            }
        });
    });
    // make a function to scroll down auto
    function scrollToBottomFunc() {
        $('.message-wrapper').animate({
            scrollTop: $('.message-wrapper').get(0).scrollHeight
        }, 50);
    }
</script>
@stop