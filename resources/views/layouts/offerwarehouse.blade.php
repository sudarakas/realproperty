<div id="myModal" class="modal column is-half is-offset-one-quarter">
            <div class="modal-content">
                <div class="is-pulled-right">
                        <span class="close has-text-danger"><i class="far fa-times-circle"></i></span>
                </div>
                <p class="title is-6 has-text-centered">Submit your offer</p>
                <p class="subtitle is-7 has-text-danger has-text-centered">Important : Your offer should be higher than current offer</p>
                <form action="/warehouse/{{$warehouse->id}}/offer" method="post">
                  @csrf
                  <div class="field">
                    <div class="control column is-8 is-offset-2">
                        <input class="input is-7" name="offeramount" type="text" placeholder="Enter Your Offer Amount">
                        <input name="propertyid" type="text" value="{{$warehouse->property_id}}" hidden>
                        <input name="warehouseid" type="text" value="{{$warehouse->id}}"hidden>
                    </div>
                </div>
                <div class="field is-centered has-text-centered">
                  <button type="submit" class="button is-info"><span class="savebutton">Submit</span></button>
                </div>
                </form>
            </div>   
        </div>
    </div>

    {{-- JS Script for popup --}}
    <script>
            
            var modal = document.getElementById('myModal');
            var btn = document.getElementById("myBtn");
            var span = document.getElementsByClassName("close")[0];
            btn.onclick = function() {
              modal.style.display = "block";
            }
            span.onclick = function() {
              modal.style.display = "none";
            }
            window.onclick = function(event) {
              if (event.target == modal) {
                modal.style.display = "none";
              }
            }

            //Display File Name
            var input = document.getElementById( 'file-input' );
            var infoArea = document.getElementById( 'file-name' );
            input.addEventListener( 'change', showFileName );
            function showFileName( event ) {      
            var input = event.srcElement;         
            var fileName = input.files[0].name;
            infoArea.textContent = 'File name: ' + fileName;
}
            </script>
            {{-- Tablet View Submit --}}
            <script>
            
            var modal = document.getElementById('myModal');
            var btn = document.getElementById("myBtnM");
            var span = document.getElementsByClassName("close")[0];
            btn.onclick = function() {
              modal.style.display = "block";
            }
            span.onclick = function() {
              modal.style.display = "none";
            }
            window.onclick = function(event) {
              if (event.target == modal) {
                modal.style.display = "none";
              }
            }

            //Display File Name
            var input = document.getElementById( 'file-input' );
            var infoArea = document.getElementById( 'file-name' );
            input.addEventListener( 'change', showFileName );
            function showFileName( event ) {      
            var input = event.srcElement;         
            var fileName = input.files[0].name;
            infoArea.textContent = 'File name: ' + fileName;
}
            </script>