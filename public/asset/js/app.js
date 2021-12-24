function display_c() {
    var refresh=1000; // in milliseconds
    mytime=setTimeout('display_ct()',refresh);
}
    
function display_ct() {
    var x = new Date().toLocaleString('en-GB');
    document.getElementById('clock').innerHTML = x;
    display_c();
}