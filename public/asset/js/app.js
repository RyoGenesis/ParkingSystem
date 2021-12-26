function display_c() {
    var refresh=1000; // in milliseconds
    mytime=setTimeout('display_ct()',refresh);
}
    
function display_ct() {
    var x = new Date().toLocaleString('en-GB');
    $('#clock')[0].innerHTML = x;
    display_c();
}