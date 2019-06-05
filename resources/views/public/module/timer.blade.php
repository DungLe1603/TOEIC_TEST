<style>
#countdown {
  width: 100%;
  background: #313233;
  color: #FFF;
  font-size: 26px;
  font-weight: normal;
  text-align: center;
  width: 25%;
  dispaly: block;
  float: left;
  border-right: 1px solid #FFF;
}
</style>
<div id="countdown"></div>
<script>
    // set the time counting down
    var time = 7200000;
    
    // variables for time units
    var minutes, seconds;
    
    // get tag element
    var countdown = document.getElementById('countdown');
    
    // update the tag with id "countdown" every 1 second
    setInterval(function () {
        // find the amount of "seconds" between now and target
        var seconds_left = time / 1000;
    
        minutes = parseInt(seconds_left / 60);
        seconds = parseInt(seconds_left % 60);
        
        // format countdown string + set tag value
        countdown.innerHTML = '' + minutes + ' : ' + seconds;  
        time = time - 1000;
    }, 1000);
</script>
