const onVisibilityChange = () => {
    return document.hidden
      ? sendNotification() : '';
}

function sendNotification() {
  document.title = "neni tu hlupak"
}
  
document.addEventListener("visibilitychange", onVisibilityChange);