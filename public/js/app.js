(function () {
  $('#assign-dropdown').on('change', function() {
    //alert(this.value);
    if (this.value > 0) {
      alert('date select opened');
    } else {
      alert('date select closed');
    }

  });
})();