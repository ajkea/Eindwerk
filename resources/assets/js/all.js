// window.onload = function() {
//   document.getElementById("defaultTab").click();
// }

// window.openTab = function (evt , tabName) {
//   var i, tabcontent, tablinks;

//   tabcontent = this.document.getElementsByClassName("tab-content");
//   for (i = 0;i < tabcontent.length;i++) {
//     // tabcontent[i].style.display = "none";
//   }

//   // Get all elements with class="tablinks" and remove the class "active"
//   tablinks = document.getElementsByClassName("tab-link");
//   for (i = 0; i < tablinks.length; i++) {
//       tablinks[i].className = tablinks[i].className.replace(" active", "");
//   }

//   // Show the current tab, and add an "active" class to the button that opened the tab
//   // document.getElementById(tabName).style.display = "initial";
//   evt.currentTarget.className += " active";
// }