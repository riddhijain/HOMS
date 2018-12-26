
var $currentCard, $nextCard, $prevCard;

var animationEvents = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';

$('.next').on('click', function (e) {
  e.preventDefault();
  $currentCard = $(this).parent().parent();
  $nextCard = $currentCard.next();
  
  // Activate next step on progress bar
  $('#bar li').eq($('.card').index($nextCard)).addClass('active');
  
  // Hide current card and show the next one
  var inAnimation = 'animated slideInLeft';
  var outAnimation = 'animated bounceOutRight';
  
  $currentCard.hide()

  $nextCard
    .show()
    .addClass(inAnimation)
    .one(animationEvents, function () {
      $(this).removeClass(inAnimation);
    });  
    
  

});

$('.prev').on('click', function(e) {
  e.preventDefault();
  $currentCard = $(this).parent().parent();
  $prevCard = $currentCard.prev();
  
  // de-activate current step on progress bar
  $('#bar li').eq($('.card').index($currentCard)).removeClass('active');
  
  // Show the previous card and hide the current
  var inAnimation = 'animated slideInRight';
  $currentCard.hide();
  
  $prevCard
    .show()
    .addClass(inAnimation)
    .one(animationEvents, function () {
      $(this).removeClass(inAnimation);
    });
});