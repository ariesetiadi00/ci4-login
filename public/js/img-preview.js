/**
 * DOM
 * 1. Image Preview
 * 2. Image Input
 * 3. Imgae Label
 */

function imgPreview() {
	// DOM
	const imgPreview = document.querySelector("#img-preview");
	const imgInput = document.querySelector("#img-input");
	const imgLabel = document.querySelector("#img-label");

	// Set label with uploaded file name
	imgLabel.textContent = imgInput.files[0].name;

	// File
	const file = new FileReader();

	file.readAsDataURL(imgInput.files[0]);

	file.onload = function (e) {
		imgPreview.src = e.target.result;
	};
}
