function readImgURL(input) {
    if (input.files[0]) {
      var reader = new FileReader();  
      reader.onload = function(e) {
        $('#imgBlah').attr('src', e.target.result);
      }  
      reader.readAsDataURL(input.files[0]);
    }
}

function readVoiceURL(input) {
    if (input.files[0]) {
      var reader = new FileReader();  
      reader.onload = function(e) {
        $('#voiceBlah').attr('src', e.target.result);
      }  
      reader.readAsDataURL(input.files[0]);
    }
}

  
$("#imgInp").change(function() {
    console.log('ok');
    readImgURL(this);
});
$("#voiceInp").change(function() {
    readVoiceURL(this);
});
  
  