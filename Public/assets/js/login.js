const validateForm = formSelector => {
    const formElement = document.querySelector(formSelector);
    const validationOptions = [
        {
            attribute: 'required',
            isValid: input => input.value.trim() !== '',
            errorMessage: (input, label) => `${label.textContent} is required`,
        }
    ];

    const validateSingleFormGroup = formGroup => {
        console.log('Validating form group:', formGroup);
        const label = formGroup.querySelector("label");
        const input = formGroup.querySelector("input, textarea");
        const errorContainer = formGroup.querySelector(".error");
        const errorIcon = formGroup.querySelector(".error-icon");
        const successIcon = formGroup.querySelector(".success-icon");

        for (const option of validationOptions) {
            if (input.hasAttribute(option.attribute) && !option.isValid(input)) {
                errorContainer.textContent = option.errorMessage(input, label);
                break;
            }
        }
    };

    const validateAllGroups = formToValidate => {
        const formGroups = Array.from(formToValidate.querySelectorAll(".input-group")); // Update the class to match your HTML
        formGroups.forEach(formGroup => {
            validateSingleFormGroup(formGroup);
        });
    };
    formElement.setAttribute('novalidate', '');
    formElement.addEventListener('submit', event => {
        event.preventDefault();
        validateAllGroups(formElement);
    });
};
document.addEventListener('DOMContentLoaded', () => {
    validateForm("#loginForm");
});
