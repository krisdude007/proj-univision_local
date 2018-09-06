$(document).ready(function(){

  // FAKE REMOVE THIS
  // Toggle the visibility of login and logout buttons based on which is clicked
  $('#snap-drawer-login-btn, #snap-drawer-logout-btn').click(function(){
    $('#snap-drawer-login-btn, #snap-drawer-logout-btn').toggleClass('hidden');
  });


  // Initialize Fastclick.js
  // If you are emulating a device in a browser, ie chrome browser emulation,
  //  you must disable this for mouse events to register
  $(function() {
      FastClick.attach(document.body);
  });

  // Initialize Snap.js
  var snapper = new Snap({
            element: document.getElementById('content-container'),
            disable: 'right',
            touchToDrag: false
        });

  // when the user clicks the hamburger icon, open or close the menu accordingly
  $('#open-left').click(function(e){
    e.preventDefault();
    if( snapper.state().state=="left" ){
      snapper.close();
    } else {
      snapper.open('left');
    }
  });

  // when the user clicks the login/logout button or a nav item, close the drawer
  $('#snap-drawer-login-btn, #nav, #snap-drawer-logout-btn').click(function(e){
    if( snapper.state().state=="left" ){
      snapper.close();
    };
  });

  /* Prevent Safari opening links when viewing as a Mobile App */
  (function (a, b, c) {
      if(c in b && b[c]) {
          var d, e = a.location,
              f = /^(a|html)$/i;
          a.addEventListener("click", function (a) {
              d = a.target;
              while(!f.test(d.nodeName)) d = d.parentNode;
              "href" in d && (d.href.indexOf("http") || ~d.href.indexOf(e.host)) && (a.preventDefault(), e.href = d.href)
          }, !1)
      }
  })(document, window.navigator, "standalone");
  
  adsTracker();
 
});

var adsTracker = function() {  
    onLoadAds();
    onResizeAds();
};

var onLoadAds = function() {
    var height = $(window).height();
    var width = $(window).width();
    console.log("height:"+height + "width"+width);
    if(width>height) {
      // Landscape  
      getAds(width,'Landscape'); 
    } else {
     // Portrait  
      getAds(width,'Portrait');
    }

}
var onResizeAds  = function() {
  $(window).resize( function(){
    var height = $(window).height();
    var width = $(window).width();

    if(width>height) {
      // Landscape
       getAds(width,'Landscape'); 
    } else {
     // Portrait 
      getAds(width,'Portrait');
    }
  });
}


var getAds = function(width,orientation){
  console.log(orientation+"->"+width);
  if(orientation == 'Landscape') {
      if(width <= 1024 && width >= 768) { 
         if (window.devicePixelRatio >= 2) {
            //ads image size 2048X100 Retina
            $("#fabmob_banner").append('<A HREF="http://ad.doubleclick.net/jump/N9281.503.UNIVISION/B8070260.104;sz=1x1;ord='+event.timeStamp+'?"><IMG SRC="http://ad.doubleclick.net/ad/N9281.503.UNIVISION/B8070260.104;sz=1x1;ord='+event.timeStamp+'?" BORDER=0 WIDTH=1 HEIGHT=1 ALT="Advertisement"></A>');
          }
         else{
           //ads image size 1024X50
           $("#fabmob_banner").append('<A HREF="http://ad.doubleclick.net/jump/N9281.503.UNIVISION/B8070260.105;sz=1x1;ord='+event.timeStamp+'?"><IMG SRC="http://ad.doubleclick.net/ad/N9281.503.UNIVISION/B8070260.105;sz=1x1;ord='+event.timeStamp+'?" BORDER=0 WIDTH=1 HEIGHT=1 ALT="Advertisement"></A>');
         }
         
       }
      if(width <= 480 && width >= 320){
         if (window.devicePixelRatio >= 2) {
            //ads image size 960 x 100 Retina
           $("#fabmob_banner").append('<A HREF="http://ad.doubleclick.net/jump/N9281.503.UNIVISION/B8070260.103;sz=1x1;ord='+event.timeStamp+'?"><IMG SRC="http://ad.doubleclick.net/ad/N9281.503.UNIVISION/B8070260.103;sz=1x1;ord='+event.timeStamp+'?" BORDER=0 WIDTH=1 HEIGHT=1 ALT="Advertisement"></A>');
          } 
      } 

   } else if(orientation == 'Portrait') { 
      if(width <= 480 && width >= 320){
        // Ads  image size  480 X 50 
        $("#fabmob_banner").append('<A HREF="http://ad.doubleclick.net/jump/N9281.503.UNIVISION/B8070260.106;sz=1x1;ord='+event.timeStamp+'?"><IMG SRC="http://ad.doubleclick.net/ad/N9281.503.UNIVISION/B8070260.106;sz=1x1;ord='+event.timeStamp+'?" BORDER=0 WIDTH=1 HEIGHT=1 ALT="Advertisement"></A>');
      }

   }

}

