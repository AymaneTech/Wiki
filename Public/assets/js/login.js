const validateForm = formSelector => {
    const formElement = document.querySelector(formSelector);
    const validationOptions = [
        {
            attribute: 'minlength',
            isValid: input => input.value && input.value.length >= parseInt(input.minLength, 10),
            errorMessage: (input, label) => `${label.textContent} needs to be at least ${input.minLength} characters`,
        },
        {
            attribute: 'match',
            isValid: input => {
                const matchSelector = input.getAttribute("match");
                const matchedElement = formElement.querySelector(`#${matchSelector}`);
                return matchedElement && matchedElement.value.trim() === input.value.trim();
            },
            errorMessage: (input, label) => {
                const matchSelector = input.getAttribute("match");
                const matchedElement = formElement.querySelector(`#${matchSelector}`);
                const matchedLabel = matchedElement.parentElement.parentElement.querySelector("label");

                return `${label.textContent} should match ${label.textContent}`
            }
        },
        {
            attribute: 'pattern',
            isValid: input => {
                const patternRegex = new RegExp(input.pattern);
                return patternRegex.test(input.value);
            },
            errorMessage: (input, label) => `Not a valid ${label.textContent} `,
        },
        {
            attribute: 'required',
            isValid: input => input.value.trim() !== '',
            errorMessage: (input, label) => `${label.textContent} is required`,
        },
    ];

    const validateSingleFormGroup = formGroup => {
        const label = formGroup.querySelector("label");
        const input = formGroup.querySelector("input, textarea");
        const errorContainer = formGroup.querySelector(".error");
        const errorIcon = formGroup.querySelector(".error-icon");
        const successIcon = formGroup.querySelector(".success-icon");

        let formGroupError = false;
        for (const option of validationOptions) {
            if (input.hasAttribute(option.attribute) && !option.isValid(input)) {
                errorContainer.textContent = option.errorMessage(input, label);
                input.classList.add("border-red-700");
                input.classList.remove("border-green-700");
                errorIcon.classList.remove("hidden");
                successIcon.classList.add("hidden");
                formGroupError = true;
            }
        }
        if (!formGroupError) {
            errorContainer.textContent = '';
            input.classList.remove("border-red-700");
            input.classList.add("border-green-700");
            successIcon.classList.remove("hidden");
            errorIcon.classList.add("hidden");
        }

        return formGroupError;
    };


    const validateAllGroups = formToValidate => {
        const formGroups = Array.from(formToValidate.querySelectorAll(".input-group"));
        let formHasErrors = false;

        formGroups.forEach(formGroup => {
            const hasError = validateSingleFormGroup(formGroup);
            formHasErrors = formHasErrors || hasError;
        });

        return !formHasErrors;
    };

    formElement.setAttribute('novalidate', '');
    Array.from(formElement.elements).forEach(element => {
        element.addEventListener("blur", event => {
            validateSingleFormGroup(event.srcElement.parentElement.parentElement);
        });
    });
    formElement.addEventListener('submit', event => {
        if (validateAllGroups(formElement)) {
            formElement.removeAttribute('novalidate');
            console.log("if validation")
        } else {
            console.log("else validation failed");
            event.preventDefault();
            console.log("Form has errors. Please fix them before submitting.");
        }
    });
};
validateForm("#loginForm");
