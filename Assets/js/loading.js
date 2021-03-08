function onReady(callback) {
  var intervalId = window.setInterval(function() {
    if (document.getElementsByClassName('main_media')[0] !== undefined) {
      window.clearInterval(intervalId);
      callback.call(this);
    }
  }, 1000);
}

function setVisible(selector, visible) {
  document.querySelector(selector).style.display = visible ? 'block' : 'none';
}

function setOpacity(selector, opacity) {
  document.querySelector(selector).style.opacity = opacity ? '100' : '0';
}

onReady(function() {
  // setVisible('.page', true);
  setOpacity('.loading', false);
  window.setTimeout(function () {
    setVisible('.loading', false);
  }, 500);
});
