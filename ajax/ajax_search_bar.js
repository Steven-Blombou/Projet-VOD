<script>
$(document).ready(function(){
$('#search_film').keyup(function(){
  $('#result-search').html('');

  var film = $(this).val();

  if(film != ""){
    $.ajax({
      type: 'GET',
      url: 'fonctions/recherche_film.php',
      data: 'film=' + encodeURIComponent(film),
      success: function(data){
        if(data != ""){
          $('#result-search').append(data);
        }else{
          document.getElementById('result-search').innerHTML = "<div style='font-size: 20px; text-align: left; margin-top: 10px'>Aucun films</div>"
        }
      }
    });
  }
});
});
</script>
