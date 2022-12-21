  <!-- Javascript Files
  ================================================== -->

  <!-- initialize jQuery Library -->
  <script src="{{ asset('assets/frontends/plugins/jQuery/jquery.min.js') }}"></script>
  <!-- Bootstrap jQuery -->
  <script src="{{ asset('assets/frontends/plugins/bootstrap/bootstrap.min.js') }}"></script>
  <!-- Slick Carousel -->
  <script src="{{ asset('assets/frontends/plugins/slick/slick.min.js') }}"></script>
  <script src="{{ asset('assets/frontends/plugins/slick/slick-animation.min.js') }}"></script>
  <!-- Color box -->
  <script src="{{ asset('assets/frontends/plugins/colorbox/jquery.colorbox.js') }}"></script>
  <!-- shuffle -->
  <script src="{{ asset('assets/frontends/plugins/shuffle/shuffle.min.js') }}" defer></script>


  <!-- Google Map API Key-->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU" defer></script>
  <!-- Google Map Plugin-->
  <script src="{{ asset('assets/frontends/plugins/google-map/map.js') }}" defer></script>

  <!-- Template custom -->
  <script src="{{ asset('assets/frontends/js/script.js') }}"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script></script>
<!-- journal search -->
<!-- <script>
  $(document).ready(function(){
    $("#search_journal").on('keyup',function(){
      var val = $(this).val();
      console.log(val);
      $.ajax({
           url:"{{ url('journal_search') }}",
           method:'GET',
           data:{'name': 'name'},
           success:function(journal){
             $('#show').html(journal);
             if(journal.status=='nothing_found'){
                $('#show').html('<span class="text-danger">'+'nothing found'+'</span>')
             }
           }
      });
    });
  });
</script> -->
<script>
  // JavaScript code
function search_animal() {
    let input = document.getElementById('searchbar').value
    input=input.toLowerCase();
    let x = document.getElementsByClassName('post');
      
    for (i = 0; i < x.length; i++) { 
        if (!x[i].innerHTML.toLowerCase().includes(input)) {
            x[i].style.display="none";
        }
        else {
            x[i].style.display="list-item";                 
        }
    }
}
</script>