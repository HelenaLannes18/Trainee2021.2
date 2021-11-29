const qS = (el) => document.querySelector(el);

function startModal(modalID) {
    const modal = qS(`#${modalID}`);
    if(modal) {
        modal.classList.add('show');
        
        modal.addEventListener('click', (e) => {
            if(e.target.id == modalID || e.target.id == 'close__modal') {
                modal.classList.remove('show');
            }
        });
    }
}


const buttonAdd = qS('.product__add');
const buttonEdit = qS('.button--edit');
const buttonDelete = qS('.button--delete');

buttonAdd.addEventListener('click', () => startModal('modal__add__product'));
buttonEdit.addEventListener('click', () => startModal('modal__edit__product'));
buttonDelete.addEventListener('click', () => startModal('modal__delete__product'));
