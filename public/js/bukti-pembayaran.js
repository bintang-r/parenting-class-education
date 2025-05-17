const inputBukti = document.getElementById("buktiPembayaran");
const preview = document.getElementById("previewBukti");
const previewWrapper = document.getElementById("previewWrapper");
const uploadText = document.getElementById("uploadText");
const removeBtn = document.getElementById("removeBtn");

function resetUpload() {
  inputBukti.value = "";
  preview.src = "";
  previewWrapper.classList.add("hidden");
  preview.style.opacity = 0;
  uploadText.classList.remove("hidden");
}

inputBukti.addEventListener("change", function () {
  const file = this.files[0];

  if (!file) {
    resetUpload();
    return;
  }

  if (!file.type.startsWith("image/")) {
    alert("File harus berupa gambar!");
    resetUpload();
    return;
  }

  const reader = new FileReader();

  reader.onload = function (e) {
    preview.src = e.target.result;
    uploadText.classList.add("hidden");
    previewWrapper.classList.remove("hidden");
    // Fade in image
    setTimeout(() => {
      preview.style.opacity = 1;
    }, 50);
  };

  reader.readAsDataURL(file);
});

removeBtn.addEventListener("click", resetUpload);

// Optional: drag & drop effect
const uploadArea = document.getElementById("uploadArea");
uploadArea.addEventListener("dragover", (e) => {
  e.preventDefault();
  uploadArea.classList.add("border-indigo-600", "bg-indigo-50");
});

uploadArea.addEventListener("dragleave", (e) => {
  e.preventDefault();
  uploadArea.classList.remove("border-indigo-600", "bg-indigo-50");
});

uploadArea.addEventListener("drop", (e) => {
  e.preventDefault();
  uploadArea.classList.remove("border-indigo-600", "bg-indigo-50");
  if (e.dataTransfer.files.length > 0) {
    inputBukti.files = e.dataTransfer.files;
    inputBukti.dispatchEvent(new Event("change"));
  }
});
