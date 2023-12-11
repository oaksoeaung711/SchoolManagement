let formGroups = document.querySelectorAll('.form-group');
formGroups.forEach(formGroup => {
    let formInput = formGroup.querySelector('.form-input');
    let formInputIcon = formGroup.querySelector('.form-input-icon');

    if(formInput.value != ""){
        formInputIcon.classList.add('text-gray-600');
    }
    formInput.addEventListener('focus',function(){
        formInputIcon.classList.add('text-gray-600');
    });

    formGroup.querySelector('.form-input').addEventListener('blur',()=>{
        if(formInput.value != ""){
            formInputIcon.classList.add('text-gray-600');
        }else{
            formInputIcon.classList.remove('text-gray-600');
        }
    });
});