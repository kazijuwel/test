<script src="https://unpkg.com/swiper/swiper-bundle.js"></script>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {

        //  Like Profile
        $("a.add-like, .add-like").click(function(event) {
            event.preventDefault();
            var ids = $(this).attr("id");
            ids = parseInt(ids.substr(4));
            var formData = {
              "_token": $("meta[name='csrf-token']").attr("content"),
              "rid": ids
            };

            $.ajax({
              url: "{{ route('like_profile') }}",
              type: 'post',
              data: formData,
              success: function(response){
                $("#valid_alert_msg").text("Thank you for like this profile.");
                $('#valid_alert').modal('toggle');
                $("#alert-available").hide();
              }
            });
          });

          var swiper = new Swiper('.swiper-container', {
      effect: 'coverflow',
      grabCursor: true,
      centeredSlides: true,
      slidesPerView: 'auto',
      initialSlide: 1,
      coverflowEffect: {
        rotate: 50,
        stretch: 0,
        depth: 100,
        modifier: 1,
        slideShadows: true,
      },
      pagination: {
        el: '.swiper-pagination',
        dynamicBullets: true,
      },
    });


          /*  #################  Express Interest ################# */
          $("body").on("click", "a.add-interest, .add-interest", function(event){
            event.preventDefault();
            var ids = $(this).attr("id");
            ids = parseInt(ids.substr(4));

            var formData = {
              "_token": $("meta[name='csrf-token']").attr("content"),
              "rid": ids
            };
            if($(this).hasClass('inactive')){
              $.ajax({
                url: "{{ route('express_interest_available') }}",
                type: 'post',
                data: formData,
                context:this,
                success: function(response){
                  //response = JSON.parse(response);
                  if(parseInt(response['msg'])){
                    $("#add-interest-id").val(ids);
                    $("#interest-available").text("Total express interest left: " + response['tRemain'] + " and daily express interest left:" +  response['dRemain']);
                    $('#add-interest-modal').modal('toggle');
                  }
                  else{
                    $("#invalid_alert_msg").text(response['status']);
                    $('#invalid_alert').modal('toggle');
                  }
                }
              });
            }
            else{
              if (!confirm("Do you want to delete interest?")){
                return false;
              }
              $.ajax({
                url: "{{ route('express_delete') }}",
                type: 'post',
                data: formData,
                context:this,
                success: function(response){
                  $("#alert-available").hide();
                  $("#valid_alert_msg").text(response);
                  $('#valid_alert').modal('toggle');
                  $(this).removeClass('active');
                  $(this).addClass('inactive');
                  $(this).attr("title", "Express Interest");
                }
              });
            }
          });

          $("#add-interest-send").click(function(event) {
            var ids = $("#add-interest-id").val();


            var formData = {
              "_token": $("meta[name='csrf-token']").attr("content"),
              "rid": ids,
              "message": $('input[name=msg-text]:checked').val()
            };

            $.ajax({
              url: "{{ route('express_interest') }}",
              type: 'post',
              data: formData,
              context: this,
              success: function(response){
                $("#alert-available").hide();
                $('#add-interest-modal').modal('toggle');
                $("#valid_alert_msg").text(response);
                $('#valid_alert').modal('toggle');
                $("#int-"+ids).removeClass('inactive');
                $("#int-"+ids).addClass('active');
                $(this).attr("title", "Delete Interest");
              }
            });
          });


          /*  #################  Contact Details ################# */
          $(".add-contact").click(function(event) {
            event.preventDefault();
            var ids = $(this).attr("id");
            ids = parseInt(ids.substr(4));
            var formData = {
              "_token": $("meta[name='csrf-token']").attr("content"),
              "rid": ids
            };

            $.ajax({
              url: "{{ route('contact_details') }}",
              type: 'post',
              data: formData,
              success: function(response){
                //response = JSON.parse(response);
                if(parseInt(response['msg'])){
                  $("#bride_groom_gurdian_name").text(response['info']['contact_name']);
                  $("#bride_groom_gurdian_email").text(response['info']['contact_email']);
                  $("#bride_groom_contact").text(response['info']['mobile']);
                  $("#gurdian_contact").text(response['info']['contact_mobile']);
                  $(".pp-address").attr("id", "pp-address-" + ids);

                  if(parseInt(response['details_address']) == 2){
                    $("#present_address").text(response['info']['contact_present_address']);
                    $("#permanent_address").text(response['info']['contact_permanent_address']);
                    $("#pp-address-" + ids).hide();
                    $("#pp-address-" + ids).text("");
                    $(".details_address").show();
                  }
                  else if(parseInt(response['details_address']) == 1){
                    $("#pp-address-" + ids).show();
                    $("#pp-address-" + ids).text("Request already sent for Present and Permanent address.");
                    $(".details_address").hide();
                  }
                  else{
                    $("#pp-address-" + ids).show();
                    $(".details_address").hide();
                    $("#pp-address-" + ids).text("Send request for Present and Permanent address.");
                  }


                  $('#modal_contact_details').modal('toggle');
                  $("#contact-details-name").text("Contact Details of " + $("#name-"+ids).text());
                  $("#remain-contact-details").text("You have " + response['available'] + " Direct Contact Info left");
                }
                else{
                  $("#invalid_alert_msg").text(response['status']);
                  $('#invalid_alert').modal('toggle');
                }
              }
            });
          });

          $("body").on('click', '.pp-address', function(event) {
            if($(this).text() == "Request already sent for Present and Permanent address."){
              event.preventDefault();
            }
            else{
              var ids = $(this).attr("id");
              ids = parseInt(ids.substr(11));
              var formData = {
                "_token": $("meta[name='csrf-token']").attr("content"),
                "rid": ids
              };
              $.ajax({
                url: "{{ route('present_permanent_address') }}",
                type: 'post',
                data: formData,
                success: function(response){
                  $('#valid_alert_msg, #pp-address-'+ids).text("Present and Permanent address request sent successfully.");
                }
              });
            }
          });

          /* ############### Send Message ################## */

          $(".send-message").click(function(event) {
            event.preventDefault();
            var ids = $(this).attr("id");
            ids = parseInt(ids.substr(4));
            $("#send-message-name").text("Send message to " + $("#name-"+ids).text());
            $("input[name='msgId']").val(ids);


            var formData = {
              "_token": $("meta[name='csrf-token']").attr("content")
            };

            $.ajax({
              url: "{{ route('check_message_available') }}",
              type: 'post',
              data: formData,
              success: function(response){
                //response = JSON.parse(response);
                if(parseInt(response['msg'])){
                  $('#message_modal').modal('toggle');
                  $('#message-available').text("Total message left: " + response['tRemain'] + " and Daily message left: " +  response['dRemain']);
                }
                else{
                  $('#invalid_alert').modal('toggle');
                  $('#invalid_alert_msg').text(response['status']);
                }
              }
            });
          });

          $("#send_a_message").click(function(event) {
            event.preventDefault();
            if($("input[name='title']").val() == ""){
              alert("Please write title");
              event.preventDefault();
              return;
            }
            if($("textarea[name='message']").val() == ""){
              alert("Please write your message");
              event.preventDefault();
              return;
            }

            var formData = {
              "_token": $("meta[name='csrf-token']").attr("content"),
              "rid": $("input[name='msgId']").val(),
              "title": $("input[name='title']").val(),
              "message": $("textarea[name='message']").val()
            };

            $.ajax({
              url: "{{ route('send_message') }}",
              type: 'post',
              data: formData,
              success: function(response){
                $('#message_modal').modal('hide');
                $("#valid_alert_msg").text(response);
                $('#valid_alert').modal('toggle');
                $("input[name='title']").val("");
                $("textarea[name='message']").val("");
                $("#alert-available").hide();
              }
            });
          });

          $("body").on("click", ".add-favourite", function(event){
            event.preventDefault();
            var ids = $(this).attr("id");
            ids = parseInt(ids.substr(4));
            var formData = {
              "_token": $("meta[name='csrf-token']").attr("content"),
              "rid": ids
            };

            if($(this).hasClass('inactive')){
              $.ajax({
                url: "{{ route('add_favourites') }}",
                type: 'post',
                data: formData,
                context:this,
                success: function(response){
                  //response = JSON.parse(response);
                  if(parseInt(response['msg'])){
                    $("#valid_alert_msg").text(response['status']);
                    $('#valid_alert').modal('toggle');
                    $("#alert-available").show();
                    $("#alert-available").text("You have " + response['available'] + " favourites left.");
                    $(this).removeClass('inactive');
                    $(this).addClass('active');
                    $(this).attr("title", "Delete Favourite");
                  }
                  else{
                    $("#invalid_alert_msg").text(response['status']);
                    $('#invalid_alert').modal('toggle');
                  }
                }
              });
            }
            else{
              if (!confirm("Do you want to delete favorite?")){
                return false;
              }
              $.ajax({
                url: "{{ route('delete_favourites') }}",
                type: 'post',
                data: formData,
                context:this,
                success: function(response){
                  $("#alert-available").hide();
                  $("#valid_alert_msg").text(response);
                  $('#valid_alert').modal('toggle');
                  $(this).removeClass('active');
                  $(this).addClass('inactive');
                  $(this).attr("title", "Add Favourite");
                }
              });
            }
          });



          $(".message_limit_reach").click(function(event) {
            $("#invalid_alert_msg").text($(".message_limit_reach").attr("alt"));
            $('#invalid_alert').modal('toggle');
          });

        });

</script>


<!-- The Modal -->
<div class="modal fade" id="modal_contact_details">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title" id="contact-details-name"></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <p id='remain-contact-details' class="alert alert-success"></p>
                <table class="table table-striped">
                    <tr>
                        <td width="40%">Gurdian Name: </td>
                        <td id="bride_groom_gurdian_name"></td>
                    </tr>
                    <tr>
                        <td width="40%">Gurdian Email: </td>
                        <td id="bride_groom_gurdian_email"></td>
                    </tr>
                    <tr>
                        <td width="40%">Contact Number: </td>
                        <td id="bride_groom_contact"></td>
                    </tr>
                    <tr>
                        <td>Gurdian Contact: </td>
                        <td id="gurdian_contact"></td>
                    </tr>
                    <tr class="details_address">
                        <td>Present Address: </td>
                        <td id="present_address"></td>
                    </tr>
                    <tr class="details_address">
                        <td>Permanent Address: </td>
                        <td id="permanent_address"></td>
                    </tr>
                </table>

                <hr>
                <button type="button" class="btn btn-success btn-sm pp-address" id="">Send request for Present and
                    Permanent Address</button>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>

<!-- Express Interest Modal -->
<div class="modal fade" id="add-interest-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="" action="index.html" method="post">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title" id="send-message-name"></h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <p class="alert alert-success" id="interest-available"></p>
                    <input type="hidden" id="add-interest-id">
                    <div class="form-group">
                        <input type="radio" name="msg-text"
                            value="I like your profile and would like to communicate, let me know your interest at the earliest"
                            checked>
                        <small>I like your profile and would like to communicate, let me know your interest at the
                            earliest</small>
                    </div>
                    <div class="form-group">
                        <input type="radio" name="msg-text"
                            value="I am interested and serious about your profile. If you are interested, let me know your interest at the earliest">
                        <small>
                            I am interested and serious about your profile. If you are interested, let me know your
                            interest at the earliest
                        </small>
                    </div>
                    <div class="form-group">
                        <input type="radio" name="msg-text"
                            value="My family and I like your profile. we would like to take this foward with your parents/guardian.">
                        <small>My family and I like your profile. we would like to take this foward with your
                            parents/guardian.</small>
                    </div>
                    <div class="form-group">
                        <input type="radio" name="msg-text"
                            value="I have gone through your details and found your profile to be a good match. Please contact us to proceed further.">
                        <small>I have gone through your details and found your profile to be a good match. Please
                            contact us to proceed further.</small>
                    </div>
                    <div class="form-group">
                        <input type="radio" name="msg-text" value="">
                        <small>None(send interest without a message)</small>
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-info" id="add-interest-send">Send Interest</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- The Message Modal -->
<div class="modal fade" id="message_modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="" action="index.html" method="post">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title" id="send-message-name"></h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <p class="alert alert-success" id="message-available"></p>
                    <div class="form-group">
                        <input type="hidden" name="msgId">
                        <label>Title</label>
                        <input type="text" name="title" class="form-control" placeholder="Enter Title">
                    </div>
                    <div class="form-group">
                        <label>Message</label>
                        <textarea required name="message" class="form-control"
                            placeholder="Write your message here"></textarea>
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-info" id="send_a_message">Send</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="valid_alert">
    <div class="modal-dialog" style="top: 25%">
        <div class="modal-content">
            <div class="modal-body">
                <i class="far fa-check-circle fa-3x"></i>
                <p id="valid_alert_msg" align="center"></p>
                <p class="alert alert-success" id="alert-available"></p>
                <br />
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="invalid_alert">
    <div class="modal-dialog" style="top: 25%">
        <div class="modal-content">
            <div class="modal-body">
                <i class="fas fa-exclamation-triangle fa-3x"></i>
                <p id="invalid_alert_msg" align="center"></p>

                <br />
            </div>
        </div>
    </div>
</div>
