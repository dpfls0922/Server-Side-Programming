$(document).ready(function() {
    
    $(".choose").change(function () {
        $("select option").prop("disabled", false);
        $(".choose").not($(this)).find("option[value='" + $(this).val() + "']").prop("disabled", true);
        $("#rbook").hide();
        $("#button4").show();
        $("#book").hide();
        $("#book1").hide();
    });


    $("#cabtype").change(function(){
      $("#rbook").hide();
        $("#button4").show();
        $("#book").hide();
        $("#book1").hide();
    })

    $("#lugg").keyup(function(){
      $("#rbook").hide();
      $("#button4").show();
      $("#book").hide();
      $("#book1").hide();
    })

    $("#lugg").bind("keypress", function (e) {
      
        var keyCode = e.which ? e.which : e.keyCode
        if (!(keyCode >= 48 && keyCode <= 57)) {
          return false;
        }
    });
    

    $("#mobile").bind("keypress", function (e) {
      var keyCode = e.which ? e.which : e.keyCode
      if (!(keyCode >= 48 && keyCode <= 57)) {
        return false;
      }
  });

    $('#err').hide();
     $cabtyp = $('#cabtype'), $lug = $('#lugg');
        $cabtyp.change(function () {
            if ($cabtyp.val() == 'Basic') {
                $lug.attr('disabled', 'disabled').val('');
                $('#err').show();
            } else {
                $lug.removeAttr('disabled');
                $('#err').hide();
            }
        }).trigger('change');
        
        $('#nu').hide();
        $('#ep').hide();
        $('#ed').hide();
        $('#ec').hide();
        $('#book').hide();
        $('#book1').hide();
        $('#rbook').hide();
});


$("#book").click(function(e){
    e.preventDefault();
        $pickup=$("#pickup").val();
        $drop=$("#drop").val();
        $cabtype=$("#cabtype").val();
        $lugg=$("#lugg").val();
        $far=$("#far").val();
    $.ajax({
        url: 'book.php',
        type: 'post',
        data:{
            pickup : $pickup,
            drop : $drop,
            cabtype : $cabtype,
            lugg : $lugg,
            far : $far
        },
        success: function (result) {
            $('#rbook').show();
            $('#book').hide();
            $('#button4').hide();
        },
        error: function () {
            $('#book').show();
            $('#rbook').hide();
            $('#button4').show();
            alert(error);
        }
    });
    
});
 $('#allr').show();
// $('#penr').hide();
// $('#canr').hide();
// $('#comr').hide();
 $('#ernr').hide();
$('#srt').show();
$("#allrid").click(function(){
    $('#allr').show();
    $('#ernr').hide();
    $('#cstats').show();
    $('#srt').show();
    $('#drp').show();
});
// $("#penrid").click(function(){
//     $('#penr').show();
//     $('#allr').hide();
//     $('#canr').hide();
//     $('#comr').hide();
//     $('#ernr').hide();
//     $('#cstats').hide();
//     $('#srt').hide();
//     $('#drp').show();
// });
// $("#canrid").click(function(){
//     $('#canr').show();
//     $('#penr').hide();
//     $('#allr').hide();
//     $('#comr').hide();
//     $('#ernr').hide();
//     $('#cstats').hide();
//     $('#srt').hide();
//     $('#drp').show();
// });
// $("#comrid").click(function(){
//     $('#comr').show();
//     $('#penr').hide();
//     $('#canr').hide();
//     $('#allr').hide();
//     $('#ernr').hide();
//     $('#cstats').hide();
//     $('#srt').hide();
//     $('#drp').show();
// });
$("#ernrid").click(function(){
    $('#ernr').show();
    $('#allr').hide();
    $('#srt').hide();
    $('#drp').hide();
});


 $('#allru').show();
// $('#penru').hide();
// $('#canru').hide();
// $('#comru').hide();
  $('#ernru').hide();
  $('#drp').show();
  $("#allridu").click(function(){
    $('#allru').show();
    $('#ernru').hide();
    $('#srt').show();
    $('#cstats').show();
    $('#drp').show();
});
// $("#penridu").click(function(){
//     $('#penru').show();
//     $('#allru').hide();
//     $('#canru').hide();
//     $('#comru').hide();
//     $('#ernru').hide();
//     $('#srt').hide();
//     $('#cstats').hide();
//     $('#drp').show();
// });
// $("#canridu").click(function(){
//     $('#canru').show();
//     $('#penru').hide();
//     $('#allru').hide();
//     $('#comru').hide();
//     $('#ernru').hide();
//     $('#srt').hide();
//     $('#cstats').hide();
//     $('#drp').show();
// });
// $("#comridu").click(function(){
//     $('#comru').show();
//     $('#penru').hide();
//     $('#canru').hide();
//     $('#allru').hide();
//     $('#ernru').hide();
//     $('#srt').hide();
//     $('#cstats').hide();
//     $('#drp').show();
// });
$("#ernridu").click(function(){
    $('#ernru').show();
    $('#allru').hide();
    $('#drp').hide();
});
$('#edi').show();
$('#cpaa').hide();
$('#edipr').click(function(){
    $('#edi').show();
    $('#cpaa').hide();
});
$('#chpa').click(function(){
    $('#cpaa').show();
    $('#edi').hide();
});

$('#sort').change(function()
{
    $by=$(this).val();

    $.ajax({
        url: 'sort.php',
        type: 'post',
        data:{
            by: $by
        },
        
        success: function (result12) {
        
          $('#allr').html(result12);
          
        },
    });
});

$('#sortu').change(function()
{
    $by=$(this).val();

    $.ajax({
        url: 'sortu.php',
        type: 'post',
        data:{
            by: $by
        },
        
        success: function (result12) {
        
          $('#allru').html(result12);
          
        },
    });
});

$('#sortud').change(function()
{
    $by=$(this).val();

    $.ajax({
        url: 'sortud.php',
        type: 'post',
        data:{
            by: $by
        },
        
        success: function (result12) {
        
          $('#allru').html(result12);
          
        },
    });
});

function sortTablen(n,dd) {
    var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
    table = dd;
    switching = true;
    dir = "asc"; 

    while (switching) {
      switching = false;
      rows = table.rows;

      for (i = 1; i < (rows.length - 1); i++) {
        shouldSwitch = false;

        x = rows[i].getElementsByTagName("TD")[n];
        y = rows[i + 1].getElementsByTagName("TD")[n];

        if (dir == "asc") {
          if (parseFloat(x.innerHTML) > parseFloat(y.innerHTML)) {

            shouldSwitch= true;
            break;
          }
        } else if (dir == "desc") {
          if (parseFloat(x.innerHTML) < parseFloat(y.innerHTML)) {

            shouldSwitch = true;
            break;
          }
        }
      }
      if (shouldSwitch) {

        rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
        switching = true;
        switchcount ++;      
      } else {

        if (switchcount == 0 && dir == "asc") {
          dir = "desc";
          switching = true;
        }
      }
    }
  }


  function sortTable(n,dd) {
    var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
    table = dd;
    switching = true;

    dir = "asc"; 

    while (switching) {

      switching = false;
      rows = table.rows;

      for (i = 1; i < (rows.length - 1); i++) {

        shouldSwitch = false;

        x = rows[i].getElementsByTagName("TD")[n];
        y = rows[i + 1].getElementsByTagName("TD")[n];

        if (dir == "asc") {
          if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {

            shouldSwitch= true;
            break;
          }
        } else if (dir == "desc") {
          if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {

            shouldSwitch = true;
            break;
          }
        }
      }
      if (shouldSwitch) {

        rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
        switching = true;
        switchcount ++;      
      } else {

        if (switchcount == 0 && dir == "asc") {
          dir = "desc";
          switching = true;
        }
      }
    }
    }

    $("#cfil").change(function() {
        var value = $(this).val().toLowerCase();
        $("#tblc tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
        $("#tbl1c tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
          });
          $("#tbl2c tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
          });
          $("#tbl3c tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
          });
          $("#tbl4c tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
          });
      });

      $("#cstat").change(function() {
        var value = $(this).val().toLowerCase();
        $("#tblc tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
        $("#tbl1c tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
          });
          $("#tbl2c tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
          });
          $("#tbl3c tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
          });
          $("#tbl4c tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
          });
      });

      $(function() {
        $("#prnt").click(function() {

            printDiv("pbox");

            function printDiv(id) {
                var printContents = document.getElementById(id).innerHTML;
                var originalContents = document.body.innerHTML;
                document.body.innerHTML = printContents;
                window.print();
                location.reload();
            }
        })
    })
    
    $('#penrd').click(function(){
      $('#allr').hide();
      $('#penr').show();
      window.location.href="allrides.php";
    })