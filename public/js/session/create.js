import { clearErrors, showErrors } from "../app.js"
import { createSession } from "./api.js"

/* Instantiate the form */
const form = document.getElementById('loginForm')

/* Listen for form submit */
form.addEventListener('submit', async (event) => {
    event.preventDefault()
    clearErrors()

    try{
        const { ok, result } = await createSession(new FormData(form))
        
        if (!ok) {
            showErrors(result.errors)
            return
        }

        if (typeof result.redirect === 'string') {
            window.location.href = result.redirect
            return
        }

        throw new Error('Login succeeded without a redirect URL.')

    } catch (error) {
        console.error(error)
    }
})