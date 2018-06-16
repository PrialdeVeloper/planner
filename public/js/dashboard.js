function readURL(input) {

  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {
      $('#previewImage').attr('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]);
  }
}

$("#imageUpload").change(function(){
    readURL(this);
});


$(function(){
	url = new URL(window.location.href);
	if (url.searchParams.get('editSkills')) {
		$("#editSkills").modal("show");
	}
});

$(function(){
	url = new URL(window.location.href);
	if (url.searchParams.get('editAchievements')) {
		$("#editAchievement").modal("show");
	}
});