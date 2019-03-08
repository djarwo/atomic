 
function addConsignee(checkboxValue)
{
    $('#consignee').slideToggle(300);
}

function check(check,input,label,date,calendar,checkbox)
{
  if ($('#'+check).is(':checked')) {
      $('.'+input).attr('required');
      $('.'+date).attr('required');
      $('.'+input).attr('type','text');
      $('.'+date).attr('type','text');
      $('.'+label).show();
      $('.'+calendar).removeAttr('style');
      $('.'+checkbox).empty();
  }else{
      $('.'+input).removeAttr('required');
      $('.'+date).removeAttr('required');
      $('.'+input).attr('type','hidden');
      $('.'+date).attr('type','hidden');
      $('.'+calendar).attr('style','display:none');
      $('.'+label).hide();
      $('.'+checkbox).html('<input type="checkbox" hidden checked name="delay_product_checked[]" value="0">');
  }
}

function myKonfersi1() {
  $('content#konfersi2').show();
  $('#foto-konfersi2').show();
  $('#button_konfersi').attr('onclick','myKonfersi2hide()');
   $('#button_konfersi').attr('class','');
  $('.require2').attr('required','');
  $('.delete2').attr('value','false');
}

function myKonfersi2() {
  //remove disabled ukuran conv lv 3
  $('form > div > div > content#konfersi2 > content#konfersi1 > div > div > div > input#ukuran').removeAttr('readonly');
  $('#button_konfersi2').html('<b> Konfersi (2) </b>');
  $('#konfersi3').show();
  $('#foto-konfersi3').show();
  //rename konfersi 1, 2
  $('#button_konfersi').attr('class','');
  $('#button_konfersi2').html('<b> Konfersi (2) </b>');
  $('#button_konfersi3').attr('class','fa fa-minus-circle fa-1x');
  $('#button_konfersi2_plus').attr('onclick','');
  $('#button_konfersi2_plus').attr('class','');
  $('#button_konfersi2_minus').attr('onclick','');
  $('#button_konfersi2_minus').attr('class','');
  $('.require3').attr('required','');
  $('.delete3').attr('value','false');
}

function myKonfersi3() {
  $('#button_konfersi2_plus').attr('onclick','myKonfersi2()');
  $('#button_konfersi2_plus').attr('class','fa fa-plus-circle fa-1x');
  $('#button_konfersi2_minus').attr('onclick','myKonfersi2hide()');
  $('#button_konfersi2_minus').attr('class','fa fa-minus-circle fa-1x');
  $('#button_konfersi').attr('class','');
  $('form > div > div > content#konfersi3').hide();
  $('#foto-konfersi3').hide();
  $('.require3').removeAttr('required','');
  $('.delete3').attr('value','true');
}

function myKonfersi2hide() {
  $('form > div > div > content#konfersi2').hide();
  $('#foto-konfersi2').hide();
  $('#button_konfersi').attr('onclick','myKonfersi1()');
  $('#button_konfersi').attr('class','');  
  $('#button_konfersi').attr('onclick','myKonfersi1()');
  $('#button_konfersi').attr('class','fa fa-plus-circle fa-1x');
  // $('#button_konfersi').html('<i style="float:right;" class="fa fa-plus-circle fa-1x"></i>');
  $('.require2').removeAttr('required','');
  $('.delete2').attr('value','true');
}
