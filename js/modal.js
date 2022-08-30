let btnModal = document.getElementById('perfil-image');
let modal = document.getElementById('modal-perfil');
let modalContent = document.getElementById('modal-perfil-content');

btnModal.addEventListener("click", function() {
	modal.classList.toggle('show-modal');
	modalContent.classList.toggle('show-modal-content');
})