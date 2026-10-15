import { clearErrors, request, showErrors } from "../index.js"

const form = document.getElementById('registrationForm')

form.addEventListener('submit', async (event) => {
    event.preventDefault()
    clearErrors()

    try {
        const formData = new FormData(form)
        const { ok, result } = await request(form.action, {
            method: 'POST',
            body: formData,
        })

        if (!ok) {
            showErrors(result.errors)
            return
        }

        if (typeof result.redirect === 'string') {
            window.location = result.redirect
            return
        }

        throw new Error('Registration succeeded without a redirect URL.')

    } catch(error) {
        console.error(`Unable to proceed with registration: ${error}`)
    }
})