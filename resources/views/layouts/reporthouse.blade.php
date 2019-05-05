<div class="modal repo" id="reportModal">
  <div class="modal-background"></div>
  <div class="modal-card">
    <header class="modal-card-head">
      <p class="modal-card-title has-text-centered">Report Property</p>
      <button class="delete closeme" aria-label="close"></button>
    </header>
    <section class="modal-card-body">
      <form action="/house/{{$house->id}}/report" method="post">
        @csrf
        <div class="field">
          <div class="control column is-8 is-offset-2">
            <label for="email">Email</label>
            <input name="propertyid" type="text" value="{{$house->property_id}}" hidden>
            <input name="houseid" type="text" value="{{$house->id}}" hidden>
            <input class="input is-7 is-info" name="email" type="email" placeholder="Your email address" required>
          </div>
          <div class="control column is-8 is-offset-2">
            <label for="email">Reason</label>
            <textarea class="textarea  is-7 is-info" name="reason" type="text" placeholder="Please tell us why you want to report this ad" rows="3" required></textarea>
          </div>
        </div>
        <div class="field is-centered has-text-centered">
          <button type="submit" class="button is-danger"><span class="savebutton">Submit</span></button>
        </div>
      </form>
    </section>
    <footer class="modal-card-foot is-centered has-text-centered">
      <p class="subtitle is-7 has-text-centered" style="margin-left: 12%;">Thank you for your report, our staff will look into this report and take further actions. <br> <strong>RealProperty - Leader in Real Estate Business</strong></p>
    </footer>
  </div>
</div>


{{-- JS Script for popup --}}
<script>
  var modal = document.getElementById('reportModal');
    var btn = document.getElementById("report");
    var span = document.getElementsByClassName("closeme")[0];
    btn.onclick = function() {
      document.querySelector('.repo').style.display = 'block';
    }
    span.onclick = function() {
      modal.style.display = "none";
    }
    window.onclick = function(event) {
      if (event.target == modal) {
        modal.style.display = "none";
      }
    }

</script>