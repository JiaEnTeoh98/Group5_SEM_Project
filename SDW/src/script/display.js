if (window.FileReader) {
  function handleFileSelect(evt) {
    var imgName;
    var files = evt.target.files;
    var f = files[0];
    var reader = new FileReader();

    reader.onload = (function(theFile) {
      return function(e) {
        document.getElementById("displayName").innerHTML = theFile.name;
        document.getElementById("showimage").innerHTML = [
          '<img width="150" height="200" src="',
          e.target.result,
          '" title="',
          theFile.name,
          '" width="70"/>'
        ].join("");
      };
    })(f);

    reader.readAsDataURL(f);
  }
} else {
  alert("This browser does not support FileReader");
}

document
  .getElementById("files")
  .addEventListener("change", handleFileSelect, false);
